<?php /**
 * 
 */
class Company_contacts extends CI_controller
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
		$data['contacts'] = $this->AdminPanelModel->get_Contacts();
		$this->load->view("admin/Company_contacts",$data);
	}

	public function save_contacts()
	{
		$data = $this->input->post();
		$data['map'] = htmlentities($data['map']);
		$chk = $this->db->get("company_contacts");
		if($chk->num_rows() > 0)
		{
			$row = $chk->row_array();
			$this->db->where("id",$row['id']);
			$this->db->update("company_contacts",$data);
			$this->session->set_flashdata("err","Company Details Updated");
			return redirect(back());
		}
		else
		{
			$this->db->insert("company_contacts",$data);
			$this->session->set_flashdata("Feed","Company Details Added");
			return redirect(back());
		}
	}
}