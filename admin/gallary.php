
<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-success text-bold">BTRLM not </h1> -->
            <div class="ui info message">
                <div class="header mb-2">
                    <i class="fas fa-edit"></i> Click the button to check all Notice.
                </div>
                <button onclick="location.href ='gallary_data.php';" class="btn btn-success btn-sm"> <i class="fas fa-database"></i> Gallary</button>

            </div>
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



      <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Upload Image on Website</h3>
              </div>

              <div class="card-body">
                <form action="backend/gallary_insert.php" method="post"  enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                        <label>Select Category</label>
                        <select name="category" class="form-control" required>
                          <option value="">Select Category</option>
                          <option value="shg">Selef Help Group</option>
                          <option value="ngo">NGO</option>
                          <option value="entre">Entrepreneurs</option>
                        </select>
                       </div>                   
                      <div class="form-group">
                      <label>UPLOAD Image</label>
                       <input type="file" class="form-control" name="image" required>
                      
                      </div>
                   </div>
                   </div>
                </div>
            
                <button type="submit" class="btn btn-success" name="img_submit">Submit</button>
              </form>



        </div>    

       <!-- END SIDE CONTAINER -->

            </div>       
          </div> 
       </div><!-- /.container-fluid -->
    </div>
 <!-- /.content -->
</div>











  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
