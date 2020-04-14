// Live search /cities/ page
$(document).ready(function () {

    function fetch_data(page, query) {
        $.ajax({
            url:"/taxi/search_city?page=" + page + "&query=" + query,
            success: function (data) {
                $('.cities-list-wrap').html('');
                $('.cities-list-wrap').html(data);
            }
        });
    }

    $('.city-input').keyup(function () {
        var query = $(this).val();
        fetch_data(1, query);
    });

});
