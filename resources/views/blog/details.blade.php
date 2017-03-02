@extends('layouts.common')

@section('title', 'Blog list page')

@section('blog', 'active')

@section('content')
<div class="jumbotron">
    <h1 style="font-size: x-large; color: #636b6f">{{ $details['title'] }}</h1>
    <p style="font-size: larger">{!! $details['content'] !!}</p>
</div>
@endsection