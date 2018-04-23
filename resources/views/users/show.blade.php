@extends('pages.master')
@section('pagetitle')
    {{$user->nickname}}
@stop
@section('title')
    {{$user->nickname}}
@stop

@section('websites')
    @if($types == null)
        <br>
        <h2>
            This user hasn't stored any websites in his homepage
        </h2>
        <br>
    @endif
    @foreach($types as $type)
        <?php
            $websites = DB::select("select distinct * from websites where user_id = '$user->id' and type_name = '$type->type_name'")
        ?>
        <div id='header'>
            <h2>
                {{$type->type_name}}
            </h2>
        </div>
        @foreach($websites as $website)
            {{displayGuestSite($website)}}
        @endforeach
    @endforeach
@stop
