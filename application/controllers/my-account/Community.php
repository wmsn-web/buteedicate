<?php /**
 * 
 */
class Community extends CI_controller
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
		$user_id = $this->session->userdata("userId");
		$slug = base64_decode(urldecode($codes));
		$data['prods'] = $this->SiteModel->get_product_by_slug($slug);
		$data['ebooks'] = $this->SiteModel->get_all_ebooks_english($data['prods']['id']);
		$data['discord_links'] = $this->SiteModel->get_discord_links($user_id);
		$user_id = $this->session->userdata("userId");
		$data['usr'] = $this->SiteModel->get_user_by_id($user_id);
		$data['mcorse'] = $this->SiteModel->get_mcorse_dates($user_id,$data['prods']['id']);
		if(empty($data['mcorse']))
		{
			return redirect(base_url('my-account/my-courses'));
		}
		$this->load->view("fronts/Community",$data);
		//echo "<pre>";
		//print_r($data);
	}

	public function save_discord()
	{
		$data = $this->input->post();
		$this->db->where($data);
		$chk = $this->db->get("discord_links")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("errMsg","Link Request Already Exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("discord_links",$data);
			$this->session->set_flashdata("succMsg","Request Submitted");
			return redirect(back());
		}
	}
}