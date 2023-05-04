<?php /**
 * 
 */
class Home extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view("fronts/final_home");
	}

	public function subscribe_email()
	{
		$data = $this->input->post();
		$this->db->where("email",$data['email']);
		$chk = $this->db->get("email_subscribers")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("errMsg","Email already exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("email_subscribers",$data);
			$this->session->set_flashdata("succMsg","Thank you! You have subscribed successfully.");
			return redirect(back());
		}
	}
}