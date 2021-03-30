<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ContentAnalysis</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome')}}"> ContentAnalysis </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mx-2">
                            <a href="{{route('welcome')}}"><span class = "glyphicon glyphicon-home"></span>Главная</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{route('blog.user.tests.index')}}">Тесты</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{route('blog.user.surveys.index')}}">Опросы</a>
                        </li>

                        @if (Route::has('login'))
                            @auth

                                @if(Auth::user()->isUser())
                                    <li class="nav-item mx-2">
                                        <a href="{{route('index')}}">Кабинет User</a>
                                    </li>
                                @elseif(Auth::user()->isAdmin())
                                    <li class="nav-item mx-2">
                                        <a href="{{route('blog.admin.users.index')}}">Панель администратора</a>
                                    </li>
                                @endif


                    </ul>

                    <!-- Right Side Of Navbar -->
                </div>
                <div class="flex-center collapse navbar-collapse">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method = "POST" style="display: none";>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else<a href="{{ route('login') }}"style="text-decoration: none">Войти</a>
                        @if(Route::has('register')) <a href="{{route('register')}}" style="text-decoration: none">Регистрация</a>@endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
