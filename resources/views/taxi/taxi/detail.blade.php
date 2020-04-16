@extends('layouts.app')

@section('js-section')
    <script>
        window.mark_x = {{ $taxi->mark_x }};
        window.mark_y = {{ $taxi->mark_y }};
        window.taxi_title = '{{ $taxi->title }}';
        window.taxi_phones = '{{ $taxi->phone_number }}';
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=83a30e8b-20cb-42ef-b635-5fdfc3de7e41" type="text/javascript"></script>
    <script src="{{ asset('js/ya_maps.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="container cities-title">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>{{ $taxi->title }}</h1>
                <p>{{ $taxi->title }} работает круглосуточно в городе {{ $taxi->city->name_for_display }}. Ниже представлена детальная информация о перевозчике.
                    Работает по адресу {{ $taxi->description }}. Телефон(ы) для связи: {{ $taxi->phone_number }}.</p>


                <div class="taxi-info">
                    <div class="row justify-content-center info-block">
                        <div class="col-md-6"><span><i class="fa fa-map-marker"></i>Адрес: </span></div>
                        <div class="col-md-6">{{ $taxi->description }}</div>
                    </div>
                    <div class="row justify-content-center info-block">
                        <div class="col-md-6"><span><i class="fa fa-phone"></i>Телефон(ы): </span></div>
                        <div class="col-md-6">{{ $taxi->phone_number }}</div>
                    </div>
                    <div class="row justify-content-center info-block">
                        <div class="col-md-3"><span><i class="fa fa-map"></i>Расположение: </span></div>
                        <div class="col-md-9" style="height: 400px;">
                            @include('taxi.taxi.includes.map-block')
                        </div>
                    </div>
                </div>

                <p>Заказать такси можно круглосуточно по телефону, указанному в информации.</p>

            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
