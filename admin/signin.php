<?php
session_start();
$error=false;
if(isset($_POST['submit']))
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include("conn/database.php");
        $obj = new query();  
        $table="user";
        echo $email=$obj->get_safe_str(trim($_POST['email']));
	    $password= hash('sha512',$obj->get_safe_str(trim($_POST['password'])));
        $result=$obj->getData($table,'user,email',array('email'=>$email,'password'=>$password));
        // print_r($result[0]);
        $isValidUser=$result[0]['email']==$email;
        if($isValidUser){
            $_SESSION['login']=true;
            $_SESSION['user']=$result[0]['user'];
        }else{
            $_SESSION['login']=false;
        }
        header('location:./');
        die();
        exit;
    }
    else{
        $error=true;
    }
}else{
    $error=true;
}

 $_SESSION['signinerr']=$error;
header('location:../');

?>