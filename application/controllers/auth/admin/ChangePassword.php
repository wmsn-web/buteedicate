<?php /**
 * 
 */
class ChangePassword extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AdminAuthModel");
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("auth/admin/AdminLogin?refer=$actual_link");
		
		}
	}	

	public function index()
	{
		$this->load->view("admin/ChangePassword");
	}

	public function updatePass()
	{
		$pass = $this->input->post("password");
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$this->db->where("admin_user","admin");
		$this->db->update("admin",["password"=>$pass]);
		$this->session->set_flashdata("Feed","Password Changed Successfully");
		return redirect(back());
	}
}