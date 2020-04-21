@extends('layouts.app')
@section('page-title')
    <title itemprop="headline">Статьи - {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('css-section')
    <link href="{{ asset('css/blog-cards.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
            </li>
            <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name">Статьи</span>
            </li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-9" itemscope itemtype="http://schema.org/Blog">
                @include('blog.posts.includes.blog_posts_list')
            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
