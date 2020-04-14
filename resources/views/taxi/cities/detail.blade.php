@extends('layouts.app')

@section('content')
    <div class="container cities-title">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>Телефоны такси в {{ $city->name_for_display }}</h1>
                <p>Заказ такси в {{ $city->name_for_display }}: лучшие такси, номера телефонов, сайты, цены, отзывы.</p>

                <div class="company-list">
                    <div class="item-company">
                        <div class="row justify-content-center">
                            <div class="col-md-9 item-company-right-col">
                                <a target="_blank" href="#" class="title">Название такси 1</a>
                                <div class="info">
                                    Адрес: Брянск, ул. Фокина, 108А <br>
                                    Телефон: +7 (4832) 32-30-31
                                </div>
                            </div>
                            <div class="col-md-3 item-company-left-col">
                                <a href="#" class="review">
                                    <i class="fa fa-comments"></i> Отзывы (0)
                                </a>
                                <a href="tel:+88005553535" class="order-taxi">Заказать такси</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-company">
                        <div class="row justify-content-center">
                            <div class="col-md-9 item-company-right-col">
                                <a target="_blank" href="#" class="title">Название такси 1</a>
                                <div class="info">
                                    Адрес: Брянск, ул. Фокина, 108А <br>
                                    Телефон: +7 (4832) 32-30-31
                                </div>
                            </div>
                            <div class="col-md-3 item-company-left-col">
                                <a href="#" class="review">
                                    <i class="fa fa-comments"></i> Отзывы (0)
                                </a>
                                <a href="tel:+88005553535" class="order-taxi">Заказать такси</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-company">
                        <div class="row justify-content-center">
                            <div class="col-md-9 item-company-right-col">
                                <a target="_blank" href="#" class="title">Название такси 1</a>
                                <div class="info">
                                    Адрес: Брянск, ул. Фокина, 108А <br>
                                    Телефон: +7 (4832) 32-30-31
                                </div>
                            </div>
                            <div class="col-md-3 item-company-left-col">
                                <a href="#" class="review">
                                    <i class="fa fa-comments"></i> Отзывы (0)
                                </a>
                                <a href="tel:+88005553535" class="order-taxi">Заказать такси</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>

        <p style="margin-top: 15px;">Городские службы такси активно развиваются. Сегодня в городе практически невозможно встретить нелегальных перезвозчиков, их место уверенно заняли «белые» компании, цены «на глазок» уступили место фиксированным тарифам. Во многих машинах можно оплатить поездку не только наличными, но банковской карточкой, водитель выдаст пассажиру и кассовый чек. Выберите в нашем рейтинге лучшее такси из огромного количества городских служб. Предварительно заказывая такси, вы можете сами выбрать любой из комфортабельных автомобилей. В автопарке практически всех компаний большой выбор самых современных авто различного класса. Если вам нужно недорого вызвать такси по городу, лучшее решение – обратиться в наш профессиональный сервис.</p>
        <p>Заказ такси может потребоваться в самых разных случаях, будь то поездка на дачу, в санаторий или в гости. Конечно, можно воспользоваться и общественным транспортом, но тогда вы будете зависеть от его расписания, потратите на дорогу в несколько раз больше времени, будете вынуждены испытывать неудобства и перетаскивать багаж при пересадках. Другое дело – такси. Комфортный автомобиль с вежливым и опытным водителем подъедет к вам в течение нескольких минут и отвезет, куда скажете. Средная цена на услуги такси составляет 2-8 руб./км, посадка 10-80 рублей. Более точно узнать тарифы можно позвонив по номерам служб.</p>
        <p>{{ $city->description }}</p>
    </div>

@endsection
