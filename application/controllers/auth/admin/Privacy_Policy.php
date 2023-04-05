<?php 
/**
 * 
 */
class Privacy_Policy extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("AdminAuthModel");
		$this->load->model("AdminPanelModel");
		date_default_timezone_set('Asia/Kolkata');
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("auth/admin/AdminLogin?refer=$actual_link");
		
		}
	}

	public function index()
	{
		$policy = $this->AdminPanelModel->getPrivacyAll();
		$this->load->view("admin/Privacy_Policy",["policy"=>$policy]);
	}

	public function updatePolicy()
	{
		$policy = htmlentities($this->input->post("policy"));
		$plc = trim($policy);
		if(empty($plc))
		{
			$this->session->set_flashdata("Feed","Please don't submit empty forms");
			return redirect(back());
		}
		else
		{
			$data = array(
				"policy_name"	=>"privacy",
				"policy_details"	=>$policy
			);
			$chk = $this->db->get("policy")->num_rows();
			if($chk > 0)
			{
				$this->db->update("policy",$data);
				$this->session->set_flashdata("Feed","Privacy Policy Updated");
				return redirect(back());
			}
			else
			{
				$this->db->insert("policy",$data);
				$this->session->set_flashdata("Feed","Privacy Policy Updated");
				return redirect(back());
			}
		}
	}
}