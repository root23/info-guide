<div class="block-title">
    <span>Телефон</span>
</div>
<div class="block-content">
    <a href="tel:{{ $organization->phone }}">{{ $organization->phone }}</a>
</div>

<div class="block-title">
    <span>Адрес</span>
</div>
<div class="block-content">
    <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{{ $organization->address }}</p>
    <div class="map-wrapper" style="height: 400px">
        @include('taxi.taxi.includes.map-block')
    </div>
</div>

<div class="block-title">
    <span>Добавить</span>
</div>
<div class="block-content">
    <a href="/register/" class="btn-add-taxi"><span><i class="fa fa-plus-square"></i>  Добавить компанию</span></a>
</div>

<div class="block-title">
    <span>Статистика</span>
</div>
<div class="block-content">
    <span class="stats-item"><b><i class="fa fa-map-marker"></i></b> {{ $cities_count }}</span>
    <span class="stats-item"><b><i class="fa fa-taxi"></i></b> {{ $taxis_count }}</span>
    <span class="stats-item"><b><i class="fa fa-comments"></i></b> {{ $reviews_count }}</span>
</div>
