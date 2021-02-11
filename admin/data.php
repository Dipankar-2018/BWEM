<?php
if(!isset($_GET['cat'])&& !isset($_GET['dist']))
{
  header('location:./');
}
include("conn/database.php");
$obj = new query();
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="";

if(isset($_POST['cat'])&& $_POST['cat']!="" && array_key_exists($obj->get_safe_str($_POST['cat']),$cat))
    $table=$cat[$obj->get_safe_str($_POST['cat'])];

//Delete Code
if(isset($_POST['id']) && isset($_POST['delete']) &&$_POST['delete']){  
  $id=$obj->get_safe_str($_POST['id']);
  $condition_arr=array('id'=>$id);
  if($table=="trainer" || $table=="trainee"){
    $res1=$obj->deleteData($table,$condition_arr);
    $res2=true;
  }else{
    $result=$obj->getData($table,'group_name',array('id'=>$id));
    $res1=$obj->deleteData($table.'_members',array('group_name'=>$result[0]['group_name']));
    $res2=$obj->deleteData($table,$condition_arr);
  }
  // echo ($res1==true&&$res2==true)?1:0;
  die();
  exit;
}

// change status code
if(isset($_POST['id']) && isset($_POST['change']) &&$_POST['change']){  
  $id=$obj->get_safe_str($_POST['id']);
  $status=$obj->get_safe_str($_POST['status']);
  $condition_arr=array('formStatus'=>$status,'form_reviewed_on'=>date('Y-m-d'));
  $result=$obj->updateData($table,$condition_arr,'id',$id);

}
//Data Display 
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat)){
  $catagory=$table=$cat[$obj->get_safe_str($_GET['cat'])];
    $exclusion=($table=="trainer"||$table=="trainee");
    if($cat[$obj->get_safe_str($_GET['cat'])]=="self_help_group")
      $catagory="Self Help Group";
  }
else
    header('location:./');//$table="self_help_group";  
$dist="kokrajhar";

if(isset($_GET['dist'])&& $_GET['dist']!=""){
  $dist=$obj->get_safe_str($_GET['dist']);
  $result=$obj->getData($table,'*',array('district'=>$dist,'formStatus'=>'-1'));   
  $result2=$obj->getData($table,'*',array('district'=>$dist,'formStatus'=>'1')); 
  $result3=$obj->getData($table,'*',array('district'=>$dist,'formStatus'=>'0')); 
}else
    header('location:./');//$result=$obj->getData($table); 
// print_r($result);
if(count($result)==0)
$result=array();

$cat=$obj->get_safe_str($_GET['cat']);
$modalId="#myModal".($cat=="tr"?"-trainer":($cat=="tre"?"-trainee":""));
$postViewForm="postViewForm".($cat=="tr"?"Trainer":($cat=="tre"?"Trainee":""));
$formHrefLocation="form".($cat=="tr"?"-trainer":($cat=="tre"?"-trainee":"")).".php?cat=".$cat;   
$editFormHrefLocation="editform".($cat=="tr"?"-trainer":($cat=="tre"?"-trainee":"")).".php?cat=".$cat."&id=";
?>

<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-success text-bold">BTRLM- <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h1> -->
            <a href="<?php echo $formHrefLocation;?>" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add new Data </a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo strtoupper($catagory).' '.strtoupper($dist);?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
     



      <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#newapplication" class="btn btn-primary ml-3" id="pending"><i class="far fa-file-alt"></i>&nbsp;<strong id="pendingRows">0</strong>&nbsp; Pending Application</a></li>
    <li><a data-toggle="tab" href="#accepted"  class="btn btn-success ml-3" id="acpt"><i class="fas fa-check-circle"></i>&nbsp;<strong id="acceptedRows">0</strong>&nbsp; Accepted</a></li>
    <li><a data-toggle="tab" href="#rejected"  class="btn btn-danger ml-3" id="rej"><i class="far fa-times-circle"></i>&nbsp;<strong id="rejectedRows">0</strong>&nbsp; Rejected</a></li>
   
  </ul>

  <div class="tab-content mt-4">
    <div id="newapplication" class="tab-pane fade in active">
      <div class="card">
              <div class="card-header">
                  <div style="display:flex;justify-content:space-between;">
                  <h3 class="card-title text-primary text-bold"><span class="text-danger">(PENDING APPLICATIONS)</span> <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h3>
                    <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&dist=<?php echo $dist;?>" >
                        <i class="fas fa-file-pdf"></i> Download All</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <?php if($exclusion){
                      echo "<th>NAME</th>";
                    }else{
                      echo "<th>GROUP NAME</th>";
                    } ?>                  
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>VIEW/DOWNLOAD</th>
                    <th>EDIT/DELETE</th>
                    <th>CHANGE TO STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
             <?php
             for($i=0;$i<count($result);$i++){
             ?>
                  <tr>
                    <td><?php echo $exclusion==true?$result[$i]['formID']:$result[$i]['formID']; ?></td>
                    <td><?php echo $exclusion==true?$result[$i]['name']:$result[$i]['group_name'];?></td>
                    <td><?php echo $exclusion==true?$result[$i]['contact']:$result[$i]['head_mobile'];?></td>
                    <td><?php echo $result[$i]['address'];?></td>
                    <td>
                      <strong>Pending </strong> 
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm" onclick='<?php echo $postViewForm."(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>' data-toggle="modal" data-target="<?php echo $modalId;?>"><i class="fas fa-eye"></i>View</button>
                      <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&id=<?php echo $result[$i]['id'];?>" >
                      <i class="fas fa-file-pdf"></i> Download</a>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo $editFormHrefLocation.$result[$i]['id'];?>">
                      <i class="fas fa-cog"></i> Edit</a>
                      <button class="btn btn-danger btn-sm" onclick='<?php echo "deleteEntry(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>'><i class="far fa-trash-alt"></i> Delete</button>  
                    </td>
                    <td>
                      <button type="button" class="btn btn-success btn-sm" onclick='<?php echo "changeStatus(\"".$_GET['cat']."\",".$result[$i]['id'].",1)";?>'><i class="fas fa-check-circle"></i> Accept</button>
                      <button type="button" class="btn btn-danger btn-sm" onclick='<?php echo "changeStatus(\"".$_GET['cat']."\",".$result[$i]['id'].",0)";?>'><i class="far fa-times-circle"></i> Reject</button>                  
                    </td>
                  </tr>
          <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

   
    </div>


    <div id="accepted" class="tab-pane fade">

    <div class="card">
              <div class="card-header">
                  <div style="display:flex;justify-content:space-between;">
                  <h3 class="card-title text-primary text-bold"><span class="text-danger">(ACCEPTED APPLICATIONS)</span> <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h3>
                    <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&dist=<?php echo $dist;?>" >
                        <i class="fas fa-file-pdf"></i> Download All</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <?php if($exclusion){
                      echo "<th>NAME</th>";
                    }else{
                      echo "<th>GROUP NAME</th>";
                    } ?>                  
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>VIEW/DOWNLOAD</th>
                    <th>EDIT/DELETE</th>
                    <th>CHANGE TO STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
             <?php
             for($i=0;$i<count($result2);$i++){
             ?>
                  <tr>
                    <td><?php echo $exclusion==true?$result2[$i]['formID']:$result2[$i]['formID']; ?></td>
                    <td><?php echo $exclusion==true?$result2[$i]['name']:$result2[$i]['group_name'];?></td>
                    <td><?php echo $exclusion==true?$result2[$i]['contact']:$result2[$i]['head_mobile'];?></td>
                    <td><?php echo $result2[$i]['address'];?></td>
                    <td>
                     <strong> Approved</strong>  
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm" onclick='<?php echo $postViewForm."(\"".$_GET['cat']."\",".$result2[$i]['id'].")";?>' data-toggle="modal" data-target="<?php echo $modalId;?>"><i class="fas fa-eye"></i>View</button>
                      <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&id=<?php echo $result2[$i]['id'];?>" >
                      <i class="fas fa-file-pdf"></i> Download</a>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo $editFormHrefLocation.$result2[$i]['id'];?>">
                      <i class="fas fa-cog"></i> Edit</a>
                      <button class="btn btn-danger btn-sm" onclick='<?php echo "deleteEntry(\"".$_GET['cat']."\",".$result2[$i]['id'].")";?>'><i class="far fa-trash-alt"></i> Delete</button>  
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick='<?php echo "changeStatus(\"".$_GET['cat']."\",".$result2[$i]['id'].",0)";?>'><i class="far fa-times-circle"></i> Reject</button>                  
                    </td>
                  </tr>
          <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>


    <div id="rejected" class="tab-pane fade">

    <div class="card">
              <div class="card-header">
                  <div style="display:flex;justify-content:space-between;">
                  <h3 class="card-title text-primary text-bold"><span class="text-danger">(REJECTED APPLICATIONS)</span> <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h3>
                    <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&dist=<?php echo $dist;?>" >
                        <i class="fas fa-file-pdf"></i> Download All</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <?php if($exclusion){
                      echo "<th>NAME</th>";
                    }else{
                      echo "<th>GROUP NAME</th>";
                    } ?>                  
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>VIEW/DOWNLOAD</th>
                    <th>EDIT/DELETE</th>
                    <th>CHANGE TO STATUS</th>                 
                  </tr>
                  </thead>
                  <tbody>
             <?php
             for($i=0;$i<count($result3);$i++){
             ?>
                  <tr>
                    <td><?php echo $exclusion==true?$result3[$i]['formID']:$result3[$i]['formID']; ?></td>
                    <td><?php echo $exclusion==true?$result3[$i]['name']:$result3[$i]['group_name'];?></td>
                    <td><?php echo $exclusion==true?$result3[$i]['contact']:$result3[$i]['head_mobile'];?></td>
                    <td><?php echo $result3[$i]['address'];?></td>
                    <td>
                      <strong>Not Approved </strong> 
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm" onclick='<?php echo $postViewForm."(\"".$_GET['cat']."\",".$result3[$i]['id'].")";?>' data-toggle="modal" data-target="<?php echo $modalId;?>"><i class="fas fa-eye"></i>View</button>
                      <a class="btn btn-success btn-sm" href="./download/csv.php?cat=<?php echo $cat;?>&id=<?php echo $result3[$i]['id'];?>" >
                      <i class="fas fa-file-pdf"></i> Download</a>
                    </td>
                    <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo $editFormHrefLocation.$result3[$i]['id'];?>">
                      <i class="fas fa-cog"></i> Edit</a>
                      <button class="btn btn-danger btn-sm" onclick='<?php echo "deleteEntry(\"".$_GET['cat']."\",".$result3[$i]['id'].")";?>'><i class="far fa-trash-alt"></i> Delete</button>  
                    </td>
                    <td>
                    <button type="button" class="btn btn-success btn-sm" onclick='<?php echo "changeStatus(\"".$_GET['cat']."\",".$result3[$i]['id'].",1)";?>'><i class="fas fa-check-circle"></i> Accept</button>          
                    </td>
                  </tr>
          <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>


  </div>
</div>



      








       <!-- END SIDE CONTAINER -->

            </div>       
          </div> 
       </div><!-- /.container-fluid -->
    </div>
 <!-- /.content -->
</div>



<!-- EXTRAS -->


<?php if($cat!="tr" && $cat!="tre"){?>
<!-- Modal -->
<div class="modal fade" id="myModal" style="height:95vh;overflow-y: scroll;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 aliign="center" class="modal-title font-weight-bolder">View Form</h4>
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
                            <img id="blahClone" src="#" style="height:150px;width:200px"/>
                          </div>
                          <hr style="margin:2px 0px 2px 0px;"/>
                          <div class="col-6">
                          <label class="form-control-label col-6">Registration Document</label>
                          <img id="blahClone2" src="#" style="height:150px;width:200px"/>
                          </div>
                      </div>
                  </div>
            </div>        
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
<?php }else if($cat=="tr"){?>
<!-- for trainer Modal -->
<div class="modal fade" id="myModal-trainer" style="height:95vh;overflow-y: scroll;">
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
                     <label for="form-control-label">SELECT AREA OF INTEREST *</label>
                     <span class="form-control" id="aoi">1234</span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                     <label for="form-control-label">SELECT YEAR OF EXPERIENCE *</label>
                     <span class="form-control" id="year_of_exp">1234</span>
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
                            <img id="photoClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />                    
                              
                                                               
                          
                            <label for="exampleInputFile">Uploaded Voter/Aaadhaar</label>     
                            <img id="voter_aadhaarClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />            
                            
                                         
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row justify-content-around">                     
                        
                            <label for="exampleInputFile">Uploaded Education Certificate</label>       
                            <img id="education_cerClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />                 
                              
                          <label for="exampleInputFile">Uploaded work Experience Certificate</label>    
                          <img id="work_expClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />                 
                            
                
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
                      <img id="passbook_fileClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />    
                </div>

              <!-- card-body-end -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php }else if($cat=="tre"){?>
<!-- for trainee Modal -->
<div class="modal fade" id="myModal-trainee" style="height:95vh;overflow-y: scroll;">
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
                            <img id="photoClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />                    
                              
                            <label for="exampleInputFile">Uploaded Voter/Aaadhaar</label>     
                            <img id="voter_aadhaarClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />            
                            </div>
                            <div class="row justify-content-around"> 
                            <label for="exampleInputFile">Uploaded Education Certificate</label>       
                            <img id="education_cerClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />  
                                         
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
                      <img id="passbook_fileClone" src="#" style="width:200px;height:150px;margin:0 .3rem 1rem 2rem;" />    
                </div>

              <!-- card-body-end -->
        </div>   
      </div>
    </div>
  </div>
 </div>

 <?php }?>




  <!-- /.content-wrapper -->





<?php include('includes/footer.php');?>
