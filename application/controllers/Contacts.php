<?php /**
 * 
 */
class Contacts extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['contacts'] = $this->AdminPanelModel->get_Contacts();
		$this->load->view("fronts/Contacts",$data);
	}

	public function send_message()
	{
		$data = $this->input->post();
		$this->db->insert("contact_forms",$data);
		$this->session->set_flashdata("succMsg","Message sent successfully");
			return redirect(back());
	}
}