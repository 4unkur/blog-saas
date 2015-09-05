@extends('layouts.master')

@section('content')
    @if (isset($post) && !empty($post))
        <h1>{{ $post->title }}</h1>
        <p>Published on:
            {{ $post->created_at->format('F d, Y \a\t H:i:s') }}
        </p>
        <p>
            {{ $post->body }}
        </p>
    @endif
@stop