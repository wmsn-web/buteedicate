<?php /**
 * 
 */
class Register extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("fronts/Register");
	}

	public function submitReg()
	{
		$data = $this->input->post();
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		$this->db->where("email",$data['email']);
		$chk = $this->db->get("users")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("errMsg","Email Address already registered!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("users",$data);
			$this->session->set_flashdata("succMsg","Registration Successfull");
			return redirect(back());
		}
	}
}