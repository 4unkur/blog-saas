@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>Latest blog posts</h1>
        @if ($posts->count())
            @foreach ($posts as $post)
                <h2><a href="{{ URL::route("posts.show", $post->slug) }}">{{ $post->title }}</a></h2>
                <p>{!! strip_tags(str_limit($post->body, 300)) !!}</p>
            @endforeach
            {!! $posts->render() !!}
        @endif
        </div>
        <div class="col-md-3">
            <a class="btn btn-xs btn-success" href="{{ URL::action('PostsController@create') }}">Add Post</a>
            <a class="btn btn-xs btn-default" href="{{ URL::route('drafts') }}">Drafts</a>
        </div>
    </div>
@stop