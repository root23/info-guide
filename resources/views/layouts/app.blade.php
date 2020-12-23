<!doctype html>
<html lang="ru">
<head itemscope itemtype="http://schema.org/WPHeader">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('/img/favicon.png') }}" type="image/x-icon"/>
    <meta name="yandex-verification" content="1c39173a03f7c309" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    @yield('page-title')

    <!-- Page Meta -->
    <meta name="robots" content="index, follow">
    @yield('page-meta')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('css-section')

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56915689, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/56915689" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155358984-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-155358984-1');
    </script>

    <script>
        @if (!empty($geo_city))
            window.user_city_id = '{{ $geo_city->id }}';
        @endif
    </script>

    <script src="{{ asset('js/city.js') }}"></script>

</head>
<body>
    <div id="app">
        <div class="modal fade" id="geoApproveModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($geo_city->is_for_company)
                            <span class="your_city-q">Ваш город:</span>
                            <span class="your_city-n"><b>{{ $geo_city->name }}</b></span>
                        @else
                            <span class="your_city-q">Не удалось автоматически определить Ваш город.</span>
                            <span class="your_city-n"><b>Выберите из списка</b></span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        @if ($geo_city->is_for_company)
                            <button type="button" class="btn btn-secondary btn-approve_city" data-dismiss="modal">Да</button>
                            <button type="button" class="btn btn-primary btn-show_city_list" onclick="window.location.href='/cities/';">Нет, выбрать из списка</button>
                        @else
                            <button type="button" class="btn btn-primary btn-show_city_list" onclick="window.location.href='/cities/';">Выбрать из списка</button>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.header')
        <main class="py-4">
            @yield('content')
        </main>

        <footer class="py-4">
            @include('layouts.footer')
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js-section')
</body>
</html>
