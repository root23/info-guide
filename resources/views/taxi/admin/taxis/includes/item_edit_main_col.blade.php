@php
    /** @var \App\Models\Taxi $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Опубликовано
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="description">Адрес</label>
                            <input name="description" value="{{ $item->description }}"
                                   id="description"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Телефоны</label>
                            <textarea name="phone_number"
                                      id="phone_number"
                                      rows="3"
                                      class="form-control"
                                      rows="20"
                                      style="min-height: 560px;">{{ old('phone_number', $item->phone_number) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="meta_description">Мета-описание</label>
                            <input name="meta_description" value="{{ $item->meta_description }}"
                                   id="meta_description"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Ключевые слова</label>
                            <input name="meta_keywords" value="{{ $item->meta_keywords }}"
                                   id="meta_keywords"
                                   type="text"
                                   class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
