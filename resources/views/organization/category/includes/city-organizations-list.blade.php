@foreach($organizations as $item)
    <div class="item-company">
        <div class="row justify-content-center">
            <div class="col-md-3 item-company-image-col">
                <img class="lazyload" data-src="/uploads/{{ $item->img }}" alt="">
            </div>
            <div class="col-md-6 item-company-right-col">
                <a href="/kompanii/{{ $item->city->slug }}/{{ $item->category->slug }}/{{ $item->id }}/" class="title">{{ $item->title }}</a>
                <div class="info">
                    {{ strip_tags(Str::limit($item->content_raw, 90)) }}
                </div>
            </div>
            <div class="col-md-3 item-company-left-col">
                <a href="/kompanii/{{ $item->city->slug }}/{{ $item->category->slug }}/{{ $item->id }}/#reviews-title" class="review">
                    <i class="fa fa-comments"></i> Отзывы
                </a>
                <a href="tel:{{ $item->phone }}" class="order-taxi">Позвонить</a>
            </div>
        </div>
    </div>
@endforeach

@if ($organizations->total() > $organizations->count())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $organizations->links() }}
                </div>
            </div>
        </div>
    </div>
@endif


