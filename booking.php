<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];


// Формирование самого письма
$title = "Новая бронь Best Tour Plan";
$body = "
<h2>Новая бронь</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br>
<b>E-mail:</b> $email<br><br>
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
    $mail->Password   = 'G31q76ss1'; // Пароль на почте
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

