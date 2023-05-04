<?php /**
 * 
 */
class Subscribers extends CI_controller
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
		$data['subscribers'] = $this->AdminPanelModel->get_all_subscribers();
		$this->load->view("admin/Subscribers",$data);
	}	

	public function subs_delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("email_subscribers");
		$this->session->set_flashdata("Feed","Subscriber Deleted");
		return redirect(back());
	}
}