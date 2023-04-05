<?php /**
 * 
 */
class Seminars extends CI_controller
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
		$data['ebooks'] = $this->AdminPanelModel->get_all_ebooks($data['prods']['id']);
		$data['discord_links'] = $this->AdminPanelModel->get_discord_links($data['prods']['id']);
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['mcorse'] = $this->SiteModel->get_mcorse_dates($user_id,$data['prods']['id']);
		if(empty($data['mcorse']))
		{
			return redirect(base_url('my-account/my-courses'));
		}
		$this->load->view("fronts/Seminars",$data);
	}	
}