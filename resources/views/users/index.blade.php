@extends('pages.master')
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#addTypeForm").submit(function(e){
                e.preventDefault();
                var x =$(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "users",
                    data: x,
                    success:function(msg) {
                        if (msg == 1) {
                            alert("this type already exists")
                            return;
                        }
                        //$("#websites").append("<div>"+msg+"</div>");
                        $("#websites").html(msg)
                    },
                    error: function(err){
                        alert("readyState: "+err.readyState+"\nstatus: "+err.status);
                        alert("responseText: "+err.responseText);
                    }
                });
                return false;
            })
            $(document).on('submit', ".newSites", function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "users",
                    async:false,
                    processData: false,
                    contentType: false,
                    data: new FormData($(this)[0]),
                    success:function(msg){
                        if(msg == 1) {
                            alert("this website already exists")
                            return;
                        } else if(msg == 2){
                            alert("only jpg, png. jpeg and gif files are allowed")
                            return;
                        } else if (msg == 3) {
                            alert("the image size should be less then 600kb")
                            return;
                        } else if (msg == 4) {
                            alert("add a image")
                            return;
                        }
                        $("#websites").html(msg)
                    },
                    error: function(err){
                        alert("readyState: "+err.readyState+"\nstatus: "+err.status);
                        alert("responseText: "+err.responseText);
                    }
                });
            })
            $(document).on('click', '.close', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "users",
                    data: {deleteSiteId: $(this).attr('id')},
                    success:function(msg){
                        $("#websites").html(msg)
                    },
                    error: function(err){
                        alert("readyState: "+err.readyState+"\nstatus: "+err.status);
                        alert("responseText: "+err.responseText);
                    }
                });
            })
        });
    </script>
@stop
@section('css')
@stop
@section('pagetitle')
    Welcome {{Auth::user()->nickname}}
@stop

@section('title')
    Welcome {{Auth::user()->nickname}}
@stop

@section('search')
    @include('pages.search')
@stop

@section('websites')
    <div>
    @php
        $userId = Auth::user()->id;
        $types = DB::select("select * from types where user_id = '$userId'");
    @endphp
        @if($types == null)
            <br>
            <h2>
                Click add a type to start your first type
            </h2>
            <br>
        @endif
    @foreach($types as $type)
        @php
        $websites = DB::select("select distinct * from websites where user_id = '$userId' and type_id = '$type->id'")
        @endphp
            <div id="{{$type->id}}">
        {{displayType($type)}}
        @foreach($websites as $website)
            {{displaySite($website)}}
        @endforeach
        </div>
    @endforeach
    </div>
@stop
@section('footer')
    <button id="addType" onclick="addType()">add a type</button>
    {!! Form::open(['route'=> 'updateuser','method'=> 'post', 'url' => 'users', 'class' => 'form-control', 'id' => 'addTypeForm', 'style' => 'display: none;']) !!}
    <div class="form-group">
        {!! Form::label('typename', 'New Type Name:') !!}
        {!! Form::text('typename', null, ['class'=>'input_control']) !!}
        {!! Form::submit('add') !!}
    </div>
    {!! Form::close() !!}
@stop