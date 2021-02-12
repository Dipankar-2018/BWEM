<?php
//reciever
// $reciever_email="reciever_email";
// $reciever_name=$reciever_email;

// $passReset=true;
// $formInfo=false;

if(isset($newRegister)&&$newRegister){
    $Subject='Your BWEM Login Credentials';
    $Body='Hi '.$reciever_name.',<br>Login ID: <b>'.$reciever_email.'</b><br>Password:<span style="color:red;font-weight: bold;">'.$password.'</span> <br><br> Regards,<br><b> Birgwsri Women Emopowerment Mission</b>';
    $AltBody='Hi '.$reciever_name.', Your Login ID:'.$reciever_email.', Your Password: <b>'.$password.'</b> <br> Regards,<br><b> Birgwsri Women Emopowerment Mission</b>';
}

if(isset($passReset)&&$passReset){
//content for pass Reset
    // $token = bin2hex(random_bytes(50)); //db specific
    // $token_time=time();  //db specific
    $Subject='Password Reset Link';
    $Body='Hi '.$reciever_name.',<br> Please <a href="http://localhost/BWEM/passwordreset.php?token='.$token.$token_time.'">Click Here</a> to reset your password.<br><br><span><b>Note: This link is valid for 10 miniutes only.</b></span><br><br>Thank You'; 
    $AltBody='Hi '.$reciever_name.', Link(http://localhost/BWEM/passwordreset.php?token='.$token.$token_time.') to reset your password.Note: This link is valid for 10 miniutes only.Thank You';//'This is the body in plain text for non-HTML mail clients';
}

if(isset($formInfo)&&$formInfo){
    // $formID="SHG......";//get from db
    $Subject='Registered Form ID';
    $Body='Hi '.$reciever_name.',<br> Your registered form-ID is :'.$formID.'<br> Thank You';
    $AltBody='Hi '.$reciever_name.',Your registered form-ID is :'.$formID.' Thank You';
}
if(isset($formReviewedStatus)&&$formReviewedStatus){
    $formReviewedDate1=date("d-m-Y",strtotime($formReviewedDate));
    if($isApproved){
        $Subject='Congratulations Your Application has been Approved';
        $Body='Hi '.$reciever_name.',<br> Your Application ID: '.$formID.' is Approved on : '.$formReviewedDate1.'<br> Thank You';
        $AltBody='Hi '.$reciever_name.',Your Application ID: '.$formID.' is Approved on : '.$formReviewedDate1.' Thank You';
    }else{
        $Subject='Your Application has been Rejected';
        $Body='Hi '.$reciever_name.',<br> Your Application ID: '.$formID.' is Rejected on : '.$formReviewedDate1.'<br> Thank You';
        $AltBody='Hi '.$reciever_name.',Your Application ID: '.$formID.' is Rejected on : '.$formReviewedDate1.' Thank You';
    }
}
if(isset($contactSendMsg)&&$contactSendMsg){
    $Subject='New Message From Web User';
    $Body='Hi ,<br> Name: '.$name.'<br> Email: '.$email.'<br> Phone: '.$phone.'<br> Message :'. $message.'<br> Thank You';
    $AltBody='Hi , Name: '.$name.', Email: '.$email.', Phone: '.$phone.', Message :'. $message.', Thank You';
    $reciever_email="bwem2020@gmail.com";
    $reciever_name="BWEM"; 
}
include('mail.php');
?>