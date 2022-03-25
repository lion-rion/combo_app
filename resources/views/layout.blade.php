<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script src="{{ mix('js/sample.js') }}" defer></script>
    <script src="{{ mix('js/jquery.js') }}" defer></script>
    <link rel="stylesheet" href='/css/sample.css'>
    <!--<link rel="stylesheet" href='/css/app.css'> bootstrapを使う場合に必要 -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
</head>
<body>
    <header>
    @include('header')
    </header>
    <div class="container">
        <div id="main_content_wrap">
            <div id="content_wrap">
                @include('left_menu')
                @yield('content')
                @include('right_menu')
            </div>
        </div>
    </div>
</div>
    </div>
    <footer>
    @include('footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</body>

</html>