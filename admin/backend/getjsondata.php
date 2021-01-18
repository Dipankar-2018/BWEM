<?php
header('Content-Type: application/json');
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');
if(isset($_POST['id'])){
include("../conn/database.php");
$obj = new query();  
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


// $_POST['element']="shg";
if(isset($_POST['element'])){
    include("../conn/database.php");
    $obj = new query();
    $table=$cat[$obj->get_safe_str($_POST['element'])];
    $distArray=array("kokrajhar","Chirang","Baksa","Udalguri");
    $data=array();
   for($i=0;$i<count($distArray);$i++){
        array_push($data,array($distArray[$i]=>$obj->getData($table,'count(district)',array('district'=>$distArray[$i]))[0]['count(district)']));
   }
print_r(json_encode($data, JSON_PRETTY_PRINT));
}
?>