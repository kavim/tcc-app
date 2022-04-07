<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'academic_institution_email' => 'email|max:255|unique:student,academic_institution_email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    // public function block($id): RedirectResponse
    // {
    //     $user = User::findOrFail($id);
    //     $user->update(['block' => true]);
    //     return redirect()->route('admin.users.index')->with('success', 'User blocked successfully');
    // }

    public function verifyStudent($id): RedirectResponse
    {
        $student = Student::where('user_id', $id)->firstOrFail();
        $student->update(['is_academic_institution_email_verified' => true]);

        return redirect()->back()->with('success', 'User verified successfully');
    }

    public function blockStudent($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update(['block' => $user->block ? false : true]);

        $message = $user->block ? 'User blocked successfully' : 'User unblocked successfully';
        return redirect()->back()->with('success', $message);
    }
}
