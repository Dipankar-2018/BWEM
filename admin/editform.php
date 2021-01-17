<?php include("conn/database.php");
if(!isset($_GET['cat']) || !isset($_GET['id']))
{
  header('location:./');
}
    $obj = new query();
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="self_help_group";
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_GET['cat'])];
else
    header('location:./');


if(isset($_POST['memberId'])){

    $condition_arr=array('id'=>$obj->get_safe_str($_POST['memberId']));
    $obj->deleteData($table.'_members',$condition_arr);
    echo 1;
    die();
}


if(isset($_GET['id'])){
$id=$obj->get_safe_str($_GET['id']);
$result=$obj->getData($table,'*',array('id'=>$id))[0];
$members=$obj->getData($table.'_members','*',array('group_name'=>$result['group_name']));
// print_r($result);
// print_r(sizeof($members));
// exit;

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
            <h1 class="m-0">FORM EDIT</h1>
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
                <h3 class="card-title"><?php echo strtoupper($val);?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add-data" method="post" action="backend/<?php echo $key;?>_update.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="registrationNumber">Enter Registration Number</label>
                    <input value="<?php echo $result['registration_no'];?>" type="text" class="form-control" id="registrationNumber" placeholder="Enter Registration Number" name="registration_no">
                    <input value="<?php echo $_GET['cat'];?>" type="hidden" name="type"/>  
                    <input value="<?php echo $id;?>" type="hidden" name="id"/>  
                </div>
                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input value="<?php echo $result['group_name'];?>" type="text" class="form-control" id="registrationNumber" placeholder="Enter Group Name" name="group_name">
                  </div>             
               <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small mb-4 text-success text-bold">Contact Information</h6>       
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input value="<?php echo $result['address'];?>" id="input-address" class="form-control" placeholder="Address - Street / Village / Town / City" type="text" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Post Office</label>
                        <input value="<?php echo $result['post_office'];?>" type="text" id="input-city" class="form-control" placeholder="Post Office" value="" name="post_office">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <input value="<?php echo $result['police_station'];?>" type="text" id="input-postal-code" class="form-control" placeholder="Police Station" name="police_station">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>
                        <!-- <input value="<?php //echo $result['district'];?>"  type="text" id="input-country" class="form-control" placeholder="District" value="" name="dist"> -->
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="dist" required>
                            <option value="<?php echo $result['district'];?>"><?php echo ucfirst($result['district']);?></option>
                            <?php include('../forms/includes/htmlpart/district.php');?>                              
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Constituency</label>
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="constituency" required>
                            <option value="<?php echo $result['constituency'];?>"><?php echo $result['constituency'];?></option>
                            <?php include('../forms/includes/htmlpart/constituency.php');?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input value="<?php echo $result['pin'];?>" type="number" id="input-postal-code" class="form-control" placeholder="Postal code" name="pin">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-state">State</label>
                        <!-- <input value="<?php //echo $result['state'];?>" type="text" id="input-state" class="form-control" placeholder="State" name="state" > -->
                        <select class="selectpicker form-control" data-style="btn btn-white"  name="state" required>
                            <option value="<?php echo $result['state'];?>"><?php echo ucfirst($result['state']);?></option>
                            <?php include('../forms/includes/htmlpart/state.php');?>                            
                        </select>
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Head Information</h6>  

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">

                     <label for="form-control-label">Select Category</label>
                     <select class="selectpicker form-control" data-style="btn btn-white" id="HonourSelect"  onchange = "showHideMajor(this.value);" name="head_position" required>
                     <option value="<?php echo ucwords($result['category']);?>"><?php echo $result['category'];?></option>
                        <option value="President">President</option>
                        <option value="Secretary">Secretary</option>
                        <option value="Director">Director</option>                              
                     </select>

                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input value="<?php echo $result['name_of_head'];?>" type="text" id="input-first-name" class="form-control" placeholder="Enter your name" name="head_name" required>
                      </div>
                    </div>       
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-mobile">Mobile</label>
                           <input value="<?php echo $result['head_mobile'];?>" type="text" id="input-mobile" class="form-control" placeholder="Enter your mobile" name="head_mobile" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-email">Email</label>
                           <input value="<?php echo $result['head_email'];?>" type="text" id="input-email" class="form-control" placeholder="Enter your email" name="head_email" required >
                        </div>
                      </div>            
                    </div>
                    <hr class="my-4" />     
                     <h6 class="heading-small mb-4 text-success text-bold">Member Information</h6>
                      <div class="button">
                        <button class="btn btn-success btn-sm mb-2" id="add-member">Add Member</button>
                      </div>
                      <!-- add-member-start -->
                      <div class="content-wrapper-add-member">
                        <?php
                        for($i=0;$i<count($members);$i++){
                            echo '
                                <div class="col-12">
                                <div class="row">            
                                <div class="col-11"></div> 
                                <span onclick="deleteMember('.$members[$i]['id'].',this)" class="closebtn fas fa-trash fa-adjust text-danger"></span>                            
                                <div class="col-lg-12">
                                    <div class="form-group" id="input_fields_wrap">
                                    <label for="form-control-label">Member Name</label>
                                    <input value="'.$members[$i]['name'].'" type="text" class="member_name form-control" placeholder="Enter member name" name="member_name_e[]" required>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Select gender</label>
                                    <select class="selectpicker member_gender form-control" data-style="btn btn-white" onchange = "showHideMajor(this.value);" name="member_gender_e[]" required>
                                    <option value="'.$members[$i]['gender'].'">'.ucwords($members[$i]['gender']).'</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Others</option>                              
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Enter age</label>
                                    <input value="'.$members[$i]['age'].'" type="text" class="member_age form-control" placeholder="Enter age" name="member_age_e[]" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label for="form-control-label">Enter Qualification</label>
                                    <input value="'.$members[$i]['qualification'].'" type="text" class="member_qualification form-control" placeholder="Enter Qualification" name="member_qualification_e[]" required>
                                    </div>
                                </div>
                                </div>
                            </div>                          
                            ';
                        }
                        ?>

                       </div>
                      <!-- add-member-end -->

                    <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Extra Information</h6>  
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Area of Interest</div>
                              <input value="<?php echo $result['aoi'];?>" type="text" id="input-area-of-interest" class="form-control" placeholder="Enter Area of Interest" name="area_of_interest">
                            </div>
                          </div>                       
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Group Experience</div>
                              <input value="<?php echo $result['group_experience'];?>" type="text" id="input-area-of-experience" class="form-control" placeholder="Enter group experience" name="group_exp">
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
                        <label class="form-control-label" for="input-username">A/C Number</label>                   
                        <input value="<?php echo $result['bank_account_no'];?>" type="text" id="input-username" class="form-control" placeholder="A/C Number" name="acc_no">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">IFSC Code</label>
                        <input value="<?php echo $result['ifsc'];?>" type="text" id="input-username" class="form-control" placeholder="IFSC Code" name="ifsc_code">
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Bank Name</label>
                        <input value="<?php echo $result['bank_name'];?>" type="text" id="input-username" class="form-control" placeholder="Bank Name" name="bank_name">
                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Branch Name</label>
                        <input value="<?php echo $result['branch_name'];?>" type="text" id="input-username" class="form-control" placeholder="Branch Name" name="branch_name">
                        
                      </div>
                    </div>
                    </div>                 
                  <div class="form-group">
                  
                      <div class="btn btn-default btn-file  col-6">
                      <label for="exampleInputFile">Upload Bank document</label>                 
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile2"  onchange="readURL(this,'blah');readURL(this,'blahClone');" name="passbook_file">
                            <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <?php if(isset($result['passbook_file'])&&$result['passbook_file']!=""){
                                echo '<img id="blah" src="./images/bankPassbook/'.$result['passbook_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blah" src="#" style="display: none;" />';
                          }
                          
                        ?>
                  </div>
                  <div class="form-group">                  
                      <div class="btn btn-default btn-file  col-6">
                      <label for="exampleInputFile">Upload registration document (if any)</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile2"  onchange="readURL(this,'blah2');readURL(this,'blahClone2');" name="registration_file">
                            <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="help-block">Max. 500KB</p> -->
                      <?php if(isset($result['registration_certificate_file'])&&$result['registration_certificate_file']!=""){
                                echo '<img id="blah2" src="./images/registrationCertificate/'.$result['registration_certificate_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blah2" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" onclick="previewForm()" data-toggle="modal" data-target="#myModal">Preview</button>
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
                  <div class="form-group">
                    <label class="form-control-label">Registration Number:</label>
                    <span class="form-control" id="registration_no">1234</span>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Group Name:</label>
                    <span class="form-control" id="group_name">1234</span>
                  </div>             
               <hr class="my-4" />
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
                        <span class="form-control" id="post_office">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Police Station</label>
                        <span class="form-control" id="police_station">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">District</label>
                        <span class="form-control" id="dist">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Constituency</label>
                        <span class="form-control" id="constituency">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <span class="form-control" id="pin">1234</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">State</label>
                        <span class="form-control" id="state">1234</span>
                      </div>
                    </div>
                 
                  </div>
                <hr class="my-4" />     
                  <h6 class="heading-small mb-4 text-success text-bold">Head Information</h6>  

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">

                     <label for="form-control-label">Category</label>
                     <span class="form-control" id="head_position">1234</span>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <span class="form-control" id="head_name">1234</span>
                      </div>
                    </div>       
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-mobile">Mobile</label>
                          <span class="form-control" id="head_mobile">1234</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="form-control-label" for="input-email">Email</label>
                          <span class="form-control" id="head_email">1234</span>
                        </div>
                      </div>            
                    </div>
                    <hr class="my-4" />     
                     <h6 class="heading-small mb-4 text-success text-bold">Member Information</h6>
                      
                      <!-- loop-member-list -->
                      <div id="member-list">
                          
                          

                       </div>
                      <!-- member-list-end -->

                    <hr class="my-4" />     
                      <h6 class="heading-small mb-4 text-success text-bold">Extra Information</h6>  
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Area of Interest</div>
                              <span class="form-control" id="area_of_interest">1234</span>
                            </div>
                          </div>                       
                          <div class="col-lg-6">
                            <div class="form-group">
                              <div class="form-control-label text-bold">Group Experience</div>
                              <span class="form-control" id="group_exp">1234</span>
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
                        <label class="form-control-label" for="input-username">A/C Number</label>          
                        <span class="form-control" id="acc_no">1234</span>   
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">IFSC Code</label>
                        <span class="form-control" id="ifsc_code">1234</span>
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Bank Name</label>
                        <span class="form-control" id="bank_name">1234</span>                     
                      </div>
                    </div>
                    <div class="col-6 col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Branch Name</label>
                        <span class="form-control" id="branch_name">1234</span>                        
                      </div>
                    </div>
                    </div>                        
                    <hr style="margin:2px 0px 2px 0px;"/>           
                  <div class="col-12">                  
                      <div class="col-6">
                        <label class="form-control-label col-6">Bank document</label>
                        <?php if(isset($result['passbook_file'])&&$result['passbook_file']!=""){
                                echo '<img id="blahClone" src="./images/bankPassbook/'.$result['passbook_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blahClone" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      </div>
                      <hr style="margin:2px 0px 2px 0px;"/>
                      <div class="col-6">
                      <label class="form-control-label col-6">Registration Document</label>
                      <?php if(isset($result['registration_certificate_file'])&&$result['registration_certificate_file']!=""){
                                echo '<img id="blahClone2" src="./images/registrationCertificate/'.$result['registration_certificate_file'].'" style="height:150px;width:200px"/>';                            
                          }
                          else{
                              echo '<img id="blahClone2" src="#" style="display: none;" />';
                          }
                          
                        ?>
                      </div>
                  </div>
              </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" onclick="$('#submitForm').click();"  data-dismiss="modal">Final Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
<?php include('includes/footer.php');

}
?>
