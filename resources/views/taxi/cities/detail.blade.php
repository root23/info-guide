@extends('layouts.app')

@section('page-title')
    @if($city->seo_title)
        <title itemprop="headline">{{ $city->seo_title }}</title>
    @else
        <title itemprop="headline">📞 Телефоны такси в {{ $city->name_for_display }}, номера, цены, отзывы - {{ config('app.name', 'Laravel') }}</title>
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
    <meta name="description" itemprop="description" content="Телефоны такси в {{ $city->name_for_display }}, отзывы, цены. Качественные услуги такси в городах России."/>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/taxi/cities/"><span itemprop="name">Все города</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $city->name }}</span>
                <meta itemprop="position" content="3" />
            </li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Телефоны такси в {{ $city->name_for_display }}</h1>
                <p>Заказ такси в {{ $city->name_for_display }}: лучшие такси, номера телефонов, сайты, цены, отзывы.</p>

                <div class="company-list">

                    @include('taxi.cities.includes.city-taxi-list')

                    {!! $city->description !!}
                    <p>Городские службы такси активно развиваются. Сегодня в городе практически невозможно встретить нелегальных перезвозчиков, их место уверенно заняли «белые» компании, цены «на глазок» уступили место фиксированным тарифам. Во многих машинах можно оплатить поездку не только наличными, но банковской карточкой, водитель выдаст пассажиру и кассовый чек. Выберите в нашем рейтинге лучшее такси из огромного количества городских служб. Предварительно заказывая такси, вы можете сами выбрать любой из комфортабельных автомобилей. В автопарке практически всех компаний большой выбор самых современных авто различного класса. Если вам нужно недорого вызвать такси по городу, лучшее решение – обратиться в наш профессиональный сервис.</p>
                    <p>Заказ такси может потребоваться в самых разных случаях, будь то поездка на дачу, в санаторий или в гости. Конечно, можно воспользоваться и общественным транспортом, но тогда вы будете зависеть от его расписания, потратите на дорогу в несколько раз больше времени, будете вынуждены испытывать неудобства и перетаскивать багаж при пересадках. Другое дело – такси. Комфортный автомобиль с вежливым и опытным водителем подъедет к вам в течение нескольких минут и отвезет, куда скажете. Средная цена на услуги такси составляет 2-8 руб./км, посадка 10-80 рублей. Более точно узнать тарифы можно позвонив по номерам служб.</p>

                </div>


            </div>
            <div class="col-md-4">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
