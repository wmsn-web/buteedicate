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

	public function edit($id)
	{
		$data['pln'] = $this->SiteModel->get_plan_by_id($id);
		$data['all_products'] = $this->AdminPanelModel->get_all_products();
		$data['all_fetures'] = $this->AdminPanelModel->get_plan_features($data['pln']['id']);
		$this->load->view("admin/edit_plan",$data);
	}

	public function Videos($id)
	{
		$data['pln'] = $this->SiteModel->get_plan_by_id($id);
		$data['vid_folders'] = $this->AdminPanelModel->get_plan_vid_folders($id);
		$this->load->view("admin/video_update_plan",$data);
	}	
}