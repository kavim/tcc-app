<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use function view;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::with('post')
        ->with('company')
        ->whereHas('company', function ($query) {
            $query->where('verified', false);
        })
        ->get();


        return view('admin.index', compact('users'));
    }
}
