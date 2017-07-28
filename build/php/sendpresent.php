<?php

require_once "SendMailSmtpClass.php";

$mlogin = "login";
$mpass = "pass";
$msmtp = "smtp";
$mname = "name";

$mailSMTP = new SendMailSmtpClass($mlogin, $mpass, $msmtp, $mname);
// $mailSMTP = new SendMailSmtpClass('логин', 'пароль', 'хост', 'имя отправителя');

$sendto = "alex_z@mail.franch5.ru, zvnfranch5@yandex.ru, franchaizing-5@yandex.ru, platformarf@mail.ru";
$city = nl2br($_POST['city']);
$age = nl2br($_POST['age']);
$business = nl2br($_POST['business']);
$volume = nl2br($_POST['volume']);
$phone = nl2br($_POST['phone1']);
$name = nl2br($_POST['name1']);

$content = "Заявка с сайта Платформа";

// Формирование заголовка письма
$subject  = $content;
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: no-reply@no-reply.ru" . "\r\n";
$headers .= "Reply-To: Без ответа". "\r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'5>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Письмо с сайта Платформа</h2>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$phone."</p>\r\n";
$msg .= "<p><strong>ФИО:</strong> ".$name."</p>\r\n";
$msg .= "<p><strong>Город:</strong> ".$city."</p>\r\n";
$msg .= "<p><strong>Возраст:</strong> ".$age."</p>\r\n";
$msg .= "<p><strong>Бизнес:</strong> ".$business."</p>\r\n";
$msg .= "<p><strong>Инвестиции:</strong> ".$volume."</p>\r\n";
$msg .= "</body></html>";

$result =  $mailSMTP->send($sendto, $subject, $msg, $headers); // отправляем письмо
// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Заголовки письма');

if($result === true){
    echo "Письмо успешно отправлено";
}else{
    echo "Письмо не отправлено. Ошибка: " . $result;
}

?>


