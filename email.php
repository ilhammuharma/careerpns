<?php
ini_set('display_errors', 1);
require 'PHPMailer/PHPMailerAutoload.php';

include ('PHPMailer/header.php');
$mail->addAddress('tamapriambodo@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('tama.priambodo@pns.co.id');

$mail->isHTML(true);  // Set email format to HTML
//$bodyContent = '<p>kirim email</p>';
//$bodyContent = '<p>Hi '.$_POST['name'].',</p>';
//$bodyContent .= '<p>Thank you for register at PNS Career website, please confirm your email account with clicking link below:<br></p>';
//$bodyContent .= '<p><a href="http://career.pratamanusantara.co.id/confirm.php?email='.md5($_POST['email']).'">http://career.pratamanusantara.co.id/confirm.php?email='.md5($_POST['email']).'<a></p>';

$mail->Subject = 'Confirm your email address';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}
?>
