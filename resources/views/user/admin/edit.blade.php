@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Редактирование пользователя: {{ $user->name }}</h1>
@endsection

@section('js')
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/home"><span itemprop="name">Панель Управления</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/admin/users"><span itemprop="name">Пользователи</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
            <span itemprop="name">
                @if ($user->name)
                    {{ $user->name }}
                @else
                    Новый пользователь
                @endif
            </span>
        </li>
    </ul>
    @php
        /** @var \App\User $user */
    @endphp
    <div class="container">
        @include('user.admin.includes.result_messages')

        @if ($user)
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('user.admin.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-4">
                                @include('user.admin.includes.item_edit_add_col')
                            </div>
                        </div>
                    </form>

                    @if ($user)
                        <br>
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
        @endif
    </div>
@endsection
