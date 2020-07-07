$(document).ready(function () {
    $('.txt2').click(function (e) {
        $.ajax({
            url:"/utils/get-city",
            type: 'GET',
            data: $('#search-form').serialize(),
            success: function (data) {
                console.log(data);
            }

        })
    });
});
