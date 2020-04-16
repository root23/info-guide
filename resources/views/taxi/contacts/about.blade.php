@extends('layouts.app')

@section('js-section')
@endsection

@section('page-title')
    <title>О нас - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active">О нас</li>
        </ul>


    </div>

@endsection
