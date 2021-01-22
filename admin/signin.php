<?php
session_start();
$error=false;
if(isset($_POST['signin']))
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include("conn/database.php");
        $obj = new query();  
        $table="user";
        $username=$obj->get_safe_str(trim($_POST['username']));
		$password= hash('sha512',$obj->get_safe_str(trim($_POST['password'])));
        $result=$obj->getData($table,'user',array('user'=>$username,'password'=>$password));
        
        $isValidUser=$result['user']==$username;
        if($isValidUser){
            $_SESSION['login']=true;
            $_SESSION['username']=$username;
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