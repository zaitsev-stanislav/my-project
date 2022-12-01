<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset='UTF-8'>
    <!--	<script src='custom-scripts/bd.min.js?v=5' defer></script>-->
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name='application-name' content='&nbsp;'>
    <meta name='msapplication-TileColor' content='#FFFFFF'>
    <meta name='msapplication-TileImage' content='/images/favicons/mstile-144x144.png'>

    <link rel='icon' href='/favicon.ico' type='image/x-icon'>
	<link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">


    <title><?= $XNOW["title"] ?></title>
    <meta name='description' content='<?= $XNOW["meta_description"] ?>'>
    <meta property='og:title' content='<?= $XNOW["title"] ?>'>
    <meta property='og:description' content='<?= $XNOW["meta_description"] ?>'>
    <meta property='og:locale' content='ru_RU'>
    <meta property='og:type' content='website'>
    <meta property='og:url' content='bio-alta.ru/<?= $XNOW["id"] ?>'>
    <meta property='og:image' content='bio-alta.ru/1.jpg'>
    <meta property='og:image:width' content='735'>
    <meta property='og:image:height' content='535'>
    <!--	-->
    <meta name='twitter:card' content='summary_large_image'/>
    <meta name='twitter:title' content='<?= $XNOW["title"] ?>'>
    <meta name='twitter:description' content='<?= $XNOW["meta_description"] ?>'>
    <meta name='twitter:image' content='bio-alta.ru/1.jpg'>

    <!--	-->
    <link rel="stylesheet" href="/assets/css/style.css"/>
<!--    <link rel="stylesheet" href="/assets/css/my-form.css"/>-->

</head>
<div class="lines">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<!-- ШАПКА -->
<header class='wrapper'>
    <div class="header">
        <a href="/" class="-logo">
            <img src="./assets/images/logo.png" alt="ПСК ТехноСтрой">
        </a>
        <div class="-desc">
            Надежная строительная компания
        </div>
        <div class="-info">
            Понедельник - пятница <br>
            С 9:00 до 19:00
        </div>
        <div class="-phones">
            <a class="text_color" href="#">+7 707 221 10 50</a>
            <p>Заказать звонок</p>
        </div>
    </div>
    <div class="header_links">
        <div class="header_links_burger burger_js"></div>
        <ul class="header_nav header_links_js">
            <li class="-img">
                <a href="/">
                    <img src="./assets/images/logo.png" alt="Лого в шапке">
                </a>
            </li>
            <li>
                Виды деятельности
                <ul>
                    <li>
                        <a href="/remont-elektrostanczij">Ремонт электростаний</a>
                    </li>
                    <li>
                        <a href="/obshhestroitelnye-raboty">Общестроительные работы</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/nashi-raboty">Наши работы</a>
            </li>
            <li>
                <a href="/kontakty">Контакты</a>
            </li>
            <li>
                <a href="/vacancii">Вакансии</a>
            </li>
            <li>
                <a href="/zakupki">Закупки</a>
            </li>
            <li class="-close close_js"></li>
        </ul>
    </div>
</header>
<!-- ШАПКА КОНЕЦ-->
<body>
