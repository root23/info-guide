$(document).ready(function() {
    $('.categories-item_card_container').mouseover(function () {
        $(this).find('.categories-icon').css({
            'background-color': '#BB8866',
            'transition': 'all .3s'
        });
        $(this).find('.categories-item_name').css({
            'background-color': '#BB8866',
            'transition': 'all .3s'
        });
        $(this).find('.categories-item_name').css({
            'color': '#fff',
            'transition': 'all .3s'
        });
        $(this).find('.categories-icon').css({
            'color': '#fff',
            'border-right': 'none',
            'transition': 'all .3s'
        });
    })
    .mouseout(function () {
        $(this).find('.categories-icon').css('background-color', '#fff');
        $(this).find('.categories-item_name').css('background-color', '#fff');
        $(this).find('.categories-item_name').css('color', '#616161');
        $(this).find('.categories-icon').css({
            'color': '#BB8866',
            'border-right': '1px solid #e0e0e0',
        });
    });

    $('.btn-visitors').click(function (e) {
        e.preventDefault();
        var my_element = document.getElementById("for-citizen");
        my_element.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
    })
});

