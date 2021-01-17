$(document).ready(function () {

    // Ввод в поисковую строку
    $('.search-form-input input').on("change paste keyup", function () {
        let query = $(this).val();

        if (query.length < 2) {
            $('.suggest-search-result').addClass('hide-block');
            $('.list-results').empty();
            query = $('.search-form-input input').val();
            return;
        }

        $.ajax({
            url: '/search',
            data: {
                search: query,
            },
            success: function (data) {
                let items = data.data;
                if (items.length > 0) {
                    $('.suggest-search-result').removeClass('hide-block');
                } else {
                    if (!$('.suggest-search-result').hasClass('hide-block')) {
                        $('.suggest-search-result').addClass('hide-block');
                        return;
                    }
                }
                $('.list-results').empty();
                for (var i = 0; i < items.length; i++) {
                    var obj = items[i];
                    let html = '<li class="result-item">';
                    html += '<a href="' + items[i].link + '" class="result-item-link">';
                    html += '<span class="result-icon"><i class="fa fa-search"></i></span>';
                    html += '<span class="result-text">' + items[i].title + '</span></a></li>';
                    $('.list-results').append(html);
                }
            }

        });
    });

    // Очистка поля ввода
    $('.form-controls .reset .fa-times').click(function () {
       $('.search-form-input input').val('');
    });

    $(document).click(function (e) {
        // Ничего не делать (клик по строке поиска)
        if (($(e.target).closest('.search-suggestions-block').length || $(e.target).closest('.navbar').length)
            && !$('.search-suggestions-block').hasClass('hide-block')) {
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

            // mobile version
            if (window.matchMedia('(max-width: 768px)').matches) {
                $('.navbar-brand').hide();
                $('.navbar-toggler').hide();
                $('.search-close').show();
                $('.search-form-block .form-controls').css('right', '50px');
            }

            return;
        }

        // Клик вне поиска - убрать подсказки
        $('.search-suggestions-block').addClass('hide-block');
        $('.overlay').addClass('hide-block');
        $('body').css({
            overflow: 'auto',
            height: 'auto%',
        });
        // mobile version
        if (window.matchMedia('(max-width: 768px)').matches) {
            $('.navbar-brand').show();
            $('.navbar-toggler').show();
            $('.search-close').hide();
            $('.search-form-block .form-controls').css('right', '0');
        }

    })
})
