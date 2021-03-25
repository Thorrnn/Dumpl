<div id="app">

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
                                    <a href="{{route('home')}}"><span class = "glyphicon glyphicon-home"></span>Главная</a>
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
                        <div class="flex-center collapse navbar-collapse">
                            <!-- Этот блок расположен справа -->
                            <a class="dropdown-item " href="{{ route('logout') }}"
                               onclick="event.preventDefault()
                                document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method = "POST" style="display: none";>
                                @csrf
                            </form>

                            <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown link
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
                            </ul>


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
</div>
