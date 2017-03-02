@extends('layouts.common')

@section('title', 'Blog list page')

@section('blog', 'active')

@section('content')
<div class="jumbotron">
    <h1>{{ $details['title'] }}</h1>
    <p style="font-size: larger">{{ $details['content'] }}</p>
</div>
@endsection