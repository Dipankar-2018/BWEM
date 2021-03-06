<?php 
$isForm=true;
include('../includes/form-header.php'); 
?>           

<!-- Navigation End -->  

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised" style="z-index: 1000;">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
              <img src="../assets/img/logos/logo.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h2>Register as a Trainer</h2>
              </div>
            </div>
          </div>
        </div>


    <!-- Reg. Form Content Start-->
      <div class="section">
      
       

      <!-- Self Help Group Contact Info -->
      <form method="post" action="../admin/backend/tr_insert.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Trainer Form</h4>
                
                  <div class="card-body">                   
                      <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Your/Traier Name" name="name" required>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>E-MAIL</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Id" name="email" required>
                           
                          </div>
                        </div>

                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>CONTACT NUMBER</b></label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" required>
                          </div>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <div class="form-group has-default">
                            <label class="text-info"><b>GUARDIAN'S NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Guardian Name" name="gname" required>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>RELATION</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="relation" required>
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
                            <input type="date" class="form-control datepicker" value="10/10/1992" name="dob" required>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>CATEGORY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="category" required>
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="religion" required>
                                <option disabled>Select Any</option>
                                <option value="hindu">Hindu</option>
                                <option value="muslim">Muslim</option>
                                <option value="christian">Christian</option>
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="education" required> 
                                <option disabled>Select Any</option>
                                <option value="8th Pass / Equivalent">8th Pass / Equivalent</option>
                                <option value="M.P Pass / Equivalent">M.P Pass / Equivalent</option>
                                <option value="H.S Pass / Equivalent">H.S Pass / Equivalent</option>
                                <option value="Graduation Pass / Equivalent">Graduation Pass / Equivalen</option>
                                <option value="Post Graduation Pass / Equivalent">Post Graduation Pass / Equivalen</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8">
                          <div class="form-group has-default">
                            <label class="text-info"><b>ADDRESS</b></label>
                            <input type="text" class="form-control" placeholder="Enter Village/Town/Street/City" name="address" required>
                          </div>
                        </div>
                         <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>STATE</b></label>
                              <select class="selectpicker" data-style="select-with-transition" title="Select State" data-size="7" name="state" required>
                                <option disabled>Select state</option>
                                <?php include('./includes/htmlpart/state.php');?>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT CONSTITUENCY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Constituency" data-size="7" name="constituency" required>
                                <option disabled>Select Constituency</option>
                                <?php include('./includes/htmlpart/constituency.php');?>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>DISTRICT</b></label>
                            <select class="selectpicker" data-style="select-with-transition" title="Select District" data-size="7" name="dist" required>
                                <option disabled>Select District</option>
                                <?php include('./includes/htmlpart/district.php');?>
                              </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POST OFFICE</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.O. Name" name="post_office" required>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POLICE STATION</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.S. Name" name="police_station" required>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>PIN CODE</b></label>
                            <input type="text" class="form-control" placeholder="Enter PIN Code" name="pin" required>
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
                              <label class="text-info"><b>SELECT AREA OF INTEREST<a class="text-danger"> *</a></b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="aoi" requied>
                                <option disabled>Select Any</option>
                                <option value="Diary Farming">Diary Farming</option>
                                <option value="Napkin Production">Napkin Production</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT YEAR OF EXPERIENCE<a class="text-danger"> *</a></b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="year_of_exp" requied>
                                <option disabled>Select Any</option>
                                <option value="1 Year">1 Year</option>
                                <option value="2 Year">2 Year</option>
                                <option value="3 Year">3 Year</option>
                                <option value="4 Year">4 Year</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT PREFERRED LOCATION</b><a class="text-danger"> *</a></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="location" requied>
                                <option disabled>Select Any</option>
                                <option value="kokrajhar">Kokrajhar</option>
                                <option value="chirang">Chirang</option>
                                <option value="baksa">Baksa</option>
                                <option value="udalguri">Udalguri</option>
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
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD PHOTO</b><a class="text-danger"> *</a></label>
                              <input type="file" class="inputFileHidden" onchange="readURL(this,'photo');" name="photo" required>
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File (Passport Photo)">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD VOTER/AADHAAR</b><a class="text-danger"> *</a></label>
                              <input type="file" class="inputFileHidden" onchange="readURL(this,'voter_aadhaar');" name="voter_aadhaar" required>
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD EDUCATION CERTIFICATE</b><a class="text-danger"> *</a></label>
                              <input type="file" class="inputFileHidden" onchange="readURL(this,'edu_cer');" name="education_cer" required>
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD WORK EXPERIENCE CERTIFICATE</b><a class="text-danger"> *</a></label>
                              <input type="file" class="inputFileHidden" onchange="readURL(this,'work_exp');" name="work_exp" required>
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File">
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
                              <input type="text" class="form-control" placeholder="Enter Account Number" name="ac_no" required>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>IFSC CODE</b></label>
                              <input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc" required>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BANK NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Bank Name" name="bank_name" required>
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BRANCH NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Branch Name" name="branch_name" required>
                            </div>
                          </div>

                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD BANK DOCUMENT (Passbook/Cancelled Cheque)</b></label>
                              <input type="file" multiple="" class="inputFileHidden" onchange="readURL(this,'passbook');" name="passbook_file" required>
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-link btn-fab btn-primary">
                                    <i class="material-icons">attach_file</i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                         
                          
                          <div class="form-group col-lg-12 col-sm-12">
                           <!-- <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  I Aggree
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                              </label>
                            </div>
                          </div> -->
                          <button id="modalActivate" type="button" name="preview" class="btn btn-success" onclick="previewTrainerForm()" data-toggle="modal" data-target="#exampleModalPreview">Preview</button>
                          <button id="submitMainForm" type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                 
                  </div>
                </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Reg. Form End -->
      </div>

      </div>
    </div>
  </div>

<?php include('./includes/htmlpart/previewmodal-trainer.php');?>
<?php include('../includes/footer.php'); ?>