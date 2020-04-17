@foreach($paginator as $item)
    <div class="card">
        <img class="card-img" src="/uploads/{{ $item->img }}" alt="post image">

        <div class="card-body">
            <h4><a href="{{ $item->slug }}">{{ $item->title }}</a></h4>
            <p class="card-text">
                {{ $item->excert }}
            </p>
            <a href="/blog/posts/{{ $item->slug }}" class="btn btn-show">Подробнее</a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div class="views">
                <i class="fa fa-calendar text-info"></i> {{ $item->published_at }}
            </div>
            <div class="stats">
                <i class="fa fa-eye"></i> {{$item->view_count}}
{{--                <i class="fa fa-comment"></i> 12--}}
            </div>
        </div>
    </div>
@endforeach



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
