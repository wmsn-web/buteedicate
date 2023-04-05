<?php /**
 * 
 */
class My_courses extends CI_controller
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
		$data['courses'] = $this->SiteModel->get_my_courses($user_id);
		$this->load->view("fronts/mycourses",$data);
	}
}