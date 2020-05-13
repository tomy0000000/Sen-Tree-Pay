<html>

<head>
    <meta charset="utf-8">
    <!-- Mobile First Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- iPhone X Fullscreen Viewport -->
    <meta name="viewport" content="viewport-fit=cover">
    <!-- iOS Progressive Web Application Zone -->
    <!-- App icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/favicon/touch-icon-ipad-retina.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#ac000f">
    <meta name="application-name" content="Sen Tree Pay">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml" />
    <meta name="msapplication-TileColor" content="#ac000f">
    <meta name="theme-color" content="#ac000f">
    <!-- Launch Screen -->
    <link rel="apple-touch-startup-image" href="">
    <!-- Configure App Name -->
    <meta name="apple-mobile-web-app-title" content="Sen Tree Pay">
    <!-- Hide Safari Elements -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fundemental Basics -->
    <link rel="icon" href="/favicon.ico">
    @if(View::hasSection("title"))
    <title>聯盟幣儲值系統 - @yield("title")</title>
    @else
    <title>聯盟幣儲值系統</title>
    @endif
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <!-- Font Awesome icons CSS -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Page CSS -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    @if(View::hasSection("cssname"))
    <link rel="stylesheet" type="text/css" href="/css/@yield('cssname').css">
    @endif
    @if(View::hasSection("css"))
    @yield("css")
    @endif
</head>

<body>
    <div class="container h-auto">
        <div class="grey-box my-auto">
            @yield("content") @if(!View::hasSection("hideBtnBack"))
            <button type="button" class="btn btn-dark btn-lg" onclick="window.history.go(-1)">
                <i class="fas fa-arrow-left"></i>&ensp;返回
            </button>
            @endif()
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Page JS -->
    <script type="text/javascript" src="/js/app.js"></script>
    @if(View::hasSection("jsname"))
    <script type="text/javascript" src="/js/@yield('jsname').js"></script>
    @endif
    @if(View::hasSection("js"))
    @yield("js")
    @endif
</body>

</html>
