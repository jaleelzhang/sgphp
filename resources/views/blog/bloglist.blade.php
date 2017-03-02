@extends('layouts.common')

@section('title', 'Blog list page')

@section('blog', 'active')

@section('content')
    @foreach($blogs as $blog)
        <div class="jumbotron">
            <h1><a href="http://www.sgphp.com/blog/profile/{{ $blog['_id'] }}" style="font-size: x-large; color: #636b6f">{{ $blog['title'] }}</a></h1>
            <p style="font-size: larger">{{ $blog['abstract'] }}</p>
            <p><a class="btn btn-default btn-lg" href="http://www.sgphp.com/blog/profile/{{ $blog['_id'] }}" role="button">Learn more</a></p>
        </div>
    @endforeach
    <nav aria-label="...">
        <ul class="pager">
            @if($page > 1)
            <li class="previous"><a href="http://www.sgphp.com/blog/page/{{ $page-1 }}"><span aria-hidden="true">&larr;</span> Newer</a></li>
            @endif

            @if($page < $total_page)
                <li class="next"><a href="http://www.sgphp.com/blog/page/{{ $page+1 }}">Older <span aria-hidden="true">&rarr;</span></a></li>
            @endif
        </ul>
    </nav>
@endsection