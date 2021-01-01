$(document).ready(function () {
    $(document).click(function (e) {
        // Ничего не делать (клик по строке поиска)
        if ($(e.target).closest('.search-suggestions-block').length && !$('.search-suggestions-block').hasClass('hide-block')) {
            return;
        }

        // Отобразить форму с поисковыми подсказками
        if ($(e.target).closest('.search-form-input').length) {
            $('.search-suggestions-block').removeClass('hide-block');
            $('.overlay').removeClass('hide-block');
            $('body').css({
                overflow: 'hidden',
                height: '100%',
            });
            return;
        }

        // Клик вне поиска - убрать подсказки
        $('.search-suggestions-block').addClass('hide-block');
        $('.overlay').addClass('hide-block');
        $('body').css({
            overflow: 'auto',
            height: 'auto%',
        });
    })
})
