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


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div id="app">



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="{{route('welcome')}}" style="text-shadow: 1px 1px 0px #000;  font-size:30px">Content
            Analysis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        @if((Auth::user()->role =='user') or (Auth::user()->role =='admin'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('welcome')}}" style="color:whitesmoke; font-size:20px;">Головна</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:whitesmoke; font-size:20px;" href="{{route('blog.user.tests.index')}}">Тести</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:whitesmoke; font-size:20px;" href="{{route('blog.user.surveys.index')}}">Опитування</a>
                            </li>
                        @endif
                        @if(Auth::user()->role =='admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('blog.admin.articles.index')}}" style="color:whitesmoke; font-size:20px;" >Панель
                                    адміністратора</a>
                            </li>
                        @endif
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" style="font-size:20px; color:whitesmoke">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" style="right: 0;left: auto;"
                             aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" style="color:black" href="{{ route('logout') }}"
                               onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                Вийти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none" ;>
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            @else
                <div class=" my-2 my-lg-0">
                    <ul>
                        <li class="nav-item text-decoration-none" style="list-style-type: none;">
                            <a class="nav-link" href="{{ route('login') }}" style="color:whitesmoke; text-decoration: none"
                            >Увійти</a>
                        </li>
                        <li class="nav-item text-decoration-none" style="list-style-type: none;">
                            @if(Route::has('register')) <a class="nav-link" href="{{route('register')}}"
                                                           style="color:whitesmoke; text-decoration: none"
                            >Реєстрація</a>@endif
                        </li>
                    </ul>

                    @endauth
                    @endif
                </div>
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
