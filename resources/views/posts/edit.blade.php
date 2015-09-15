@extends('layouts.master')

@section('content')
    <h1>Edit Post</h1>

    @include('errors.all')

    {!! Form::model($post, ['method' => 'put', 'route' => ['posts.update', $post->slug], 'class' => 'form']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['required', 'class' => 'form-control', 'placeholder' => 'Input title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['required', 'class' => 'form-control', 'placeholder' => 'Input your text', 'id' => 'body']) !!}
        <script>
            CKEDITOR.replace('body');
        </script>
    </div>

    <div class="form-group">
        @if ($post->draft)
            {!! Form::submit('Publish', ['class' => 'btn btn-success']) !!}
            {!! Form::submit('Save Draft', ['class' => 'btn btn-info', 'name' => 'draft', 'value' => 1]) !!}
        @else
            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        @endif
            <button class="btn btn-default" onclick="history.go(-1)">Cancel</button>
    </div>
    {!! Form::close() !!}
@endsection