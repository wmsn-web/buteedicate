<?php /**
 * 
 */
class Course extends CI_controller
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

	}
	public function details($codes)
	{
		$slug = base64_decode(urldecode($codes));
		$data['user_id'] = $this->session->userdata("userId");
		$this->Onlilink_expire($data['user_id']);
		$data['prods'] = $this->SiteModel->get_product_by_slug($slug);
		$data['fetrs'] = $this->SiteModel->get_prod_features($data['prods']['id']);
		$data['ebooks'] = $this->AdminPanelModel->get_all_ebooks($data['prods']['id']);
		$this->load->view("fronts/my_course_details",$data);
	}

	public function submit_appoint()
	{
		$data = $this->input->post();
		$this->db->where("user_id",$user_id);
		$chk = $this->db->get("online_meet_link")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("errMsg","You have already an appointment");
			return redirect(back());
		}
		else
		{
			$this->db->insert("online_meet_link",$data);
			$this->session->set_flashdata("succMsg","Appointment Applied");
			return redirect(back());
		}
	}

	public function Onlilink_expire($user_id)
	{
		$this->db->where("user_id",$user_id);
		$gt = $this->db->get("online_meet_link")->row_array();
		if(!empty($gt))
		{
			$dt = $gt['dates'].' '.$gt['times'];
			$td = date('Y-m-d H:i:s');
			$today = strtotime($td);
			$dts = strtotime($dt);
			if($today > $dts)
			{
				$this->db->where("id",$gt['id']);
				$this->db->delete("online_meet_link");
			}
		}
	}
}