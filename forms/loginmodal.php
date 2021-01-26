<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-primary text-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
              <h4 class="card-title" id="title">Log in</h4>
              <p class="text-center" id="text">Departmental Login Only</p>    
            </div>
          </div>
          <form class="form" method="post" action="http://localhost/BWEM/admin/signin.php">
          <div class="modal-body">
            
             
              <div class="card-body">
                
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                  </div>
                </div>
                <div class="form-group" id="pwdfield">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input name="password" type="password" placeholder="Password..." class="form-control" >
                  </div>
                </div>

              </div>
            
          </div>
          <div class="modal-footer justify-content-center">

          <input type="submit" name="submit" value="login" class="btn btn-info btn-round" id="sendOtp">
          
              <!-- <div class="space-50" ></div> -->
          </div>
          </form>
          <div class="forgot-password text-center mb-3 mt-2">
            <button type="button" class="btn btn-secondary btn-sm btn-round" id="forgotPwd"> Forgot Password...?</button>
          </div>
          
        </div>
      </div>
    </div>
  </div>

 