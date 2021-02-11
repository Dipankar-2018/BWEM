<?php include("includes/navbar.php"); ?>
<?php include("includes/sidenav.php"); ?>

<?php 
include("conn/database.php");
$cat=array('shg'=>'self_help_group','ep'=>'entrepreneur','ng'=>'ngo','as'=>'association','tr'=>'trainer','tre'=>'trainee');  
$table="";
function getDistCount($cat,$district){
  $obj = new query();
  $count=0;
  foreach ($cat as $key=>$table)
  {
    $result=$obj->getData($table,'count(id)',array('district'=>$district));
    $count+=$result[0]['count(id)'];
  }
  return $count;
}
?>
  
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
                <h3><?php echo getDistCount($cat,"kokrajhar");?></h3>

                <p><b>TOTAL NO. OF REGISTRATION IN KOKRAJHAR</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-line"></i>
              </div>
              <a onclick="moreInfoView('kokrajhar')" class="small-box-footer" data-toggle="modal" data-target="#model-desh">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo getDistCount($cat,"chirang");?></h3>

                <p><b>TOTAL NO. OF REGISTRATION IN CHIRANG</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-area"></i>
              </div>
              <a onclick="moreInfoView('chirang')" class="small-box-footer" data-toggle="modal" data-target="#model-desh">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo getDistCount($cat,"baksa");?></h3>

                <p><b>TOTAL NO. OF REGISTRATION IN BAKSA</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-bar"></i>
              </div>
              <a onclick="moreInfoView('baksa')" class="small-box-footer" data-toggle="modal" data-target="#model-desh">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo getDistCount($cat,"udalguri");?></h3>

                <p><b>TOTAL NO. OF REGISTRATION IN UDALGURI</b></p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-pie"></i>
             
              </div>
              <a onclick="moreInfoView('udalguri')" class="small-box-footer" data-toggle="modal" data-target="#model-desh">More info <i class="fas fa-arrow-circle-right"></i></a>
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



  <!-- model -->
<div class="modal fade" id="model-desh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kokrajhar's Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>Category</th>
                      <th>Accepted</th>
                      <th>Rejected</th>
                      <th>Pending</th>
                      <th style="width: 40px">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>                    
                      <td>Self Help Group</td>
                      <td class="more-info-td" id="shg-ac">500</td>
                      <td class="more-info-td" id="shg-rj">20</td>
                      <td class="more-info-td" id="shg-pd">30</td>
                      <td class="more-info-td" id="shg-tot">45</td>
                    </tr>     
                    
                    <tr>                    
                      <td>Entreprenures</td>
                      <td class="more-info-td" id="ep-ac">500</td>
                      <td class="more-info-td" id="ep-rj">20</td>
                      <td class="more-info-td" id="ep-pd">30</td>
                      <td class="more-info-td" id="ep-tot">45</td>
                    </tr> 

                    <tr>                    
                      <td>NGO'S</td>
                      <td class="more-info-td" id="ng-ac">500</td>
                      <td class="more-info-td" id="ng-rj">20</td>
                      <td class="more-info-td" id="ng-pd">30</td>
                      <td class="more-info-td" id="ng-tot">45</td>
                    </tr> 

                    <tr>                    
                      <td>Association</td>
                      <td class="more-info-td" id="as-ac">500</td>
                      <td class="more-info-td" id="as-rj">20</td>
                      <td class="more-info-td" id="as-pd">30</td>
                      <td class="more-info-td" id="as-tot">45</td>
                    </tr> 


                    <tr>                    
                      <td>Trainer</td>
                      <td class="more-info-td" id="tr-ac">500</td>
                      <td class="more-info-td" id="tr-rj">20</td>
                      <td class="more-info-td" id="tr-pd">30</td>
                      <td class="more-info-td" id="tr-tot">45</td>
                    </tr> 


                    <tr>                    
                      <td>Trainee</td>
                      <td class="more-info-td" id="tre-ac">500</td>
                      <td class="more-info-td" id="tre-rj">20</td>
                      <td class="more-info-td" id="tre-pd">30</td>
                      <td class="more-info-td" id="tre-tot">45</td>
                    </tr> 


                    
                                    
                  </tbody>
                </table>
              </div>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>









<?php include('includes/footer.php');?>
