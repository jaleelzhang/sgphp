@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2">
        <div class="list-group">
            <a href="{{ url('home') }}" class="list-group-item active"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;HOME</a>
            <a href="{{ url('posts') }}" class="list-group-item"><i class="fa fa-rss-square" aria-hidden="true"></i>&nbsp;&nbsp;POSTS</a>
            <a href="#" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;ADMINS</a>
        </div>
    </div>

    <div class="col-md-10">
        <div class="panel panel-default">
        <div class="panel-heading">
            Blog Post Backend Manage System
        </div>

        <div class="panel-body">
            TO DO ...
        </div>
        </div>
    </div>
</div>
@endsection
