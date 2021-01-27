
<?php include('includes/form-header.php'); ?>
<?php
date_default_timezone_set("Asia/Kolkata");

if(!isset($_GET['token'])&&!isset($_POST['new_password']))
{
    header('location: 403.html');
}
include("./admin/conn/database.php");
$obj = new query();
?>


  <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('assets/img/bg9.jpg');">
    <div class="container">

<?php
if(isset($_POST['new_password']))
{ 
        $token=$_SESSION['ton'];
        $new_pass = trim($obj->get_safe_str($_POST['new_pass']));
        $new_pass_c = trim($obj->get_safe_str($_POST['new_pass_c']));
        if (empty($new_pass) || empty($new_pass_c)) 
        {
            echo "<div align='center'>
                    <h2>Password is required!<br><br><b>Try Again <a href='./passwordreset.php?token=".$_SESSION['ton']."'>Click Here!</a>.</b></h2></div>";
        }
        else if ($new_pass != $new_pass_c)
        {
            echo "<div align='center'>
                    <h2>Password do not match!<br><br><b>Try Again <a href='./passwordreset.php?token=".$_SESSION['ton']."'>Click Here!</a>.</b></h2></div>";
           
        }
        else
         {
          
          $table="user";
          $result=$obj->getData($table,'email,token_gen_time',array('pass_reset_token'=>$token));
          if(count($result)>0){
            $email = $result[0]['email'];
            $Old_token_time=$result[0]['token_gen_time'];
            $New_token_time=time();
            $expire=$New_token_time-$Old_token_time; 
          }else{
              $expire=1000;
            }
            if($expire>600)
            {
                echo "<div align='center'>
                    <h2> Sorry, The link is expired. Please request a new Link again.Goto <a href='./'>home</a>.</h2></div>";
                exit;
            }
            else
            {
                if ($username) {
                  $new_pass = hash('sha512',trim($obj->get_safe_str($new_pass)));
                  $condition_arr= array(
                    'password'=>$new_pass,
                     'pass_reset_token'=>NULL,
                     'token_gen_time'=>NULL
                  );
                  $result=$obj->updateData($table,$condition_arr,'email',$email);  
                  echo "<div align='center'>
                    <h2>Password Reset Successfull! Try to Login Now</h2></div>";
                }
            }
        
           }
}
else
{

?> 

<?php 
if(isset($_GET['token']))
{   
    $token=$_SESSION['ton']=$_GET['token'];
    $table="user";
    $result=$obj->getData($table,'token_gen_time',array('pass_reset_token'=>$token));
      if(count($result)>0){
            $Old_token_time=$result[0]['token_gen_time'];
            $New_token_time=time();
            $expire=$New_token_time-$Old_token_time;
      }else{
        $expire=1000;
      }
            if($expire>600)
            {?>
                <div align="center">
                    <h2> Sorry, The link is expired. Please request a new Link again.Goto <a href="./">home</a> .</h2>
                    
                </div>
            <?php   
                exit;
            }

?>

      <div class="row">
        <div class="col-md-12 ml-auto mr-auto text-center" style="margin-top:8rem;">         
        <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form" method="post" action="./passwordreset.php">
            <div class="card card-login card-hidden">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Reset Your password...!</h4>         
              </div>
              <div class="card-body ">                  
                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="new_pass" class="form-control" placeholder="Password...">
                  </div>
                </span>

                <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="new_pass_c" class="form-control" placeholder="Confirm Password...">
                  </div>
                </span>

              </div>
              <div class="card-footer justify-content-center">
                <input type="submit" name="submit" class="btn btn-rose btn-link btn-lg" value="Reset Now"/>
              </div>
            </div>
          </form>
        </div>
      </div>
<?php 
}}
?>


          
        </div>
      </div>
      
    </div>
  </div>


<?php include('includes/footer.php'); ?>