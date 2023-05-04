<div class="modal fade" id="unsubsPaypal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Unsubscribe from Paypal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <h5><b class="text-danger" id="erMsg"></b></h5>
          <p>If you are using any Membership Subscription you can unsubscribe anytime. Send Unsibscribe request with your registered email address.</p>
          <form action="<?= base_url('Unsubscription/paypal'); ?>" method="post">
            <div class="form-group mt-3">
              <label>Registered Email Addess</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Is you using Registered email address with paypal</label><br>
              <label>
                <input type="radio" checked name="same_email" value="1">
                Yes
              </label>
              <?= nbs(5); ?>
              <label>
                <input type="radio" name="same_email" value="1">
                  No
              </label>
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
              <label>Email Addess</label>
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
 
