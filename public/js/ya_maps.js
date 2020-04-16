var myMap;
var mark_x = window.mark_x;
var mark_y = window.mark_y;
var taxi_title = window.taxi_title;
var taxi_phones = window.taxi_phones;
// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init () {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    myMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [mark_x, mark_y], // Москва
        zoom: 15
    }, {
        searchControlProvider: 'yandex#search'
    });
    myMap.geoObjects
        .add(new ymaps.Placemark([mark_x, mark_y], {
                balloonContent: taxi_phones,
                iconCaption: taxi_title,
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            }));
}


