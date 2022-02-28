<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('app.profile');
    }

    public function editAvatar()
    {
        return view('app.avatar');
    }

    public function updateAvatar(Request $request)
    {

    }

    public function editCover()
    {
        return view('app.cover');
    }

    public function updateCover()
    {
        # code...
    }

    public function editResume()
    {
        return view('app.resume');
    }

    public function updateResume()
    {
        # code...
    }
}
