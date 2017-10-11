@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="{{ url('jaleelman/posts') }}">Blog List </a></li>
                <li role="presentation" class="active"><a href="{{ url('admin/blog/create') }}">Blog Create</a></li>
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
            <form method="post" action="{{ url('jaleelman/blog') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title">
                </div>
                <div class="form-group">
                    <label for="type">Blog Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="php">PHP</option>
                        <option value="mysql">MYSQL</option>
                        <option value="linux">LINUX</option>
                        <option value="mongodb">MONGODB</option>
                        <option value="redis">REDIS</option>
                        <option value="memcache">MEMCACHE</option>
                        <option value="javascript">JAVASCRIPT</option>
                        <option value="css">CSS</option>
                        <option value="html">HTML</option>
                        <option value="git">GIT</option>
                        <option value="tools">TOOLS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="abstract">Blog Abstract</label>
                    <textarea name="abstract" class="form-control" rows="3" placeholder="Blog Abstract" id="abstract"></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Blog Content</label>
                    <textarea name="content" class="form-control" rows="10" placeholder="Blog Content" id="content"></textarea>
                </div>
                <div class="form-group">
                    <label>发布上线</label><br />
                    <label for="status">是</label>
                    <input type="radio" name="status" id="status" value="1">
                    <label for="status">否</label>
                    <input type="radio" name="status" id="status" value="2">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
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