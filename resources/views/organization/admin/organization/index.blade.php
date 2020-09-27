@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Организации</h1>
@stop

@section('content')
    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/home"><span itemprop="name">Панель Управления</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
            <span itemprop="name">Организации</span>
        </li>
    </ul>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('organization.admin.organization.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\Organization $item */ @endphp
                                <tr @if (!$item->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->category->title }}</td>
                                    <td>
                                        <a href="{{ route('organization.admin.organization.edit', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M.H:i') : '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
