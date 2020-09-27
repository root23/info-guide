@foreach($organizations as $item)
    <div class="item-company">
        <div class="row justify-content-center">
            <div class="col-md-9 item-company-right-col">
                <a href="/taxi/taxis/{{ $item->id }}/" class="title">{{ $item->title }}</a>
                <div class="info">
                    {{ $item->description }}
                </div>
            </div>
            <div class="col-md-3 item-company-left-col">
                <a href="/taxi/taxis/{{ $item->id }}/#reviews-title" class="review">
                    <i class="fa fa-comments"></i> Отзывы
                </a>
                <a href="tel:{{ $item->phone }}" class="order-taxi">Заказать такси</a>
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


