@extends('pages.master')
<script>
    onload = function(){
        alert(document.getElementById('error').innerHTML);
    }
</script>
@section('title')
    Homepage: Login
@stop

@section('css')
    .register {
    max-width: 300px;
    width: 80%;
    position:relative;
    top:10%;
    margin: auto;
    }
@stop
@section('websites')
    <div class="register">
        {!! Form::open(['route' => 'storeuser', 'url' => 'users/login', 'action' => '/users/check', 'class' => 'field']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Email Address:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', array('class'=>'form-control' ) ) !!}
            @if($errors->first() != null)
                <h4 id="error">{{$errors->first()}}</h4>
            @else
                <br>
            @endif
            {!! Form::submit('Create Profile', ['class'=>'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@stop

