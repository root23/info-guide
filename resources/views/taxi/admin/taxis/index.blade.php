@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Такси</h1>
@stop

@section('js')
@endsection

@section('content')
    <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item">
            <a itemprop="item" href="/home"><span itemprop="name">Панель Управления</span></a>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active">
            <span itemprop="name">Такси</span>
        </li>
    </ul>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('admin.taxis.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $taxi)
                                @php /** @var \App\Models\Taxi $taxi */ @endphp
                                <tr>
                                    <td>{{ $taxi->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.taxis.edit', $taxi->id) }}">
                                            {{ $taxi->title }}
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($taxi->updated_at)->format('d.M.H:i') }}</td>
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
