<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    function comments()
    {
        return $this->hasMany(Comment::class);
    }


    function user()
    {
        return $this->belongsTo(User::class);
    }

    
    function addComment($body)
    {
        $this->comments()->create(['body'=>$body]);
    }
    
}
