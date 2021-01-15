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
                <h2>Register Your NGO</h2>
              </div>
         
            </div>
          </div>
        </div>


    <!-- Reg. Form Content Start-->
      <div class="section">
            
          <!-- Self Help Group Details -->
          <form method="post" action="./admin/backend/ngo_insert.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">NGO Details</h4>
                  <div class="card-body">
                  
                      <div class="form-row">
                        <div class="col-lg-6 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>REGISTRATION NUMBER</b></label>
                            <input type="text" class="form-control" placeholder="Enter NGO Registration Number" name="registration_no">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>NGO NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter NGO Name" name="group_name">
                          </div>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD REGISTRATION DOCUMENT (If Any)</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File" name="registration_file" onchange="//readURL(this,'blahClone2');">
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

      <!-- Self Help Group Contact Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Contact Information</h4>
                  <div class="card-body">
                   
                      <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                          <div class="form-group has-default">
                            <label class="text-info"><b>ADDRESS</b></label>
                            <input type="text" class="form-control" placeholder="Enter Village/Town/Street/City" name="address">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT DISTRICT</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select District" data-size="7" name="dist" required>
                                <option disabled>Select District</option>
                                <?php include('./includes/htmlpart/district.php');?>
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
                            <label class="text-info"><b>POST OFFICE</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.O. Name" name="post_office">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POLICE STATION</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.S. Name" name="police_station">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>PIN CODE</b></label>
                            <input type="text" class="form-control" placeholder="Enter PIN Code" name="pin">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT STATE</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select State" data-size="7" name="state" required>
                                <option disabled>Select state</option>
                                <?php include('./includes/htmlpart/state.php');?>
                              </select>
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
                  <h4 class="card-title text-center">Head Information</h4>
                  <div class="card-body">
                
                      <div class="form-row">
                      
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT CATEGORY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7" name="head_position">
                                <option disabled>Choose city</option>
                                <option value="2">President</option>
                                <option value="3">Secratary</option>
                                <option value="3">Director</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                            <div class="form-group has-default">
                              <label class="text-info"><b>NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Your Name" name="head_name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>CONTACT NUMBER</b></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Name" name="head_mobile">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>E-MAIL</b></label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Id" name="head_email">
                             
                            </div>
                          </div>

                        </div>
                    
                  </div>
                </div>
                </div>
            </div>


            <!-- Self Help Group Member Info -->

            <div class="row"  id="add_member_container">
          
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Member Information</h4>
                  <div class="card-body">
                      <div class="form-row">                      
                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group has-default">
                              <label for="MemberName" class="text-info"><b>MEMBER NAME</b></label>
                              <input type="text" class="form-control" id="MemberName" placeholder="Enter Your Name">
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group">
                              <label for="SelectGender" class="text-info"><b>SELECT GENDER</b></label> <br>
                                <select class="selectpicker" data-style="select-with-transition" id="SelectGender" title="Select Gender" data-size="7">
                                <option disabled>Select Gender</option>
                                <option value="2">MALE</option>
                                <option value="3">FEMALE</option>                                
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label for="InputAge" class="text-info"><b>AGE</b></label>
                              <input type="email" class="form-control" id="InputAge" aria-describedby="emailHelp" placeholder="Enter Age">
                             
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label for="InputQualification" class="text-info"><b>QUALIFICATION</b></label>
                              <input type="email" class="form-control" id="InputQualification" aria-describedby="emailHelp" placeholder="Enter Qualification, if any">
                             
                            </div>
                          </div>
                         
                          <div class="text-center">
                            <button type="button" class="btn btn-primary btn-round" id="add_member">Add Member</button>                                                      
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
                            <div class="form-group has-default">
                              <label class="text-info"><b>AREA OF INTEREST</b></label>
                              <input type="text" class="form-control" placeholder="Enter Area of Interest" name="area_of_interest">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>GROUP EXPERIENCE</b></label>
                              <input type="text" class="form-control" placeholder="Enter Group Experience, if any" name="group_exp">
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
                              <input type="text" class="form-control" placeholder="Enter Account Number" name="acc_no">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>IFSC CODE</b></label>
                              <input type="text" class="form-control" placeholder="Enter IFSC Code" name="ifsc_code">
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
                              <input type="file" multiple="" class="inputFileHidden">
                              <div class="input-group">
                                <input type="text" class="form-control inputFileVisible" placeholder="Select File" name="passbook_file" onchange="//readURL(this,'blahClone');">
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
                                  I Agree
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                              </label>
                            </div>
                          </div>
                          <button type="button" class="btn btn-success" onclick="previewForm()" data-toggle="modal" data-target="#myModal">Preview</button>
                          <button id="submitForm" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                
                  </div>
                </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Reg. Form End -->

      </div>
    </div>
  </div>
  <?php include('./includes/htmlpart/previewmodal.php');?>
<?php include('includes/footer.php'); ?>