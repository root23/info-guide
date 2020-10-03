var myMap;
var mark_x = window.mark_x;
var mark_y = window.mark_y;
var title = window.title;
var phone = window.phone;
// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init () {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    myMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [mark_y, mark_x], // Москва
        zoom: 15
    }, {
        searchControlProvider: 'yandex#search'
    });
    myMap.geoObjects
        .add(new ymaps.Placemark([mark_y, mark_x], {
            balloonContent: phone,
            iconCaption: title,
        }, {
            preset: 'islands#icon',
            iconColor: '#0095b6'
        }));
}


