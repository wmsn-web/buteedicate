<?php /**
 * 
 */
class Unsubscribe_requests extends CI_controller
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
		$data['requests'] = $this->AdminPanelModel->get_unsubscribe_requests();
		$this->load->view("admin/Unsubscribe_requests",$data);
	}

	public function mark_unsubs($id)
	{
		$this->db->where("id",$id);
		$this->db->update("unsubs_paypal",["status"=>1]);
		$this->session->set_flashdata("Feed","Request Accepted");
		return redirect(back());
	}

	public function req_delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("unsubs_paypal");
		$this->session->set_flashdata("Feed","Request Deleted");
		return redirect(back());
	}
}