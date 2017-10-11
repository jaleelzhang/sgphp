@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
    <div class="panel-heading">
        HEY,BELOW IS YOUR ACCOUNT INFORMATION!
    </div>

    <div class="panel-body">
        UserName: {{ Session('admin')->admin_name }}<br />
        Last Login Time: {{ date('Y年m月d日 H时i分s秒', Session('admin')->login_time) }}<br />
        Add Time: {{ date('Y年m月d日 H时i分s秒', Session('admin')->create_time) }}<br />
    </div>
    </div>
</div>
@endsection
