<h5>CHANGE PASSWORD</h5>
<form action="<?= base_url('admin/UpdateUserData/ChangePassword'); ?>" method="post" data-parsley-validate novalidate>
	<div class="row">
		<div class="input-group mb-3 col-md-6">
			<div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon3">Password<span class="text-danger">*</span></span>
			  </div>
			  <input type="password" id="chps" class="form-control" required="required">
		</div>
		<div class="input-group mb-3 col-md-6">
		<div class="input-group-prepend">
		    <span class="input-group-text" id="basic-addon3">Confirm Password<span class="text-danger">*</span></span>
		  </div>
			<input type="password" name="pass" id="chConps" onkeyup="checkChangePass()"  class="form-control" required="required">
		</div>
		<input type="hidden" name="user_id" value="<?= $users['user_id']; ?>">
		<div class="form-group col-md-12">
			<span id="chpsMsg"></span><br>
			<button id="updPass" class="btn btn-primary">Update Password</button>
			 
		</div>
	</div>
</form>