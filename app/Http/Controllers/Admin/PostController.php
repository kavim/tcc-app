<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $cover = asset('images/default-post-img.jpg');
        $companies = \App\Models\Company::get();
        $courses = \App\Models\Course::get();
        return view('admin.posts.create', compact('cover', 'companies', 'courses'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'required|max:99999',
            'user_id' => 'required|integer',
            'course_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::create([
            'title' => $request->input('title'),
            'slug' => \Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id'),
            'course_id' => $request->input('course_id'),
            'active' => (bool)$request->input('active'),
            'published' => (bool)$request->input('published'),
            'category_id' => 1,
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("post/".$post->id, 'public');

            $img = $post->update(['featured_image' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(1200, 720)->save();
            $image->save();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function show()
    {
        return view('admin.posts.show');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cover = $post->getFeaturedImage();
        $companies = \App\Models\Company::get();
        $courses = \App\Models\Course::get();

        return view('admin.posts.edit', compact('post', 'cover', 'companies', 'courses'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
//        dd($request->all());
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'required|max:99999',
            'user_id' => 'required|integer',
            'course_id' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'slug' => \Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id'),
            'course_id' => $request->input('course_id'),
            'active' => (bool)$request->input('active'),
            'published' => (bool)$request->input('published'),
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("post/".$post->id, 'public');

            $img = $post->update(['featured_image' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(1200, 720)->save();
            $image->save();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy()
    {
        //
    }
}
