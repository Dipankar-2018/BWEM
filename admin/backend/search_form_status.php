<?php
include("conn/database.php");
$obj = new query();

$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="";

if(isset($_POST['cat'])&& $_POST['cat']!="" && array_key_exists($obj->get_safe_str($_POST['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_POST['cat'])];









?>