@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Категории организаций</h1>
@endsection

@section('js')
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content_raw').summernote();
        });
    </script>
@endsection

@section('content')
    @php /** @var \App\Models\OrganizationCategory $item */@endphp
    @if ($item->exists)
        <form method="POST" action="{{ route('organization.admin.categories.update', $item->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('organization.admin.categories.store') }}">
    @endif
        @csrf
        <div class="container">

            @php
            /** @var \Illuminate\Support\ViewErrorBag @errors */
            @endphp
            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('organization.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('organization.admin.category.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
