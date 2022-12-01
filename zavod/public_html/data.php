<?php
const PHONE = '+7 (931) 304-36-48';
const PHONE_LINK = '+79313043648';
const MAIL = 'info@bio-alta.ru';
const WHATSAPP_LINK = '+79313043648';
const ADDRESS = "Москва, Пятницкое шоссе, 39";
$REDIRECT = [
//    Эти 2 записи должны быть всегда
    "404" => [
        "title" => "Страница не найдена",
        "meta_description" => "Упс, вы попали на страницу которой не существует. Пожалуйста, вернитесь на главную",
        "id" => "404",
        "page" => "404"
    ],
    "error" => [
        "page" => "error"
    ],
//    Эти 2 записи должны быть всегда
//    Только главная страница выглядит таким образом. Пустые ковычки и только page = index.
    "" => [
        "title" => "СЕПТИК АЛЬТА БИО КУПИТЬ в МОСКВЕ - ✔️ ОФИЦИАЛЬНЫЙ САЙТ И ЦЕНЫ",
        "meta_description" => "✔️СЕПТИК АЛЬТА БИО КУПИТЬ в МОСКВЕ с ОФИЦИАЛЬНЫМИ ЦЕНАМИ. Монтаж 1 день. Смета БЕЗ ДОПЛАТ. Рассрочка 0%. ДОСТАВКА + ГАРАНТИЯ. ✔️ Расчет БЕСПЛАТНО!",
        "id" => "",
        "page" => "index"
    ],
//    Остальные страницы
    "vacancii" => [
        "title" => "vidy-rabot",
        "meta_description" => "vidy-rabot",
        "id" => "vacancii",
        "page" => "vacancii"
    ],
    "kontakty" => [
        "title" => "vidy-rabot",
        "meta_description" => "vidy-rabot",
        "id" => "kontakty",
        "page" => "kontakty"
    ],
    "remont-elektrostanczij" => [
        "title" => "vidy-rabot",
        "meta_description" => "vidy-rabot",
        "id" => "remont-elektrostanczij",
        "page" => "remont-elektrostanczij"
    ],
    "obshhestroitelnye-raboty" => [
        "title" => "vidy-rabot",
        "meta_description" => "vidy-rabot",
        "id" => "obshhestroitelnye-raboty",
        "page" => "obshhestroitelnye-raboty"
    ],
    "nashi-raboty" => [
        "title" => "vidy-rabot",
        "meta_description" => "vidy-rabot",
        "id" => "nashi-raboty",
        "page" => "nashi-raboty"
    ],
    "zakupki" => [
        "title" => "zakupki",
        "meta_description" => "zakupki",
        "id" => "zakupki",
        "page" => "zakupki"
    ],

];