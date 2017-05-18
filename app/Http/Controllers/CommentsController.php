<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    
    function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        $post->addComment($request->body);

        return back();
    }
    
}
