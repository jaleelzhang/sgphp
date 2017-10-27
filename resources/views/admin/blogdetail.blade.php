@extends('layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                BLOG DETAIL
            </div>
            <div class="panel-body">
                <p style="color: #636b6f; font-weight: bold">{{ $details->title }}</p>

                @if ($details->create_time > strtotime('2017-10-27 11:00:00'))
                    <div id="blogContent">
                        <textarea style="display: none;">{!! $details->content !!}</textarea>
                    </div>
                @else
                    <p style="font-size: larger">{!! $details->content !!}</p>
                @endif

            </div>
        </div>
    </div>
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