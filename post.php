<?php
include 'php_mailer/Exception.php';
include 'php_mailer/SMTP.php';
include 'php_mailer/PHPMailer.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
// ----------------------------config-------------------------- //

$adminemail="mebelmark@xn------7cdbab5abbzc5abfgclgypx6e1m.xn--p1ai";
$date=date("d.m.y");
$time=date("H:i");
$referer = $_SERVER['HTTP_REFERER'];
//---------------------------------------------------------------------- //

// Get data from form
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
$msg = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// send letter to admin
if (($name || $surname) && $msg) {
	$subject = "=?utf-8?B?".base64_encode("$date $time Сообщение от $name $surname")."?=";
	//mail($adminemail, $subject, $msg);

	$mail = new PHPMailer(TRUE);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->CharSet = 'utf-8';
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.beget.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mebelmark@xn------7cdbab5abbzc5abfgclgypx6e1m.xn--p1ai';                 // SMTP username
        $mail->Password = 'R[2Id]*{';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('mebelmark@xn------7cdbab5abbzc5abfgclgypx6e1m.xn--p1ai', 'Mailer');
        $mail->addAddress($adminemail, 'Admin');     // Add a recipient
    
        //Content
        $mail->isHTML(FALSE);                                  // Set email format to HTML
        $mail->Subject = "$date $time Сообщение от $name $surname";
        $mail->Body    = "$date $time $msg";
    
        @$mail->send();
        //echo 'Message has been sent';
        header('Location: sent.html');
    } catch (Exception $e) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
	header('Location: ' . $referer);
}
