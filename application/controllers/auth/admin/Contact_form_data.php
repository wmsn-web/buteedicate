<?php /**
 * 
 */
class Contact_form_data extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['form_data'] = $this->AdminPanelModel->get_all_form_data();
		$this->load->view("admin/Contact_form_data",$data);
	}

	public function cont_delete($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("contact_forms");
		return redirect(back());
	}
}