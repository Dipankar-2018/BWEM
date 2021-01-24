<?php 
session_start();
session_unset();
unset($_SESSION['user']);unset($_SESSION['login']);
session_destroy();
header('location:../');

?>