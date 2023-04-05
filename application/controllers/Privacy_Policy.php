<?php /**
 * 
 */
class Privacy_Policy extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['policy'] = $this->AdminPanelModel->getPrivacyAll();
		$this->load->view("fronts/Privacy_Policy",$data);
	}
}