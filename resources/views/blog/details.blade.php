@extends('layouts.common')

@section('description', $details->abstract)

@section('title', $details->title)

@section('blog', 'active')

@section('content')
<blockquote style="border-top:3pt solid lightgrey;border-left: none;">
    <h1 style="font-size: x-large; color: #636b6f">{{ $details->title }}</h1>
    <p style="font-size: larger">{!! $details->content !!}</p>
</blockquote>
@endsection