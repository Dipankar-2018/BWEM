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