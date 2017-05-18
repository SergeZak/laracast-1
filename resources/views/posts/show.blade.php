@extends('layouts.master')

@section('content')

    <div class="col-sm-8">
        <h1><small>Post:</small> {{ $post->title }}</h1>

        <p>{{ $post->body }}</p>

        <hr />

        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection