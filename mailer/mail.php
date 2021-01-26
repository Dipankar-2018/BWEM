<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
//Sender Configuration
$sender_email="mailer_email"; 
$password="mailer_password";
$sender_name="host_name";

//reciever
$reciever_email="reciever_email";
$reciever_name=$reciever_email;

//content for pass Reset
$token = bin2hex(random_bytes(50)); //db specific
$token_time=time();  //db specific
$Subject='Password Reset Link';
$Body='Hi '.$reciever_name.',<br> Please <a href="http://localhost/new_password.php?token='.$token.$token_time.'">Click Here</a> to reset your password.<br><br><span><b>Note: This link is valid for 10 miniutes only.</b></span><br><br>Thank You'; 
$AltBody='Hi '.$reciever_name.', Link(http://localhost/new_password.php?token='.$token.$token_time.') to reset your password.Note: This link is valid for 10 miniutes only.Thank You';//'This is the body in plain text for non-HTML mail clients';

//Logic
$mail_sent=false;
try {
    //Goto gmail security turn on less secure app 
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                  // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = $sender_email;                     // SMTP username
      $mail->Password   = $password;                               // SMTP password
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom($sender_email,$sender_name);
      $mail->addAddress($reciever_email,$reciever_name);     // Add a recipient
      $mail->addReplyTo('no-reply@gmail.com', 'no reply');           

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $Subject;
      $mail->Body    = $Body;
      $mail->AltBody = $AltBody;
      
      $mail->send();
      $mail_sent=true;
      
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


?>