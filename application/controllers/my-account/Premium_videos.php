<?php /**
 * 
 */
class Premium_videos extends CI_controller
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
		$data['mplan'] = $this->SiteModel->get_my_subscription($this->session->userdata("userId"));
		$data['subs'] = $this->SiteModel->get_my_subscription_subs($user_id);
		$data['vid_folders'] = $this->AdminPanelModel->get_plan_vid_folders($data['subs']['plan_id']);
		$data['pln'] = $this->SiteModel->get_plan_by_id($data['subs']['plan_id']);
		$chk_subs = $this->SiteModel->get_my_subscription_subs($this->session->userdata("userId"));
		if(!empty($chk_subs))
		{
			$data['chk_vid'] = $this->SiteModel->check_videos_for_membership($chk_subs['plan_id']);
		}
		else
		{
			$data['chk_vid'] = 0;
		}
		if(empty($data['subs']))
		{
			$this->session->set_flashdata("errMsg","Please buy a subscription");
			return redirect(base_url('membership-plans'));
		}
		$this->load->view("fronts/Premium_videos",$data);
	}

	public function play($code)
	{
		$code = urldecode($code);
		$data['main_vid'] = $this->SiteModel->get_main_video_by_slug($code);

		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['mplan'] = $this->SiteModel->get_my_subscription($this->session->userdata("userId"));
		$data['subs'] = $this->SiteModel->get_my_subscription_subs($user_id);
		$data['vid_folders'] = $this->AdminPanelModel->get_plan_vid_folders($data['subs']['plan_id']);
		$data['pln'] = $this->SiteModel->get_plan_by_id($data['subs']['plan_id']);
		$chk_subs = $this->SiteModel->get_my_subscription_subs($this->session->userdata("userId"));
		if(!empty($chk_subs))
		{
			$data['chk_vid'] = $this->SiteModel->check_videos_for_membership($chk_subs['plan_id']);
		}
		else
		{
			$data['chk_vid'] = 0;
		}
		if(empty($data['subs']))
		{
			$this->session->set_flashdata("errMsg","Please buy a subscription");
			return redirect(base_url('membership-plans'));
		}

		$data['rel_videos'] = $this->SiteModel->get_related_planvideos($data['subs']['plan_id'],$data['main_vid']['video_type']);
		$data['all_videos'] = $this->SiteModel->get_all_video_from_plan($data['subs']['plan_id']);

		$this->load->view("fronts/Premimu_videos_play",$data);
	}
}