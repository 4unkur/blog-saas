@extends('layouts.master')

@section('content')
    <h1>Add Post</h1>

    @include('errors.all')

    {!! Form::open(['route' => 'store', 'class' => 'form']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['required', 'class' => 'form-control', 'placeholder' => 'Input title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['placeholder' => 'Input your text', 'class' => 'form-control', 'required', 'id' => 'body']) !!}
        <script>
            CKEDITOR.replace('body');
        </script>
    </div>

    <div class="form-group">
        {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection