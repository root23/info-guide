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
    <script src="{{ asset('js/ajax/find_taxi.js') }}" defer></script>
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
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/taxi/cities/{{ $city->name }}"><span itemprop="name">Все города</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">Яндекс.Такси</span>
                <meta itemprop="position" content="3" />
            </li>
        </ul>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Заказать Яндекс Такси онлайн в {{ $city->name_for_display }}</h1>
                <div class="ui-content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <form action="javascript:void(0)" method="get" id="search-form" name="contactFrm">
                                <label for="pointA">Откуда</label>
                                <input type="text" name="pointA" id="pointA" required="" placeholder="Откуда" value="{{ $city->name }} " name="name" class="txt">
                                <label for="pointA">Куда</label>
                                <input type="text" name="pointB" id="pointB" required="" placeholder="Куда" value="{{ $city->name }} " name="mob" class="txt">
                                <div class="inputGroup">
                                    <input type="checkbox" name="yellowcarnumber[]" class="form-check-input" id="yellowcarnumber">
                                    <label class="form-check-label" for="yellowcarnumber">Машина с желтым номером</label>
                                </div>
                                <div class="inputGroup">
                                    <input type="checkbox" name="nosmoking[]" class="form-check-input" id="nosmoking">
                                    <label class="form-check-label" for="nosmoking">Некурящий водитель</label>
                                </div>
                                <div class="inputGroup">
                                    <input type="checkbox" name="chldchair[]" class="form-check-input" id="childchair">
                                    <label class="form-check-label" for="childchair">Наличие детского кресла</label>
                                </div>
                                <div class="inputGroup">
                                    <input type="checkbox" name="check[]" class="form-check-input" id="check">
                                    <label class="form-check-label" for="check">Квитанция об оплате</label>
                                </div>
                                <div class="inputGroup">
                                    <input type="checkbox" name="luggage[]" class="form-check-input" id="luggage">
                                    <label class="form-check-label" for="luggage">Платная перевозка багажа</label>
                                </div>
                                <input type="submit" value="Найти машину" name="submit" class="txt2">
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="ui-social">
                                <!-- Register -->
                                <h2>Как заказать яндекс такси онлайн?</h2>
                                <p>Заполните следующую форму и ознакомьтесь с тарифами и ценами. Выберите подходящий и нажмите кнопку заказать.</p>
                                <!-- Social media -->
                                <ol class="list-unstyled">
                                    <li>Введите адрес прибытия машины</li>
                                    <li>Введите конечный адрес маршрута</li>
                                    <li>Выберите дополнительные опции</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="container"></div>

                </div>


            </div>
            <div class="col-md-4">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>


    </div>

@endsection
