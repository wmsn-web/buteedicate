<?php /**
 * 
 */
class View_users extends CI_controller
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
		$data['all_users'] = $this->AdminPanelModel->get_all_users();
		$this->load->view("admin/all_users",$data);
	}
	public function update_user()
	{
		$data = $this->input->post();
		$this->db->where("id",$data['id']);
		$this->db->update("users",$data);
		$this->session->set_flashdata("Feed","User Updated");
		return redirect(back());
	}
	public function ch_pass()
	{
		$id = $this->input->post("id");
		$pass = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
		$this->db->where("id",$id);
		$this->db->update("users",["password"=>$pass]);
		$this->session->set_flashdata("Feed","Password Updated");
		return redirect(back());
	}
	public function del_user($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("users");
		$this->session->set_flashdata("Feed","User Deleted");
		return redirect(back());
	}
}