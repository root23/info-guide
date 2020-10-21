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
    <script src="{{ asset('js/lazyload.js') }}" defer></script>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="{{ $category->title }} в {{ $city->name_for_display }}, отзывы, цены. Качественные услуги в городах России."/>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/cities/"><span itemprop="name">Все города</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/cities/{{ $city->slug }}"><span itemprop="name">{{ $city->name }}</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $category->title }}</span>
            </li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $category->title }} в {{ $city->name_for_display }}</h1>
                <p>{{ $category->title }} в {{ $city->name_for_display }}: номера телефонов, сайты, цены, отзывы.</p>

                <div class="company-list">

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
