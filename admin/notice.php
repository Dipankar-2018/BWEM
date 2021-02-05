
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
                <button onclick="location.href ='notice_data.php';" class="btn btn-success btn-sm"> <i class="fas fa-database"></i> Data Table </button>

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
                <h3 class="card-title">Notice Update</h3>
              </div>

              <div class="card-body">
                <form action="backend/notice_insert.php" method="post"  enctype="multipart/form-data">
                  <div class="row">                  
                    <div class="col-md-12">
                    <div class="form-group">
                      <label class="text-danger">SELECT CATEGORY *</label>
                      <select name="category" class="form-control" required>
                        <option value="">Select category</option>
                        <option value="notice">Notice</option>
                        <option value="event">Event</option>
                        <option value="event">Latest Update</option>
                      
                      </select>
                    </div>
                    <div class="form-group">
                        <label> Date</label>
                        <input type="date" class="form-control" placeholder="Enter ..." name="date">
                      </div>
                
         
                      <div class="form-group">
                        <label> Title</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="title">
                      </div>
             
                      <div class="form-group">
                        <label>Text</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="text"></textarea>
                      </div>
                      <div class="form-group">
                      <label>UPLOAD PDF if any</label>
                       <input type="file" class="form-control" name="file">
                      
                      </div>
                   </div>
                </div>
            
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
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
