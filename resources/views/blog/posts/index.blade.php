@extends('layouts.app')
@section('page-title')
    <title itemprop="headline">Статьи - {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('css-section')
    <link href="{{ asset('css/blog-cards.css') }}" rel="stylesheet">
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
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name">Статьи</span>
                <meta itemprop="position" content="2" />
            </li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-8" itemscope itemtype="http://schema.org/Blog">
                @include('blog.posts.includes.blog_posts_list')
            </div>
            <div class="col-md-4">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
