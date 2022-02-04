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
}
