<form class="header-search-form" action="/search/" method="POST" onsubmit="event.preventDefault();">
    @csrf
    <label class="search-form-block">
        <div class="start-search">
            <i class="fa fa-search"></i>
        </div>
        <div class="form-controls">
            <button class="reset"><i class="fa fa-times"></i></button>
        </div>
        <span class="search-form-input">
            <input type="text" value="" placeholder="Поиск организаций и услуг">
        </span>
    </label>
    <span class="search-close" style="display: none">Отмена</span>
</form>
