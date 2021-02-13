<?php
session_start();
$location="./";
if(isset($isForm)&&$isForm){
  $location="../";
}

include($location.'admin/conn/database.php');
?>


<!DOCTYPE html>
<html lang="asm">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $location;?>assets/img/logos/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo $location;?>assets/img/logos/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    BWEM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  
  <!-- CSS Files -->
  <link href="<?php echo $location;?>assets/css/material-kit.css?v=2.2.0" rel="stylesheet" />
 
  <link rel="stylesheet" type="text/css" href="<?php echo $location;?>assets/css/offline-theme-default.css">
  <link rel="stylesheet" href="<?php echo $location;?>assets/css/offline-language-english.css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>

<body class="<?php echo (isset($contactPage)&&$contactPage)?'contact-page':'profile-page';?> sidebar-collapse">
<!-- Navigation Start -->  
  <nav class="navbar navbar bg-success  fixed-top  navbar-expand-lg "  id="sectionsNav" style="z-index:1200;">
    <div class="container">
    <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo $location;?>index.php">
        <div class="logo-big">
            <img src="<?php echo $location;?>assets/img/logos/logo.jpg"  alt="Circle Image"  class="rounded-circle img-fluid">
          </div>
          <div class="logo-small">
          <img src="<?php echo $location;?>assets/img/logos/logo.jpg"  alt="Circle Image"  class="rounded-circle img-fluid">
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          
          <li class="dropdown nav-item">
            <a style="font-size:.8rem"  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">home</i><b>Home</b>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
               <a  style="font-size:2vh" href="#" class="dropdown-item">
                <i class="material-icons">record_voice_over</i> CEM Message
              </a>
              <a style="font-size:2vh"  href="#" class="dropdown-item">
                <i class="material-icons">article</i> Director's Note
              </a>
              <!-- <a  style="font-size:2vh" href="#" class="dropdown-item">
                <i class="material-icons">voice_chat</i> BWEM Anthem
              </a> -->
              
            </div>
          </li>
          <li class="dropdown nav-item">
            <a  style="font-size:.8rem" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">how_to_reg</i> <b>Registration</b>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
               <a style="font-size:.8rem"  href="<?php echo $location;?>forms/shg.php" class="dropdown-item">
                <i class="material-icons">group</i> Registration as a SHG
              </a>
              <a  style="font-size:.8rem" href="<?php echo $location;?>forms/entrepreneur.php" class="dropdown-item">
                <i class="material-icons">store</i> Registration of Entrepreneurs
              </a>
              <a style="font-size:.8rem"  href="<?php echo $location;?>forms/ngo.php" class="dropdown-item">
                <i class="material-icons">home_work</i> NGO's
              </a>
              <a style="font-size:.8rem"  href="<?php echo $location;?>forms/associations.php" class="dropdown-item">
                <i class="material-icons">business</i> Associations
              </a>
              <a style="font-size:.8rem"  href="<?php echo $location;?>forms/trainee.php" class="dropdown-item">
                <i class="material-icons">model_training</i> Registration as Trainee
              </a>
              <a  style="font-size:.8rem" href="<?php echo $location;?>forms/trainer.php" class="dropdown-item">
                <i class="material-icons">construction</i> Registration as Trainer
              </a>
              <a  style="font-size:.8rem" href="#" class="dropdown-item">
                <i class="material-icons">location_city</i> Registration of Training Agency
              </a>
            </div>
     
          <li class="nav-item">
            <a  style="font-size:.8rem" class="nav-link" href="<?php echo $location;?>gallery.php"><i class="material-icons">photo</i><b>Gallery</b></a>
          </li>
          
          <li class="nav-item">
            <a  style="font-size:.8rem" class="nav-link" href="<?php echo $location;?>about-us.php"><i class="material-icons">group</i><b>About Us</b></a>
          </li>
          <li class="nav-item">
            <a style="font-size:.8rem"  class="nav-link" href="#"><i class="material-icons">school</i><b>FAQ</b></a>
          </li>
          <li class="nav-item">
            <a style="font-size:.8rem"  class="nav-link" href="<?php echo $location;?>search.php"><i class="material-icons">search</i><b>Application Status</b></a>
          </li>
          <li class="nav-item">
            <a style="font-size:.8rem"  class="nav-link" href="<?php echo $location;?>contact-us.php"><i class="material-icons">phone</i><b>Contact</b></a>
          </li>
          <li class="nav-item">
            <?php
              if(isset($_SESSION['login'])&&$_SESSION['login']){
                echo '<a  style="font-size:.8rem" class="nav-link" href="'.$location.'admin/"><i class="material-icons"></i><b>Goto Dashboard</b></a>';
              }else{
                echo '<a  style="font-size:.8rem" class="nav-link" id="login_show" href="#" data-toggle="modal" data-target="#loginModal"><i class="material-icons">login</i><b>Dept Login</b></a>';
              }
            ?>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- Navigation End -->       