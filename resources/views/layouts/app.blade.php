<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', 'Blog restaurant') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"
    integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
</head>
<body>
    <div id="wrapper">
        <div id="menu-wrapper" onclick="toggleMenu()">

        <div>
        </div>

        <div id="menu">
            <a class="{{ Request::is('/') ? 'current-item' : '' }}" href="/">Home</a>
            <a class="{{ Request::is('recipes') ? 'current-item' : '' }}" href="{{ route('recipes.index') }}">Recipes</a>
            <a class="{{ Request::is('rec') ? 'current-item' : '' }}" href="./contacts.html">Contact Us</a>
        </div>

        <div id="auth-menu">
        <div class="dropdown">
            <button class="dropbtn"><i class="fas fa-bars"></i></button>
            <div class="dropdown-content">
                <a href="./login.html"><i class="fas fa-sign-in-alt"></i>Sign in</a>
                <a href="./register.html"><i class="fas fa-user-plus"></i>Register</a>
                <a href="#"><i class="fas fa-sign-out-alt"></i>Sign out</a>
            </div>
        </div> 
        </div>

        </div>

        <div id="mobile-menu">
            <a class="{{ Request::is('/') ? 'current-item' : '' }}" href="/">Home</a>
            <a class="{{ Request::is('recipes') ? 'current-item' : '' }}" href="{{ route('recipes.index') }}">Recipes</a>
            <a class="{{ Request::is('rec') ? 'current-item' : '' }}" href="./contacts.html">Contact Us</a>
        </div>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
