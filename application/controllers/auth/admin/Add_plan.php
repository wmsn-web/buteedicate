<?php /**
 * 
 */
class Add_plan extends CI_controller
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
		$data['all_products'] = $this->AdminPanelModel->get_all_products();
		$this->load->view("admin/Add_plan",$data);
	}

	public function save_plan()
	{
		$data['plan_title'] = $this->input->post("plan_title");
		$data['plan_slug'] = slugify($data['plan_title']);
		$data['duration'] = $this->input->post("duration");
		$data['intervals'] = $this->input->post("intervals");
		$data['price'] = $this->input->post("price");
		$plan_features = $this->input->post("plan_features");
		$prod_id = $this->input->post("prod_id");

		$this->db->where("plan_slug",$data['plan_slug']);
		$chk = $this->db->get("mem_plans")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("err","Plan Alresdy Exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("mem_plans",$data);
			$plan_id = $this->db->insert_id();
			if(!empty($plan_features))
			{
				foreach ($plan_features as $fetrs) { 
					$df = array(
						"features" => $fetrs,
						"plan_id"	=>$plan_id
					);
					$this->db->insert("plan_features",$df);
				}
			}

			if(!empty($prod_id))
			{
				foreach ($prod_id as $prid) { 
					$pp = array(
						"prod_id" => $prid,
						"plan_id"	=>$plan_id
					);

					$this->db->insert("plan_products",$pp);
				}
			}

			$this->session->set_flashdata("Feed","Plan Addedd Successfully");
			return redirect(back());

		}

		

	}
}