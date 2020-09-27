@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Редактирование организации</h1>
@endsection

@section('js')
    <script src="/js/app.js"></script>
@endsection

@section('css')
@endsection

@section('content')
    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/home"><span itemprop="name">Панель Управления</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/admin/organizations/organization"><span itemprop="name">Организации</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
            <span itemprop="name">
                @if ($item->title)
                    {{ $item->title }}
                @else
                    Добавление новой записи
                @endif
            </span>
        </li>
    </ul>
    @php
        /** @var \App\Models\Organization $item */
    @endphp
    <div class="container">
        @include('organization.admin.organization.includes.result_messages')

    @if ($item->exists)
        <form method="POST" action="{{ route('organization.admin.organization.update', $item->id) }}" enctype="multipart/form-data">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('organization.admin.organization.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('organization.admin.organization.includes.item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('organization.admin.organization.includes.item_edit_add_col')
                </div>
            </div>
        </form>

        @if ($item->exists)
            <br>
            <form method="POST" action="{{ route('organization.admin.organization.destroy', $item->id) }}">
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
