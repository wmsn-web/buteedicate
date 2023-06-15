<div class="modal fade" id="LoginModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <span class="tx-20"><b>Login</b></span>
            <p class="text-danger" id="logMsg"></p>
          </div>
          <form id="loginForm" action="<?= base_url('Login/ProcessLogin_forBuy'); ?>" method="post" data-parsley-validate novalidate>
              <div class="row">
                  
                  <div class="form-group col-md-12">
                      <label>Email Address</label>
                      <input type="email" name="email" class="form-control"required>
                  </div>
                  <div class="form-group col-md-12">
                      <label>Password</label>
                      <input type="Password" name="password" class="form-control" required>
                  </div>
                  <div class="form-group col-md-12">
                      <a onclick="showForgot()" href="javascript:void(0)">Forgot Password?</a>
                  </div>
                  <div class="form-group col-md-12">
                      <label class="ckbox">
                          <input type="checkbox" checked  required>
                          <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a></span>
                      </label>
                  </div>
                  <div class="form-group col-md-12">
                      <button class="btn btn-primary btn-block">Login</button>
                  </div>
                  <div class="form-group col-md-12 text-center">
                      <a class="nav-link" href="<?= base_url('Register'); ?>">Don't have an account create from here.</a><br>
                      <a class="text-danger mt-2" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
 </div>