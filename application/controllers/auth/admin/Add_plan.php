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
			$this->session->set_flashdata("err","Plan Already Exists!");
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

	public function delete_features($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("plan_features");
		$this->session->set_flashdata("Feed","Plan Features Deleted Successfully");
		return redirect(back());
	}

	public function update_plan()
	{
		$data['plan_title'] = $this->input->post("plan_title");
		$data['plan_slug'] = slugify($data['plan_title']);
		$data['duration'] = $this->input->post("duration");
		$data['intervals'] = $this->input->post("intervals");
		$data['price'] = $this->input->post("price");
		$plan_features = $this->input->post("plan_features");
		$prod_id = $this->input->post("prod_id");
		$id = $this->input->post("id");

		$this->db->where("plan_slug",$data['plan_slug']);
		$chk = $this->db->get("mem_plans");
		if($chk->num_rows() > 0)
		{
			$row = $chk->row();
			if($row->id == $id)
			{
				$this->db->where("id",$id);
				$this->db->update("mem_plans",$data);
				if(!empty($plan_features))
				{
					foreach ($plan_features as $fetrs) { 
						$df = array(
							"features" => $fetrs,
							"plan_id"	=>$id
						);
						$this->db->insert("plan_features",$df);
					}
				}
				$this->db->where("plan_id",$id);
				$this->db->delete("plan_products");
				if(!empty($prod_id))
				{
					foreach ($prod_id as $prid) { 
						$pp = array(
							"prod_id" => $prid,
							"plan_id"	=>$id
						);

						$this->db->insert("plan_products",$pp);
					}
				}

				$this->session->set_flashdata("Feed","Plan Addedd Successfully");
				return redirect(back());
			}
			else
			{
				$this->session->set_flashdata("Feed","Plan Already Exists!");
				return redirect(back());
			}
		}
		else
		{
			$this->db->where("id",$id);
			$this->db->update("mem_plans",$data);
			if(!empty($plan_features))
			{
				foreach ($plan_features as $fetrs) { 
					$df = array(
						"features" => $fetrs,
						"plan_id"	=>$id
					);
					$this->db->insert("plan_features",$df);
				}
			}
			$this->db->where("plan_id",$id);
			$this->db->delete("plan_products");
			if(!empty($prod_id))
			{
				foreach ($prod_id as $prid) { 
					$pp = array(
						"prod_id" => $prid,
						"plan_id"	=>$id
					);

					$this->db->insert("plan_products",$pp);
				}
			}
			$this->session->set_flashdata("Feed","Plan Addedd Successfully");
			return redirect(back());
		}
			
	}

	public function add_video_link()
	{
		$data = $this->input->post();
		$data['subs_member'] = 1;
		$data['vid_slug'] = shufflex_str(25);
		$dir_name ='./uploads/vid_thumb';
			if (!is_dir($dir_name)) {
			mkdir($dir_name);
		}
		$vid_descr = $data['vid_descr'];
		$adbr = str_replace(PHP_EOL, "<br>", $vid_descr);
		$data['vid_descr'] = htmlentities($adbr);

		$config['upload_path'] = './uploads/vid_thumb/';
        $config['max_size'] = '*';
		$config['allowed_types'] = 'jpg|png'; 
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = false;
		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('thumbnail'))
		{
			$this->session->set_flashdata("err","Please Select a Image file!");
			return redirect(back());
		}
		else
		{
			$fileData = $this->upload->data();
			$data['thumbnail'] = $fileData['file_name'];
			$this->db->insert("videos",$data);
			$this->session->set_flashdata("Feed","Video link added Successfully");
			return redirect(back());
		}
	}
}