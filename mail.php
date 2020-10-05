<?php
 
require 'PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$subject = $_POST['form_subject'];
 
//Дебаг
//0 = off (for production use)
//1 = клиентские сообщения
//2 = серверные и клиентские сообщения
//$mail->SMTPDebug = 2;
 
$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru'; //gmail: smtp.gmail.com
$mail->SMTPAuth = true;
$mail->Username = 'websitemailbox@yandex.ru';
$mail->Password = 'Website__mailb0X';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setLanguage('ru');
$mail->setFrom('websitemailbox@yandex.ru', 'Robot');
$mail->addAddress('azizdusmuhamedov@gmail.com', 'My Friend');    //Получатель
//$mail->addAddress('my.friend2@gmail.com');              //Еще получатель
//$mail->addReplyTo('my.friend3@gmail.com', 'My Friend 3');
//$mail->addCC('my.friend.cc@example.com');               //Копия
//$mail->addBCC('my.friend.bcc@example.com');             //Скрытая копия
 
//$mail->addAttachment('/path/to/file.zip');              //Прикрепить файл
//$mail->addAttachment('/path/to/image.jpg', 'new.jpg');  //Прикрепить файл + задать имя
$mail->isHTML(true);
 
$mail->Subject = 'Тема письма';
$mail->Body    = '<b>HTML</b> версия письма';
$mail->AltBody = 'Текстовая версия письма, без HTML тегов (для клиентов не поддерживающих HTML)';
 
//Отправка сообщения
if(!$mail->send()) {
    echo 'Ошибка при отправке. Ошибка: ' . $mail->ErrorInfo;
} else {
    echo 'Сообщение успешно отправлено';
}