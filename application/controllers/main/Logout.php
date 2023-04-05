<?php /**
 * 
 */
class Logout extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->session->unset_userdata("userId");
		return redirect(base_url("Login"));
	}
}