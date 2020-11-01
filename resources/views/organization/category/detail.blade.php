@extends('layouts.app')

@section('page-title')
    @if($city->seo_title)
        <title itemprop="headline">{{ $city->seo_title }}</title>
    @else
        <title itemprop="headline">📞 {{ $category->title }} в {{ $city->name_for_display }}, номера, цены, отзывы - {{ config('app.name', 'Laravel') }}</title>
    @endif

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
    <script src="{{asset('js/lazyload.js')}}"></script>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="{{ $category->title }} в {{ $city->name_for_display }}, отзывы, цены. Качественные услуги в городах России."/>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/cities/"><span itemprop="name">Все города</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/cities/{{ $city->slug }}"><span itemprop="name">{{ $city->name }}</span></a>
                <meta itemprop="position" content="3" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $category->title }}</span>
                <meta itemprop="position" content="4" />
            </li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $category->title }} в {{ $city->name_for_display }}</h1>
                <p>{{ $category->title }} в {{ $city->name_for_display }}: номера телефонов, сайты, цены, отзывы.</p>

                <div class="company-list">

                    @if ($category->title == 'Медицина')
                        <div class="item-company">
                            <div class="row justify-content-center">
                                <div class="col-md-3 item-company-image-col">
                                    <img class="lazyload" data-src="/img/docdoc.jpg" alt="">
                                </div>
                                <div class="col-md-6 item-company-right-col">
                                    <a href="https://bit.ly/31Y2vtz" class="title">Docdoc</a>
                                    <div class="info">
                                        {{ strip_tags(Str::limit('DocDoc – это быстрый и удобный online-сервис по поиску врачей. Сервис DocDoc появился в декабре 2011 года в Москве. Портал оказывает услуги по подбору врачей из клиник Москвы, Московской области и Санкт-Петербурга. DocDoc помогает людям найти нужного специалиста, основываясь на отзывах и квалификации врача, а также оперативно записаться к нему на прием в удобное время.', 90)) }}
                                    </div>
                                </div>
                                <div class="col-md-3 item-company-left-col">
                                    <a href="https://docdoc.ru/about/press" class="review">
                                        <i class="fa fa-comments"></i> Отзывы
                                    </a>
                                    <a href="tel:88001003598" class="order-taxi">Позвонить</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @include('organization.category.includes.city-organizations-list')
                    {!! $city->description !!}

                </div>


            </div>
            <div class="col-md-4">
                @include('organization.category.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
