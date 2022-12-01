<?php
include_once "../public_html/index.php";
function phpmailer($komy, $title, $htmlBody, $textBody = '', $attach = [])
{     //$attach - файлы
    $config = array(
        'from_name' => '',             //отображение
        'from_email' => '',    //отображение
        'smtp_mode' => 'disabled',
        'smtp_host' => '',
        'smtp_port' => '25',
        'smtp_username' => '',
        'smtp_pw' => '',
    );
    require_once 'class.phpmailer.php';
    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->ClearAddresses();
    $mail->ClearAttachments();
    //АВТОРИЗАЦИЯ
    $mail->Host = $config['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['from_email'];
    $mail->Password = $config['smtp_pw'];
    $mail->SMTPSecure = 'TLS';
    $mail->Port = $config['smtp_port'];
    $mail->CharSet = 'UTF-8';
//  прикрепляем файл  ФАЙЛ
    $mail->addAttachment($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']);
    //ОТ КОГО
    $mail->From = $config['from_email'];
    $mail->FromName = $config['from_name'];
    if (!empty($attach)) {
        foreach ($attach as $k => $v) {        //$k
            $mail->addAttachment(HOME . $v, $v);
        }
    }
    //КОМУ
    $mail->AddAddress($komy);
    $mail->AddReplyTo($config['from_email'], $config['from_name']);   //адрес ответа
    //ПИСЬМО
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $htmlBody;
    $mail->AltBody = (!empty($textBody)) ? $textBody : $htmlBody;
    $mail->IsSendmail();
    if ($mail->Send()) {
        return 1;
    } else {
        return 0;
    }
}




//Данные для телеги 1001532848897
$token = '';
$chat_id = '';
if (isset($_POST)) {
    $data = [];
    foreach ($_POST as $key => $value) {

        $data[] = '<p><b>' . $key . ' : ' . '</b>' . $value . '</p>';
    }
    for ($i = 1; $i <= count($data); $i++) {
        $data[0] = $data[0] . "\n" . $data[$i];
    }

    $dataTelega = [];
    foreach ($_POST as $key => $value) {
        $dataTelega[0] = $dataTelega[0] . '<b>' . $key . ': </b>' . $_POST[$key] . "\n";
    }

    $htmlBody = <<<HREF
<head>
<title>3АЯВКА</title>
</head>
<body>

<h2>3АЯВКА С САЙТА!</h2>
$data[0]
<br>
<br>
<p>Отсюда: <a href="{$_SERVER['HTTP_REFERER']}" title="PHP Freaks">{$_SERVER['HTTP_REFERER']}</a></p>
HREF;

    $m1 = phpmailer('vik.stroeff@yandex.ru', 'СЕПТИК АЛЬТА БИО - маркетолог', $htmlBody);
    $m1 = phpmailer('2001_stas@mail.ru', 'СЕПТИК АЛЬТА БИО - маркетолог', $htmlBody);


    $telegram = 0;
    if (1) {
        $parametrs = [
            'chat_id' => $chat_id,
            'parse_mode' => 'html',
            'text' => $dataTelega[0]
        ];
        $url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($parametrs);
        file_get_contents($url);
        $telegram = 1;
    }

    if ($m1 || $telegram) {
//    if ($telegram) {
        echo 'success';
//        echo 0;
    } else {
        echo 0;
    }
}
exit;


?>