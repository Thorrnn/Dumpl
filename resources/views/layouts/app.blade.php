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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('welcome')}}" style="text-shadow: 1px 1px 0px #000;  font-size:30px">Content
            Analysis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('welcome')}}">Головна <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog.user.tests.index')}}">Тести</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog.user.surveys.index')}}">Опитування</a>
                </li>
                @if (Route::has('login'))
                    @auth

                        @if((Auth::user()->role =='user'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index')}}" style="color:black">Кабінет User</a>
                            </li>
                        @elseif(Auth::user()->role =='admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('blog.admin.articles.index')}}" style="color:black">Панель
                                    адміністратора</a>
                            </li>
                        @endif
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" style="font-size:20px">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" style="right: 0;left: auto;"
                             aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" style="color:black" href="{{ route('logout') }}"
                               onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none" ;>
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            @else
                <div class="form-inline my-2 my-lg-0">
                    <a class="nav-link" href="{{ route('login') }}" style="color:black; text-decoration: none"
                    >Увійти</a>
                    @if(Route::has('register')) <a class="nav-link" href="{{route('register')}}"
                                                   style="color:black; text-decoration: none"
                    >Реєстрація</a>@endif
                    @endauth
                    @endif
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
