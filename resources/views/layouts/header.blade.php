<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <!-- Search form  -->
        @include('components.header.search_form')
        @include('components.header.search_suggestions')

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <!-- Left Side Of Navbar -->
{{--            <ul class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item">--}}

{{--                </li>--}}
{{--            </ul>--}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @if (!empty($geo_city))
                    <li class="nav-item">
                        <a class="nav-link nav-city" id="nav-city" data-toggle="modal" data-target="#geoApproveModal" href="#"><i class="fa fa-map-pin"></i> {{ $geo_city->name }}</a>
                    </li>
                @endif
            <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="top-menu-wrap">
    <div class="container">
        <div id="menu">
            <ul class="top-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <li><a itemprop="url" href="/cities/">Города</a></li>
                <li><a itemprop="url" href="{{ route('blog.posts.index') }}/">Новости</a></li>
                <li><a itemprop="url" href="{{ route('contacts.index') }}/">Контакты</a></li>
            </ul>
        </div>
    </div>
</div>
