<?php /**
 * 
 */
class AdminPanelModel extends CI_Model
{
	
	public function get_all_products()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("products")->result_array();
		return $data;
	}

	public function get_product_by_id($id)
	{
		$this->db->where("id",$id);
		$data = $this->db->get("products")->row_array();
		return $data;
	}
	public function get_prod_features($id)
	{
		$this->db->where("prod_id",$id);
		$data = $this->db->get("prod_features")->result_array();
		return $data;
	}

	public function getTermsAll()
	{
		$gt = $this->db->get("terms");
		if($gt->num_rows()==0)
		{
			$data = array("trems_details"	=>"");
		}
		else
		{
			$row = $gt->row();
			$data = array(
				"trems_details"	=>$row->terms_details
			);
		}

		return $data;
	}

	public function getPrivacyAll()
	{
		$gt = $this->db->get("policy");
		if($gt->num_rows()==0)
		{
			$data = array("policy_details"	=>"");
		}
		else
		{
			$row = $gt->row();
			$data = array(
				"policy_details"	=>$row->policy_details
			);
		}

		return $data;
	}
	public function get_AboutUs()
	{
		$data = $this->db->get("about_us")->row_array();
		return $data;
	}

	public function get_all_ebooks($id)
	{
		$this->db->order_by("id","DESC");
		$this->db->where("prod_id",$id);
		$data = $this->db->get("ebooks")->result_array();
		return $data;
	}

	public function get_discord_links()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("discord_links")->result_array();
		return $data;
	}

	public function get_all_plans()
	{
		$this->db->order_by("price","ASC");
		$data = $this->db->get("mem_plans")->result_array();
		return $data;
	}

	public function get_plan_features($plan_id)
	{
		$this->db->order_by("id","ASC");
		$this->db->where("plan_id",$plan_id);
		$data = $this->db->get("plan_features")->result_array();
		return $data;
	}
	public function get_plan_products($plan_id)
	{
		$this->db->order_by("id","ASC");
		$this->db->where("plan_id",$plan_id);
		$data = $this->db->get("plan_products")->result_array();
		return $data;
	}
	public function get_all_users()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("users")->result_array();
		return $data;
	}

	public function get_all_transactions()
	{
		$this->db->order_by("id","DESC");
		$get = $this->db->get("payments")->result_array();
		return $get;
	}

	public function get_subscriptions($user_id,$plan_id)
	{
		$this->db->where(["user_id"=>$user_id,"plan_id"=>$plan_id]);
		$data = $this->db->get("user_subscriptions")->row_array();
		return $data;
	}

	public function check_user_subscr($user_id)
	{
		$this->db->where(["user_id"=>$user_id]);
		$data = $this->db->get("user_subscriptions")->num_rows();
		return $data;
	}

	public function get_all_meeting_requests()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("online_meet_link")->result_array();
		return $data;
	}
	public function get_user_by_id($user_id)
	{
		$this->db->where("id",$user_id);
		$data = $this->db->get("users")->row_array();
		return $data;
	}

	public function get_prod_vid_folders($prod_id)
	{
		$this->db->where(["prod_id"=>$prod_id]);
		$this->db->distinct();
		$this->db->select("video_type");
		$data = $this->db->get("videos")->result_array();
		return $data;
	}

	public function get_plan_vid_folders($id)
	{
		$this->db->order_by("video_type","ASC");
		$this->db->where(["subs_member"=>1,"plan_id"=>$id]);
		$this->db->distinct();
		$this->db->select("video_type");
		$data = $this->db->get("videos")->result_array();
		return $data;
	}

	public function get_all_video_by_type($video_type,$id)
	{
		$this->db->where(["prod_id"=>$id,"video_type"=>$video_type]);
		$data = $this->db->get("videos")->result_array();
		return $data;
	}

	public function get_all_planvideo_by_type($video_type,$id)
	{
		$this->db->where(["plan_id"=>$id,"video_type"=>$video_type]);
		$data = $this->db->get("videos")->result_array();
		return $data;
	}

	public function get_all_videos($id)
	{
		$this->db->where(["prod_id"=>$id]);
		$data = $this->db->get("videos")->result_array();
		return $data;
	}

	public function check_video_exists($id)
	{
		$this->db->where(["prod_id"=>$id]);
		$data = $this->db->get("videos")->num_rows();
		return $data;
	}

	public function check_prod_plan_exists($prod_id,$plan_id)
	{
		$this->db->where(["prod_id"=>$prod_id,"plan_id"=>$plan_id]);
		$chk = $this->db->get("plan_products")->num_rows();
		return $chk;
	}

	public function get_unsubscribe_requests()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("unsubs_paypal")->result_array();
		return $data;
	}

	public function get_all_subscribers()
	{
		$this->db->order_by("id","DESC");
		$data = $this->db->get("email_subscribers")->result_array();
		return $data;
	}
}