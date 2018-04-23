@extends('pages.master')

@section('pagetitle')
    All Users
@stop

@section('title')
    All Users
@stop

@section('search')
    @include('pages.search')
@stop

@section('websites')
    @if(Auth::user() != null)
    @foreach($users as $user)
        @if($user->id == Auth::user()->id)
            @continue
        @endif
        <div id="header">
            <h2>
                <a href="/users/alluser/{{$user->id}}">{{$user->nickname}}</a>
            </h2>
        </div>
    @endforeach
    @else
        <div id="header">
            <h2>
                This page will show all the users to get you some idea about our site
            </h2>
            <p>
                you must<a href="/users/login"> Log in </a>to use this feature
            </p>
        </div>
    @endif
@stop