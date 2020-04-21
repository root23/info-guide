@extends('layouts.app')

@section('page-title')
<title itemprop="headline">&#127747; Все города - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="Телефоны такси в городах России. Заказать такси, узнать цены. Отзывы о таксистах"/>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">Все города</span>
                <meta itemprop="position" content="2" />
            </li>
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
