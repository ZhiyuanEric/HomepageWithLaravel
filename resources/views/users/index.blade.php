@extends('pages.master')

@section('pagetitle')
    All Users
@stop

@section('title')
    All Users
@stop

@section('search')
    <div id="searchbar" class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <select id="Engine" class="text-center" style="height: 52.5px;">
                        <option value="GG">Google</option>
                        <option value="BD">Baidu</option>
                        <option value="BB">bilibili</option>
                        <option value="Weibo">Weibo</option>
                        <option value="Youtube">Youtube</option>
                        <option value="Zhihu">Zhihu</option>
                    </select>
                </div>
                <div class="col-sm-1 hidden-md hidden-lg">
                    <br>
                </div>
                <div class="col-md-9">
                    <input id="enter" type="text" class="input_control" list="browsers" name="searchInput">
                    <datalist id="choices">
                    </datalist>
                </div>
            </div>
        </div>
        <div class="col-md-1 hidden-md hidden-lg">
            <br>
        </div>
        <div class="col-md-3">
            <button type="button" id="search" class="" onclick="clickEnter()">Search</button>
        </div>
    </div>
@stop

@section('websites')
    @foreach($users as $user)
        <div id="header">
            <h2>
                <a href="/users/{{$user->id}}">{{$user->nickname}}</a>
            </h2>
        </div>
    @endforeach
@stop