@extends('layouts.app')

@section('page-title')
    <title itemprop="headline">&#127747; Все города - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="Информация о компаниях в городах России. Телефоны, информация, отзывы о компаниях городов."/>
@endsection

@section('js-section')
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
            <div class="col-md-8">
                <h1>Компании в городах России</h1>
                <p>Выберите Ваш город из каталога компаний в России.</p>

                <div class="cities-list-block">

                    <div class="city-filter">
                        <input type="text" class="city-input for_company" placeholder="Введите название города">
                    </div>
                    <div class="cities-list-wrap">
                        @include('cities.includes.loaded')
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                @include('cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
