@foreach($taxis as $taxi)
    <div class="item-company">
        <div class="row justify-content-center">
            <div class="col-md-9 item-company-right-col">
                <a target="_blank" href="#" class="title">{{ $taxi->title }}</a>
                <div class="info">
                    {{ $taxi->description }}
                </div>
            </div>
            <div class="col-md-3 item-company-left-col">
                <a href="#" class="review">
                    <i class="fa fa-comments"></i> Отзывы (0)
                </a>
                <a href="tel:+88005553535" class="order-taxi">Заказать такси</a>
            </div>
        </div>
    </div>
@endforeach

@if ($taxis->total() > $taxis->count())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $taxis->links() }}
                </div>
            </div>
        </div>
    </div>
@endif


