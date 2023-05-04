<?php /**
 * 
 */
class About_Us extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['about'] = $this->AdminPanelModel->get_AboutUs();
		$this->load->view("fronts/About_Us",$data);
	}
}