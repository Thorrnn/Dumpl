<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ContentAnalysis</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/survey_wrapper.css') }}" rel="stylesheet">
    <!-- Bootstrap 3.3.7 -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome')}}" style="text-shadow: 1px 1px 0px #000;  font-size:30px">Content Analysis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item mx-1">
                        <a href="{{route('welcome')}} "style="font-size:20px; color:black">Головна</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="{{route('blog.user.tests.index')}}" style="font-size:20px; color:black">Тести</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="{{route('blog.user.surveys.index')}}"style="font-size:20px; color:black">Опитування</a>
                    </li>

                    @if (Route::has('login'))
                        @auth

                            @if((Auth::user()->role =='user'))
                                <li class="nav-item mx-1">
                                    <a href="{{route('index')}}" style="font-size:20px; color:black">Кабінет User</a>
                                </li>
                            @elseif(Auth::user()->role =='admin')
                                <li class="nav-item mx-1">
                                    <a href="{{route('blog.admin.articles.index')}}" style="font-size:20px; color:black">Панель адміністратора</a>
                                </li>
                            @endif


                </ul>

                <!-- Right Side Of Navbar -->
            </div>
            <div class="flex-center collapse navbar-collapse">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:20px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item " style="font-size:20px; color:black" href="{{ route('logout') }}"
                               onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method = "POST" style="display: none";>
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else<a href="{{ route('login') }}" style="font-size:20px; color:black; text-decoration: none" class="ml-2">Увійти</a>
                    @if(Route::has('register')) <a href="{{route('register')}}" style="font-size:20px; color:black; text-decoration: none" class="ml-2">Реєстрація</a>@endif
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
