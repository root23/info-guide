$(document).ready(function () {



    function load_comments(taxi_id) {
        $.ajax({
            url:"/taxi/get_reviews?taxi_id=" + taxi_id,
            success: function (data) {
                $('.reviews-wrap').html('');
                $('.reviews-wrap').html(data);
            }
        })
    }
    load_comments(window.taxi_id);

    $('.form-group .btn-primary').click(function (e) {
        // e.preventDefault();
        $.ajax({
            url:"/taxi/reviews",
            type: 'POST',
            data: $('#comment_form').serialize(),
            success: function (data) {
                load_comments(window.taxi_id);
                getRecaptcha();
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("h2").offset().top
                }, 1000);
            }

        })
    })

    // $('.pagination').addClass('justify-content-center');
    // $('.pagination').addClass('flex-wrap');

});


