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
if(isset($_POST['id'])){  
  $id=$obj->get_safe_str($_POST['id']);
  $condition_arr=array('id'=>$id);
  $result=$obj->getData($table,'group_name',array('id'=>$id));
  $obj->deleteData($table.'_members',array('group_name'=>$result['group_name']));
  $obj->deleteData($table,$condition_arr);
  // echo "1";
  die();
}
if(isset($_GET['cat'])&& $_GET['cat']!="" && array_key_exists($obj->get_safe_str($_GET['cat']),$cat)){
  $catagory=$table=$cat[$obj->get_safe_str($_GET['cat'])];
    if($cat[$obj->get_safe_str($_GET['cat'])]=="self_help_group")
      $catagory="Self Help Group";
  }
else
    header('location:./');//$table="self_help_group";  
$dist="kokrajhar";

if(isset($_GET['dist'])&& $_GET['dist']!=""){
  $dist=$obj->get_safe_str($_GET['dist']);
  $result=$obj->getData($table,'*',array('district'=>$dist));   
}else
    header('location:./');//$result=$obj->getData($table); 
// print_r($result);
if($result==0)
$result=array();   
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
            <h1 class="m-0 text-success text-bold">BTRLM- <?php echo strtoupper($catagory).' '.strtoupper($dist).'\'S ';?> DATA </h1>
            <a href="form.php?cat=<?php echo $obj->get_safe_str($_GET['cat']);?>" class="btn btn-primary btn-sm">Add new Data</a>
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
     



      <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>GROUP NAME</th>
                    <th>CONTACT</th>
                    <th>ADDRESS</th>
                    <th>DOWNLOAD</th>
                    <th>VIEW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                  </thead>
                  <tbody>
             <?php
             for($i=0;$i<count($result);$i++){
             ?>
                  <tr>
                    <td><?php echo $i+1;?></td>
                    <td><?php echo $result[$i]['group_name'];?></td>
                    <td><?php echo $result[$i]['head_mobile'];?></td>
                    <td><?php echo $result[$i]['address'];?></td>
                    <td><a class="btn btn-success btn-sm" href="code.php?approve_id=">
                    <i class="fas fa-file-pdf"></i> Download</a></td>
                    <td><button class="btn btn-success btn-sm" onclick='<?php echo "postViewForm(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>' data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"></i>View</button></td>
                    <td><a class="btn btn-success btn-sm" href="editform.php?cat=<?php echo $_GET['cat'];?>&id=<?php echo $result[$i]['id'];?>">
                    <i class="fas fa-cog"></i> Edit</a></td>
                    <td>
                    <button class="btn btn-danger btn-sm" onclick='<?php echo "deleteEntry(\"".$_GET['cat']."\",".$result[$i]['id'].")";?>'><i class="far fa-trash-alt"></i> Delete</button>
                    </td>
                  </tr>
          <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>









       <!-- END SIDE CONTAINER -->

            </div>       
          </div> 
       </div><!-- /.container-fluid -->
    </div>
 <!-- /.content -->
</div>



<!-- EXTRAS -->



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







  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
