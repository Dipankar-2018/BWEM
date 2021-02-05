<?php

session_start();
include('../conn/database.php');

$obj = new query();

if(isset($_POST['img_submit'])){
    
    $image = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


    if($file_extension == 'jpg' || $file_extension == 'png'){

        $folder = "../images/gallary/" . $image;

        move_uploaded_file($tmp_name, $folder);

        $codition_arr = array(
            'image' => $folder
        );

        $obj->insertData('gallary', $codition_arr);

        $_SESSION['imgsuccess'] = true;
        
        header('location:../gallary.php');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

    }else{
        
        $_SESSION['imgerror'] = true;
        header('location:../gallary.php');

    }


}











?>