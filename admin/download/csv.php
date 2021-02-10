<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_'. date('Y-m-d') .'.csv');
$f = fopen('php://output', 'w');
include("../conn/database.php");
$obj = new query();
$delimiter = ",";
//logic starts
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_GET['cat'])];   
if(isset($_GET['id'])){
    $id=$obj->get_safe_str($_GET['id']);
    $condition=array('id'=>$id);
}
if(isset($_GET['dist'])){
    $district=$obj->get_safe_str($_GET['dist']);
    $condition=array('district'=>$district);
}





//For Trainer
if($obj->get_safe_str($_GET['cat'])=="tr"){
    $fields = array('Form-ID','Status',
    'Form Submitted On', 'Form Reviewed On',
     'Name', 'Email', 'Contact', 
     'Gaurdian Name', 'Relation','Date of Birth','Category','Religion','Education',
     'Address', 'State', 'District','Constituency','Post Office', 'Police Station',
      'Pin','Area of Interest', 'Year of Experience','Location',
      'Photo Attached','Address Proof Attached','Education Doc Attached','Work Exp Doc Attached',
      'Bank Account','Ifsc Code', 'Bank Name', 'Branch Name', 'Passbook Attached');
      fputcsv($f, $fields, $delimiter);
      $lineData=$obj->getData($table,
      'formID, formStatus, form_submitted_on, form_reviewed_on,
     name, email, contact, gname, relation, dob, category,
      religion, education, address, state, district, constituency, post_office, pstation,
       pin, aoi, exp, location, photo, voter_aadhaar, education_doc, work_exp_doc,
        ac_no, ifsc, bank_name, branch_name, bank_doc'
      ,$condition);
      
      $len=count($lineData);
      for($i=0;$i<$len;$i++){
        $lineData[$i]['formStatus'] = ($lineData[$i]['formStatus'] == '-1')?'Pending':(($lineData[$i]['formStatus'] == '1')?'Approved':'Rejected');
        $lineData[$i]['form_reviewed_on'] = ($lineData[$i]['form_reviewed_on'] == '')?'Processing':$lineData[$i]['form_reviewed_on'];
        $lineData[$i]['photo'] = ($lineData[$i]['photo'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['bank_doc'] = ($lineData[$i]['bank_doc'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['voter_aadhaar'] = ($lineData[$i]['voter_aadhaar'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['education_doc'] = ($lineData[$i]['education_doc'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['work_exp_doc'] = ($lineData[$i]['work_exp_doc'] != '')?'Uploaded':'Not Uploaded';
        fputcsv($f, $lineData[$i], $delimiter);
      }

}
//For Trainee
else if($obj->get_safe_str($_GET['cat'])=="tre"){
    $fields = array('Form-ID','Status',
    'Form Submitted On', 'Form Reviewed On',
     'Name', 'Email', 'Contact', 
     'Gaurdian Name', 'Relation','Date of Birth','Category','Religion','Education',
     'Address', 'State', 'District','Constituency','Post Office', 'Police Station',
      'Pin','Course', 'Course Duration','Location',
      'Bank Account','Ifsc Code', 'Bank Name', 'Branch Name', 'Passbook Attached',
      'Photo Attached','Address Proof Attached','Education Doc Attached'
      );
      fputcsv($f, $fields, $delimiter);

      $lineData=$obj->getData($table,
      'formID, formStatus, form_submitted_on, form_reviewed_on,
       name, email, contact, gname, relation, dob, category, religion,
       education, address, state, district, constituency, post_office,
       pstation, pin, course, duration, location, ac_no, ifsc, bank_name,
       branch_name, bank_doc, photo, voter_aadhaar, education_doc'
      ,$condition);
     
      $len=count($lineData);
      for($i=0;$i<$len;$i++){
        $lineData[$i]['formStatus'] = ($lineData[$i]['formStatus'] == '-1')?'Pending':(($lineData[$i]['formStatus'] == '1')?'Approved':'Rejected');
        $lineData[$i]['form_reviewed_on'] = ($lineData[$i]['form_reviewed_on'] == '')?'Processing':$lineData[$i]['form_reviewed_on'];
        $lineData[$i]['photo'] = ($lineData[$i]['photo'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['bank_doc'] = ($lineData[$i]['bank_doc'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['voter_aadhaar'] = ($lineData[$i]['voter_aadhaar'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['education_doc'] = ($lineData[$i]['education_doc'] != '')?'Uploaded':'Not Uploaded';
        fputcsv($f, $lineData[$i], $delimiter);
      }

}
//For Others
else{
    $fields = array('Form-ID','Status',
    'Form Submitted On', 'Form Reviewed On',
     'Registration Number', 'Group Name', 'Address', 
     'Post Office', 'Police Station', 'District',
      'Constituency', 'Pin', 'State', 'Category',
       'Name of Head', 'Head Mobile', 'Head Email',
        'Area of Interest', 'Group Experience',
         'Bank Account', 'Bank Name',
     'Ifsc Code', 'Branch Name', 'Passbook Attached', 'Registration Certificate Attached');
     $max_limit=100;
     $min_limit=1;
     while($min_limit<=$max_limit){
         array_push($fields,'Member Name-'.$min_limit, 'Member Gender-'.$min_limit, 'Member Age-'.$min_limit, 'Member Qualification-'.$min_limit);
         $min_limit++;
     }
     fputcsv($f, $fields, $delimiter);
   
    //output each row of the data, format line as csv and write to file pointer
    $lineData=$obj->getData($table,
    'formID,formStatus, form_submitted_on, form_reviewed_on, registration_no, group_name, address, post_office, police_station, district, constituency, pin, state, category, name_of_head, head_mobile, head_email, aoi, group_experience, bank_account_no, bank_name, ifsc, branch_name, passbook_file, registration_certificate_file'
    ,$condition);
    $len=count($lineData);
    for($i=0;$i<$len;$i++){
        $lineData[$i]['formStatus'] = ($lineData[$i]['formStatus'] == '-1')?'Pending':(($lineData[$i]['formStatus'] == '1')?'Approved':'Rejected');
        $lineData[$i]['form_reviewed_on'] = ($lineData[$i]['form_reviewed_on'] == '')?'Processing':$lineData[$i]['form_reviewed_on'];
        $lineData[$i]['passbook_file'] = ($lineData[$i]['passbook_file'] != '')?'Uploaded':'Not Uploaded';
        $lineData[$i]['registration_certificate_file'] = ($lineData[$i]['registration_certificate_file'] != '')?'Uploaded':'Not Uploaded';
        $members=$obj->getData($table.'_members','*',array('group_name'=>$lineData[$i]['group_name']));
        $len2=count($members);
        for($j=0;$j<$len2;$j++){
            array_push($lineData[$i],$members[$j]['name'], $members[$j]['gender'], $members[$j]['age'], $members[$j]['qualification']);
        }
        fputcsv($f, $lineData[$i], $delimiter);
      }
    
}

exit;

?>