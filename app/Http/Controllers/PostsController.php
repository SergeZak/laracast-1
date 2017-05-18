<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{


    function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }



    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }



    function create()
    {
        return view('posts.create');
    }


    function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        Post::create($request->only(['title', 'body']));

        return redirect('/');
    }
}
