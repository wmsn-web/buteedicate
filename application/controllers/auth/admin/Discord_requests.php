<?php /**
 * 
 */
class Discord_requests extends CI_controller
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
		$data['discord_links'] =  $this->AdminPanelModel->get_discord_links();
		$this->load->view("admin/Discord_requests",$data);
	}

	public function update_requests()
	{
		$data = $this->input->post();
		$data['status'] = 1;
		$this->db->where("id",$data['id']);
		$this->db->update("discord_links",$data);
		return redirect(back());
	}
}