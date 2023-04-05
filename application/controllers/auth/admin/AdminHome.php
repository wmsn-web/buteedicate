<?php /**
 * 
 */
class AdminHome extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("auth/admin/AdminLogin?refer=$actual_link");
		
		}
	}

	public function index()
	{
		$this->load->view('admin/AdminHome');
	}

	public function logout()
	{
		$this->session->unset_userdata("UserAdmin");
		return redirect(base_url('auth/admin'));
	}
}