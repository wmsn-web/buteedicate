<?php /**
 * 
 */
class All_transactions extends CI_controller
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
		$data['transactions'] = $this->AdminPanelModel->get_all_transactions();
		$this->load->view("admin/All_transactions",$data);
	}

}