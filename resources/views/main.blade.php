@extends('layouts.app')

@section('page-title')
<title>&#128661; Главная - {{ config('app.name', 'Laravel') }} </title>
@endsection

@section('title', 'Main')

@section('content')
    <div class="container main-title">
        <h1 class="title">Телефоны такси в Вашем городе</h1>
    </div>
@endsection

@section('js')

@endsection
