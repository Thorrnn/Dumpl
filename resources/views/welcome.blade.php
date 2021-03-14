<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">

        <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href = {{ asset("bootstrap/css/sticky-footer-navbar.css") }} rel="stylesheet" />

        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
                    </style>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 navbar-container bg-light">
                <!-- Вертикальное меню -->
                <nav class="navbar  navbar-expand-lg navbar-light bg-dark navbar-expand-sm">
                    <!-- Контейнер (определяет ширину компонента Navbar) -->
                    <div class="container">
                        <!-- Бренд и кнопка «Гамбургер» -->
                        <a class="navbar-brand" href="#">Content Analysis</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbar-example" aria-controls="navbar-example"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Основная часть меню -->
                        <div class="collapse navbar-collapse ">
                            <!-- Этот блок расположен слева -->
                            <ul class="navbar-nav nav list-group text-center">
                                <li class="nav-item  mx-2">
                                    <a href="{{route('welcome')}}"><span class = "glyphicon glyphicon-home"></span>Главная</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a href="{{route('welcome')}}"><span class = "glyphicon glyphicon-home"></span>Главная</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a href="{{route('blog.user.surveys.index')}}">Тесты</a>
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
                        </div>
                        <div class="flex-center">
                            <!-- Этот блок расположен справа -->
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method = "POST" style="display: none";>
                                @csrf
                            </form>
                            @else<a href="{{ route('login') }}"style="text-decoration: none">Войти</a>
                                 @if(Route::has('register')) <a href="{{route('register')}}" style="text-decoration: none">Регистрация</a>@endif
                            @endauth
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 content-container" style="background-color: #ffe0b2">
                <!-- Основной контент страницы  -->
                ...
            </div>
        </div>
    </div>


        <script src="/js/app.js"></script>
{{--        <div>--}}
{{--            <a href="<?= route('setlocale', ['lang' => 'en']) ?>">English</a>--}}
{{--            <a href="<?= route('setlocale', ['lang' => 'ru']) ?>">Русский</a>--}}
{{--            <a href="<?= route('setlocale', ['lang' => 'uk']) ?>">Українська</a>--}}
{{--        </div>--}}
    </body>
</html>
