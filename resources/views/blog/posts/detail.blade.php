@extends('layouts.app')
@section('page-title')
    <title>{{ $item->title }} - {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/blog/posts/">Статьи</a></li>
            <li class="breadcrumb-item active">{{ $item->title }}</li>
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-9">
                {!! $item->content_html !!}
            </div>
            <div class="col-md-3">
                @include('taxi.cities.includes.right-col-default')
            </div>
        </div>
    </div>

@endsection
