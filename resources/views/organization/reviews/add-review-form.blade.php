<h3 style="margin-top: 20px;">Оставить отзыв о {{ $organization->title }}</h3>

<form method="POST" id="comment_form" action="javascript:void(0)">
    @csrf

    <div class="form-group review-form">
        <div class="form-group">
            <label for="name">Ваше имя</label>
            <input name="name" value=""
                   id="name"
                   type="text"
                   class="form-control"
                   minlength="3"
                   required>
        </div>
        <div class="form-group">
            <label for="email">Ваше email</label>
            <input name="email" value=""
                   id="email"
                   type="email"
                   class="form-control"
                   minlength="3"
                   required>
        </div>

        <div class="form-group">
            <div class="rating-area">
                <span style="display: block">Поставьте оценку организации</span>
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="5"><i class="fa fa-star"></i></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="5"><i class="fa fa-star"></i></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="3"><i class="fa fa-star"></i></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="2"><i class="fa fa-star"></i></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="1"><i class="fa fa-star"></i></label>
            </div>
        </div>

        <textarea name="message"
                  id="message"
                  rows="3"
                  class="form-control"
                  rows="5"
                  placeholder="Текст комментария"
                  style=""></textarea>
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
        <input type="hidden" name="organization_id" id="organization_id" value="{{ $organization->id }}">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
