$(document).ready(function () {
    var imgs = document.querySelectorAll(".lazyload");
    new lazyload(imgs);
    $('.pagination').addClass('justify-content-center');
    $('.pagination').addClass('flex-wrap');
})
