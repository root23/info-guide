@extends('layouts.app')

@section('page-title')
<title>&#127747; Все города - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('page-meta')
    <meta name="description" content="Телефоны такси в городах России. Заказать такси, узнать цены. Отзывы о таксистах"/>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active">Все города</li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>Службы такси в городах России</h1>
                <p>Выберите Ваш город из каталога служб такси в России и закажите такси по телефону. </p>

                <div class="cities-list-block">

                    <div class="city-filter">
                        <input type="text" class="city-input" placeholder="Введите название города">
                    </div>
                    <div class="cities-list-wrap">
                        @include('taxi.cities.includes.loaded')
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
