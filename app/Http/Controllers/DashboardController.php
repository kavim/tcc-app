<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\StudentEmailVerify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

//        dd($user->student->academic_institution_emails);

        $academic_institution_email = 'oawdnoaiwdnaowidn@oanwoianwd.com';
        $is_academic_institution_email_verified = $user->student->is_academic_institution_email_verified;

        return view('app.dashboard', compact('user', 'academic_institution_email', 'is_academic_institution_email_verified'));
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
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
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

        $image = Image::make(storage_path("app/public/" . $src))->fit(1200, 400)->save();
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

        $current_course_id = $user->student->course()->pivot->course_id ?? null;
        $course_started_at = Carbon::parse($user->student->course()->pivot->started_at ?? '10-10-2020')->format('d/m/Y');
        $course_completed_at = Carbon::parse($user->student->course()->pivot->completed_at ?? '10-10-2020')->format('d/m/Y') ?? null;
        $course_completed = $user->student->course()->pivot->completed ?? null;

        return view('app.course', compact('courses', 'current_course_id', 'course_started_at', 'course_completed_at', 'course_completed'));
    }

    public function updateCourse(Request $request)
    {
        $validated = $request->validate([
            'course_completed_at' => 'date_format:d/m/Y|before:today|nullable',
            'course_started_at' => 'required|date_format:d/m/Y',
            'selected_course_id' => 'required',
        ]);

        $student = Auth::user()->student;

        if($request->has('course_completed')){
            $course_completed = true;
        }else{
            $course_completed = false;
        }

        $student->courses()->detach();

        $student->courses()->attach(
            $request->input('selected_course_id'),
            [
                'completed' => $course_completed,
                'completed_at' => $course_completed ? Carbon::createFromFormat('d/m/Y', $request->input('course_completed_at'))->format('Y-m-d') : null,
                'started_at' =>  Carbon::createFromFormat('d/m/Y', $request->input('course_started_at'))->format('Y-m-d'),
            ]
        );

        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    public function verifyAcademicEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:students,academic_institution_email',
        ]);

        DB::beginTransaction();

        try {
            $student = Auth::user()->student;
            $student->academic_institution_email = $request->input('email');
            $student->email_verify_token = Str::uuid();
            $student->save();


            Mail::send(new StudentEmailVerify($student));

            DB::commit();

            return redirect()->back()->with('success', 'Verificação de email enviada');

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            dd($e);
        }
    }

    public function handleVerifyAcademicEmail(string $token): \Illuminate\Http\RedirectResponse
    {
//        $validated = $request->validate([
//            'token' => 'required',
//        ]);

        DB::beginTransaction();

        try {
            $student = Student::where('user_id', Auth::user()->id)->first();

            if ($student->email_verify_token !== $token) {
                return redirect()->route('home')->with('error', 'Token inválido');
            }

            $student->update([
                'email_verify_token' => null,
                'is_academic_institution_email_verified' => true,
            ]);

            DB::commit();

            return redirect()->route('home')->with('success', 'Email verificado com sucesso');

            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->route('home')->with('error', 'Token inválido');
        }
    }

    public function editStatus ()
    {
        $user = Auth::user();

        return view('app.status', compact('user'));
    }

    public function updateStatus (Request $request): \Illuminate\Http\RedirectResponse
    {
        $student = Auth::user()->student;

        $student->update([
            'open_to_work' => (bool)$request->input('open_to_work'),
        ]);

        return redirect()->back()->with('success', 'Status atualizado com sucesso');
    }


    public function editSocialNetworks()
    {
        $user = Auth::user();
        $social_networks = $user->student->social_networks;

        $social_networks = array_merge(config('custom.social_networks'), $social_networks ?? []);

        return view('app.social_networks', compact('user', 'social_networks'));
    }

    public function updateSocialNetworks(Request $request)
    {
        $user = Auth::user();

        // $data [
        //     "website" => $request->input('social_networks')['website'] ?? "",
        //     "github" => $request->input('social_networks')['github'] ?? ""
        //     "linkedin" => $request->input('social_networks')['linkedin'] ?? ""
        //     "facebook" => $request->input('social_networks')['facebook'] ?? ""
        //     "twitter" => $request->input('social_networks')['twitter'] ?? ""
        //     "instagram" => $request->input('social_networks')['instagram'] ?? ""
        // ];

        $user->student->update(
            ['social_networks' => $request->input('social_networks')]
        );

        return redirect()->back()->with('success', 'Redes sociais atualizadas com sucesso');
    }

}
