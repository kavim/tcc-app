<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function updateProfile()
    {
        // implementar
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
}
