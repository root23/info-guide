$(document).ready(function () {
    load_comments(window.taxi_id);

    function load_comments(taxi_id) {
        $.ajax({
            url:"/taxi/get_reviews?taxi_id=" + taxi_id,
            success: function (data) {
                $('.reviews-wrap').html('');
                $('.reviews-wrap').html(data);
            }
        })
    }

    // function fetch_data(page, query) {
    //     $.ajax({
    //         url:"/taxi/search_city?page=" + page + "&query=" + query,
    //         success: function (data) {
    //             $('.cities-list-wrap').html('');
    //             $('.cities-list-wrap').html(data);
    //         }
    //     });
    // }
    //
    // $('.city-input').keyup(function () {
    //     var query = $(this).val();
    //     fetch_data(1, query);
    // });
    //
    // $('.pagination').addClass('justify-content-center');
    // $('.pagination').addClass('flex-wrap');

});
