<?php /**
 * 
 */
class AjaxController extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function edit_discord_link()
	{
		$id = $this->input->post();
		$this->db->where($id);
		$data = $this->db->get("discord_links")->row_array();
		if(empty($data))
		{
			echo "no";
		}
		else
		{
			?>
				<form action="<?= base_url('auth/admin/Add_contents/update_com_link'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" required value="<?= $data['title']; ?>">
					</div>
					<div class="form-group">
						<label>Link</label>
						<input type="url" name="url_link" class="form-control" required value="<?= $data['url_link']; ?>">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control" required>
							<?php if($data['status']==1){$ch = ""; $ch2 = "";}else{$ch = "selected"; $ch2 = "selected";} ?>
							<option <?= $ch; ?> value="1">Active</option>
							<option <?= $ch2; ?> value="0">Deactive</option>
						</select>
					</div>
					
					<div class="form-group">
						<input type="hidden" name="id" value="<?= $data['id']; ?>">
						<button class="btn btn-primary btn-block">Update Link</button>
					</div>
				</form>
			<?php
		}
	}

	public function up_users()
	{
		$user_id = $this->input->post("id");
		$this->db->where("id",$user_id);
		$usr = $this->db->get("users")->row_array();
		$isds = $this->SiteModel->get_isd_codes();
		?>
			<h4>Update User Information</h4>
			<form action="<?= base_url('auth/admin/View_users/update_user'); ?>" method="post">
                <div class="row mt-3">
                    <div class="form-group col-md-12">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= $usr['name']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <select name="isd" class="form-control">
                            <?php if(!empty($isds)): ?>
                                <?php foreach($isds as $isd): ?>
                                    <?php if($isd['phone_code'] == $usr['isd']){
                                        $chkd = "selected";
                                    }else{$chkd = "";} ?>
                                    <option <?= $chkd; ?> class="<?= $isd['phone_code']; ?>"><?= $isd['phone_code']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="phone" class="form-control" placeholder="Mobile Number" value="<?= $usr['phone']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="email" class="form-control" placeholder="Email Address" readonly  value="<?= $usr['email']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="address" class="form-control" placeholder="Address"  value="<?= $usr['address']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="city" class="form-control" placeholder="City" value="<?= $usr['city']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="country" class="form-control" placeholder="Country" value="<?= $usr['country']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="hidden" name="id" value="<?= $usr['id']; ?>">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
                </div>
			</form>
		<?php
	}
	public function key_user()
	{
		$user_id = $this->input->post("id");
		$this->db->where("id",$user_id);
		$usr = $this->db->get("users")->row_array();
		?>
			<h4>Change User password</h4>
			<form action="<?= base_url('auth/admin/View_users/ch_pass'); ?>" method="post" id="passform">
				<div class="form-group">
					<label>New Password</label>
					<input type="Password" id="pass"  class="form-control" required><br>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="Password" id="conpass" name="password" class="form-control" required><br>
					<span id="pasMsg"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="id" value="<?= $usr['id']; ?>">
					<button type="button" onclick="savePass()" class="btn btn-primary btn-block">Update Password</button>
				</div>
			</form>
		<?php
	}

	public function get_meet_rq()
	{
		$id = $this->input->post("id");
		$this->db->where("id",$id);
		$get = $this->db->get("online_meet_link")->row_array();
		$usr = $this->AdminPanelModel->get_user_by_id($get['user_id']);
		?>
			<form action="<?= base_url('auth/admin/Meeting_requests/update_requests'); ?>" method="post">
                <div class="form-group">
                    <label>Select Date</label>
                    <input type="date" name="dates" class="form-control" value="<?= $get['dates']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Select Time</label>
                    <input type="time" name="times" class="form-control" value="<?= $get['times']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Appointment for (10-60minutes)</label>
                    <input type="text" name="appoint_for" class="form-control" value="<?= $get['appoint_for']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Meeting Link</label>
                    <input type="url" name="link_url" class="form-control" value="<?= $get['link_url']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Select Time</label>
                    <input type="text"  class="form-control" readonly value="<?= $usr['name']; ?> (<?= $usr['email']; ?>)">
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $get['id']; ?>">
                    <button class="btn btn-primary btn-block">Apply</button>
                </div>
            </form>
		<?php
	}

	public function update_community_access()
	{
		$id = $this->input->post("id");
		$this->db->where("id",$id);
		$gt = $this->db->get("products")->row_array();
		if($gt['community_access'] == 1)
		{
			$this->db->where("id",$gt['id']);
			$this->db->update("products",["community_access"=>0]);
		}
		else
		{
			$this->db->where("id",$gt['id']);
			$this->db->update("products",["community_access"=>1]);
		}
	}

	public function update_discord_link()
	{
		$id = $this->input->post("id");
		$this->db->where("id",$id);
		$gt = $this->db->get("discord_links")->row_array();
		?>
		<form action="<?= base_url('auth/admin/Discord_requests/update_requests'); ?>" method="post">
			<div class="form-group">
				<label>Discord Account Name/username</label>
				<input type="text" name="ac_name" class="form-control" readonly value="<?= $gt['ac_name']; ?>">
			</div>
			<div class="form-group">
				<label>Invite Link</label>
				<input type="url" name="url_link" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" value="<?= $gt['id']; ?>">
				<button class="btn btn-primary btn-block">Update Invite Link</button>
			</div>
		</form>

		<?php 
	}
}