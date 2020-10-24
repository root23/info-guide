<div class="top-organizations">
    @foreach($top_organizations as $item)

        <div class="organization-item">
            <a href="/kompanii/{{ $city->slug }}/{{ $item->category->slug }}/{{ $item->slug }}">
                <img class="lazyload" src="/uploads/{{ $item->img }}">
                <span>{{ $item->title }}</span>
            </a>

        </div>
    @endforeach
</div>
