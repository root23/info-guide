$(document).ready(function () {
    function load_comments(organization_id) {
        $.ajax({
            url:"/organization/get_reviews?organization_id=" + organization_id,
            success: function (data) {
                $('.reviews-wrap').html('');
                $('.reviews-wrap').html(data);
            }
        })
    }
    load_comments(window.organization_id);

    $('.form-group .btn-primary').click(function (e) {
        // e.preventDefault();
        $.ajax({
            url:"/organization/reviews",
            type: 'POST',
            data: $('#comment_form').serialize(),
            success: function (data) {
                load_comments(window.organization_id);
                getRecaptcha();
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".reviews-wrap").offset().top
                }, 1000);
            }

        })
    })

    // $('.pagination').addClass('justify-content-center');
    // $('.pagination').addClass('flex-wrap');

});


