<?php
$location="";
if(isset($isForm)&&$isForm){
  $location="../";
}
?>
  
  <!--     *********    BIG WHITE FOOTER V2     *********      -->
  <footer class="footer footer-big">
            <div class="container">
              <div class="content">
                <div class="row">
                  <div class="col-6 col-md-3">
                    <a href="#pablo">
                      <h5>Schemes</h5>
                    </a>
                    <ul class="links-vertical">
                      <li>
                        <a href="https://nrega.nic.in/netnrega/home.aspx" target="_blank">
                          MGNREGA
                        </a>
                      </li>
                      <li>
                        <a href="https://www.iay.nic.in/netiay/home.aspx" target="_blank">
                          PMAY-G
                        </a>
                      </li>
                      <li>
                        <a href="#pablo">
                          PM-JAY
                        </a>
                      </li>
                      <li>
                        <a href="#pablo">
                          NFSA
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6 col-md-3">
                    <h5>Check Scheme Status</h5>
                    <ul class="links-vertical">
                      <li>
                        <a href="https://rhreporting.nic.in/netiay/Benificiary.aspx" target="_blank">
                          PMAY-G Status
                        </a>
                      </li>
                      <li>
                        <a href="https://www.nrega.nic.in/netnrega/mgnrega_new/Nrega_home.aspx" target="_blank">
                          MGNREGA Status
                        </a>
                      </li>
                      <li>
                        <a href="https://pmkisan.gov.in/beneficiarystatus.aspx" target="_blank">
                          PM-Kisan
                        </a>
                      </li>
                      <li>
                        <a href="https://mera.pmjay.gov.in/search/login" target="_blank">
                          PMJAY
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-6 col-md-3">
                    <h5>Quick Link</h5>
                    <ul class="links-vertical">
                      <li>
                        <a href="https://www.onlineservices.nsdl.com/paam/endUserRegisterContact.html" target="_blank">
                          PAN CARD
                        </a>
                      </li>
                      <li>
                        <a href="https://eaadhaar.uidai.gov.in/">
                          Eaadhaar
                        </a>
                      </li>
                      <li>
                        <a href="https://nrega.nic.in/netnrega/HomeGP.aspx" target="_blank">
                          JOB-CARD
                        </a>
                      </li>
                      <li>
                        <a href="https://btrgrievance.co.in/" target="_blank">
                          BTR GRIEVANCE
                        </a>
                      </li>
                      
                    </ul>
                  </div>
                  
                  <div class="col-6 col-md-3">
                    <h5>Contact</h5>
                    <a href="#pablo">
                      <i class="fa fa-mail text-rose">contact@btrlm.org</i>
                    </a>
                    <form class="form form-newsletter" method="" action="">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email...">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Message...">
                      </div>
                      <button type="button" class="btn btn-primary btn-just-icon" name="button">
                        <i class="material-icons">mail</i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <hr>
              <ul class="social-buttons">
                <li>
                  
                    <h5>Follow Us On:</h5>
                 
                </li>
                <li>
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                </li>
                
              </ul>
              <div>
                "Digital Bodoland: A Mission Towards Digitizing Bodoland Territorial Region"
              </div>
              <div class="copyright pull-center">
                Copyright &#xA9; <script>
                  document.write(new Date().getFullYear())
                </script> Designed and Developed by
        <a href="https://www.wowcuz.com" target="_blank" class="text-rose">WOWCUZ (OPC) Private Limited </a> / <a href="https://codingstudio.in/" target="_blank" class="text-rose">codingstudio.in</a>
              </div>
            </div>
          </footer>
          <!--     *********   END BIG WHITE FOOTER v2     *********      -->

<!-- Login Modal -->
<?php include($location."forms/loginmodal.php");?>

</div>  
  
<div id="net-activity" style="position: fixed;display: inline-block;
    width:20%;
    text-align:center;
    top: 5em;
    left: 50%;
    transform: translateX(-50%)"></div> 
  
  <!--   Core JS Files   -->
  <script src="<?php echo $location;?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?php echo $location;?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo $location;?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWiUzRbzNVhfh-o0hfucnPbpsYujTdioo"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo $location;?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo $location;?>assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo $location;?>assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Small Gallery in Product Page -->
  <script src="<?php echo $location;?>assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="<?php echo $location;?>assets/demo/modernizr.js" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/demo/vertical-nav.js" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo $location;?>assets/js/material-kit.js?v=2.2.0" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/js/sweetalert.min.js"></script>
  <script src="<?php echo $location;?>assets/demo/demo.js" type="text/javascript"></script>
  <script src="<?php echo $location;?>assets/js/app.js" type="text/javascript"></script>
  
  
  <?php
  if(isset($_SESSION['login'])){
      if(!$_SESSION['login']){
        echo "
          <script>
              swal({
                title: 'Login Unsuccessful',
                text: 'Check your Username/Password once!',
                icon: 'error',
              });
          </script>   
          ";
        unset($_SESSION['login']);
      }
  }
    if(isset($_SESSION['formStatus'])){
      if($_SESSION['formStatus']==true){
            echo "
            <script>
                swal({
                  title: 'Success',
                  text: 'Form Submitted Successful. Please check your Email for the UNIQUE ID',
                  icon: 'success',
                  color: 'red',
                });
            </script>   
            ";
        }else{
          echo "
          <script>
              swal({
                title: 'Failure',
                text: 'Form Submitted Unsuccessful',
                icon: 'error',
              });
          </script>   
          ";
        }
      unset($_SESSION['formStatus']);
    }  
  ?>


<script>
    $().ready(function() {
      materialKitDemo.initContactUsMap();
    });
  </script>




  
</body>

</html>