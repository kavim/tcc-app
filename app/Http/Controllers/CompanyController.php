<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function postsIndex()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('company.posts.index', compact('posts'));
    }

    public function postsCreate()
    {
        return view('company.posts.create');
    }

    public function postsEdit($id)
    {
        $post = Post::find($id);
        return view('company.posts.create');
    }
}
