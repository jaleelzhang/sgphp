<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description')"/>
        <meta name="keywords" content="@yield('keywords'),双哥php,linux,php,mysql,mongodb,redis,nginx,memcache"/>
        <title>SGPHP-@yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
                height:100vh;
                /*display: flex;
                min-height: 100vh;
                flex-direction: column;*/
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            img {
                max-width:100%;
                height: auto;
                display: block;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">SGPHP</a>
                    </div>
                    <div class="collapse navbar-collapse" id="example-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="@yield('blog') dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">博文</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('blog') }}">全部</a></li>
                                    <li><a href="{{ url('blog/type/linux') }}">LINUX</a></li>
                                    <li><a href="{{ url('blog/type/php') }}">PHP</a></li>
                                    {{--<li><a href="http://www.sgphp.com/blog/mysql/page/1">MYSQL</a></li>--}}
                                    <li><a href="{{ url('blog/type/mongodb') }}">MONGODB</a></li>
                                    {{--<li><a href="">REDIS</a></li>
                                    <li><a href="">CSS</a></li>
                                    <li><a href="">JS</a></li>--}}
                                </ul>
                            </li>
                            {{--<li class="@yield('tutorial')"><a href="http://www.sgphp.com/tutorial/page/1">教程</a></li>
                            <li class="@yield('video')"><a href="http://www.sgphp.com/video/page/1">视频</a></li>
                            <li class="@yield('traveling')"><a href="http://www.sgphp.com/traveling/page/1">游记</a></li>--}}
                            <li class="@yield('contact')"><a href="{{ url('contact') }}">关于</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div style="display: flex;min-height: 90vh;flex-direction: column">


        <div class="container" style="flex: 1;">
            @yield('content')
        </div>
        <div class="container" style="text-align: center;margin-bottom: 20px;">
            <hr>
            <p>SGPHP-一个致力于分享世界上最好的语言的网站</p>
            <p>2013-2017&copySGPHP</p>
        </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>