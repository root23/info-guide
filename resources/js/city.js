// возвращает cookie если есть или undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ))
    return matches ? decodeURIComponent(matches[1]) : undefined
}

// уcтанавливает cookie
function setCookie(name, value, props) {
    props = props || {}
    var exp = props.expires

    if (typeof exp == "number" && exp) {
        var d = new Date()
        d.setTime(d.getTime() + exp*1000)
        exp = props.expires = d
    }

    if(exp && exp.toUTCString) {
        props.expires = exp.toUTCString()
    }

    value = encodeURIComponent(value)
    var updatedCookie = name + "=" + value

    for(var propName in props) {
        updatedCookie += "; " + propName
        var propValue = props[propName]
        if(propValue !== true) {
            updatedCookie += "=" + propValue
        }
    }
    document.cookie = updatedCookie

}

// удаляет cookie
function deleteCookie(name) {
    setCookie(name, null, { expires: -1 })
}

$(document).ready(function () {
    let user_city_cookie = getCookie('user_city_id');
    console.log(user_city_cookie);
    if (user_city_cookie == undefined && location.pathname != "/cities/") {
        document.getElementById("nav-city").click();
    }
    if (location.pathname == "/cities/") {
        $('.item-city').click(function (e) {
            let city_name = $(this).find('.city-title').html();
            deleteCookie('user_city_id');
            let date = new Date();
            let cookieLives = 10 * 24 * 60 * 60 * 1000; // set days
            date.setTime(date.getTime() + cookieLives);

            console.log(date.toUTCString());
            document.cookie = "user_city_id=" + city_name + '; path=/; expires=' + date.toUTCString();
        })
    }
})
