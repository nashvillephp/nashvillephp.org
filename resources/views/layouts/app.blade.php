<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nashville PHP</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

    <!-- START OF NAVBAR -->
    <div class="nash-nav">
        <a href="/"><div class="nash-nav-logo"></div></a>
        <button class="nav-menu-toggle"></button>
        <div class="nav-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/article">Articles</a></li>
                <li><a href="">Meetup</a></li>
                <li><a href="">Github</a></li>
                <li><a href="">Forum</a></li>
            </ul>
        </div>
    </div>
    <!-- END OF NAVBAR -->

    @yield('content')

    <!-- START OF FOOTER -->
    <footer>
        <img class="footer-angle" src="{{ asset('images/angle-dark.svg') }}">

        <div class="container">
            <div class="row">
                <div class="col-md-8 footer-menu">
                    <ul>
                        <li><a href="/article">Articles</a></li>
                        <li><a href="">Meetup</a></li>
                        <li><a href="">Github</a></li>
                        <li><a href="">Forum</a></li>
                        <li><a href="">@NASHVILLEPHP</a></li>
                        <li><a href="">#NASHVILLEPHP ON IRC</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="nash-credits">
                            <img class="logo-nash" src="{{ asset('images/logo-nashphp-bluebg.svg') }}">
                            <p>© 2015-{{ date('y') }} Nashville PHP</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="nash-sponsor">
                            <p>NashvillePHP is sponsored by:</p>
                            <a href="http://www.cakedc.com"><img src="{{ asset('images/logo-cakedc.svg') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->

    <!-- Scripts -->
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>

    @if (getenv('APP_ENV') === 'local')
    <script id="__bs_script__">
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.23.5'><\/script>".replace("HOST", location.hostname));
    </script>
    @endif
</body>
</html>
