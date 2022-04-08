<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Course;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course_id = $request->input('course_id');
        $courses = Course::get();

        $posts = Post::with('user')
            ->whereHas('user', function ($query) {
                return $query->where('block', false);
            })
            ->whereHas('user', function ($query) {
                return $query->whereHas('company', function ($query) {
                    return $query->where('verified', true);
                });
            })
            ->where('published', true)
            ->when($course_id, function ($query, $course_id) {
                return $query->where('course_id', $course_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('web.posts.index', compact('posts', 'course_id', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('web.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
