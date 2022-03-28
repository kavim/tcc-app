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

    public function editExperiences()
    {
        $experiences = Auth::user()->student->experiences;

        return view('app.experiences', compact('experiences'));
    }

    public function updateExperiences(Request $request)
    {
        $validated = $request->validate([
            'experiences' => 'required|max:9999',
        ]);

        $user = Auth::user();

        $user->student->update($validated);

        return redirect()->back()->with('success', 'Resumo atualizado com sucesso');
    }

    public function editCourse()
    {
        $user = Auth::user();
        $courses = Course::get();

        $current_course_id = $user->student->course()->pivot->course_id;
        $course_started_at = Carbon::parse($user->student->course()->pivot->started_at)->format('d/m/Y');
        $course_completed_at = Carbon::parse($user->student->course()->pivot->completed_at)->format('d/m/Y');
        $course_completed = $user->student->course()->pivot->completed;

        return view('app.course', compact('courses', 'current_course_id', 'course_started_at', 'course_completed_at', 'course_completed'));
    }

    public function updateCourse(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'course_completed_at' => 'date_format:d/m/Y|before:today|nullable',
            'course_started_at' => 'date_format:d/m/Y',
            'selected_course_id' => 'required',
        ]);

        $student = Auth::user()->student;

        $student->courses()->sync(
            $request->input('selected_course_id'),
            [
                'completed' => $request->input('course_completed'),
                'completed_at' => $request->input('course_completed') ? Carbon::createFromFormat('d/m/Y', $request->input('course_completed_at'))->format('Y-m-d') : null,
                'started_at' => Carbon::createFromFormat('d/m/Y', $request->input('course_started_at'))->format('Y-m-d') ?? null,
            ]
        );

        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }
}
