<?php 

require_once('phpmailer/PHPMailerAutoload.php');
require_once('database.php');
require_once('check_enter.php');

// PRODUCTION CASE
// $email = $_GET['email'];
// $unic = md5(uniqid(rand(), true));

// LOCALHOST CASE
$email = $_SESSION['email'];
$unic = md5(uniqid(rand(), true)); // create random value

$result = mysqli_query($connection,"UPDATE users SET Unic_Email_Token = '".$unic."' WHERE Email = '".$_SESSION['email']."'");

//Отправка письма клиенту с прайсом - можно что угодно отпарвить по такой схеме
$mail_price = new PHPMailer; // класс создаем
$mail_price->CharSet = 'utf-8'; // кодировка
$mail_price->isSMTP();   // протокол передачи 
$mail_price->Host = 'smtp.yandex.ru';  // сервак на майл
$mail_price->SMTPAuth = true; // авторизация нужна
$mail_price->Username = 'DYBOND'; 
$mail_price->Password = 'Dima_1990';
$mail_price->SMTPSecure = 'ssl'; // защита
$mail_price->Port = 465; // порт
$mail_price->setFrom('dybond@yandex.ru');
$mail_price->addAddress($email); 
$mail_price->isHTML(true);
$mail_price->Subject = 'Email verification';
$mail_price->Body    = 'http://localhost:8888/Todo-list/activate.php?email='.$email.'&unic='.$unic.'';
$mail_price->AltBody = '';
// $mail_price->addAttachment('price.docx');    
$mail_price->send();



?>