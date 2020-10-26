@extends('layouts.app')

@section('js-section')
    <script src="{{ asset('js/main_slider.js') }}"></script>
@endsection
@section('css-section')
    <link href="{{ asset('css/styles_main.css') }}" rel="stylesheet">
@endsection

@section('page-title')
<title itemprop="headline">&#128661; Городской гид - {{ config('app.name', 'Laravel') }} </title>
@endsection

@section('page-meta')
<meta name="description" itemprop="description" content="Актуальные телефоны такси в регионах России. Заказать такси, адреса, телефоны и цены. Отзывы о такси."/>
@endsection

@section('title', 'Main')

@section('content')
    <div class="container main-title">
        <h1 class="title">Справочник городских услуг в городах России</h1>
        <h2>Быстрый поиск городских услуг</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-city"></i>
                    </div>
                    <div class="card-body">
                        <h3>1094 ГОРОДА</h3>
                        <span>по всей России</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="card-body">
                        <h3>12620 КОМПАНИЙ</h3>
                        <span>собрано в нашей базе, которая постоянно актуализируется</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="card-body">
                        <h3>30 ОТЗЫВОВ</h3>
                        <span>оставленных посетителями нашего сайта</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="page-nav">
                <a class="btn-visitors" href="#">Для жителей города</a>
                <a class="btn-business" href="{{ route('contacts.index') }}/">Для бизнеса</a>
        </div>
    </div>

    <div class="container">
        <h2 class="for-citizen" id="for-citizen">Для жителей города</h2>
    </div>

    @if (empty($geo_city))
        <div class="container">
            <h4 class="h4-centered">Выберите город</h4>
            <a href="/cities/" class="search_city">Поиск</a>
        </div>
    @endif

    <div class="container">
        <h4 class="h4-centered">Выберите категорию</h4>
    </div>

    <div class="container">
        <div class="categories">
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/taxi/cities/{{ $geo_city->slug }}/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-taxi"></i>
                    </span>
                    <span class="categories-item_name">
                        Такси
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/sto/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-wrench"></i>
                    </span>
                    <span class="categories-item_name">
                        СТО
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/medicina/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-user-md"></i>
                    </span>
                    <span class="categories-item_name">
                        Медицина
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/restorany/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-utensils"></i>
                    </span>
                    <span class="categories-item_name">
                        Рестораны
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/sport/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-running"></i>
                    </span>
                    <span class="categories-item_name">
                        Спорт
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/magaziny/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-shopping-bag"></i>
                    </span>
                    <span class="categories-item_name">
                        Магазины
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/kinoteatry/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-film"></i>
                    </span>
                    <span class="categories-item_name">
                        Кинотеатры
                    </span>
                </a>
            </div>
            <div class="categories-item_card">
                @if (!empty($geo_city))
                    <a href="/kompanii/{{ $geo_city->slug }}/bary-i-kluby/" class="categories-item_card_container">
                @else
                    <a href="#" class="categories-item_card_container">
                @endif
                    <span class="categories-icon">
                        <i class="fa fa-glass-cheers"></i>
                    </span>
                    <span class="categories-item_name">
                        Бары и клубы
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="container last-posts">
            <h2>Последние статьи</h2>

            <div class="row">
                <div class="col-md-4">
                    <article class="blog-post">
                        <a href="/blog/posts/kupony-kupony-na-transport-i-uslugi" class="thumbnail-default">
                            <figure>
                                <img src="https://info-guide.ru/uploads/1587578286.png" alt="Купоны. Купоны на транспорт и услуги">
                            </figure>
                        </a>
                        <h5 class="post-title"><a href="/blog/posts/kupony-kupony-na-transport-i-uslugi">Купоны. Купоны на транспорт и услуги</a></h5>
                        <div class="post-date">
                            <span><i class="far fa-calendar"></i> 2020-04-22</span>
                        </div>
                        <p>
                            С текущим состоянием экономики, потребители начинают тенденцию использования купонов со скидками в большинстве своих покупок. Начиная с наиболее распространенных продуктовых товаров, и продуктов даже для различных видов услуг, потребители теперь используют скидку, когда это возможно.
                        </p>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <a href="/blog/posts/top-10-vybiraem-avtomobil-dlya-raboty-v-taksi" class="thumbnail-default">
                            <figure>
                                <img src="https://info-guide.ru/uploads/1587576710.jpeg" alt="ТОП 10: Выбираем автомобиль для работы в такси">
                            </figure>
                        </a>
                        <h5 class="post-title"><a href="/blog/posts/top-10-vybiraem-avtomobil-dlya-raboty-v-taksi">ТОП 10: Выбираем автомобиль для работы в такси</a></h5>
                        <div class="post-date">
                            <span><i class="far fa-calendar"></i> 2020-04-22</span>
                        </div>
                        <p>
                            Несмотря на кризис и самоизоляцию, пассажирские перевозки не остановились.
                            А значит, это хороший вариант для заработка: достаточно водительского удостоверения и навыков.
                            Но какую машину выбрать?
                        </p>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <a href="/blog/posts/servis-yandekstaksi-dobavil-kurerskuyu-dostavku-v-prilozenie" class="thumbnail-default">
                            <figure>
                                <img src="https://info-guide.ru/uploads/1587233929.jpeg" alt="Сервис «Яндекс.Такси» добавил курьерскую доставку в приложение">
                            </figure>
                        </a>
                        <h5 class="post-title"><a href="/blog/posts/servis-yandekstaksi-dobavil-kurerskuyu-dostavku-v-prilozenie">Сервис «Яндекс.Такси» добавил курьерскую доставку в приложение</a></h5>
                        <div class="post-date">
                            <span><i class="far fa-calendar"></i> 2020-04-18</span>
                        </div>
                        <p>
                            Теперь пользователи «Яндекс.Такси» смогут пользоваться услугами курьерской доставки посылок весом до 10 кг. Сама доставка займет от 2 до 3 часов.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>


@endsection
