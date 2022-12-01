<?php session_start();
function dd($fn, $key = false)
{
    echo '<pre>';
    if (isset($fn))
        print_r($fn);
    else
        print_r('Нет такой переменной');
    echo '</pre>';
    if (!$key) exit();
}
include_once "data.php";

define('_3AKOH', 1);                    // Ключ безопасности для каждого файла
#КОНСТАНТЫ + MVC
define('domain', urldecode($_SERVER['SERVER_NAME']));                                                                        // fvforum.zak
define('fulldomain', $_SERVER["HTTP_X_FORWARDED_PROTO"] . '://' . domain);                                                            // http://fvforum.zak
define('request', urldecode($_SERVER['REQUEST_URI']));                                                                        // Полный URL путь                  - /name/?name=1
define('req_str', substr(request, 0, (strripos(request, '?') !== false) ? strripos(request, '?') : strlen(request)));                    // Только каталоги по факту         - /name/
define('req', (substr(req_str, strlen(req_str) - 1) == "/" && req_str != '/') ? substr(req_str, 0, strlen(req_str) - 1) : req_str);    // Только каталоги без "/" в конеце - /name
define('get', urldecode($_SERVER['QUERY_STRING']));                                                                        // Только GET

$url = explode('/', substr(req, 1));
const VER = '?111';
const APP = '../app/';
const LINK = '/';       // корень для внешних файлов например: /assets/theme/ относительно web
const PAGE = APP . 'pages/';
const INC = APP . 'include/';
const FORMA = '../forms/';




//исходная функция
function getOBJECT($url)
{
    $REDIRECT = $GLOBALS["REDIRECT"];
    if (isset($REDIRECT[$url])) {
        return $REDIRECT[$url];
    } else {
        return $REDIRECT['error'];
    }
}

$XNOW = getOBJECT($url[0]);

if ($url[0] == 'fn') {
    include_once FORMA . $url[0] . '.php';
} else {
    if ($url[0] == 'thanks' || $url[1] == 'thanks') {
        include_once PAGE . 'thanks.html';
        return;
    }

//  для страниц, у которых нет вложенности. (domen/page)
    else {
        $XNOW = getOBJECT($url[0]);
        //  Редирект не существующей страницы на страницу 404
        if ($XNOW["page"] == 'error' || !empty($url[1])) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
            include PAGE . '404.php';
            exit();
        }
        /*!!!!------------!!!!*/
        if (file_exists(PAGE . $XNOW["page"] . '.php')) {
            include_once INC . 'header.php';
            include_once PAGE . $XNOW["page"] . '.php';
            include_once INC . 'footer.php';
        }
        return;
    }
}




