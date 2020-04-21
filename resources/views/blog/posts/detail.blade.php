@extends('layouts.app')
@section('page-title')
    <title itemprop="headline">{{ $item->title }} - {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('page-meta')
    <meta name="description" itemprop="description" content="{{ $item->meta_description }}"/>
@endsection
@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/"><span itemprop="name">Главная</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                <a itemprop="item" href="/blog/posts/"><span itemprop="name">Статьи</span></a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
                <span itemprop="name">{{ $item->title }}</span>
            </li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="post-content">
                    {!! $item->content_html !!}
                </div>
            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
