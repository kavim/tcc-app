<?php

namespace App\Http\Controllers;

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

    public function students()
    {
        $students = \App\Models\User::where('user_type_id', config('custom.tipo_estudante'))->where('block', false)->inRandomOrder()->get();

        return view('web.students.students', compact('students'));
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
