<!doctype html>
<html lang="ru">
<head itemscope itemtype="http://schema.org/WPHeader">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('/img/favicon.png') }}" type="image/x-icon"/>
    <meta name="yandex-verification" content="1c39173a03f7c309" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(56915689, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/56915689" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155358984-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-155358984-1');
    </script>
    <script type="text/javascript" defer="defer" async="async">
        var kiwitaxiSearchFormOptions = {
            target: 'kiwitaxi_search_form_wrapper',  /* Идентификатор html-елемента в который будет вставлен виджет. */
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_main.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="header">
        <div class="container">
            <div class="logo-block">
                <span>Твое Такси</span>
                <img src="/img/logo.png" alt="Справочник телефонов такси в России - логотип">
                <h1>Справочник телефонов такси в городах России</h1>
            </div>
        </div>
    </div>
    <div class="banner">
        <img src="/img/banner_img.jpg" alt="">
    </div>

    <div class="py-5 block-info">
        <div class="container">
            <h2>Телефоны такси в России</h2>
            <p>Твое Такси - это сервис по поиску такси и трансфера во всех городах России.</p>
            <p>На сайте собраны компании-перевозчики России. Находясь в другом городе, вы удобно можете найти и заказать такси.</p>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="card-body">
                        <h3>1094 ГОРОДА</h3>
                        <span>по всей России с информацией о перевозчиках и их контактными телефонами</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-taxi"></i>
                    </div>
                    <div class="card-body">
                        <h3>12620 ПЕРЕВОЗЧИКОВ</h3>
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

    <div class="py-5 search-block">
        <div class="container">
            <span>Найти такси в вашем городе</span>
            <a href="/taxi/cities" class="btn btn-start-search">Перейти к поиску</a>
        </div>
    </div>

    <div class="py-4 text-block">
        <div class="container">
            <p>Если раньше такси было прерогативой только больших городов, то сегодня в любом городе есть, как частные таксисты,
                так и компании, занимающиеся перевозками. У компаний больше преимуществ: это и большой таксопарк,
                и выгодные расценки, и круглосуточная работа. С каждым годом потребность в услугах такси растет, поэтому
                таксопарки всегда пополняются новыми автомобилями. Отсутствие свободных машин может стать причиной отказа
                клиенту, что не очень хорошо отражается на репутации компании.</p>
            <p>Каждый звонок принимает диспетчер, после чего он осуществляет поиск ближайшего автомобиля от клиента.
                Это экономит время на ожидании, поэтому такси так часто используются в экстренных ситуациях.
                Сделать заказ такси можно не только по телефону, но и по интернету, оставив онлайн-заявку.</p>
        </div>
    </div>

    <div class="py-4">
        <div class="container">
            <div id="kiwitaxi_search_form_wrapper" style="display: block; width: 100%; min-width: 240px;"></div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
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
                            <span><i class="fa fa-calendar"></i> 2020-04-22</span>
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
                            <span><i class="fa fa-calendar"></i> 2020-04-22</span>
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
                            <span><i class="fa fa-calendar"></i> 2020-04-18</span>
                        </div>
                        <p>
                            Теперь пользователи «Яндекс.Такси» смогут пользоваться услугами курьерской доставки посылок весом до 10 кг. Сама доставка займет от 2 до 3 часов.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4">
        @include('layouts.footer')
    </footer>
</div>
</body>
</html>
