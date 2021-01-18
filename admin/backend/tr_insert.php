<?php
//Trainer Insert
session_start();
if(isset($_POST['submit'])){
    include("../conn/database.php");
    $obj = new query();
    
    $table='trainer';

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
 $photo = $obj->get_safe_str($_POST['photo']);
 $voter_aadhaar = $obj->get_safe_str($_POST['voter_aadhaar']);
 $education_cer = $obj->get_safe_str($_POST['education_cer']);

 $work_exp = $obj->get_safe_str($_POST['work_exp']);

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
     $workExp = $name."_trainer_".$fileExt;
     move_uploaded_file($work_exp_tmp, '../images/expCertificate/'.$workExp);
 }

  

  $acc_no = $obj->get_safe_str($_POST['acc_no']);
  $ifsc_code = $obj->get_safe_str($_POST['ifsc_code']);
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
            if(in_array($fileext1, $fileextStor1))
				{
					$passbook=$registration_no."_shg_bank_".$group_name.".".$fileext1;
					move_uploaded_file($filetemp1, '../images/bankPassbook/'.$passbook);
				}else
				{
					// File Extension Error
                }
                
    //'registration_certificate_file'
        $registration_certificate_filename=$_FILES['registration_file']['name'];
            $filetemp2=$_FILES['registration_file']['tmp_name'];
            $filetype2=$_FILES['registration_file']['type'];
            $filesize2=$_FILES['registration_file']['size'];
            $error2=$_FILES['registration_file']['error'];
            $split2=explode('.', $registration_certificate_filename);
			$fileext2=strtolower(end($split1));
            $fileextStor2 = array('jpg' ,'png' ,'jpeg');
            // if($filesize2>=205000||$filesize2==0)
            // { 
            //     //File Size Error
            // }
            if(in_array($fileext2, $fileextStor2))
				{
					$registrationCertificate=$registration_no."_shg_reg_".$group_name.".".$fileext2;
					move_uploaded_file($filetemp2, '../images/registrationCertificate/'.$registrationCertificate);
				}else
				{
					// File Extension Error
                }
                


  $condition_arr=array(
      'registration_no'=>$registration_no,
       'group_name'=>$group_name,
       'address'=>$address,
       'post_office'=>$post_office,
       'police_station'=>$police_station,
       'district'=>$dist,
       'pin'=>$pin,
       'state'=>$state,
       'constituency'=>$constituency,
       'category'=>$head_position,
       'name_of_head'=>$head_name,
       'head_mobile'=>$head_mobile,
       'head_email'=>$head_email,
       'aoi'=>$aoi,
       'group_experience'=>$group_exp,
       'bank_account_no'=>$acc_no,
       'bank_name'=>$bank_name,
       'ifsc'=>$ifsc_code,
       'branch_name'=>$branch_name,
       'passbook_file'=>$passbook,
       'registration_certificate_file'=>$registrationCertificate
    );
  
  $result=$obj->insertData($table,$condition_arr);

}
if(isset($_SESSION['login'])&&$_SESSION['login']==true){
    header("location:../data.php?cat=tr&dist=".strtolower($dist));
}
else{
    header("location:../../forms/trainer.php");
}

?>
