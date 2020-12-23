// Live search /cities/ page
$(document).ready(function () {

    function fetch_data(page, query, is_for_company=false) {

        let _url = "/taxi/search_city?page=" + page + "&query=" + query;
        if (is_for_company) {
            _url += "&is_for_company=1";
        } else {
            _url += "&is_for_company=0";
        }

        $.ajax({
            url:_url,
            success: function (data) {
                $('.cities-list-wrap').html('');
                $('.cities-list-wrap').html(data);
            }
        });
    }

    $('.city-input').keyup(function () {
        var query = $(this).val();
        // К инпуту добавлен класс for_company в том случае, если это страница городов с компаниями
        // Поэтому третьим аргументом передается наличие класса в инпуте
        fetch_data(1, query, $(this).hasClass('for_company'));
    });

    $('.pagination').addClass('justify-content-center');
    $('.pagination').addClass('flex-wrap');

});
