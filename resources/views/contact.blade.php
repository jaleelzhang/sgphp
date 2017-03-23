@extends('layouts.common')

@section('title', '联系我们')

@section('contact', 'active')

@section('content')
    <div class="container" style="text-align: center;">
        <img src="{{ asset('img/jaleel.jpg') }}" alt="双哥" class="img-rounded" width="150" height="150" style="margin: auto"><br />
        <p>积极乐观的生活态度，热忠于新的技术的研究，善于分享技术！爱好旅行、摄影和徒步！</p>
        <hr />
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('img/phpshare.jpg') }}" style="width: auto; height: 30%;">
            </div>
            <div class="col-md-9">
                积极乐观的生活态度，热忠于新的技术的研究，善于分享技术！爱好旅行、摄影和徒步！
                积极乐观的生活态度，热忠于新的技术的研究，善于分享技术！爱好旅行、摄影和徒步！
                积极乐观的生活态度，热忠于新的技术的研究，善于分享技术！爱好旅行、摄影和徒步！
                积极乐观的生活态度，热忠于新的技术的研究，善于分享技术！爱好旅行、摄影和徒步！
            </div>
        </div>
        <hr />
    </div>
@endsection