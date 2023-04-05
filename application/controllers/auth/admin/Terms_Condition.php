<?php 
/**
 * 
 */
class Terms_Condition extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AdminAuthModel");
		$this->load->model("AdminPanelModel");
		date_default_timezone_set('Asia/Kolkata');
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("admin/AdminLogin?refer=$actual_link");
		
		}
	}

	public function index()
	{
		$terms = $this->AdminPanelModel->getTermsAll();
		$this->load->view("admin/Terms_Condition",["terms"=>$terms]);
	}

	public function updateTerms()
	{
		$terms = htmlentities($this->input->post("terms"));
		$trm = trim($terms);
		if(empty($trm))
		{
			$this->session->set_flashdata("Feed","Please don't submit empty forms");
			return redirect(back());
		}
		else
		{
			$data = array(
				"terms_all"	=>"terms_condition",
				"terms_details"	=>$terms
			);
			$chk = $this->db->get("terms")->num_rows();
			if($chk > 0)
			{
				$this->db->update("terms",$data);				
				$this->session->set_flashdata("Feed","Terms and condition updated");
				return redirect(back());
			}
			else
			{
				$this->db->insert("terms",$data);
				$this->session->set_flashdata("Feed","Terms and condition updated");
				return redirect(back());
			}
		}
	}
}