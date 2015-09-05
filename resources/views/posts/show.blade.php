@extends('layouts.master')

@section('content')
    @if (isset($post) && !empty($post))
        <h1>{{ $post->title }}</h1>
        <p>Published on:
            {{ $post->created_at->format('F d, Y \a\t H:i:s') }}
        </p>
        <p>
            {!! $post->body !!}
        </p>
        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        <div class="form-group">
            <a href="{{ URL::route('posts.edit', $post->slug) }}" class="btn btn-warning">Edit Post</a>
            <button type="submit" class="btn btn-danger">Delete post</button>
        </div>
        {!! Form::close() !!}
    @endif
@stop