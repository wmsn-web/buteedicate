<?php /**
 * 
 */
class Meeting_requests extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AdminAuthModel");
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("auth/admin/AdminLogin?refer=$actual_link");
		
		}
	}	
	public function index()
	{
		$data['meet_req'] = $this->AdminPanelModel->get_all_meeting_requests();
		$this->Onlilink_expire();
		$this->load->view("admin/Meeting_requests",$data);
	}

	public function update_requests()
	{
		$data = $this->input->post();
		$data['status'] = 1;
		$this->db->where("id",$data['id']);
		$this->db->update("online_meet_link",$data);
		$this->session->set_flashdata("Feed","Meet requests Approved");
		return redirect(back());
	}

	public function delete_request($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("online_meet_link");
		$this->session->set_flashdata("Feed","Meet requests deleted");
		return redirect(back());
	}

	public function Onlilink_expire()
	{
		$gts = $this->db->get("online_meet_link")->result_array();
		if(!empty($gts))
		{
			foreach($gts as $gt):
				$dt = $gt['dates'].' '.$gt['times'];
				$td = date('Y-m-d H:i:s');
				$today = strtotime($td);
				$dts = strtotime($dt);
				if($today > $dts)
				{
					$this->db->where("id",$gt['id']);
					$this->db->delete("online_meet_link");
				}
			endforeach;
		}
	}
}