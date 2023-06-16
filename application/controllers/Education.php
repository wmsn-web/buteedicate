<?php /**
 * 
 */
class Education extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return redirect(base_url('#edu'));
	}	

	public function understand_market()
	{
		$this->load->view("fronts/understand_market");
	}

	public function ComSupport()
	{
		$this->load->view("fronts/ComSupport");
	}

	public function understand_market_1()
	{
		$this->load->view("fronts/understand_market_1");
	}
	public function ComSupport_1()
	{
		$this->load->view("fronts/ComSupport_1");
	}
}