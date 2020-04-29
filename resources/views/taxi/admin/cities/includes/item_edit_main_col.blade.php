@php
    /** @var \App\Models\BlogPost $item */
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
                            <label for="name">Заголовок</label>
                            <input name="name" value="{{ $item->name }}"
                                   id="name"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="name_for_display">Имя для отображения</label>
                            <input name="name_for_display" value="{{ $item->name_for_display }}"
                                   id="name_for_display"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                      id="description"
                                      rows="3"
                                      class="form-control"
                                      rows="20"
                                      style="min-height: 560px;">{{ old('description', $item->description) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                   id="slug"
                                   type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="seo_title">СЕО-заголовок</label>
                            <input name="seo_title" value="{{ $item->seo_title }}"
                                   id="seo_title"
                                   type="text"
                                   class="form-control">
                        </div>
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
