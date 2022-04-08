<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('web.welcome');
    }

    public function students(Request $request)
    {
        $search_string = $request->input('search_string');
        $course_id = $request->input('course_id');

        $courses = Course::get();

        $students = \App\Models\User::with('student')->where('user_type_id', config('custom.tipo_estudante'))
        ->where('block', false)
        ->whereHas('student', function ($query) {
            $query->where('is_academic_institution_email_verified', true);
        })
        ->when($search_string, function ($query, $search_string) {
            $slug = \Str::slug($search_string);
            return $query->where('slug_name', 'LIKE', '%' . $slug . '%');
        })
        ->when($course_id, function ($query, $course_id) {
            return $query->whereHas('student', function ($query) use ($course_id) {
                return $query->whereHas('courses', function ($query) use ($course_id) {
                    return $query->where('course_id', $course_id);
                });
            });
        })
        ->inRandomOrder()
        ->get();

        return view('web.students.students', compact('students', 'courses', 'search_string', 'course_id'));
    }

    public function studentsShow($slug_name)
    {
        $user = \App\Models\User::where('slug_name', $slug_name)->first();

        $social_networks = $user->student->social_networks;
        $social_networks = array_merge(config('custom.social_networks'), $social_networks ?? []);

        return view('web.students.students-show', compact('user', 'social_networks'));
    }

    public function for_companies()
    {
        return view('web.for_companies');
    }
}
