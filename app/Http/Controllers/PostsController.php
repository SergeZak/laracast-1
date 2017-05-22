<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

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

        auth()->user()->publish(
            new Post($request->only(['title', 'body']))
        );

        return redirect('/');
    }
}
