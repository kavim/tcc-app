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
        return view('welcome');
    }

    public function students()
    {
        $students = \App\Models\User::where('user_type_id', config('custom.tipo_estudante'))->get();

        return view('web.students', compact('students'));
    }

    public function studentsShow($slug_name)
    {
        $user = \App\Models\User::where('slug_name', $slug_name)->first();

        return view('web.students-show', compact('user'));
    }
}
