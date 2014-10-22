<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'p3: CSCI E-25')</title>
    <link rel='stylesheet' href='{{ asset('css/normalize.css') }}'/>
    <link rel='stylesheet' href='{{ asset('css/default.css') }}'/>
    @yield('links')
</head>
<body>
    <div id="header">
        <div class="container">
            @yield('picture')
            @yield('col')
                @yield('h1')
                <h4><a href="/" target="_blank">Home</a> | <a href="/loremipsum" target="_blank">Lorem Ipsum</a> | <a href="/user" target="_blank">Random User</a> | <a href="password" target="_blank">XKCD Password</a></h4>
            </div>
        </div>
        @yield('bar')
    </div>
    @yield('content')
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'></script>
</body>
</html>