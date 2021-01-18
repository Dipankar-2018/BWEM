<?php
//Trainee Insert
session_start();
if(isset($_POST['submit'])){
    include("../conn/database.php");
    $obj = new query();
    
    $table='trainee';

 $name = $obj->get_safe_str($_POST['name']);
 $email = $obj->get_safe_str($_POST['email']);
 $contact = $obj->get_safe_str($_POST['contact']);
 $gname = $obj->get_safe_str($_POST['gname']);
 $relation = $obj->get_safe_str($_POST['relation']);
 $dob = $obj->get_safe_str($_POST['dob']);
 $category = $obj->get_safe_str($_POST['category']);
 $religion = $obj->get_safe_str($_POST['religion']);
 $education = $obj->get_safe_str($_POST['education']);
 $address = $obj->get_safe_str($_POST['address']);
 $state = $obj->get_safe_str($_POST['state']);
 $district = $obj->get_safe_str($_POST['district']);
 $post = $obj->get_safe_str($_POST['post']);
 $police = $obj->get_safe_str($_POST['police']);
 $pin = $obj->get_safe_str($_POST['pin']);
 $course = $obj->get_safe_str($_POST['course']);
 $course_duration = $obj->get_safe_str($_POST['course_duration']);
 $location = $obj->get_safe_str($_POST['location']);



//UPLOAD PHOTO

$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_size = $_FILES['photo']['size'];
$photo_tem = $_FILES['photo']['tmp_name'];

$photo_arr = explode('.', $photo);
$photo_lwr = strtolower(end($photo_arr));
$photo_type_store = array('jpg', 'png', 'jpeg');
$photoName ="";
if(in_array($photo_lwr, $photo_type_store)){

    $photoName = $email."_trainee_.".$photo_lwr;
    move_uploaded_file($photo_tem, '../images/photo/'.$photoName);
}


//VOTER AADHAR 

 $addressProof = $_FILES['voter_aadhaar']['name'];
 $addressProof_type = $_FILES['voter_aadhaar']['type'];
 $addressProof_size = $_FILES['voter_aadhaar']['size'];
 $addressProof_tmp = $_FILES['voter_aadhaar']['tmp_name'];
 
 $addressProof_array = explode('.', $addressProof);
 $addressProof_lower = strtolower(end($addressProof_array));
 $address_type_store = array('jpg', 'png', 'jpeg');
 $finalAddress="";
 if(in_array($addressProof_lower, $address_type_store)){
    $finalAddress = $email."_trainee_.".$addressProof_lower;
    move_uploaded_file($addressProof_tmp, '../images/addressProof/'.$finalAddress);
}



//EDUCATION CERTIFICATE

$education_cer = $_FILES['education_cer']['name'];
$education_cer_type = $_FILES['education_cer']['type'];
$education_cer_size = $_FILES['education_cer']['size'];
$education_cer_tmp = $_FILES['education_cer']['tmp_name'];

$education_cer_array = explode('.', $education_cer);
$education_cer_lower = strtolower(end($education_cer_array));
$education_cer_store = array('jpg', 'png', 'jpeg');
$finalEducation="";
if(in_array($education_cer_lower, $education_cer_store)){
   $finalEducation = $email."_trainee_.".$education_cer_lower;
   move_uploaded_file($education_cer_tmp, '../images/addressProof/'.$finalEducation);
}





  $acc_no = $obj->get_safe_str($_POST['ac_no']);
  $ifsc_code = $obj->get_safe_str($_POST['ifsc']);
  $bank_name = $obj->get_safe_str($_POST['bank_name']);
  $branch_name = $obj->get_safe_str($_POST['branch_name']);
//file processing needed
    //'passbook_file',
            $passbook_filename=$_FILES['passbook_file']['name'];
            $filetemp1=$_FILES['passbook_file']['tmp_name'];
            $filetype1=$_FILES['passbook_file']['type'];
            $filesize1=$_FILES['passbook_file']['size'];
            $error1=$_FILES['passbook_file']['error'];
            $split1=explode('.', $passbook_filename);
			$fileext1=strtolower(end($split1));
            $fileextStor1 = array('jpg' ,'png' ,'jpeg');
            // if($filesize1>=205000||$filesize1==0)
            // { 
            //     //File Size Error
            // }
            $passbook="";
            if(in_array($fileext1, $fileextStor1))
				{
					$passbook=$email."_trainee_.".$fileext1;
					move_uploaded_file($filetemp1, '../images/bankPassbook/'.$passbook);
				}else
				{
					// File Extension Error
                }

  $condition_arr=array(
       'name'=>$name,
       'email'=>$email,
       'contact'=>$contact,
       'gname'=>$gname,
       'relation'=>$relation,
       'dob'=>$dob,
       'category'=>$category,
       'religion'=>$religion,
       'education'=>$education,
       'address'=>$address,
       'state'=>$state,
       'district'=>$district,
       'post_office'=>$post,
       'pstation'=>$police,
       'pin'=>$pin,
       'course'=>$course,
       'duration'=>$course_duration,
       'location'=>$location,
       'ac_no'=>$acc_no,
       'ifsc'=>$ifsc_code,
       'bank_name'=>$bank_name,
       'branch_name'=>$branch_name,
       'bank_doc'=>$passbook,
       'photo'=>$photoName,
       'voter_adhar'=>$finalAddress,
       'education_doc'=>$finalEducation      
    );
  
//     echo "<pre>";
//     print_r($condition_arr);
// exit;
   

    $result=$obj->insertData($table,$condition_arr);   
    if($obj->getData($table,'count(id)',array('email'=>$email))[0]["count(id)"]=="1"){
        $_SESSION['formStatus']=true; 
    }else{
        $_SESSION['formStatus']=false;
    }
 
}

// exit;



if(isset($_SESSION['login'])&&$_SESSION['login']==true){
    header("location:../data.php?cat=tr&dist=".strtolower($dist));
}
else{
    header("location:../../forms/trainee.php");
}

?>
