<?php
//reciever
$reciever_email="reciever_email";
$reciever_name=$reciever_email;

$passReset=true;
$formInfo=false;

if($passReset){
//content for pass Reset
    $token = bin2hex(random_bytes(50)); //db specific
    $token_time=time();  //db specific
    $Subject='Password Reset Link';
    $Body='Hi '.$reciever_name.',<br> Please <a href="http://localhost/new_password.php?token='.$token.$token_time.'">Click Here</a> to reset your password.<br><br><span><b>Note: This link is valid for 10 miniutes only.</b></span><br><br>Thank You'; 
    $AltBody='Hi '.$reciever_name.', Link(http://localhost/new_password.php?token='.$token.$token_time.') to reset your password.Note: This link is valid for 10 miniutes only.Thank You';//'This is the body in plain text for non-HTML mail clients';
}

if($formInfo){
    $formID="SHG......";//get from db
    $Subject='Registered Form ID';
    $Body='Hi '.$reciever_name.',<br> Your form ID is :'.$formID.'<br> Thank You';
    $AltBody='Hi '.$reciever_name.',Your form ID is :'.$formID.' Thank You';
}


?>