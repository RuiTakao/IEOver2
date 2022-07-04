<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/posts/app.css') }}" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="header_container">
            <h1 class="header-logo"><a class="header-link" href="/">Idea-Expo-Online</a></h1>
            <nav class="header_nav">
                <ul class="header_nav_lists">
                    <a class="header_nav_link" href="#"><li class="header_nav_list"><i class="fa-solid fa-magnifying-glass"></i></li></a>
                    <a class="header_nav_link" href="#"><li class="header_nav_list"><i class="fa-regular fa-bell"></i></li></a>
                    <a class="header_nav_link" href="#"><li class="header_nav_list profile_icon" style="background-image: url(img/nukumori-hiroba-logo.png);"></li></a>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <section>
            <div class="container">

                @yield('content')

            </div>
        </section>
    </main>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="logout">
    </form>

</body>
</html>
