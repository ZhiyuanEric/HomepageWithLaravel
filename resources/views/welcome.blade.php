@extends('pages.master')

@section('pagetitle')
    Homepage
@stop
@section('title')
    Welcome to HMPG
@stop

@section('search')
@include('pages.search')
@stop

@section('websites')
    <div id="header">
        <h2>
            Welcome to Your Own homepage
        </h2>
        <p>
            Homepage is created in the purpose of daily use, You can import your favourite websites to save your time finding it in your  bookmark bar.
        </p>
    </div>
@stop