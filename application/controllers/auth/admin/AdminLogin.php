<?php
/**
 * 
 */
class AdminLogin extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AdminAuthModel");
		if($this->session->userdata("UserAdmin")){
			return redirect("auth/admin/");
		}
		
		
	}

	function index()
	{
		$this->load->view("admin/AdminLogin");
		//$this->session->set_userdata("UserAdmin","1");
		//return redirect('admin');
	}
	function loginProcess()
	{
		$user = $this->input->post("username");
		$password = $this->input->post("password");
		$getUser = $this->AdminAuthModel->getUser($user); 
		$num = $getUser->num_rows();
		$row = $getUser->row();
		$pawd = $row->password;//taken from database
		if($num ==0)
		{
			$this->session->set_flashdata("Feed","Invalid Username!");
			return redirect("auth/admin/AdminLogin");
		}
		if (password_verify($password, $pawd)) {
				$back = base_url('auth/admin/AdminHome/');
				if($_GET['refer'] == "")
			{
				$back = base_url('auth/admin/AdminHome/');
			}
			else
			{
				$back = $_GET['refer'];
			}
				$this->session->set_userdata("UserAdmin",$user);
				return redirect($back);

		}else{
			$this->session->set_flashdata("Feed","Invalid Password!");
			return redirect("auth/admin/AdminLogin");
		}
		
	}
}