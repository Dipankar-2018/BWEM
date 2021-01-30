<?php include("conn/database.php");
// if(!isset($_GET['cat'])&& !isset($_GET['dist']))
// {
//   header('location:./');
// }
// if(isset($_GET['id'])){
$obj = new query();
// $id=$obj->get_safe_str($_GET['id']);
// $result=$obj->getData('self_help_group','*',array('id'=>$id));
// $members=$obj->getData('self_help_group_members','*',array('parent_id'=>$id));
// print_r($result);
// print_r($members);
// }
$key='shg';
$val='Self Help Group';
$cat=array('shg'=>'Self Help Group','ep'=>'Entreprenures','ng'=>'NGO','as'=>'Association','tr'=>'trainer','tre'=>'trainee');
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat)){
    $key=$obj->get_safe_str($_GET['cat']);
    $val=$cat[$key];
  }
?>





<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>

<style>
.closebtn {
  float: right!important;
  cursor: pointer!important;;
}
.closebtn:hover {
  color: #000!important;;
}
</style>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">FORM </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">   
        
             <!-- general form elements -->
             <div class="card card-success">
              <div class="card-header">
                <!-- <h3 class="card-title"><?php echo strtoupper($val);?></h3> -->
                <h3 class="card-title">TRAINEE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-data" method="post" action="backend/<?php echo $key;?>_insert.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="name">Enter Traineer Name</label>
                         <input type="text" class="form-control" placeholder="Enter Traineer Name" name="name">
                     </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="email">Enter Traineer email</label>
                         <input type="text" class="form-control" placeholder="Enter Traineer email" name="email">
                     </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="contact">Enter Traineer Contact</label>
                         <input type="text" class="form-control" placeholder="Enter Traineer Contact" name="contact">
                     </div>
                      </div>
                   </div>                     
      
               <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                         <label for="gname">Gurdian's Name</label>
                         <input type="text" class="form-control"  placeholder="Gurdain's Name" name="gname">
                     </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                         <label for="relation">Relation</label>
                         <select class="selectpicker form-control" data-style="btn btn-white"  name="relation" required>
                             <option value="" disabled selected>Select Category</option>
                             <option value="father">Father</option>
                             <option value="mother">Mother</option>
                            <option value="husband">Husband</option>                              
                        </select>
                     </div>
                      </div>                
                </div>

                <div class="row">
                <div class="col-md-3">
                      <div class="form-group">
                         <label for="dob">Date of Birth</label>
                         <input class="form-control" type="date" name="dob" >
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="category">Category</label>
                         <select class="selectpicker form-control" data-style="btn btn-white" name="category" required>
                             <option value="" disabled selected>Select Category</option>
                             <option value="st">ST</option>
                             <option value="sc">SC</option>
                            <option value="obc">OBC</option>                              
                            <option value="general">GENERAL</option>                              
                        </select>
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="religion">Religion</label>
                         <select class="selectpicker form-control" data-style="btn btn-white"  name="religion" required>
                             <option value="" disabled selected>Select Category</option>
                             <option value="Hindu">Hindu</option>
                             <option value="Muslim">Muslim</option>
                            <option value="Christian">Christian</option>                              
                            <option value="Sikh">Sikh</option>                              
                            <option value="Buddhist">Buddhist</option>                              
                            <option value="Jainism">Jainism</option>                              
                        </select>
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="education">Education</label>
                         <select class="selectpicker form-control" data-style="btn btn-white"  name="education" required>
                             <option value="" disabled selected>Select Category</option>
                             <option value="8th Pass / Equivalent">8th Pass / Equivalent</option>
                             <option value="M.P Pass / Equivalent">M.P Pass / Equivalent</option>
                             <option value="H.S Pass / Equivalent">H.S Pass / Equivalent</option>
                             <option value="Graduation Pass / Equivalent">Graduation Pass / Equivalent</option>
                             <option value="Post Graduation Pass / Equivalent">Post Graduation Pass / Equivalent</option>                                                    
                        </select>
                      </div>
                   </div>                
                </div>


                <!-- Address -->
                <h6 class="heading-small mb-4 text-success text-bold">Contact Information</h6>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control" placeholder="Address - Street / Village / Town / City" type="text" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Post Office</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Post Office" value="" name="post">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <input type="text" id="input-postal-code" class="form-control" placeholder="Police Station" name="police">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>                  
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="district" required>
                          <option value="" disabled selected>Select District</option>
                          <?php include('../forms/includes/htmlpart/district.php');?>                            
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Constituency</label>
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="constituency" required>
                            <option value="" disabled selected>Select Constituency</option>
                            <?php include('../forms/includes/htmlpart/constituency.php');?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code" name="pin">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">State</label>                     
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="state" required>
                            <option value="" disabled selected>Select State</option>
                            <?php include('../forms/includes/htmlpart/state.php');?>                             
                        </select>
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Course Details</h6>  

                <div class="row">

                  <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT TRAINING COURSE *</label>
                     <select class="selectpicker form-control" data-style="btn btn-white" onchange = "//showHideMajor(this.value);" name="course" required>
                     <option value="" disabled selected>Select Category</option>
                        <option value="President">Dairy Farmng</option>
                        <option value="Secretary">Napkin Production</option>                                             
                     </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT COURSE DURATION *</label>
                     <select class="selectpicker form-control" data-style="btn btn-white"  onchange = "//showHideMajor(this.value);" name="course_duration" required>
                     <option value="" disabled selected>Select Category</option>
                        <option value="1 year">1 Year</option>                 
                        <option value="2 year">2 Year</option>                              
                        <option value="3 year">3 Year</option>                              
                        <option value="4 year">4 Year</option>                              
                     </select>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT PREFERRED LOCATION *</label>
                     <select class="selectpicker form-control" data-style="btn btn-white"  onchange = "//showHideMajor(this.value);" name="location" required>
                     <option value="" disabled selected>Select Category</option>
                        <option value="kokrajhar">Kokrajhar</option>
                        <option value="chirang">Chirang</option>
                        <option value="baksa">Baksa</option>                              
                        <option value="udalguri">Udalguri</option>                              
                     </select>
                    </div>
                    </div>
                </div>
              


           

                    <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Documents</h6>  
                      <div class="form-group">
                        <div class="row justify-content-around">                     
                          <div class="btn btn-default btn-file  col-5 ">
                            <label for="exampleInputFile">Upload Pasport Size photo</label>                 
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="InputFile-photo"  onchange="readURL(this,'photoClone');" name="photo">
                                  <label class="custom-file-label" for="InputFile-photo">Choose file</label>
                                </div>
                              </div>
                            </div>                                          
                           <div class="btn btn-default btn-file  col-5 ">
                          <label for="exampleInputFile">Upload Voter/Aaadhaar</label>                 
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputFile-address-proof"  onchange="readURL(this,'voter_aadhaarClone');" name="voter_aadhaar">
                                <label class="custom-file-label" for="inputFile-address-proof">Choose file</label>
                              </div>
                            </div>
                          </div>                     
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row justify-content-around">                     
                          <div class="btn btn-default btn-file  col-5 ">
                            <label for="exampleInputFile">Upload Education Certificate</label>                 
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputFile-education-cer"  onchange="readURL(this,'education_cerClone');" name="education_cer">
                                  <label class="custom-file-label" for="inputFile-education-cer">Choose file</label>
                                </div>
                              </div>
                            </div>                                         
                                    
                        </div>
                        </div>


                          <!-- BANK____DETAILS -->

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small mb-4 text-success text-bold">Bank Details</h6>
         
                
                  <div class="row">
                    <div class="col-6 col-lg-6">
                      <div class="form-group">                       
                        <label class="form-control-label" for="input-ac">A/C Number</label>                   
                        <input type="text" id="input-ac" class="form-control" placeholder="A/C Number" name="ac_no">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-ifsc">IFSC Code</label>
                        <input type="text" id="input-ifsc" class="form-control" placeholder="IFSC Code" name="ifsc">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-bank">Bank Name</label>
                        <input type="text" id="input-bank" class="form-control" placeholder="Bank Name" name="bank_name">
                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-branch">Branch Name</label>
                        <input type="text" id="input-branch" class="form-control" placeholder="Branch Name" name="branch_name">
                        
                      </div>
                    </div>
                    </div>                 
                  <div class="form-group">
                  
                      <div class="btn btn-default btn-file  col-6">
                      <label for="exampleInputFile">Upload Bank document</label>                 
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile2"  onchange="readURL(this,'passbook_file');readURL(this,'passbook_fileClone');" name="passbook_file">
                            <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <img id="passbook_file" src="#" style="display: none;" />
                  </div>     
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" onclick="previewTraineeForm()" data-toggle="modal" data-target="#myModal">Preview</button>
                  <button type="submit" id="submitForm" class="btn btn-warning" name="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          
          
          <!-- /.col-md-6 -->
        </div>



        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




    
    <!-- /.content -->
  </div>

  

<!-- Modal -->
  <div class="modal fade" id="myModal" style="height:95vh;overflow-y: scroll;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 aliign="center" class="modal-title font-weight-bolder">Form Preview</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="name">Enter Traineer Name</label>
                         <span class="form-control" id="name">1234</span>
                     </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="email">Enter Traineer email</label>
                         <span class="form-control" id="email">1234</span>
                     </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                         <label for="contact">Enter Traineer Contact</label>
                         <span class="form-control" id="contact">1234</span>
                     </div>
                      </div>
                   </div>                     
      
               <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                         <label for="gname">Gurdian's Name</label>
                         <span class="form-control" id="gname">1234</span>
                     </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                         <label for="relation">Relation</label>
                         <span class="form-control" id="relation">1234</span>
                     </div>
                      </div>                
                </div>

                <div class="row">
                <div class="col-md-3">
                      <div class="form-group">
                         <label for="dob">Date of Birth</label>
                         <span class="form-control" id="dob">1234</span>
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="category">Category</label>
                         <span class="form-control" id="category">1234</span>
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="religion">Religion</label>
                         <span class="form-control" id="religion">1234</span>
                     </div>
                      </div> 
                      <div class="col-md-3">
                      <div class="form-group">
                         <label for="education">Education</label>
                         <span class="form-control" id="education">1234</span>
                      </div>
                   </div>                
                </div>


                <!-- Address -->
                <h6 class="heading-small mb-4 text-success text-bold">Contact Information</h6>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <span class="form-control" id="address">1234</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Post Office</label>
                        <span class="form-control" id="post">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <span class="form-control" id="police">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>     
                        <span class="form-control" id="district">1234</span>   
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Constituency</label>
                        <span class="form-control" id="constituency">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Postal code</label>
                        <span class="form-control" id="pin">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">State</label>    
                        <span class="form-control" id="state">1234</span> 
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Course Details</h6>  

                <div class="row">

                  <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT TRAINING COURSE*</label>
                     <span class="form-control" id="course">1234</span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT COURSE DURATION *</label>
                     <span class="form-control" id="course_duration">1234</span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT PREFERRED LOCATION *</label>
                     <span class="form-control" id="location">1234</span>
                    </div>
                    </div>
                </div>
              


           

                <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Documents</h6>  
                      <div class="form-group">
                        <div class="row justify-content-around">                     
                     
                            <label for="exampleInputFile">Uploaded Pasport Size photo</label> 
                            <img id="photoClone" src="#" style="display: none;" />                    
                              
                            <label for="exampleInputFile">Uploaded Voter/Aaadhaar</label>     
                            <img id="voter_aadhaarClone" src="#" style="display: none;" />            
                            </div>
                            <div class="row justify-content-around"> 
                            <label for="exampleInputFile">Uploaded Education Certificate</label>       
                            <img id="education_cerClone" src="#" style="display: none;" />  
                                         
                        </div>
                      </div>


                          <!-- BANK____DETAILS -->

                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small mb-4 text-success text-bold">Bank Details</h6>
         
                
                  <div class="row">
                    <div class="col-6 col-lg-6">
                      <div class="form-group">                       
                        <label class="form-control-label" for="input-ac">A/C Number</label>  
                        <span class="form-control" id="ac_no">1234</span>                
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-ifsc">IFSC Code</label>
                        <span class="form-control" id="ifsc">1234</span>
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-bank">Bank Name</label>
                        <span class="form-control" id="bank_name">1234</span>                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-branch">Branch Name</label>
                        <span class="form-control" id="branch_name">1234</span>
                        
                      </div>
                    </div>
                    </div>                 
                    <div class="form-group">
                      <label for="exampleInputFile">Uploaded Bank document</label>                 
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <img id="passbook_fileClone" src="#" style="display: none;" />    
                </div>

              <!-- card-body-end -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" onclick="$('#submitForm').click();"  data-dismiss="modal">Final Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
