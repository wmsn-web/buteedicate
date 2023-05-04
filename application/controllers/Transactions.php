<?php /**
 * 
 */
class Transactions extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url('Login'));
		}
	}

	public function index()
	{
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['transactions'] = $this->SiteModel->get_all_transactions($user_id);
		$chk_subs = $this->SiteModel->get_my_subscription_subs($this->session->userdata("userId"));
		if(!empty($chk_subs))
		{
			$data['chk_vid'] = $this->SiteModel->check_videos_for_membership($chk_subs['plan_id']);
		}
		else
		{
			$data['chk_vid'] = 0;
		}
		$this->load->view("fronts/my_transactions",$data);
	}
}