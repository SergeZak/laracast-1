<?php

namespace App;

use Carbon\Carbon;
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


    function scopeFilter($query, $filters)
    {

        if($month = $filters['month'])
        {
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $query->whereYear('created_at',$year);
        }

        return $query;
    }


    static function archives()
    {
        return static::selectRaw('year(created_at) year, monthName(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get();
    }

}
