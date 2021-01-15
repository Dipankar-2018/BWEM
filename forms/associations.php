<?php include('includes/form-header.php');?>


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
                <h2>Register Your Association</h2>
              </div>
            </div>
          </div>
        </div>


    <!-- Reg. Form Content Start-->
      <div class="section">
      
        <!-- Self Help Group Details -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Association's Details</h4>
                  <div class="card-body">
                    <form>
                      <div class="form-row">
                        <div class="col-lg-6 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>REGISTRATION NUMBER (if any)</b></label>
                            <input type="text" class="form-control" placeholder="Enter Association Registration Number">
                          </div>
                        </div>
                        <div class="col-lg-6 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>Association NAME</b></label>
                            <input type="text" class="form-control" placeholder="Enter Association Name">
                          </div>
                        </div>

                         <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD ASSOCIATION DOCUMENT (If Any)</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
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
                  </form>
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
                    <form>
                      <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                          <div class="form-group has-default">
                            <label class="text-info"><b>ADDRESS</b></label>
                            <input type="text" class="form-control" placeholder="Enter Village/Town/Street/City">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>DISTRICT</b></label>
                            <input type="text" class="form-control" placeholder="Enter District Name">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POST OFFICE</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.O. Name">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>POLICE STATION</b></label>
                            <input type="text" class="form-control" placeholder="Enter P.S. Name">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>PIN CODE</b></label>
                            <input type="text" class="form-control" placeholder="Enter PIN Code">
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4">
                          <div class="form-group has-default">
                            <label class="text-info"><b>STATE</b></label>
                            <input type="text" class="form-control" placeholder="Enter State Name">
                          </div>
                        </div>

                    </div>
                  </form>
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
                    <form>
                      <div class="form-row">
                      
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
                              <label class="text-info"><b>SELECT CATEGORY</b></label>
                                <select class="selectpicker" data-style="select-with-transition" title="Select Category" data-size="7">
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
                              <input type="text" class="form-control" placeholder="Enter Your Name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>CONTACT NUMBER</b></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>E-MAIL</b></label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-Mail Id">
                             
                            </div>
                          </div>

                        </div>
                    </form>
                  </div>
                </div>
                </div>
            </div>


            <!-- Self Help Group Member Info -->

            <div class="row">
              <div class="col-md-12">
                  <div class="card card-signup">
                  <h4 class="card-title text-center">Member Information</h4>
                  <div class="card-body">
                    <form>
                      <div class="form-row">
                      
                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group has-default">
                              <label for="MemberName" class="text-info"><b>MEMBER NAME</b></label>
                              <input type="text" class="form-control" id="MemberName" placeholder="Enter Your Name">
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                            <div class="form-group has-default">
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
                            <a href="#pablo" class="btn btn-primary btn-round">Add Member</a>
                          </div>
                        </div>
                    </form>
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
                    <form>
                      <div class="form-row">
                      
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>AREA OF INTEREST</b></label>
                              <input type="text" class="form-control" placeholder="Enter Area of Interest">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>GROUP EXPERIENCE</b></label>
                              <input type="text" class="form-control" placeholder="Enter Group Experience, if any">
                            </div>
                          </div>
                    
                        </div>
                    </form>
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
                    <form>
                      <div class="form-row">
                      
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>A/C NUMBER</b></label>
                              <input type="text" class="form-control" placeholder="Enter Account Number">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>IFSC CODE</b></label>
                              <input type="text" class="form-control" placeholder="Enter IFSC Code">
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BANK NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Bank Name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-sm-6">
                            <div class="form-group has-default">
                              <label class="text-info"><b>BRANCH NAME</b></label>
                              <input type="text" class="form-control" placeholder="Enter Branch Name">
                            </div>
                          </div>

                          <div class="col-lg-12 col-sm-12">
                            <div class="form-group form-file-upload form-file-multiple">
                              <label class="text-info"><b>UPLOAD BANK DOCUMENT (Passbook/Cancelled Cheque)</b></label>
                              <input type="file" multiple="" class="inputFileHidden">
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
                          <button type="submit" class="btn btn-primary">Submit</button>
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
<?php include('includes/footer.php');?>