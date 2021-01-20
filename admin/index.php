<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
     
        
          <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p><b>TOTAL NO. OF REGISTRATION IN KOKRAJHAR</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-line"></i>
              </div>
              <a href="data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>44</h3>

                <p><b>TOTAL NO. OF REGISTRATION IN CHIRANG</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-area"></i>
              </div>
              <a href="data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>4400</h3>

                <p><b>TOTAL NO. OF REGISTRATION IN BAKSA</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-bar"></i>
              </div>
              <a href="data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3>4400</h3>

                <p><b>TOTAL NO. OF REGISTRATION IN UDALGURI</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-pie"></i>
             
              </div>
              <a href="data.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- Pie Chart -->
        
       



        

         
          
          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-6 col-6">
          <h3><b>Self Help Group Data Chart</b></h3>
            <canvas id="shgchart" style="display: block; width: auto; height: auto;"></canvas>
        </div>
        <div class="col-lg-6 col-6">
          <h3><b>Entrepreneures Data Chart</b></h3>
            <canvas id="epchart" style="display: block;  width: auto; height: auto;"></canvas>
        </div>
        <div class="col-lg-6 col-6">
          <h3><b>NGO Data Chart</b></h3>
            <canvas id="ngchart" style="display: block;  width: auto; height: auto;"></canvas>
        </div>
        <div class="col-lg-6 col-6">
          <h3><b>Association Data Chart</b></h3>
            <canvas id="aschart" style="display: block;  width: auto; height: auto;"></canvas>
        </div>
        <div class="col-lg-6 col-6">
          <h3><b>Trainer Data Chart</b></h3>
            <canvas id="trchart" style="display: block; width: 762px; height: 381px;"></canvas>
        </div>
        <div class="col-lg-6 col-6">
          <h3><b>Trainee Data Chart</b></h3>
            <canvas id="trechart" style="display: block; width: 762px; height: 381px;"></canvas>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
