@extends('layouts.app')

@section('content')
    <div class="container cities-title">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>Службы такси в городах России</h1>
                <p>Выберите Ваш город из каталога служб такси в России и закажите такси по телефону. </p>

                <div class="cities-list-block">

                    <div class="city-filter">
                        <input type="text" class="city-input" placeholder="Введите название города">
                    </div>
                    <div class="cities-list-wrap">
                        @include('taxi.cities.includes.loaded')
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="block-info">
                    <a href="/taxi/cities/" target="_blank">
                        <img src="https://picsum.photos/250/300?random=2">
                    </a>
                </div>

                <div class="block-title">
                    <span>Статьи</span>
                </div>
                <div class="block-content">
                    <ul>
                        <li><a href="/blog/post/natus-laboriosam-quisquam-voluptatem-maxime-cumque">Статья 1</a></li>
                        <li><a href="/blog/post/sit-veniam-non-aut-dolores">Статья 2</a></li>
                        <li><a href="/blog/post/natus-laboriosam-quisquam-voluptatem-maxime-cumque">Статья 3</a></li>
                        <li><a href="/blog/post/sit-veniam-non-aut-dolores">Статья 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
