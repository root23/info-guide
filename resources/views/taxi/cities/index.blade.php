@extends('layouts.app')

@section('content')
    <div class="container cities-title">
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
