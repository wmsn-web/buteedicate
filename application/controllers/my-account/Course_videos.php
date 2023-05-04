<?php /**
 * 
 */
class Course_videos extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url('Login'));
		}
	}

	public function index($codes)
	{
		$slug = base64_decode(urldecode($codes));
		$data['prods'] = $this->SiteModel->get_product_by_slug($slug);
		$data['ebooks'] = $this->SiteModel->get_all_ebooks_english($data['prods']['id']);
		$data['discord_links'] = $this->AdminPanelModel->get_discord_links($data['prods']['id']);
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['mcorse'] = $this->SiteModel->get_mcorse_dates($user_id,$data['prods']['id']);
		$data['book_language'] = $this->SiteModel->get_book_languages($data['prods']['id']);
		$data['vids'] = $this->AdminPanelModel->check_video_exists($data['prods']['id']);
		$data['vid_folders'] = $this->AdminPanelModel->get_prod_vid_folders($data['prods']['id']);
		if(empty($data['mcorse']))
		{
			return redirect(base_url('my-account/my-courses'));
		}
		$this->load->view("fronts/Course_videos",$data);
	}

	public function play($code)
	{
		$code = urldecode($code);
		$data['main_vid'] = $this->SiteModel->get_main_video_by_slug($code);
		$data['prods'] = $this->SiteModel->get_product_by_id($data['main_vid']['prod_id']);
		$data['ebooks'] = $this->SiteModel->get_all_ebooks_english($data['prods']['id']);
		$data['discord_links'] = $this->AdminPanelModel->get_discord_links($data['prods']['id']);
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['mcorse'] = $this->SiteModel->get_mcorse_dates($user_id,$data['prods']['id']);
		$data['book_language'] = $this->SiteModel->get_book_languages($data['prods']['id']);
		$data['vids'] = $this->AdminPanelModel->check_video_exists($data['prods']['id']);
		$data['vid_folders'] = $this->AdminPanelModel->get_prod_vid_folders($data['prods']['id']);

		$data['rel_videos'] = $this->SiteModel->get_related_videos($data['main_vid']['prod_id'],$data['main_vid']['video_type']);
		$data['all_videos'] = $this->SiteModel->get_all_video_from_product($data['prods']['id']);

		if(empty($data['mcorse']))
		{
			return redirect(base_url('my-account/my-courses'));
		}
		$this->load->view("fronts/Course_videos_play",$data);
		//$this->load->view("fronts/tst",$data); 
	}
}