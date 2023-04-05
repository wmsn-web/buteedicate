<?php /**
 * 
 */
class View_plans extends CI_controller
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
		$data['all_products'] = $this->AdminPanelModel->get_all_products();
		$data['all_plans'] = $this->AdminPanelModel->get_all_plans();
		$this->load->view("admin/View_plans",$data);
	}	
}