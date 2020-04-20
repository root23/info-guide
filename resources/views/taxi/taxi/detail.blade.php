@extends('layouts.app')

@section('page-title')
    <title>Такси «{{ $taxi->title }}» в г. {{ $taxi->city->name }} номер телефона, цены, отзывы &#128661; - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('page-meta')
    <meta name="description" content="Такси {{ $taxi->title }} в {{ $taxi->city->name_for_display }}. Цены, отзывы, заказать такси онлайн."/>
    <meta name="keywords" content="такси {{ $taxi->title }}, телефоны такси {{ $taxi->title }} в {{ $taxi->city->name_for_display }}, номера такси {{ $taxi->title }}, справочник такси, заказать такси онлайн" />
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
    <script src="{{ asset('js/ajax/comments.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
@endsection

@section('css-section')
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/taxi/cities/">Все города</a></li>
            <li class="breadcrumb-item"><a href="/taxi/cities/{{ $taxi->city->slug }}/">{{ $taxi->city->name }}</a></li>
            <li class="breadcrumb-item active">{{ $taxi->title }}</li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>{{ $taxi->title }}</h1>
                <p>{{ $taxi->title }} работает круглосуточно в городе {{ $taxi->city->name_for_display }}. Ниже представлена детальная информация о перевозчике.
                    Работает по адресу {{ $taxi->description }}. Телефон(ы) для связи:
                    @foreach($taxi->phoneNumbers as $number)
                        <a href="tel:{{ $number }}">{{ $number }}</a>
                    @endforeach
                </p>


                <div class="taxi-info">
                    <div class="row justify-content-center info-block">
                        <div class="col-md-6"><span><i class="fa fa-map-marker"></i>Адрес: </span></div>
                        <div class="col-md-6">{{ $taxi->description }}</div>
                    </div>
                    <div class="row justify-content-center info-block">
                        <div class="col-md-6"><span><i class="fa fa-phone"></i>Телефон(ы): </span></div>
                        <div class="col-md-6">
                            @foreach($taxi->phoneNumbers as $number)
                                <a href="tel:{{ $number }}">{{ $number }}</a> <br />
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center info-block">
                        <div class="col-md-3"><span><i class="fa fa-map"></i>Расположение: </span></div>
                        <div class="col-md-9" style="height: 400px;">
                            @include('taxi.taxi.includes.map-block')
                        </div>
                    </div>
                </div>

                <p>Заказать такси можно круглосуточно по телефону, указанному в информации.</p>

                <h2>Отзывы</h2>
                @include('taxi.reviews.taxi-reviews')
                @include('taxi.reviews.add-review-form')

            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
