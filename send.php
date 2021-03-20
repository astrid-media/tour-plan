<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

if (empty($email)) {
   // Переменные, которые отправляет пользователь


// Формирование самого письма
$title = "Новое обращение Best Tour Plan";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'botyan-veronika@yandex.ru'; // Логин на почте
    $mail->Password   = '1804043nika'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('botyan-veronika@yandex.ru', 'Вероника Волкова'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('botyanveronika@gmail.com');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
header('Location: thankyou.html'); 

} else {

// Переменные, которые отправляет пользователь


// Формирование самого письма
$title_email = "Новый E-mail Best Tour Plan";
$body_email = "
<h2>Новый E-mail</h2>
<b>E-mail:</b> $email<br>
";

// Настройки PHPMailer
$msg = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg->isSMTP();   
    $msg->CharSet = "UTF-8";
    $msg->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $msg->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $msg->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $msg->Username   = 'botyan-veronika@yandex.ru'; // Логин на почте
    $msg->Password   = '1804043nika'; // Пароль на почте
    $msg->SMTPSecure = 'ssl';
    $msg->Port       = 465;
    $msg->setFrom('botyan-veronika@yandex.ru', 'Вероника Волкова'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $msg->addAddress('botyanveronika@gmail.com');  

// Отправка сообщения
$msg->isHTML(true);
$msg->Subject = $title_email;
$msg->Body = $body_email;    

// Проверяем отравленность сообщения
if ($msg->send()) {$result_email = "success";} 
else {$result_email = "error";}

} catch (Exception $e_email) {
    $result_email = "error";
    $status_email = "Сообщение не было отправлено. Причина ошибки: {$msg->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html'); 
}