<?php include('includes/form-header.php'); ?>


  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/city-profile.jpg');"></div>
  <div class="main main-raised" style="z-index:1">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="assets/img/faces/logo.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h1>Application Status</h1>
                
              </div>
            </div>
          </div>
        </div>    
     
          

             
          <form>
   <div class="form-group">
   <div class="row">
   <div class="col-6 col-md-8 ml-auto mr-auto">
   <label for="inputFormID">Unique Form ID</label>
    <input type="text" class="form-control" id="inputFormID" aria-describedby="inputFormID" placeholder="Enter Form unique ID">         
    </div> 
    <div class="col-6 col-md-4 ml-auto mr-auto mt-2">
    
                <!-- <label for="inputFormID">Unique Form ID</label> -->
                <input type="hidden" id="cat">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn">
                      Select Category
                </button>
            <div class="dropdown-menu">

                <a class="dropdown-item" onclick="$( '#cat').val('shg'); $('#btn').text('Self Help Group'); ">SHG</a>
                <a class="dropdown-item" onclick="$( '#cat').val('entre'); $('#btn').text('Entrepreneurs'); ">Entrepreneurs</a>
                <a class="dropdown-item" onclick="$( '#cat').val('ngo'); $('#btn').text('NGO'); "> NGO's</a>
                <a class="dropdown-item" onclick="$( '#cat').val('assoc'); $('#btn').text('Associations'); "> Associations</a>
                <a class="dropdown-item" onclick="$( '#cat').val('trainee'); $('#btn').text('Trainee'); "> Trainee</a>
                <a class="dropdown-item" onclick="$( '#cat').val('trainer'); $('#btn').text('Trainer'); "> Trainer</a>
                <a class="dropdown-item" onclick="$( '#cat').val('agency'); $('#btn').text('Agency'); "> Agency</a>
               
         </div>
        </div>

    </div> 

   </div>  

   <button type="submit" class="btn btn-primary"> <i class="material-icons">search</i> Search</button>
  </div>


</form>


      <div class="result" style="height:9rem">
      
      
      
      </div>  
  
   
      </div>
    </div>
  </div>



<?php include('includes/footer.php'); ?>