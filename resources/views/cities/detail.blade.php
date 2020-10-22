@extends('layouts.app')

@section('page-title')
    @if($city->seo_title)
        <title itemprop="headline">{{ $city->seo_title }}</title>
    @else
        <title itemprop="headline">📞 Все компании в {{ $city->name_for_display }}, номера, цены, отзывы, информация о компаниях - {{ config('app.name', 'Laravel') }}</title>
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
    <script src="{{asset('js/city_detail.js')}}"></script>
@endsection

@section('page-meta')
    <meta name="description" itemprop="description" content="Компании в {{ $city->name_for_display }}, отзывы, цены. Качественные услуги в городах России. Телефоны, информация, отзывы."/>
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
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $city->name }}</span>
            </li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Список компаний в {{ $city->name_for_display }}</h1>

                <div class="container">
                    <h4 class="h4-centered">Выберите категорию</h4>
                </div>

                <div class="container">
                    <div class="categories">
                        <div class="categories-item_card">
                            <a href="/taxi/cities/{{ $city->slug }}/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-taxi"></i></span>
                                <span class="categories-item_name">Такси</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/sto/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-wrench"></i></span>
                                <span class="categories-item_name">СТО</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/medicina/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-user-md"></i></span>
                                <span class="categories-item_name">Медицина</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/restorany/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-utensils"></i></span>
                                <span class="categories-item_name">Рестораны</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/sport/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-running"></i></span>
                                <span class="categories-item_name">Спорт</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/magaziny/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-shopping-bag"></i></span>
                                <span class="categories-item_name">Магазины</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/kinoteatry/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-film"></i></span>
                                <span class="categories-item_name">Кинотеатры</span>
                            </a>
                        </div>
                        <div class="categories-item_card">
                            <a href="/kompanii/{{ $city->slug }}/bary-i-kluby/" class="categories-item_card_container">
                                <span class="categories-icon"><i class="fa fa-glass-cheers"></i></span>
                                <span class="categories-item_name">Бары и клубы</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="company-list">

{{--                    @include('cities.includes.city-companies-list')--}}

                    {!! $city->description !!}

                </div>


            </div>
            <div class="col-md-4">
                @include('cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
