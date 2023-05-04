<?php /**
 * 
 */
class Ebooks extends CI_controller
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
		if(empty($data['mcorse']))
		{
			return redirect(base_url('my-account/my-courses'));
		}
		$this->load->view("fronts/Ebooks",$data);
	}

	public function download($codes)
	{
		$name = base64_decode(urldecode($codes));
		$file = "./uploads/ebooks/".$name;
		header("Content-type: application/pdf");
		header("Content-Disposition: attachment; filename=\"$name\"");
    	header('Content-Length: ' . filesize($name));
		readfile($file);
	}	
}