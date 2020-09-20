$(document).ready(function() {
    $('.categories-item_card_container').mouseover(function () {
        $(this).find('.categories-icon').css('background-color', '#f65');
        $(this).find('.categories-icon').css('color', '#fff');
    })
    .mouseout(function () {
        $(this).find('.categories-icon').css('background-color', '#fff');
        $(this).find('.categories-icon').css('color', '#f65');
    });

});

