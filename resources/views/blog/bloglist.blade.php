@extends('layouts.common')

@section('title', '博文列表页')

@section('blog', 'active')

@section('content')
    @foreach($blogs as $blog)
        {{--<div class="jumbotron">
            <h1><a href="{{ url('blog/' . $blog->_id) }}" style="font-size: x-large; color: #636b6f">{{ $blog->title }}</a></h1>
            <p>{{ date('Y年m月d日 H:i:s', $blog->create_time) }}</p>
            <p style="font-size: larger">{{ $blog->abstract }}</p>
            <p><a class="btn btn-default btn-lg" href="{{ url('blog/' . $blog->_id) }}" role="button">Learn more</a></p>
        </div>--}}
        <blockquote style="border-left: 5pt solid lightgrey">
            <h1><a href="{{ url('blog/' . $blog->_id) }}" style="font-size: x-large; color: #636b6f">{{ $blog->title }}</a></h1>
            <small>{{ date('Y年m月d日 H:i:s', $blog->create_time) }}</small>
            <p>{{ $blog->abstract }}</p>
            <p><a class="btn btn-default btn-lg" href="{{ url('blog/' . $blog->_id) }}" role="button">Learn more</a></p>
        </blockquote>
    @endforeach
    <nav aria-label="...">
        <ul class="pager">
            {{ $blogs->links() }}
        </ul>
    </nav>
@endsection