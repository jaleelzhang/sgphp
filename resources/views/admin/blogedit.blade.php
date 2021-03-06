@extends('layouts.app')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="{{ url('jaleelman/posts') }}">Blog List </a></li>
                    <li role="presentation"><a href="{{ url('jaleelman/blog/create') }}">Blog Create</a></li>
                    <li role="presentation" class="active"><a href="#">Blog Edit</a></li>
                </ul>
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-body">
                <form method="post" action="{{ url('jaleelman/blog/' . $blog->_id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title" value="{{ $blog->title }}">
                    </div>
                    <div class="form-group">
                        <label for="type">Blog Type</label>
                        <select class="form-control" id="type" name="type">
                            @if($blog->type == 'php')
                                <option value="php" selected>PHP</option>
                            @else
                                <option value="php">PHP</option>
                            @endif

                            @if($blog->type == 'mysql')
                                <option value="mysql" selected>MYSQL</option>
                            @else
                                <option value="mysql">MYSQL</option>
                            @endif

                            @if($blog->type == 'linux')
                                <option value="linux" selected>LINUX</option>
                            @else
                                <option value="linux">LINUX</option>
                            @endif

                            @if($blog->type == 'mongodb')
                                <option value="mongodb" selected>MONGODB</option>
                            @else
                                <option value="mongodb">MONGODB</option>
                            @endif

                            @if($blog->type == 'redis')
                                <option value="redis" selected>REDIS</option>
                            @else
                                <option value="redis">REDIS</option>
                            @endif

                            @if($blog->type == 'memcache')
                                <option value="memcache" selected>MEMCACHE</option>
                            @else
                                <option value="memcache">MEMCACHE</option>
                            @endif

                            @if($blog->type == 'javascript')
                                <option value="javascript" selected>JAVASCRIPT</option>
                            @else
                                <option value="javascript">JAVASCRIPT</option>
                            @endif

                            @if($blog->type == 'css')
                                <option value="css" selected>CSS</option>
                            @else
                                <option value="css">CSS</option>
                            @endif

                            @if($blog->type == 'html')
                                <option value="html" selected>HTML</option>
                            @else
                                <option value="html">HTML</option>
                            @endif
                            @if($blog->type == 'git')
                                <option value="git" selected>GIT</option>
                            @else
                                <option value="git">GIT</option>
                            @endif
                            @if($blog->type == 'tools')
                                <option value="tools" selected>TOOLS</option>
                            @else
                                <option value="tools">TOOLS</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Blog Abstract</label>
                        <textarea name="abstract" class="form-control" rows="3" placeholder="Blog Abstract" id="abstract">{{ $blog->abstract }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Blog Content</label>
                        <div id="blogContent">
                            <textarea class="form-control" style="display:none;">{{ $blog->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>发布上线</label><br />
                        @if($blog->status == 1)
                            <label for="status">是</label>
                            <input type="radio" name="status" id="status" checked value="1">
                            <label for="status">否</label>
                            <input type="radio" name="status" id="status" value="2">
                        @else
                            <label for="status">是</label>
                            <input type="radio" name="status" id="status" value="1">
                            <label for="status">否</label>
                            <input type="radio" name="status" id="status" checked value="2">
                        @endif
                    </div>
                    <div>
                        <input type="hidden" name="page" value="{{ $page }}">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('js/mdEditor/editormd.min.js') }}"></script>
    <script type="text/javascript">
        var testEditor;

        $(function() {
            testEditor = editormd("blogContent", {
                width   : "100%",
                height  : 640,
                syncScrolling : "single",
                path    : "{{ asset('js/mdEditor/lib/') }}/",
                saveHTMLToTextarea : true
            });
        });
    </script>
@endsection