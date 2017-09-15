@extends('layouts.common')

@section('description', '双哥PHP个人博客网站，致力于分享IT技术、教程、BUG解决方案等文章。内容涵盖Linux、php、nginx、mysql、mongodb、redis、memcached、css3、html5等相关领域。')

<meta name="keywords" content="双哥php,linux,php,mysql,mongodb,redis,nginx,memcache,css3,html5,ubuntu,教程,视频教程,IT,程序员,码农"/>

@section('title', '双哥PHP-一个致力于分享世界上最好的语言的网站')

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