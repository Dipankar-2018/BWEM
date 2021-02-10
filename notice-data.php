<?php
 include('includes/form-header.php'); 
 $obj = new query();

if(isset($_GET['id'])){

$category = $_GET['id'];





}




// $condition_arr = array('category' => 'shg');
// $shg = $obj->getData('gallary', '*', $condition_arr);

// $condition_arr = array('category' => 'entre');
// $entre = $obj->getdata('gallary', '*', $condition_arr);

// $condition_arr = array('category' => 'ngo');
// $ngo = $obj->getdata('gallary', '*', $condition_arr);

?>


<div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/city-profile.jpg');"></div>
  <div class="main main-raised" style="z-index:1;">
    <div class="profile-content" >
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="assets/img/logos/logo.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h1>Notice</h1>                
              </div>
            </div>
          </div>
        </div>

        <table class="table">
        <thead>
            <tr>
                <th class="text-center">Sl</th>
                <th>Notice Title</th>
                <th>Notice</th>
                <th>Date</th>
                <th class="text-right">Document</th>  
            </tr>
        </thead>
    <tbody>


          <tr>
            <td class="text-center">1</td>
            <td>Andrew Mike</td>
            <td>Develop</td>
            <td>2013</td>
            <td class="text-right"><button class="btn btn-primary btn-sm">Document</button></td>          
          </tr>  


      </tbody>
    </table>





      </div>
    </div>
  </div>



<?php include('includes/footer.php'); ?>