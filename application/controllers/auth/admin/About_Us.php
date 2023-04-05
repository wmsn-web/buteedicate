<?php /**
 * 
 */
class About_Us extends CI_controller
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
		$data['about'] = $this->AdminPanelModel->get_AboutUs();
		$this->load->view("admin/About_Us",$data);
	}

	public function saveAbout()
	{
		$data['page_content'] = htmlentities($this->input->post("page_content"));
		
		$this->db->update("about_us",$data);
		return redirect(back());
	}
}