@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-2">
            <div class="list-group">
                <a href="{{ url('home') }}" class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;HOME</a>
                <a href="{{ url('posts') }}" class="list-group-item active"><i class="fa fa-rss-square" aria-hidden="true"></i>&nbsp;&nbsp;POSTS</a>
                <a href="#" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;ADMINS</a>
            </div>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="{{ url('posts') }}">Blog List </a></li>
                        <li role="presentation"><a href="{{ url('blog/create') }}">Blog Create</a></li>
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
                    <form method="post" action="{{ url('blog/' . $blog->_id) }}">
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
                            <textarea name="content" class="form-control" rows="10" placeholder="Blog Content" id="content">{{ $blog->content }}</textarea>
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
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf-8" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('js/ckeditor/samples/js/sample.js') }}"></script>

    <script type="text/javascript">
        CKEDITOR.replace('content');
        initSample();
    </script>
@endsection