@extends('layouts.common')

@section('description', '双哥PHP-一个致力于分享世界上最好的语言的网站')

@section('title', 'SGPHP-一个致力于分享世界上最好的语言的网站')

@section('blog', 'active')

@section('content')
    @foreach($blogs as $blog)
        <blockquote style="border-left: 5pt solid lightgrey">
            <h1><a href="{{ url('blog/' . $blog->_id . '.html') }}" style="font-size: x-large; color: #636b6f">{{ $blog->title }}</a></h1>
            <p>
                <summary>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ date('Y年m月d日 H:i:s', $blog->create_time) }}
                    &nbsp;&nbsp;
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a style="color:#636b6f;" href="{{ url('blog/type/' . $blog->type) }}">{{ $blog->type }}</a>
                </summary>
            </p>
            <p>{{ $blog->abstract }}</p>
            <p><a class="btn btn-default btn-lg" href="{{ url('blog/' . $blog->_id . '.html') }}" role="button">Learn more</a></p>
        </blockquote>
    @endforeach
    <nav aria-label="...">
        <ul class="pager">
            {{ $blogs->links() }}
        </ul>
    </nav>
@endsection