<?php /**
 * 
 */
class Claim_course extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url('Login'));
		}
	}

	public function index($prod_id)
	{
		$data['user_id'] = $this->session->userdata("userId");
		$data['prod_id'] = $prod_id;
		$data['status'] = 1;
		$data['types'] = "subscr";

		$this->db->insert("my_courses",$data);
		return redirect(back());

	}
}