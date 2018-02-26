<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @if (getenv('APP_ENV') === 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114740882-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-114740882-1');
    </script>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="160x160" href="{{ asset('favicon-160.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon-64.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon-57.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon-114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon-72.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon-144.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon-60.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon-152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon-180.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ asset('favicon-144.png') }}">
    <meta name="msapplication-config" content="{{ asset('browserconfig.xml') }}">

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
                <li><a href="https://www.meetup.com/nashvillephp/">Meetup</a></li>
                <li><a href="https://github.com/nashvillephp">Github</a></li>
                <li><a href="https://www.facebook.com/groups/353865445079359/">Forum</a></li>
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
                        <li><a href="https://www.meetup.com/nashvillephp/">Meetup</a></li>
                        <li><a href="https://github.com/nashvillephp">Github</a></li>
                        <li><a href="https://www.facebook.com/groups/353865445079359/">Forum</a></li>
                        <li><a href="https://twitter.com/nashvillephp">@NASHVILLEPHP</a></li>
                        <li><a href="irc://chat.freenode.net:6697/nashvillephp">#NASHVILLEPHP ON IRC</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="nash-credits">
                            <a href="/"><img class="logo-nash" src="{{ asset('images/logo-nashphp-bluebg.svg') }}"></a>
                            <p>© 2015-{{ date('y') }} Nashville PHP<br>&nbsp;</p>
                            <p>Please read our <a href="https://github.com/nashvillephp/policies">code of conduct</a>.</p>
                            <p>Content licensed under <a href="https://github.com/nashvillephp/nashvillephp.org/blob/master/LICENSE">CC BY-SA</a>.</p>
                            <p>Source code licensed under <a href="https://github.com/nashvillephp/nashvillephp.org/blob/master/LICENSE">MIT</a>.</p>
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
