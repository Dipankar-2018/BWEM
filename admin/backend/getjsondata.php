<?php
header('Content-Type: application/json');
if(isset($_POST['id'])){
include("../conn/database.php");
$obj = new query();
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="self_help_group";
if(isset($_POST['cat'])&& $_POST['cat']!="" && array_key_exists($obj->get_safe_str($_POST['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_POST['cat'])];
// else
//     exit;

$id=$obj->get_safe_str($_POST['id']);
$result=$obj->getData($table,'*',array('id'=>$id));
$members=$obj->getData($table.'_members','*',array('group_name'=>$result[0]['group_name']));
if($result==0)
    exit;
$data=$result;
array_push($data,$members);
print_r(json_encode($data, JSON_PRETTY_PRINT));
}
?>