@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="{{ url('admin/posts') }}">Blog List </a></li>
                <li role="presentation"><a href="{{ url('jaleelman/blog/create') }}">Blog Create</a></li>
            </ul>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>CreateTime</th>
                    <th>Action</th>
                </tr>

                @foreach($blogs as $blog)
                    <tr>
                        <td><a href="{{ url('jaleelman/blogdetail/' . $blog->_id) }}">{{ $blog->title }}</a></td>
                        <td>{{ $blog->type }}</td>
                        <td>{{ date('Y-m-d', $blog->create_time) }}</td>
                        <td>
                            <a href="{{ url('jaleelman/blog/' . $blog->_id . '/' . $page . '/edit') }}" class="btn btn-info">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            {{--<form action="{{ url('blog/' . $blog->id) }}" method="post" style="float: right">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>--}}
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="panel-footer">
            <span>{{ $blogs->links() }}</span>
        </div>
    </div>
</div>
@endsection