@extends('layouts.master')

@section('content')

    @include('errors.all')
    <h3>Access denied</h3>
    <p>Please login:</p>

    {!! Form::open(['url' => 'admin', 'class' => 'form']) !!}

    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        <label>
            {!! Form::checkbox('remember', 'remember') !!}
            Remember Me
        </label>
    </div>

    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@stop