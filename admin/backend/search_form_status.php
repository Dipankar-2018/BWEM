<?php
session_start();
header('Content-Type: application/json');
include("../conn/database.php");
// $_POST['formId']="SHG697154A062";
// $_POST['cat']="shg";
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="";
if(isset($_POST['formId'])&&$_POST['formId']!=""&&isset($_POST['cat'])&&$_POST['cat']!="" && array_key_exists($_POST['cat'],$cat)){
    $obj = new query();
    $table=$cat[$obj->get_safe_str($_POST['cat'])];
    $formId=$obj->get_safe_str($_POST['formId']);
    $result=$obj->getData($table,"formStatus,form_submitted_on,form_reviewed_on",array('formID'=>$formId));
    $result[0]['error']=count($result)==0?1:0;
    print_r(json_encode($result, JSON_PRETTY_PRINT));
}else{
    print_r(json_encode(array(['error'=>1]), JSON_PRETTY_PRINT));
}
?>