<div id="app">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/')}} ">{{__('nav.navList.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/articles')}} ">{{__('nav.navList.articles')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/results')}} ">{{__('nav.navList.rate')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/about')}} ">{{__('nav.navList.about')}}</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li>
                        <a class="text-small nav-link" href="<?= route('setlocale', ['lang' => 'en']) ?>">eng.</a>

                    </li>
                    <li>

                        <a class="text-small nav-link" href="<?= route('setlocale', ['lang' => 'ru']) ?>">рус.</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('nav.navList.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('nav.navList.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/profile')}}">
                                    {{ __('nav.navList.profile') }}
                                </a>

                                @if(Auth::user()->role =='admin')
                                    <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/users')}} ">{{ __('nav.navList.users')}}</a>
                                    <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/adm/grades')}} ">{{ __('nav.navList.grades')}}</a>
                                    <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/adm/articles')}} ">{{ __('nav.navList.articles')}}</a>
                                @endif
                                @if(Auth::user()->role == 'jury')
                                    <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/grades')}}">{{ __('nav.navList.my_grades')}}</a>
                                @endif
                                @if(Auth::user()->role == 'competitor')
                                    <a class="dropdown-item" href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale() .'/profile/articles')}}">{{ __('nav.navList.my_articles')}}</a>
                            @endif

                            <!--<a class="dropdown-item" href="articles">
                                    {{ __('nav.navList.articles') }}
                                </a>-->

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('nav.navList.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
