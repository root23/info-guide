@extends('layouts.app')

@section('css-section')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js-section')
    <script>
        $(document).ready(function() {
            $('#content_raw').summernote();
        });
    </script>
@endsection

@section('content')
    @php
        /** @var \App\Models\BlogPost $item */
    @endphp
    <div class="container">
        @include('blog.admin.posts.includes.result_messages')

    @if ($item->exists)
        <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}" enctype="multipart/form-data">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('blog.admin.posts.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.posts.includes.item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.posts.includes.item_edit_add_col')
                </div>
            </div>
        </form>

        @if ($item->exists)
            <br>
            <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
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
