@extends('pages.master')

@section('title')
    Homepage: Register
@stop

@section('css')
    .register {
        max-width: 600px;
        width: 80%;
        position:relative;
        top:10%;
        margin: auto;
    }
@stop
@section('websites')
    <div class="register">

        {!! Form::open(['route' => 'storeuser', 'url' => 'users', 'action' => '/users/store']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email Address:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', array('class'=>'form-control' ) ) !!}
            {!! Form::label('nickname', 'Nick Name:') !!}
            {!! Form::text('nickname', null, ['class'=>'form-control']) !!}
            {!! Form::submit('Create Profile', ['class'=>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@stop

