<?php /**
 * 
 */
class Home extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['isds'] = $this->SiteModel->get_isd_codes();
		$this->load->view("fronts/myaccount",$data);
	}

	public function save_profile()
	{
		$data = $this->input->post();
		$this->db->where("id",$data['id']);
		$this->db->update("users",$data);
		return redirect(back());
	}
}