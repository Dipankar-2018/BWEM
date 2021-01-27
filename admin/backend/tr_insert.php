<?php
//Trainer Insert
session_start();
if(isset($_POST['submit'])){


    include("../conn/database.php");
    $obj = new query();
    $table='trainer';
 $formID= $obj->getFormId("TRNR",$table);
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
 $dist = $obj->get_safe_str($_POST['dist']);
 $post_office = $obj->get_safe_str($_POST['post_office']);
 $police_station = $obj->get_safe_str($_POST['police_station']);
 $pin = $obj->get_safe_str($_POST['pin']);
 $aoi = $obj->get_safe_str($_POST['aoi']);
 $year_of_exp = $obj->get_safe_str($_POST['year_of_exp']);  
 $location = $obj->get_safe_str($_POST['location']);

//UPLOAD PHOTO

$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_size = $_FILES['photo']['size'];
$photo_tem = $_FILES['photo']['tmp_name'];

$photo_arr = explode('.', $photo);
$photo_lwr = strtolower(end($photo_arr));
$photo_type_store = array('jpg', 'png', 'jpeg');

if(in_array($photo_lwr, $photo_type_store)){

    $photoName =  $formID."_trainer.".$photo_lwr;
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

 if(in_array($addressProof_lower, $address_type_store)){
    $finalAddress =  $formID."_trainer.".$addressProof_lower;
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

if(in_array($education_cer_lower, $education_cer_store)){
   $finalEducation =  $formID."_trainer.".$education_cer_lower;
   move_uploaded_file($education_cer_tmp, '../images/educationCer/'.$finalEducation);
}

 


 // work experiance certificate 
 $work_exp = $_FILES['work_exp']['name'];
 $work_exp_tmp = $_FILES['work_exp']['tmp_name'];
 $work_exp_type = $_FILES['work_exp']['type'];
 $work_exp_size = $_FILES['work_exp']['size'];
 $work_exp_err = $_FILES['work_exp']['error'];

 $explode = explode('.', $work_exp);
 $fileExt = strtolower(end($explode));
 $filestore = array('jpg', 'png', 'jpeg');

 if(in_array($fileExt, $filestore)){
     $workExp =  $formID."_trainer.".$fileExt;
     move_uploaded_file($work_exp_tmp, '../images/expCertificate/'.$workExp);
 }




  $acc_no = $obj->get_safe_str($_POST['ac_no']);
  $ifsc_code = $obj->get_safe_str($_POST['ifsc']);
  $bank_name = $obj->get_safe_str($_POST['bank_name']);
  $branch_name = $obj->get_safe_str($_POST['branch']);
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
            if(in_array($fileext1, $fileextStor1))
				{
					$passbook= $formID."_tr_bank.".$fileext1;
					move_uploaded_file($filetemp1, '../images/bankPassbook/'.$passbook);
				}else
				{
					// File Extension Error
                }
                

  $condition_arr=array(
       'formID'=>$formID,
       'name'=>$name,
       'email'=>$email,
       'contact'=>$contact,
       'gname'=>$post_office,
       'relation'=>$relation,
       'dob'=>$dob,
       'category'=>$category,
       'religion'=>$religion,
       'education'=>$education,
       'address'=>$address,
       'state'=>$state,
       'district'=>$dist,
       'post_office'=>$post_office,
       'pstation'=>$police_station,
       'pin'=>$pin,
       'aoi'=>$aoi,
       'exp'=>$year_of_exp,
       'location'=>$location,
       'photo'=>$photoName,
       'voter_aadhaar'=>$finalAddress,
       'education_doc'=>$finalEducation,
       'work_exp_doc'=>$workExp,
       'ac_no'=>$acc_no,
       'ifsc'=>$ifsc_code,
       'bank_name'=>$bank_name,
       'bank_doc'=>$passbook      
    );
  
    $result=$obj->insertData($table,$condition_arr);   
    if($result||$obj->getData($table,'count(id)',array('email'=>$email))[0]["count(id)"]=="1"){
        $_SESSION['formStatus']=true; 
        $reciever_email=$email;
        $reciever_name=$name;
        $formInfo=true;
        include('../../mailer/mail-content.php');
    }else{
        $_SESSION['formStatus']=false;
    }
 
}


if(isset($_SESSION['login'])&&$_SESSION['login']==true){
    header("location:../data.php?cat=tr&dist=".strtolower($dist));
}
else{
    header("location:../../forms/trainer.php");
}

?>
