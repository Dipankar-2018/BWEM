<?php

include('../admin/conn/database.php');
$obj = new query();

if(isset($_POST['submit_trainee'])){
    $name = $obj->get_safe_str($_POST['name']);
    $email  = $obj->get_safe_str($_POST['email']);
    $contact  = $obj->get_safe_str($_POST['contact']);
    $gname  = $obj->get_safe_str($_POST['gname']);
    $relation  =$obj->get_safe_str( $_POST['relation']);
    $dob  = $obj->get_safe_str($_POST['dob']);
    $category  = $obj->get_safe_str($_POST['category']);
    $religion  = $obj->get_safe_str($_POST['religion']);
    $education  = $obj->get_safe_str($_POST['education']);
    $address  = $obj->get_safe_str($_POST['address']);
    $state  =$obj->get_safe_str( $_POST['state']);
    $district  = $obj->get_safe_str($_POST['district']);
    $post  = $obj->get_safe_str($_POST['post']);
    $police  = $obj->get_safe_str($_POST['police']);
    $pin  = $obj->get_safe_str($_POST['pin']);
    $course  = $obj->get_safe_str($_POST['course']);
    $course_duration  = $obj->get_safe_str($_POST['course_duration']);
    $location  =$obj->get_safe_str( $_POST['location']);

    $ac_no  = $obj->get_safe_str($_POST['ac_no']);
    $ifsc  = $obj->get_safe_str($_POST['ifsc']);
    $bank_name  = $obj->get_safe_str($_POST['bank_name']);
    $branch_name  = $obj->get_safe_str($_POST['branch_name']);

     //'passbook_file',

     $passbook_filename=$_FILES['passbook']['name'];
     $filetemp1=$_FILES['passbook']['tmp_name'];
     $filetype1=$_FILES['passbook']['type'];
     $filesize1=$_FILES['passbook']['size'];
     $error1=$_FILES['passbook']['error'];
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
             move_uploaded_file($filetemp1, 'backend/images/bankPassbook/'.$passbook);
         }else
         {
             // File Extension Error
         }


     //PHOTO
         
    $photo_file = $_FILES['photo']['name'];
    $filetemp2 = $_FILES['photo']['tem_name'];
    $filetype2 = $_FILES['photo']['type'];
    $filesize2 = $_FILES['photo']['size'];
    $error2 = $_FILES['photo']['error'];
    $split2 = explode('.', $photo_file);
    $fileext2=strtolower(end($split2));
    $fileextStor2 = array('jpg', 'png', 'jpeg');
    if($filesize2 >= 205000 || $filesize2 == 0){
        echo "File Size Error";
    }
    if(in_array($fileext2, $fileextStor2)){
        $photo = $photo."_trainee_".$fileext2;
        move_uploaded_file($filetemp2, 'backend/images/photo/'. $photo);
    }else{
        echo "file Extention Error";
    }


     //VOTER OR AADHAR DOCUMENT
         
    $voter_aadhar = $_FILES['voter_aadhaar']['name'];
    $filetemp3 = $_FILES['voter_aadhaar']['tem_name'];
    $filetype3 = $_FILES['voter_aadhaar']['type'];
    $filesize3 = $_FILES['voter_aadhaar']['size'];
    $error3 = $_FILES['voter_aadhaar']['error'];
    $split3 = explode('.', $photo_file);
    $fileext3=strtolower(end($split2));
    $fileextStor3 = array('jpg', 'png', 'jpeg');
    if($filesize3 >= 205000 || $filesize3 == 0){
        echo "File Size Error";
    }
    if(in_array($fileext3, $fileextStor3)){
        $voter_aadhar = $voter_aadhar."_trainee_".$fileext3;
        move_uploaded_file($filetemp3, 'backend/images/photo/'. $voter_aadhar);
    }else{
        echo "file Extention Error";
    }



         //EDUCATION CERTIFICATE
         
         $photo_file = $_FILES['education_cer']['name'];
         $filetemp4 = $_FILES['education_cer']['tem_name'];
         $filetype4 = $_FILES['education_cer']['type'];
         $filesize4 = $_FILES['education_cer']['size'];
         $error4 = $_FILES['education_cer']['error'];
         $split4 = explode('.', $photo_file);
         $fileext3=strtolower(end($split4));
         $fileextStor4 = array('jpg', 'png', 'jpeg');
         if($filesize4 >= 205000 || $filesize4 == 0){
             echo "File Size Error";
         }
         if(in_array($fileext3, $fileextStor3)){
             $photo = $photo."_trainee_".$fileext4;
             move_uploaded_file($filetemp4, 'backend/images/photo/'. $photo);
         }else{
             echo "file Extention Error";
         }  
    
}
?>


<?php include('includes/form-header.php'); ?>


  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised" style="z-index: 1000;">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="../assets/img/faces/logo.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h2>Register as a Trainee</h2>
              </div>
            </div>
          </div>
        </div>


    <!-- Reg. Form Content Start-->
      <div class="section">
      
       

      <!-- Self Help Group Contact Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Trainee Form</h4>
                  <div class="card-body">
                    <form action="backend/preview-trainee.php" method="post" enctype="multipart/form-data">
                      <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Your/Traiee Name" name="name" value="<?php echo "$name" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>E-MAIL</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Id" name="email" value="<?php echo "$email" ;?>" readonly>
                           
                          </div>
                        </div>

                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>CONTACT NUMBER</b></label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" value="<?php echo "$contact" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <div class="form-group has-default">
                            <label class="text-info"><b>GUARDIAN'S NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Guardian Name" name="gname" value="<?php echo "$gname" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>RELATION</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="relation" value="<?php echo "$relation" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="husband">Husband</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group">
                            <label class="label-control"></label>
                            <label class="text-info"><b>DATE OF BIRTH</b></label>
                            <input type="text" class="form-control datepicker" name="dob" value="<?php echo "dob" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>CATEGORY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="category" value="<?php echo "$category" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="st">ST</option>
                                <option value="sc">SC</option>
                                <option value="general">GENERAL</option>
                                <option value="obc">OBC</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>RELIGION</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="religion" value="<?php echo "$religion" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="hindu">Hindu</option>
                                <option value="muslim">Muslim</option>
                                <option value="christaian">Christian</option>
                                <option value="sikh">Sikh</option>
                                <option value="buddist">Buddhist</option>
                                <option value="jainism">Jainism</option>
                                <option value="others">Others</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>EDUCATON</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="education" value="<?php echo "$education" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="8th Pass / Equivalent">8th Pass / Equivalent</option>
                                <option value="M.P Pass / Equivalent">M.P Pass / Equivalent</option>
                                <option value="H.S Pass / Equivalent">H.S Pass / Equivalent</option>
                                <option value="Graduation Pass / Equivalen">Graduation Pass / Equivalen</option>
                                <option value="Post Graduation Pass / Equivalen">Post Graduation Pass / Equivalen</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                          <div class="form-group has-default">
                            <label class="text-info"><b>ADDRESS</b></label>
                            <input type="text" class="form-control" placeholder="Enter Village/Town/Street/City" name="address" value="<?php echo "$address" ;?>" readonly>
                          </div>
                        </div>
                         <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>STATE</b></label>
                              <input type="text" class="form-control" placeholder="Enter State Name" name="state" value="<?php echo "$state" ;?>" readonly>
                            </div>
                          </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>DISTRICT</b></label>
                            <input type="text" class="form-control" placeholder="Enter District Name" name="district" value="<?php echo "$district" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POST OFFICE</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.O. Name" name="post" value="<?php echo "$post" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POLICE STATION</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.S. Name" name="police" value="<?php echo "$police" ;?>" readonly>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>PIN CODE</b></label>
                            <input type="text" class="form-control" placeholder="Enter PIN Code" name="pin" value="<?php echo "$pin" ;?>" readonly>
                          </div>
                        </div>
                        
                      </div>
                   
         
                  </div>
                </div>
                </div>
            </div>


      <!-- Self Help Group Member Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Course Details</h4>
                  <div class="card-body">
              
                      <div class="form-row">
                      
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT TRAINIG COURSE<a class="text-danger"> *</a></b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="course" value="<?php echo "$course" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="Dairy Farming">Diary Farming</option>
                                <option value="Napkin Production">Napkin Production</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT COURSE DURATION<a class="text-danger"> *</a></b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="course_duration" value="<?php echo "$course_duration" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="7 Days">7 Days</option>
                                <option value="15 Days">15 Days</option>
                                <option value="1 Month">1 Month</option>
                                <option value="3 Month">3 Month</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT PREFERRED LOCATION</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="location" value="<?php echo "$location" ;?>" readonly>
                                <option disabled>Select Any</option>
                                <option value="Kokrajhar">Kokrajhar</option>
                                <option value="Chirang">Chirang</option>
                                <option value="Baksa">Baksa</option>
                                <option value="Udalguri">Udalguri</option>
                              </select>
                            </div>
                          </div>
  
                        </div>
          
                  </div>
                </div>
                </div>
            </div>

      <!-- Self Help Group Extra Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Extra Information</h4>
                  <div class="card-body">
              
                      <div class="form-row">
                      
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD PHOTO</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File (Passport Photo)" name="photo" value="<?php echo "$photo" ;?>" readonly>
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD VOTER/AADHAAR</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File" name="voter_aadhaar" value="<?php echo "$evoter_aadhaar" ;?>" readonly>
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD EDUCATION CERTIFICATE</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File" name="education_cer" value="<?php echo "$education_cer" ;?>" readonly>
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                    
                        </div>
          
                  </div>
                </div>
                </div>
            </div>


        <!-- Self Help Group BANK Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Bank Details</h4>
                  <div class="card-body">
             
                      <div class="form-row">
                      
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>A/C NUMBER</b></label>
                              <input type="text" class="form-control" placeholder="Enter Account Number" name="ac_no" value="<?php echo "$ac_no" ;?>" readonly>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>IFSC CODE</b></label>
                              <input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc" value="<?php echo "$ifsc" ;?>" readonly>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BANK NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Bank Name" name="bank_name" value="<?php echo "$bank_name" ;?>" readonly>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BRANCH NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Branch Name" name="branch_name" value="<?php echo "$branch_name" ;?>" readonly>
                            </div>
                          </div>

                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD BANK DOCUMENT (Passbook/Cancelled Cheque)</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File" name="passbook" value="<?php echo "$passbook" ;?>" readonly>
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                         
                          
                          <div class="form-group col-lg-12 col-sm-12">
                           <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  I Aggree
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                              </label>
                            </div>
                          </div>
                          <button type="button" class="btn btn-primary" onclick="window.history.back();">Back</button>
                          <button type="submit" class="btn btn-primary" name="submit_trainee">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Reg. Form End -->


      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>