<?php
session_start();
include("../conn/database.php");
if(isset($_POST['resetpass'])){//&&$_POST['resetpass']==1&&isset($_POST['email'])&&$_POST['email']!=""){
    $obj = new query();
    $email=$_POST['email'];
    if (empty($email)) 
    {
      echo "Your email is required.";
      exit;
    }
    $table="user";
    $result=$obj->getData($table,'email',array('email'=>$email));
if(count($result)>0 && $result[0]['email']==$email){
    //email exists
    $token = bin2hex(random_bytes(50));
    $token_time=time();
    $condition_arr= array(
        'pass_reset_token'=>$token.$token_time,
        'token_gen_time'=>$token_time
    );
    $result=$obj->updateData($table,$condition_arr,'email',$email); 
    $reciever_email=$email;
    $reciever_name=$email;
    $passReset=true;
    include('../../mailer/mail-content.php');
    if($mailSent==true){
        echo 1;
    }else{
        echo "Some Problem Occured, Please Try Again Later or Contact the office";
    }
    exit;
    
}else{
    echo "Sorry, no user exists in our system with that email.";
    exit;
}
}else{
    header('location:../../');
    exit;
}

?>