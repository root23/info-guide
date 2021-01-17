<div class="search-suggestions-block hide-block">
    <div class="search-suggestions-container">
        <div class="suggest-search-result hide-block">
            <ul class="list-results"></ul>
        </div>
        <div class="suggest-search-result-empty">
            <p>Для поиска введите имя организации, адрес, район и другие ключевые слова</p>
            <ul class="suggest-list">
                @if (!empty($geo_city))
                    <li class="suggest-item">
                        <a href="/taxi/cities/{{ $geo_city->slug }}" class="suggest-link">Такси</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/st/" class="suggest-link">СТО</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/medicina/" class="suggest-link">Медицина</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/restorany/" class="suggest-link">Рестораны</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/sport/" class="suggest-link">Спорт</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/magaziny/" class="suggest-link">Магазины</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/kinoteatry/" class="suggest-link">Кинотеатры</a>
                    </li>
                    <li class="suggest-item">
                        <a href="/kompanii/{{ $geo_city->slug }}/bary-i-kluby/" class="suggest-link">Бары и клубы</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
