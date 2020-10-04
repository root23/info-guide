@extends('layouts.app')

@section('js-section')
    <script src="https://www.google.com/recaptcha/api.js?render=6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LemMuoUAAAAAL7NRjBrt95YbDrSspYIzr6rg7VX', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
@endsection

@section('page-title')
    <title>Контакты - {{ config('app.name', 'Laravel') }}</title>
@endsection

@section('content')
    <div class="container cities-title">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active">Контакты</li>
        </ul>

        @if (session('success'))
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Форма обратной связи -->
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input name="name" value=""
                       id="name"
                       type="text"
                       class="form-control"
                       minlength="3"
                       placeholder="Введите Ваше имя (2-30 символов)"
                       required>
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input name="email" value=""
                       id="email"
                       type="email"
                       class="form-control"
                       minlength="3"
                       placeholder="Введите Ваш email"
                       required>
            </div>
            <div class="form-group">
                <label for="message">Текст сообщения</label>
                <textarea name="message"
                          id="message"
                          rows="3"
                          class="form-control"
                          rows="20"
                          style="min-height: 260px;"
                            required>
                            </textarea>
            </div>
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="#" class="confid-link">Политика конфиденциальности</a>
        </form>
    </div>

@endsection
