@extends('layouts.master')

@section('content')
    <h1>Latest blog posts</h1>
    @if ($posts->count())
        @foreach ($posts as $post)
            <h2><a href="{{ URL::route("posts.show", $post->slug) }}">{{ $post->title }}</a></h2>
            <p>{!! strip_tags(str_limit($post->body, 300)) !!}</p>
        @endforeach
        {!! $posts->render() !!}
    @endif
@stop