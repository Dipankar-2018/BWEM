<?php
session_start();
include('../conn/database.php');

$obj = new query();

if(isset($_POST['submit'])){
    
$category = $obj->get_safe_str($_POST['category']);

$date = $obj->get_safe_str($_POST['date']);

$title = $obj->get_safe_str($_POST['title']);

$text = $obj->get_safe_str($_POST['text']);

//PDF UPLOAD

$filename = $_FILES['file']['name'];

$tmpname = $_FILES['file']['tmp_name'];

$file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if($file_extension == "pdf" || $file_extension == null){

    if($file_extension == null){
        $file_name = 0;
    }else{

        $file_name = $filename;

        $folder = "../images/notice/" . $filename;
    }    

   
    move_uploaded_file($tmpname, $folder);

    $condition_arr = array(
       'category'=>$category,
       'date'=>$date,
       'title'=>$title,
       'text'=>$text,
       'doc' =>$file_name
       );
       
       
        $result = $obj->insertData('notice', $condition_arr);

        $_SESSION['inserted'] = true;
        header('location:../notice.php');  
   


}else {

    $_SESSION['file_type'] = true;
    header('location:../notice.php');
   
}











}








?>