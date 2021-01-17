<?php
session_start();
if(isset($_POST['submit'])&&isset($_POST['id'])){
    include("../conn/database.php");
    $obj = new query();
    $id=$obj->get_safe_str($_POST['id']);
    
    if(strlen($registration_no) == 0){
        $registration_no = 0;
    }else{
      $registration_no = $obj->get_safe_str($_POST['registration_no']);
    }
  
  $group_name = $obj->get_safe_str($_POST['group_name']);
  $address = $obj->get_safe_str($_POST['address']);
  $post_office = $obj->get_safe_str($_POST['post_office']);
  $police_station = $obj->get_safe_str($_POST['police_station']);
  $dist = $obj->get_safe_str($_POST['dist']);
  $pin = $obj->get_safe_str($_POST['pin']);
  $state = $obj->get_safe_str($_POST['state']);
  $constituency=$obj->get_safe_str($_POST['constituency']);
  $head_position = $obj->get_safe_str($_POST['head_position']);
  $head_name = $obj->get_safe_str($_POST['head_name']);
  $head_mobile = $obj->get_safe_str($_POST['head_mobile']);
  $head_email = $obj->get_safe_str($_POST['head_email']);  
  $aoi = $obj->get_safe_str($_POST['area_of_interest']);
  $group_exp = $obj->get_safe_str($_POST['group_exp']);
  $acc_no = $obj->get_safe_str($_POST['acc_no']);
  $ifsc_code = $obj->get_safe_str($_POST['ifsc_code']);
  $bank_name = $obj->get_safe_str($_POST['bank_name']);
  $branch_name = $obj->get_safe_str($_POST['branch_name']);
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
     'branch_name'=>$branch_name
      
  );
//file processing needed
    //'passbook_file',
    if(isset($_FILES['passbook_file'])&&$_FILES['passbook_file']['size']!=0){
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
					$passbook=$registration_no."_ep_bank_".$group_name.".".$fileext1;
					move_uploaded_file($filetemp1, '../images/bankPassbook/'.$passbook);
				}else
				{
					// File Extension Error
                }
            $condition_arr = array_merge($condition_arr, array("passbook_file"=>$passbook));
        }
    //'registration_certificate_file'
    if(isset($_FILES['registration_file'])&&$_FILES['registration_file']['size']!=0){
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
					$registrationCertificate=$registration_no."_ep_reg_".$group_name.".".$fileext2;
					move_uploaded_file($filetemp2, '../images/registrationCertificate/'.$registrationCertificate);
				}else
				{
					// File Extension Error
                }
            $condition_arr = array_merge($condition_arr, array("registration_certificate_file"=>$registrationCertificate));
            }
  $result=$obj->updateData('entrepreneur',$condition_arr,'id',$id);
  //for groupmember table
  $table='entrepreneur';
  if(isset($_POST['member_name_e'])){
    $member_name =$_POST['member_name_e'];
    $member_gender =$_POST['member_gender_e'];
    $member_age =$_POST['member_age_e'];
    $member_qualification =$_POST['member_qualification_e'];
        for($i=0;$i<count($member_name);$i++){
            $condition_arr=array(
                'name'=>$obj->get_safe_str($member_name[$i]),
                'gender' =>$obj->get_safe_str($member_gender[$i]),
                'age'=>$obj->get_safe_str($member_age[$i]),
                'qualification'=>$obj->get_safe_str($member_qualification[$i])
                );
            $result=$obj->updateData($table.'_members',$condition_arr,'group_name',$group_name);
        }
  }
  if(isset($_POST['member_name'])){
    $member_name =$_POST['member_name'];
    $member_gender =$_POST['member_gender'];
    $member_age =$_POST['member_age'];
    $member_qualification =$_POST['member_qualification'];
        for($i=0;$i<count($member_name);$i++){
            $condition_arr=array(
                'group_name'=>$group_name,
                'name'=>$obj->get_safe_str($member_name[$i]),
                'gender' =>$obj->get_safe_str($member_gender[$i]),
                'age'=>$obj->get_safe_str($member_age[$i]),
                'qualification'=>$obj->get_safe_str($member_qualification[$i])
                );
            $result=$obj->insertData($table.'_members',$condition_arr);
        }
  }

    if($obj->getData('entrepreneur','count(id)',array('group_name'=>$group_name))[0]["count(id)"]=="1"){
        $_SESSION['formStatus']=true; 
    }else{
        $_SESSION['formStatus']=false;
    }
}
// if(!isset($_GET['cat']))
//     $_GET['cat']='shg';
header("location:../data.php?cat=ep&dist=".strtolower($_POST['dist']));

?>