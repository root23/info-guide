<h3 style="margin-top: 20px;">Оставить отзыв о {{ $taxi->title }}</h3>

<form method="POST" id="comment_form" action="javascript:void(0)">
    @csrf

    <div class="form-group">
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
        <label for="message">Текст комментария</label>
        <textarea name="message"
                  id="message"
                  rows="3"
                  class="form-control"
                  rows="5"
                  style=""></textarea>
        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
        <input type="hidden" name="taxi_id" id="taxi_id" value="{{ $taxi->id }}">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
