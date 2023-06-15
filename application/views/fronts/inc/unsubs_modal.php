<div class="modal fade" id="unsubsPaypal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">You're about to unsubscribe from your running membership</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <h5 id="erms" class="hide"><b class="text-danger" id="erMsg"></b></h5>
          <form action="<?= base_url('Unsubscription/paypal'); ?>" method="post">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <p>Please be aware of our general terms and conditions.</p>
                <div class="form-group mt-5">
                  <label>Registered Email Address</label>
                  <input type="email" name="email" class="form-control mt-2" required>
                </div>
                <div class="form-group">
                  <label>Does the email email address match with the email used in your PayPal account?</label><br>
                  <label class="mt-3">
                    <input type="radio" onclick="chkEmail(this.value)" checked name="same_email" value="1">
                    Yes
                  </label>
                  <?= nbs(5); ?>
                  <label>
                    <input type="radio" name="same_email" onclick="chkEmail(this.value)" value="0">
                      No
                  </label>
                </div>
                <div id="payemail" class="form-group hide">
                  <label>Please type the email address which is used with your PayPal account.</label>
                  <input type="text" id="pe" name="paypal_email" class="form-control mt-2">
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox"   value="1" required>
                    I have read and accept the <a target="_blank" href="<?= base_url('Privacy_Policy'); ?>">Privacy policy</a>
                  </label>
                  
                </div>
                <div class="form-group">
                  <button class="btn btn-prime">Send request</button>
                </div>
              </div>
            </div>
                
          </form>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="unsubsSuccess" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Unsubscribe Success</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body text-center">
          <p id="suMsg" class="text-success"></p>
          <div class="text-center">
            <i class="fas fa-check-circle fa-3x text-success"></i><br>
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="modal fade" id="emailModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Unsubscribe from Email</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <h5><b class="text-danger" id="erMsgM"></b></h5>
          <p>We will not send any newsletter email to your email address after unsubscription.</p>
          <form action="<?= base_url('Unsubscription/emailx'); ?>" method="post">
            <div class="form-group mt-3">
              <label>Email Address</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>
                <input type="checkbox" checked  value="1" required>
                I have read and accept the <a target="_blank" href="<?= base_url('Privacy_Policy'); ?>">Privacy policy</a>
              </label>
              
            </div>
            <div class="form-group">
              <button class="btn btn-prime">Send request</button>
            </div>
          </form>
        </div>
      </div>
    </div>
 </div>
 
