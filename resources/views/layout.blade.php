<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ mix('js/sample.js') }}" defer></script>
    <script src="{{ mix('js/jquery.js') }}" defer></script>
    <link rel="stylesheet" href='/css/sample.css'>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
</head>
<body>
    <header>
    @include('header')
    </header>
    <br>
    <div class="container">
    @yield('content')
  </div>
</div>
    </div>
    <footer>
    @include('footer')
    </footer>
</body>

</html>