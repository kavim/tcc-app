<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('app.dashboard', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('app.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'max:150',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'bio' => 'required|max:255',
            'enrollment' => 'required',
            'phone' => 'required',
            'document' => 'required',
            'birth_date' => 'date_format:d/m/Y|before:today|nullable',
        ]);

        if (!$validated) {
            return redirect()
                ->back()
                ->withErrors($validated)
                ->withInput();
        }

        $user = Auth::user();
        $user->update($validated);
        $user->student()->update([
            'enrollment' => $request->input('enrollment'),
            'bio' => $request->input('bio'),
            'phone' => $request->input('phone'),
            'document' => $request->input('document'),
            'birth_date' => Carbon::createFromFormat('d/m/Y', $request->input('birth_date'))->format('Y-m-d')
        ]);

        return redirect()->back()->with('success', 'Perfil actualizado');
    }

    public function editAvatar()
    {
        return view('app.avatar');
    }

    public function updateAvatar(Request $request)
    {
        $user = Auth::user();

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'Selecione um arquivo');
        }

        $src = $request->file('image')->store("avatar/".$user->id, 'public');

        $img = $user->student->update(['avatar' => $src]);

        $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
        $image->save();

        return redirect()->back()->with('success', 'Avatar atualizado com sucesso');
    }

    public function editCover()
    {
        return view('app.cover');
    }

    public function updateCover(Request $request)
    {
        $user = Auth::user();

        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'Selecione um arquivo');
        }

        $src = $request->file('image')->store("cover/".$user->id, 'public');

        $img = $user->student->update(['cover' => $src]);

        $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
        $image->save();

        return redirect()->back()->with('success', 'cover atualizado com sucesso');
    }

    public function editResume()
    {
        $resume = Auth::user()->student->resume;

        return view('app.resume', compact('resume'));
    }

    public function updateResume(Request $request)
    {
        $validated = $request->validate([
            'resume' => 'required|max:9999',
        ]);

        $user = Auth::user();

        $user->student->update($validated);

        return redirect()->back()->with('success', 'Resumo atualizado com sucesso');
    }

    public function editCourse()
    {
        $user = Auth::user();
        $courses = Course::get();
        $current_course_id = Auth::user()->student->course_id;
        $course_started_at = $user->student->course()->started_at;
        $course_completed_at = $user->student->course()->completed_at;

        dd($course_started_at);

        return view('app.course', compact('courses', 'current_course_id'));
    }

    public function updateCourse(Request $request)
    {
        dd($request->all());

        $validated = $request->validate([
            'started_at' => 'required',
            'created_at' => 'required',
            'course_id' => 'required',
        ]);

        $user = Auth::user();



        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }
}
