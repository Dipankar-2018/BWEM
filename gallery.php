<?php
 include('includes/form-header.php'); 
 $obj = new query();

$condition_arr = array('category' => 'shg');
$shg = $obj->getData('gallary', '*', $condition_arr);

$condition_arr = array('category' => 'entre');
$entre = $obj->getdata('gallary', '*', $condition_arr);

$condition_arr = array('category' => 'ngo');
$ngo = $obj->getdata('gallary', '*', $condition_arr);


 
 ?>


  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/city-profile.jpg');"></div>
  <div class="main main-raised" style="z-index:1">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="assets/img/logos/logo.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h1>Gallery</h1>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#shg" role="tab" data-toggle="tab">
                    <i class="material-icons">group</i>
                    SHG's
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#entre" role="tab" data-toggle="tab">
                    <i class="material-icons">store</i>
                    Entrepreneurs
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#ngo" role="tab" data-toggle="tab">
                    <i class="material-icons">home_work</i>
                    NGO's
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
       
        <div class="tab-content tab-space">       
          <div class="tab-pane active text-center gallery" id="shg">
            <div class="row">
            <?php foreach($shg as $list): ?>  

              <div class="col-md-6 ml-auto">
                <img src="admin/images/gallary/<?php echo $list['image']; ?>" class="img-raised rounded" height="450" width="50">               
              </div>                          
              
              <?php endforeach; ?>
            </div>
          </div>
       

          <div class="tab-pane text-center gallery" id="entre">
            <div class="row">
            <?php foreach($entre as $list): ?>  

            <div class="col-md-6 ml-auto">
              <img src="admin/images/gallary/<?php echo $list['image']; ?>" class="img-raised rounded" height="450" width="50">               
            </div>                          

            <?php endforeach; ?>
        
            </div>
          </div>


          <div class="tab-pane text-center gallery" id="ngo">
            <div class="row">

            <?php foreach($ngo as $list): ?>  

                <div class="col-md-6 ml-auto">
                  <img src="admin/images/gallary/<?php echo $list['image']; ?>" class="img-raised rounded" height="450" width="50">               
                </div>                          

                <?php endforeach; ?>
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php include('includes/footer.php'); ?>