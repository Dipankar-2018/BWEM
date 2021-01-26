<?php
session_start();
header('Content-Type: application/json');
include("conn/database.php");

$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="";
if(isset($_POST['formId'])&&$_POST['formId']!=""&&isset($_POST['cat'])&&$_POST['cat']!="" && array_key_exists($_POST['cat'],$cat)){
    $obj = new query();
    $table=$cat[$obj->get_safe_str($_POST['cat'])];
    $formId=$obj->get_safe_str($_POST['formId']);
    $data=array('error'=>0);
    $result=$obj->getData($table,'*',array('formId'=>$formId));
    
    $data=$result;
    array_push($data,$members);
    print_r(json_encode($data, JSON_PRETTY_PRINT));


}else{
    print_r(json_encode(array('error'=>1), JSON_PRETTY_PRINT));
}
?>