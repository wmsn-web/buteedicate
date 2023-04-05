<?php /**
 * 
 */
class SiteModel extends CI_Model
{
	
	public function get_all_products()
	{
		$this->db->order_by("price","ASC");
		$data = $this->db->get("products")->result_array();
		return $data;
	}

	public function get_prod_features($id)
	{
		$this->db->where("prod_id",$id);
		$data = $this->db->get("prod_features")->result_array();
		return $data;
	}
	public function get_product_by_slug($slug)
	{
		$this->db->where("prod_slug",$slug);
		$data = $this->db->get("products")->row_array();
		return $data;
	}
	public function get_product_by_id($id)
	{
		$this->db->where("id",$id);
		$data = $this->db->get("products")->row_array();
		return $data;
	}
	public function get_user_by_id($id)
	{
		$this->db->where("id",$id);
		$data = $this->db->get("users")->row_array();
		return $data;
	}
	public function get_isd_codes()
	{
		$this->db->order_by("phone_code","ASC");
		$data = $this->db->get("isd_codes")->result_array();
		return $data;
	}
	public function get_my_courses($user_id)
	{
		$this->db->where("user_id",$user_id);
		$data = $this->db->get("my_courses")->result_array();
		return $data;
	}
	public function get_mcorse_dates($user_id,$prod_id)
	{
		$this->db->where(["user_id"=>$user_id,"prod_id"=>$prod_id]);
		$data = $this->db->get("my_courses")->row_array();
		return $data;
	}

	public function get_all_ebooks_english($prod_id)
	{
		$this->db->where(["prod_id"=>$prod_id,"language"=>"English"]);
		$data = $this->db->get("ebooks")->result_array();
		return $data;
	}

	public function get_book_languages($prod_id)
	{
		$this->db->distinct();
		$this->db->select("language");
		$this->db->order_by("language","ASC");
		$this->db->where("prod_id",$prod_id);
		$data = $this->db->get("ebooks")->result_array();
		return $data;
	}

	public function get_discord_links($id)
	{
		$this->db->where("user_id",$id);
		$data = $this->db->get("discord_links")->row_array();
		return $data;
	}

	public function get_all_plans()
	{
		$this->db->order_by("price","ASC");
		$data = $this->db->get("mem_plans")->result_array();
		return $data;
	}

	public function get_plan_by_slug($slug)
	{
		$this->db->where("plan_slug",$slug);
		$data = $this->db->get("mem_plans")->row_array();
		return $data;
	}

	public function check_my_course_exists($user_id,$prod_id)
	{
		$this->db->where(["user_id"=>$user_id,"prod_id"=>$prod_id]);
		$data = $this->db->get("my_courses")->num_rows();
		return $data;
	}

	public function is_plan_active($user_id,$plan_id)
	{
		$this->db->where(["user_id"=>$user_id,"plan_id"=>$plan_id]);
		$chk = $this->db->get("user_subscriptions")->num_rows();
		return $chk;
	}

	public function is_user_usbscr($user_id)
	{
		$this->db->where(["user_id"=>$user_id]);
		$chk = $this->db->get("user_subscriptions")->row_array();
		return $chk;
	}
	public function get_my_subscription($user_id)
	{
		$this->db->where(["user_id"=>$user_id]);
		$chk = $this->db->get("user_subscriptions")->row_array();
		$data = $this->get_plan_by_id($chk['plan_id']);
		return $data;
	}

	public function get_my_subscription_subs($user_id)
	{
		$this->db->where(["user_id"=>$user_id]);
		$chk = $this->db->get("user_subscriptions")->row_array();
		return $chk;
	}

	public function get_plan_by_id($id)
	{
		$this->db->where("id",$id);
		$data = $this->db->get("mem_plans")->row_array();
		return $data;
	}
	public function get_my_plan_product($plan_id,$user_id)
	{
		$this->db->where("plan_id",$plan_id);
		$gt = $this->db->get("plan_products")->result_array();
		if(empty($gt))
		{
			$data = array();
		}
		else
		{
			foreach($gt as $gts)
			{
				$this->db->where(["user_id"=>$user_id,"prod_id"=>$gts['prod_id']]);
				$chk = $this->db->get("my_courses")->num_rows();
				if($chk > 0)
				{
					$data = array();
				}
				else
				{
					$data = array("prod_id"=>$gts['prod_id']);
				}
			}
		}
		return $data;
	}
	public function get_all_transactions($user_id)
	{
		$this->db->order_by("id","DESC");
		$this->db->where("user_id",$user_id);
		$data = $this->db->get("payments")->result_array();
		return $data;
	}
	public function check_meetlink_approval($user_id)
	{
		$this->db->where("user_id",$user_id);
		$data = $this->db->get("online_meet_link")->row_array();
		return $data;
	}
}