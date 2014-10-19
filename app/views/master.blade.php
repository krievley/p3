<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'p3: CSCI E-25')</title>
    <link rel='stylesheet' href='{{ asset('css/normalize.css') }}'/>
    <link rel='stylesheet' href='{{ asset('css/default.css') }}'/>
</head>
<body>
    <div id="header">
        <div class="container">
            <div class="col3">
                @yield('picture')
            </div>
            <div class="col3">
                @yield('h1')
                <h4>Home | Lorem Ipsum | Random User | XKCD Password</h4>
            </div>
        </div>
        <div id="bar"></div>
    </div>
    @yield('content')
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'></script>
</body>
</html>