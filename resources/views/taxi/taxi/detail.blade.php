@extends('layouts.app')

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
                        <div class="col-md-9" style="height: 400px;"><div id="map"></div></div>
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
