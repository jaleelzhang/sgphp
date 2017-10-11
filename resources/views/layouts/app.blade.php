<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SGPHP-后台管理页面</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/sgphp.ico" media="screen" />
    <link rel="bookmark" href="/sgphp.ico">
    <link rel="icon" href="/sgphp.ico">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    SGPHP
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if(!empty(Session::get('admin')))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ session('admin')->admin_name }}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('jaleelman/account') }}"><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp;&nbsp;ACCOUNT</a>
                                    <a href="{{ url('jaleelman/setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;SETTING</a>
                                    <a href="{{ url('jaleelman/logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;&nbsp;LOGOUT</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(!empty(Session::get('admin')))
            <div class="col-md-2">
                <div class="list-group">
                    @if(in_array(parse_url(URL::current())['path'], array('/jaleelman/login', '/jaleelman/home', '/jaleelman/account', '/jaleelman/setting', '/jaleelman')))
                        <a href="{{ url('jaleelman/home') }}" class="list-group-item active"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;HOME</a>
                    @else
                        <a href="{{ url('jaleelman/home') }}" class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;HOME</a>
                    @endif

                    @if(parse_url(URL::current())['path'] == '/jaleelman/posts' or mb_strstr(parse_url(URL::current())['path'], 'blog'))
                        <a href="{{ url('jaleelman/posts') }}" class="list-group-item active"><i class="fa fa-rss-square" aria-hidden="true"></i>&nbsp;&nbsp;POSTS</a>
                    @else
                        <a href="{{ url('jaleelman/posts') }}" class="list-group-item"><i class="fa fa-rss-square" aria-hidden="true"></i>&nbsp;&nbsp;POSTS</a>
                    @endif

                    @if(parse_url(URL::current())['path'] == '/jaleelman/adminList')
                        <a href="{{ url('jaleelman/adminList') }}" class="list-group-item active"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;ADMINS</a>
                    @else
                        <a href="{{ url('jaleelman/adminList') }}" class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;ADMINS</a>
                    @endif
                </div>
            </div>
        @endif
        @section('content')
            @show
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
