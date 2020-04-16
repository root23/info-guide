@extends('layouts.app')
@section('page-title')
    <title>Статьи - {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('css-section')
    <link href="{{ asset('css/blog-cards.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active">Статьи</li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-9">
                @include('blog.posts.includes.blog_posts_list')
            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
