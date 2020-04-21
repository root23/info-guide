@extends('layouts.app')

@section('page-title')
<title>&#128661; Справочник телефонов такси в Россиии - {{ config('app.name', 'Laravel') }} </title>
@endsection

@section('page-meta')
<meta name="description" content="Актуальные телефоны такси в регионах России. Заказать такси, адреса, телефоны и цены. Отзывы о такси."/>
@endsection

@section('title', 'Main')

@section('content')
    <div class="container main-title">
        <h1 class="title">Телефоны такси в Вашем городе</h1>
        <h2>Быстрый поиск перевозчиков по всей России</h2>
        <p>info-guide - это сервис, предназначенный для поиск службы такси во всех городах России.</p>
        <p>На сайте представлены телефоны служб такси, работающих в каждом городе.</p>
        <p>Преимущества сервиса:</p>
        <ul>
            <li><b>Актуальная база данных</b>, которая пополняется при взаимодействии с перевозчиками.</li>
            <li>Удобная навигация и <b>живой поиск по сайту</b>.</li>
            <li>Возможность оставлять <b>отзывы о компаниях</b>.</li>
            <li><b>Вызов такси онлайн</b> в один клик</li>
        </ul>
        <p>При заказе такси наугад, клиент может заказать такси с некомфортным и старым автопарком, некультурными водителями. Компании, размещенные на нашем сайте,
        эксплуатируют исправные автомобили уровня Комфорт и Люкс.</p>
        <h2>Как заказать такси?</h2>
        <p>На сайте можно удобно выбрать необходимый город, используя функцию живого поиска. Заказав в один клик такси, далее по телефону можно будет обговорить
        особые условия поездки.</p>

        <a href="/taxi/cities/" class="btn-start-search"><span>Перейти к поиску</span></a>

    </div>
@endsection

@section('js')

@endsection
