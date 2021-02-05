<?php 
include("includes/form-header.php");

$obj = new query();

$condition_arr = array('category' => 'notice');
$notice_result = $obj->getData('notice', '*', $condition_arr);

$condition_arr = array('category' => 'event');
$event_result = $obj->getData('notice', '*', $condition_arr);




?>


<!-- <div class="page-header header-small" data-parallax="true" > -->

 <!-- Carousel Card -->
                    <div class="margin" style="margin-top:4rem">                   
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/hero_image-1.jpg" alt="First slide">
                                
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/hero_image-2.jpg" alt="Second slide">
                                
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/hero_image-3.jpg" alt="Third slide">
                                
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <i class="material-icons">keyboard_arrow_left</i>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <i class="material-icons">keyboard_arrow_right</i>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                          </div>
                        <!-- End Carousel Card -->     
<!-- 
  </div> -->


  <div class="main main-raised">
    <div class="container">
      <div class="section">
       
        <div class="row">
          <div class="col-md-12">         
            <h2 class="title text-center">Birgwsri Women Emopowerment Mission</h2>

            <h2 class="text-center">Creating Sustainable Livelihood</h2>
          </div>          
        </div>

        <div class="row">
              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/shg.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">group</i> Self Help Group
                        </h6>
                        <h4 class="card-title">
                          <a>Register Your SHG:</a>
                        </h4>
                        <a href="forms/shg.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                      </div>
                    </div>
              </div>

              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/entrepreneurs.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">store</i> Entrepreneurs
                        </h6>
                        <h4 class="card-title">
                          <a>Register Your Business:</a>
                        </h4>
                        <a href="forms/entrepreneur.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                      </div>
                      
                    </div>
              </div>

              <div class="col-md-3">
                <div class="card card-blog card-plain ">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/ngo.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">home_work</i> NGO's
                        </h6>
                        <h4 class="card-title">
                          <a>Register Your NGO:</a>
                        </h4>
                        <a href="forms/ngo.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                      </div>
                      
                    </div>
              </div>

              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/association.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">business</i> Associations
                        </h6>
                        <h4 class="card-title">
                          <a>Register Your Associations:</a>
                        </h4>
                        <a href="forms/associations.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                        
                      </div>
                      
                    </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/trainee.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">model_training</i> Trainee
                        </h6>
                        <h4 class="card-title">
                          <a>Register as Trainee:</a>
                        </h4>
                        <a href="forms/trainee.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                        
                      </div>
                      
                    </div>
              </div>
              
              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/trainer.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">construction</i> Trainer
                        </h6>
                        <h4 class="card-title">
                          <a>Register as Trainer:</a>
                        </h4>
                        <a href="forms/trainer.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                        
                      </div>
                      
                    </div>
              </div>
              <div class="col-md-3">
                <div class="card card-blog card-plain">
                      <div class="card-header card-header-image">
                        <a>
                          <img class="img" src="assets/img/examples/training_agency.jpg">
                        </a>
                      </div>
                      <div class="card-body ">
                        <h6 class="card-category text-danger">
                          <i class="material-icons">location_city</i> Training Agency</i> 
                        </h6>
                        <h4 class="card-title">
                          <a>Register Your Agency:</a>
                        </h4>
                        <a href="forms/training_agency.php" target="_blank" class="btn  btn-info   btn-round ">
                          <i class="material-icons">how_to_reg</i> Register
                        </a>
                        
                      </div>
                      
                    </div>
              </div>
             <div class="col-md-3">
               
             </div>
        </div>

        <div class="row">       <!-- NOTICE -->
       

          <div class="col-md-6">
            <div class="card card-raised card-background colored-shadow" style="background-image: url('../assets/notice.jpg')">
              <div class="card-body text-white font-weight-bold">
                <marquee scrollamount="3" height="200rem" onMouseOver="this.stop()" onMouseOut="this.start()" direction="up">

                <?php foreach($notice_result as $list):?>

                <h3 class="font-weight-bold text-uppercase"><?php echo $list['title']; ?></h3>
                <blockquote class="blockquote">
                  <p class="mb-0"><?php echo $list['text'] ?></p>
                </blockquote>

                  <a class="btn btn-info btn-round" href="admin/images/notice/<?php echo $list['doc']; ?>" target="_blank"> <span class="material-icons"> description </span> DOCUMENT</a>            

                <?php endforeach; ?>
              </marquee>
              </div>  
            </div>
            <button class="btn btn-warning btn-round float-right">Read All</button>
          </div>



          <div class="col-md-6"> 
            <div class="card card-raised card-background" style="background-image: url('../assets/notice.jpg')" >
              <div class="card-body text-white font-weight-bold">
                <marquee scrollamount="3" height="200rem" onMouseOver="this.stop()" onMouseOut="this.start()" direction="up">

                <?php foreach($event_result as $list):?>

                <h3 class="font-weight-bold text-uppercase"><?php echo $list['title']; ?></h3>
                <blockquote class="blockquote">
                  <p class="mb-0"><?php echo $list['text']; ?></p>
                </blockquote>

                  <a class="btn btn-info btn-round" href="admin/images/notice/<?php echo $list['doc']; ?>" target="_blank"> <span class="material-icons"> description </span> DOCUMENT</a>
               
               <?php endforeach; ?>
               

              </marquee>
              </div>
          
            </div>
            <button class="btn btn-warning btn-round float-right">Read All</button>
          </div>

          <!-- <div class="col-md-12">
            <div class="card card-raised card-background" style="background-image: url('../assets/img/examples/card-project6.jpg')">
              <div class="card-body">
                <h6 class="card-category text-info">Latest Updates</h6>
                <h3 class="card-title">0 to 100.000 Customers in 6 months</h3>
                <p class="card-description">
                  Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                </p>
                <a href="#pablo" class="btn btn-warning btn-round">
                  <i class="material-icons">subject</i> View Full Story
                </a>             
              </div>
            </div>
          </div> -->
          
        </div>
      </div>
      <div class="section">
        <h3 class="title text-center">Useful Links to Visit :</h3>
        <br>
        <div class="row">
          <!--     *********    PROFILE CARDS     *********      -->
        <div class="cards">
          <div class="container">
           
            <div class="row">
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/mgnrega.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">MGNREGA</h4>
                    <h6 class="card-category text-gray">M. Gandhi National Rural Employment</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="https://nrega.nic.in/" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/pmay-g.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">PMAY-G</h4>
                    <h6 class="card-category text-gray">Pradhan Mantri Awaas Yojana Gramin</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="https://www.pmayg.gov.in/" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/pm-jay.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">PM-JAY</h4>
                    <h6 class="card-category text-gray">Ayushman Bharat</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="https://pmjay.gov.in/" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
          
            </div>

            <div class="row ">
              
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/nfsa.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">NFSA</h4>
                    <h6 class="card-category text-gray">Ration Card</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="https://nfsa.gov.in/portal/Ration_Card_State_Portals_AA" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/sbmu.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">SBMU</h4>
                    <h6 class="card-category text-gray">Swachh Bharat Abhiyan</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="http://swachhbharaturban.gov.in/" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="assets/img/examples/aadhaar.jpg">
                    </a>
                  </div>
                  <div class="card-body ">
                    <h4 class="card-title">AADHAAR</h4>
                    <h6 class="card-category text-gray">Unique Identification Authority of India</h6>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="https://uidai.gov.in/" target="_blank" class="btn  btn-info   btn-round btn-block">
                       <i class="material-icons">forward</i> Visit
                    </a>  
                  </div>
                </div>
              </div>
              
            </div>

          </div>
        </div>
        <!--     *********    END PROFILE CARDS      *********      -->
        </div>
      </div>
    </div>




<?php include("includes/footer.php"); ?>