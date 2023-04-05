<?php /**
 * 
 */
class Terms_and_Conditions extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['terms'] = $this->AdminPanelModel->getTermsAll();
		$this->load->view("fronts/Terms_and_Conditions",$data);
	}
}