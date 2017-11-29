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

@section('comment')
    <blockquote style="border: none;">
        <form action="{{ url('/comment') }}" method="post">
            {{ csrf_field() }}
            <h4>COMMENTS</h4>
            <div class="comments form-group">
                @if (isset($details->comments))
                    @foreach(json_decode(html_entity_decode($details->comments), true) as $comment)
                        <p>[<b>{{ $comment[0] }}</b>]: {{ $comment[1] }}</p>
                    @endforeach
                @endif
            </div>
            <div class="alert alert-danger" role="alert" id="notice" style="display: none;"></div>
            <div class="input-group form-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="uname" name="uname" required value="">
            </div>
            <div class="form-group">
                <textarea class="form-control txt" rows="5" placeholder="SAY SOMETHING PLEASE!" id="com_text" name="comment" required></textarea>
            </div>
            <div class="g-recaptcha form-group" data-sitekey="{{ getenv('RECAPTCHA_PUBLIC_KEY') }}"></div>
            {{--<div class="g-recaptcha form-group" data-sitekey="6LdUuToUAAAAAFocEh3WjbWytKvnX3GIiaRaYIhU"></div>--}}
            <button type="button" class="btn btn-default">Submit</button>
        </form>
    </blockquote>

    <script type="text/javascript">
        $(function () {
            $("button.btn").click(function(){
                var username = $('#uname').val();
                var content = $('#com_text').val();
                var validator = $('#g-recaptcha-response').val();

                if (username == '') {
                    $('#notice').css("display", 'block');
                    $('#notice').html('请输入您的用户名!');
                    return;
                }

                if (content == '') {
                    $('#notice').css("display", 'block');
                    $('#notice').html('请输入您要评论的内容!');
                    $('#uname').val(username);
                    return;
                }

                if (validator == '') {
                    $('#notice').css("display", 'block');
                    $('#notice').html('请输入验证码!');
                    $('#uname').val(username);
                    $('#com_text').val(content);
                    return;
                }

                var id = "{{ $details->_id }}";
                var token = $('[name=_token]').val();

                $.post("{{ url('/comment/') }}", {'id':id, 'username':username, 'comment':content, 'validator':validator, '_token':token}, function(result) {
                    $('#uname').val("");
                    $('#com_text').val("");
                    $('#notice').css("display", "none");
                    $('.comments').html(result);
                })
            });
        });
    </script>
@endsection