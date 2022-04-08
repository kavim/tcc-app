<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Course;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function edit()
    {
        $company = Auth::user()->company;
        $social_networks = $company->social_networks;
        $social_networks = array_merge(config('custom.social_networks'), $social_networks ?? []);
        return view('company.edit', compact('company', 'social_networks'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'company_name' => 'required|max:150',
            'bio' => 'required|max:9999',
            'resume' => 'required|max:9999',
            'phone' => 'required',
            'website' => 'required',
        ]);

        $company = Company::findOrFail($id);

        if(!Auth::user()->id == $company->user_id) {
            return redirect()->back()->withErrors('Nice Try, You are not authorized, bro!');
        }

        $data = $request->all();

        $company = $company->update([
            'slug' => \Str::slug($data['company_name']),
            'email' => $data['company_email'],
            'name' => $data['company_name'],
            'bio' => $data['bio'],
            'phone' => $data['phone'],
            'social_networks' => $data['social_networks'],
            'website' => $data['website'],
            'resume' => $data['resume'],
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("company/".$company->id, 'public');

            $img = $company->update(['avatar' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
            $image->save();
        }

        return redirect()->route('company.edit')->with('success', 'Empresa atualizada com sucesso');
    }

    public function postsIndex()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('company.posts.index', compact('posts'));
    }

    public function postsCreate()
    {
        $courses = Course::all();
        $cover = asset('images/default-post-img.jpg');
        return view('company.posts.create', compact('courses', 'cover'));
    }

    public function postsEdit($id)
    {
        $courses = Course::all();
        $post = Post::find($id);
        $cover = $post->getFeaturedImage();

        if(!Auth::user()->id == $post->user_id) {
            return redirect()->back()->withErrors('Nice Try, You are not authorized, bro!');
        }

        return view('company.posts.edit', compact('courses', 'post', 'cover'));
    }

    public function postsStore (Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'body' => 'required|max:9999',
            'course_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
        ]);

        $data = $request->all();

        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'course_id' => $data['course_id'],
            'user_id' => auth()->user()->id,
            'slug' => \Str::slug($data['title']),
            'description' => $data['description'],
            'category_id' => 1,
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("posts/".$post->id, 'public');

            $img = $post->update(['featured_image' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
            $image->save();
        }

        return redirect()->route('company.posts.index')->with('success', 'Post criado com sucesso');
    }

    public function postsUpdate (Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'body' => 'required|max:9999',
            'course_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:255',
        ]);

        $post = Post::findOrFail($id);

        if(!Auth::user()->id == $post->user_id) {
            return redirect()->back()->withErrors('Nice Try, You are not authorized, bro!');
        }

        $data = $request->all();

        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'course_id' => $data['course_id'],
            'slug' => \Str::slug($data['title']),
            'description' => $data['description'],
        ]);

        if ($request->hasFile('image')) {
            $src = $request->file('image')->store("posts/".$post->id, 'public');

            $img = $post->update(['featured_image' => $src]);

            $image = Image::make(storage_path("app/public/" . $src))->fit(300, 300)->save();
            $image->save();
        }

        return redirect()->route('company.posts.index')->with('success', 'Post atualizado com sucesso');
    }
}
