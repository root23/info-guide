@extends('layouts.app')

@section('page-title')
    <title itemprop="headline">Такси «{{ $taxi->title }}» в г. {{ $taxi->city->name }} номер телефона, цены, отзывы &#128661; - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="Такси {{ $taxi->title }} в {{ $taxi->city->name_for_display }}. Цены, отзывы, заказать такси онлайн."/>
@endsection

@section('js-section')
    <script>
        window.mark_x = {{ $taxi->mark_x }};
        window.mark_y = {{ $taxi->mark_y }};
        window.taxi_title = '{{ $taxi->title }}';
        window.taxi_phones = '{{ $taxi->phone_number }}';
        window.taxi_id = '{{ $taxi->id }}';
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=83a30e8b-20cb-42ef-b635-5fdfc3de7e41" type="text/javascript"></script>
    <script src="{{ asset('js/ya_maps.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/ajax/comments.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX"></script>
    <script>
        function getRecaptcha() {
            grecaptcha.ready(function () {
                grecaptcha.execute('6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX', { action: 'contact' }).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                });
            });
        }
        getRecaptcha();
    </script>
    <script type="application/javascript" defer="defer" async="async">
        var kiwitaxiSearchFormOptions = {
            target: 'kiwitaxi_search_form_wrapper',
            country: "Russia",
            language: 'ru',
            currency: 'RUB',
            theme: '0',
            place_from: null,
            place_to: null,
            partner_id: '5eac64e8e406c',
            banner_id: 'c15407d4'

        };
        (function () {
            var kw = document.createElement('script');
            kw.type = 'text/javascript';
            kw.async = true;
            kw.src = '//widget.kiwitaxi.com/search_form.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(kw, s);
        })();
    </script>
@endsection

@section('css-section')
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cities-title">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumb">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/taxi/cities/"><span itemprop="name">Все города</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/taxi/cities/{{ $taxi->city->slug }}/"><span itemprop="name">{{ $taxi->city->name }}</span></a>
                <meta itemprop="position" content="3" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $taxi->title }}</span>
                <meta itemprop="position" content="4" />
            </li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-8" itemscope itemtype="http://schema.org/Organization">
                <h1 itemprop="name">{{ $taxi->title }}</h1>
                <p>{{ $taxi->title }} работает круглосуточно в городе {{ $taxi->city->name_for_display }}. Ниже представлена детальная информация о перевозчике.
                    Работает по адресу {{ $taxi->description }}. Телефон(ы) для связи:
                    @foreach($taxi->phoneNumbers as $number)
                        <a href="tel:{{ $number }}">{{ $number }}</a>
                    @endforeach
                </p>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-map-marker"></i> Адрес:</h4>
                        <p class="card-text" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{{ $taxi->description }}</p>
                        <h4 class="card-title"><i class="fa fa-phone"></i> Телефоны:</h4>
                        <p class="card-text" itemprop="telephone">
                            @foreach($taxi->phoneNumbers as $number)
                                <a href="tel:{{ $number }}">{{ $number }}</a> <br />
                            @endforeach
                        </p>
                        <h4 class="card-title"><i class="fa fa-map"></i> На карте:</h4>
                        <div class="map-wrapper" style="height: 400px">
                            @include('taxi.taxi.includes.map-block')
                        </div>
                    </div>
                </div>

                <p>Заказать такси можно круглосуточно по телефону, указанному в информации.</p>

                <h2 id="reviews-title">Отзывы</h2>
                <div class="reviews-wrap">
                </div>
                @include('taxi.reviews.add-review-form')

            </div>
            <div class="col-md-4">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
