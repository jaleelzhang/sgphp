@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            BLOG DETAIL
        </div>
        <div class="panel-body">
        <p style="color: #636b6f; font-weight: bold">{{ $details->title }}</p>
        <p>{!! $details->content !!}</p>
        </div>
    </div>
</div>
@endsection