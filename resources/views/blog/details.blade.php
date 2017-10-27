@extends('layouts.common')

@section('description', $details->abstract)

@section('keywords', $details->title)

@section('title', $details->title)

@section('blog', 'active')

@section('content')
    <blockquote style="border-top:3pt solid lightgrey;border-left: none;">
        <h1 style="font-size: x-large; color: #636b6f">{{ $details->title }}</h1>

        @if ($details->create_time > strtotime('2017-10-27 11:00:00'))
            <div id="blogContent">
                <textarea style="display: none;">{!! $details->content !!}</textarea>
            </div>
        @else
            <p style="font-size: larger">{!! $details->content !!}</p>
        @endif

    </blockquote>

    @if ($details->create_time > strtotime('2017-10-27 11:00:00'))
        <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/marked.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/prettify.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/raphael.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/underscore.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/sequence-diagram.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/flowchart.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/lib/jquery.flowchart.min.js') }}"></script>
        <script src="{{ asset('js/mdEditor/editormd.min.js') }}"></script>

        <script type="text/javascript">
            var testEditor;
            $(function () {
                editormd.markdownToHTML("blogContent", {//注意：这里是上面DIV的id
                    htmlDecode: "style,script,iframe",
                    emoji: true,
                    taskList: true,
                    tex: true, // 默认不解析
                    flowChart: true, // 默认不解析
                    sequenceDiagram: true, // 默认不解析
                    codeFold: true,
                });});
        </script>
    @endif
@endsection