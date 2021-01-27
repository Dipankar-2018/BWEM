<?php include("conn/database.php");
$obj = new query();
$result = $obj->getData('user','id,user,email,phone,rehash');

if(isset($_POST['submit'])){
  $user = $obj->get_safe_str($_POST['user-name']);
  $user_email = $obj->get_safe_str($_POST['user-email']);
  $user_phone = $obj->get_safe_str($_POST['user-phone']);
  $password = hash('sha512',$obj->get_safe_str($_POST['password']));
  $rehash=$obj->get_safe_str($_POST['password']);
  $condition_arr=array('user'=>$user,'email'=>$user_email, 'phone' => $user_phone, 'password'=>$password,'rehash'=>$rehash);
  $result=$obj->insertData('user',$condition_arr);
  header("location:register-new-user.php");

}


if(isset($_GET['type']) && $_GET['type']=='delete'){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
  $obj->deleteData('user',$condition_arr);
  header("location:register-new-user.php");
}


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
            <h1 class="m-0"> </h1>
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

      <!-- SIDE CONTAINER START -->
<div class="row">
  <div class="col-lg-4">
  <div class="register-box">


  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="post" name="form_password">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="user-name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="user-email" required onkeyup="randomPassword(10);">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tell" class="form-control" placeholder="Phone number" name="user-phone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>  
        <div class="input-group mb-3">
        <input type="hidden" name="password" class="form-control readonly" placeholder="Click generate Password button">       
     
        </div>            
            <button type="submit" class="btn btn-success btn-block" name="submit">Register</button>     
        </form>   
                
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

  </div>
  <div class="col-lg-8">

           <!-- /.card -->
           <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Existing Users</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Phone</th>
                   
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  if(isset($result['0'])){
                  $id=1;	
                  foreach($result as $list){
                  ?>
                  <tr>
                    <td><?php echo $id?></td>
                    <td><?php echo $list['user']?></td>
                    <td><?php echo $list['email']?></td>                  
                    <td><?php echo $list['phone']?></td>                  
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">                        
                        <a href="?type=delete&id=<?php echo $list['id']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                   
                  <?php 
				  $id++;
				  } } else {?>
                  <tr>
                     <td colspan="6" align="center">No Records Found!</td>
                  </tr>
				  <?php } ?>
                
                 
           

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>



  </div>

</div>

<div class="background float-right" style="z-index:0">
    <img src="assets/undraw/user.svg" height=200 style="opacity: 0.3;">
</div>   
 




<div> 
    
 




       <!-- END SIDE CONTAINER -->

            </div>       
          </div> 
       </div><!-- /.container-fluid -->
    </div>
 <!-- /.content -->
</div>



<!-- EXTRAS -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="registrationNumber">Enter Registration Number</label>
                    <input type="text" class="form-control" id="registrationNumber" placeholder="Enter Registration Number">
                  </div>
                  <div class="form-group">
                    <label for="registrationNumber">Group Name</label>
                    <input type="text" class="form-control" id="registrationNumber" placeholder="Enter Group Name">
                  </div>
               
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>








  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
