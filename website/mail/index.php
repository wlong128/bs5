<?php
// 匯入 PHPMailer 類別
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // 引入 composer 的 autoload

$mail = new PHPMailer(true); // true 啟用例外

try {
  //Server settings
  $mail->SMTPDebug = 2;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'your_email@gmail.com';  // 你的Gmail帳號
  $mail->Password = 'your_password'; // 你的Gmail密碼
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  //Recipients
  $mail->setFrom('from@example.com', 'Mailer');
  $mail->addAddress('recipient@example.com', 'Joe User'); // 收件人
  $mail->addReplyTo('info@example.com', 'Information');

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// include "PHPMailer-master/src/Exception.php";
// include "PHPMailer-master/src/PHPMailer.php";
// include "PHPMailer-master/src/SMTP.php";

// try {
// $mail = new PHPMailer(true);
// $mail->isSMTP();
// $mail->SMTPAuth = true;
// $mail->Host = "smtp.gmail.com"; //SMTP服務器
// $mail->Port = 465; //SSL預設Port 是465, TLS預設Port 是587
// // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //使用SSL, 如果是TLS 請改為 PHPMailer::ENCRYPTION_STARTTLS
// $mail->Username = "wlong128@gmail.com"; // 這裡填寫你的SMTP登入帳號, 例如 your.gmail.name@gmail.com 則填寫your.gmail.name
// $mail->Password = "730800@730800"; //這裡填寫你的SMTP登入密碼. 即是Gmail的密碼

// $mail->From = "wlong128@gmail.com"; //設定寄件人電郵
// $mail->FromName = "巫老師"; //設定寄件人名稱
// $mail->Subject = "This is my test email"; //設定郵件主題
// $mail->Body = "This is email body"; //設定郵件內容
// $mail->IsHTML(true); //設定是否使用HTML格式
// $mail->addAddress("wlong128@gmail.com", "烏龍"); //設定收件人電郵及名稱

// // $mail->addAddress("personB@gmail.com", "person B"); //同上
// // $mail->addCC("personC@gmail.com", "person C"); //設定收件人電郵及名稱(CC)
// // $mail->addBCC("personD@gmail.com", "person D"); //設定收件人電郵及名稱(BCC)
// // $mail->addAttachment("image1.jpg", "picture.jpg"); //設定附件, 對方會看到附件名稱為 picture.jpg
// if (!$mail->Send()) {
// echo "Mailer error: " . $mail->ErrorInfo;
// } else {
// echo "Email sent";
// }
// } catch (Exception $e) {
// echo $mail->ErrorInfo;
// }