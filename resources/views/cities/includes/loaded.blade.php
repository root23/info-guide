<script type="application/javascript" src="{{ asset('js/city.js') }}"></script>

<ul class="cities-list">
    @foreach($paginator as $city)
        <li class="item-city"><a href="/cities/{{ $city->slug }}/">
                <span class="city-title">{{ $city->name }}</span>
                <span class="taxi-count"> {{ $city->organizationsCount }} организаций</span>
            </a></li>
    @endforeach
</ul>

@if ($paginator->total() > $paginator->count())
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
