<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'estekhdamnemonekar@gmail.com';                     // SMTP username
    $mail->Password = 'q23456fghgfhfgh159';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $Emailrcerver = $_SESSION['Email_Mail'];
    $NameEmailRecever = $_SESSION['Name_Mail'];
    $Name = $NameEmailRecever;
    //Recipients
    $mail->setFrom('estekhdamnemonekar@gmail.com', 'e-estkhdam');
    $mail->addAddress("$Emailrcerver", "$NameEmailRecever");     // Add a recipient
//    $mail->addAddress('mhkhv81107@yahoo.com');               // Name is optional
    $mail->addReplyTo('alifaridwebhost@gmail.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // Content
    $mail->isHTML(true);// Set email format to HTML
    if (isset($_SESSION['faramoshi'])) {
        $sub = 'بازيابي رمز عبور';
        $Body = "
<br>
<br>
            <!doctype html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
<body>
<div style='width: 100% ;height: 60px;background-color:#6c016c;text-align: center;font-size: xxx-large;overflow: hidden;border-radius: 20px;color: cornsilk;line-height: 50px'>
  ای استخدام
</div>
<center>

<div style='width: 100% ;height: auto;background-color:#b1e9f0;text-align: center;font-size: large;overflow: hidden;border-radius: 20px;direction: rtl'>

سلام 
<span style='color: crimson'>" . $Name . " </span>
 عزیز 
<span style='color: crimson'>♥</span>
!
<br>
شما درخواست تغيير رمز خود را داده ايد براي تغيير رمز خود روي لينك زير كليك كنيد تا به صفحه تغيير رمز هدايت شويد .
<br>

<a href='".PATH."/faramoshi?Token=" . $_SESSION['TOKEN_Mail'] . "&Email=" . $_SESSION['Email_Mail'] . "'>
براي تغيير رمز خود اينجا كليك كنيد.
  </a>
<br><br><br><br><br>
</div>
</center>
</body></html>
        ";
    }
    if (isset($_SESSION['validate'])) {
        $sub = 'ثبت نام در در نمونه پروژه اي استخدام';
        $Body="
        
        <br>
<br>
            <!doctype html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
<body>
<div style='width: 100% ;height: 60px;background-color:#6c016c;text-align: center;font-size: xxx-large;overflow: hidden;border-radius: 20px;color: cornsilk;line-height: 50px'>
  ای استخدام
</div>
<center>

<div style='width: 100% ;height: auto;background-color:#b1e9f0;text-align: center;font-size: large;overflow: hidden;border-radius: 20px;direction: rtl'>

سلام 
<span style='color: crimson'>" . $Name . " </span>
 عزیز 
<span style='color: crimson'>♥</span>
!
<br>
خيلي خوشحاليم كه در نمونه پروژه اي استخدام داريد ثبت نام ميكنيد. 
<br>
براي تاييد ايميل خود روي لينك زير كليك كنيد تا ايميل شما تاييد بشه و به امكانات پنل كاربري دسترسي داشته باشيد.
<br>
  <a href='".PATH."/validationReg?Token=" . $_SESSION['TOKEN_Mail'] . "&Email=" . $_SESSION['Email_Mail'] . "'>
اينجا كليك كنيد تا ايميل خود را تاييد كنيد .
  </a>
<br><br><br><br><br>
</div>
</center>
</body></html>

        
        ";
    }
    $mail->Subject = $sub;
    $mail->Body =$Body ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}