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
      
      <form action="preview-trainee.php" method="post" enctype="multipart/form-data">

          <!-- Self Help Group Contact Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Trainee Form</h4>
                  <div class="card-body">
                    
                      <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Your/Traiee Name" name="name">
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>E-MAIL</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Id" name="email">
                           
                          </div>
                        </div>

                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>CONTACT NUMBER</b></label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact">
                          </div>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <div class="form-group has-default">
                            <label class="text-info"><b>GUARDIAN'S NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Guardian Name" name="gname">
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>RELATION</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="relation">
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
                            <input type="text" class="form-control datepicker" name="dob">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                              <label class="text-info"><b>CATEGORY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="category">
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="religion">
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Any" data-size="7" name="education">
                                <option disabled>Select Any</option>
                                <option value="8th Pass / Equivalent">8th Pass / equivalent</option>
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
                            <input type="text" class="form-control" placeholder="Enter Village/Town/Street/City" name="address">
                          </div>
                        </div>
                         <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>STATE</b></label>
                              <input type="text" class="form-control" placeholder="Enter State Name" name="state">
                            </div>
                          </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>DISTRICT</b></label>
                            <input type="text" class="form-control" placeholder="Enter District Name" name="district">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POST OFFICE</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.O. Name" name="post">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POLICE STATION</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.S. Name" name="police">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>PIN CODE</b></label>
                            <input type="text" class="form-control" placeholder="Enter PIN Code" name="pin">
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="course">
                                <option disabled>Select Any</option>
                                <option value="Dairy Farming">Diary Farming</option>
                                <option value="Napkin Production">Napkin Production</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT COURSE DURATION<a class="text-danger"> *</a></b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="course_duration">
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
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="location">
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
                              <input type="file" class="inputFileHidden" name="photo" onchange="readURL(this,'photo');">
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
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD VOTER/AADHAAR</b></label>
                              <input type="file"  class="inputFileHidden" name="voter_aadhaar" onchange="readURL(this,'voter_aadhaar');">
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
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD EDUCATION CERTIFICATE</b></label>
                              <input type="file"  class="inputFileHidden" name="education_cer" onchange="readURL(this,'education_cer');">
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
                              <input type="text" class="form-control" placeholder="Enter Account Number" name="ac_no">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>IFSC CODE</b></label>
                              <input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc">
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BANK NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Bank Name" name="bank_name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BRANCH NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Branch Name" name="branch_name">
                            </div>
                          </div>

                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD BANK DOCUMENT (Passbook/Cancelled Cheque)</b></label>
                              <input type="file" class="inputFileHidden" onchange="readURL(this,'passbook');" name="passbook">
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
                          <button id="modalActivate" type="button" name="preview" class="btn btn-success" onclick="previewTraineeForm()" data-toggle="modal" data-target="#exampleModalPreview">Preview</button>
                          <button id="submitForm" type="submit" class="btn btn-primary" name="submit">Submit</button>
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

<?php include('./includes/htmlpart/previewmodal-trainee.php');?>
<?php include('includes/footer.php'); ?>