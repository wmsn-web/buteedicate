<?php /**
 * 
 */
class Login extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("fronts/Login");
	}

	public function ProcessLogin()
	{
		$email = $this->input->post("email");
		$pass = $this->input->post("password");
		$this->db->where("email",$email);
		$chk = $this->db->get("users");
		if($chk->num_rows() > 0)
		{
			$row = $chk->row();
			if(password_verify($pass, $row->password))
			{
				$this->session->set_userdata("userId",$row->id);
				return redirect(base_url('my-account'));
			}
			else
			{
				$this->session->set_flashdata("errMsg","Invalid Password!");
				return redirect(back());
			}
		}
		else
		{
			$this->session->set_flashdata("errMsg","Email Address not registered!");
			return redirect(back());
		}
	}
}