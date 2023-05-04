<?php /**
 * 
 */
class Add_contents extends CI_controller 
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("auth/admin/AdminLogin?refer=$actual_link");
		
		}
	}	

	public function index($id)
	{
		$data['ebooks'] = $this->AdminPanelModel->get_all_ebooks($id);
		$data['vids'] = $this->AdminPanelModel->get_all_videos($id);
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$this->load->view("admin/Add_contents",$data);
	}
	public function ebooks($id)
	{
		$data['ebooks'] = $this->AdminPanelModel->get_all_ebooks($id);
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$this->load->view("admin/ebook_update",$data);
	}

	public function videos($id)
	{
		$data['vid_folders'] = $this->AdminPanelModel->get_prod_vid_folders($id);
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$this->load->view("admin/video_update",$data);
	}

	public function prod_videos($video_type,$id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$data['all_vids'] = $this->AdminPanelModel->get_all_video_by_type($video_type,$id);
		$this->load->view("admin/video_lists",$data);
	}

	public function community_access_link($id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$data['discord_links'] = $this->AdminPanelModel->get_discord_links($id);
		$this->load->view("admin/community_update",$data);
	}

	public function update_com_link()
	{
		$data = $this->input->post();
		$this->db->where("url_link",$data['url_link']);
		$chk = $this->db->get("discord_links");
		if($chk->num_rows() > 0)
		{
			$row = $chk->row();
			if($row->id == $data['id'])
			{
				$this->db->where("id",$data['id']);
				$this->db->update("discord_links",$data);
				$this->session->set_flashdata("Feed","Link Updated Successfully");
				return redirect(back());
			}
			else
			{
				$this->session->set_flashdata("err","Link Already Exists!");
				 redirect(back());
			}
		}
		else
		{
			$this->db->where("id",$data['id']);
			$this->db->update("discord_links",$data);
			$this->session->set_flashdata("Feed","Link Updated Successfully");
			return redirect(back());
		}
	}

	public function upload_com_link()
	{
		$data = $this->input->post();
		$this->db->where("url_link",$data['url_link']);
		$chk = $this->db->get("discord_links")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("err","Link Already Exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("discord_links",$data);
			$this->session->set_flashdata("Feed","Link Added Successfully");
			return redirect(back());
		}
	}

	public function del_disk_link($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("discord_links");
		return redirect(back());
	}

	public function upload_ebooks()
	{
		$data = $this->input->post();
		$alp = $this->AdminPanelModel->get_product_by_id($data['prod_id']);

		$dir_name ='./uploads/ebooks';
			if (!is_dir($dir_name)) {
			mkdir($dir_name);
		}

		$config['upload_path'] = './uploads/ebooks/';
        $config['max_size'] = '*';
		$config['allowed_types'] = 'pdf'; 
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = false;
		$fileName = mt_rand(00000000,99999999);
		$config['file_name'] = make_under($alp['prod_slug']).'_'.$fileName;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('filenames'))
		{
			$this->session->set_flashdata("err","Please Select a PDF file!");
			return redirect(back());
		}
		else
		{
			$fileData = $this->upload->data();
			$data['ebook_file'] = $fileData['file_name'];
			$this->db->insert("ebooks",$data);
			$this->session->set_flashdata("Feed","Ebook Added Successfully");
			return redirect(back());
		}
	}
	public function del_ebook($id)
	{
		$this->db->where("id",$id);
		$row = $this->db->get("ebooks")->row();
		$dir = "./uploads/ebooks/".$row->ebook_file;
		@unlink($dir);
		$this->db->where("id",$id);
		$this->db->delete("ebooks");
		$this->session->set_flashdata("Feed","Ebook deleted Successfully");
		return redirect(back());
	}

	public function online_meet_link($id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$this->load->view("admin/online_link_update",$data);
	}

	public function upload_online_link()
	{
		$id = $this->input->post("id");
		$onlink = $this->input->post("url_link");
		$this->db->where("id",$id);
		$this->db->update("products",["online_links"=>$onlink]);

		return redirect(back());
	}

	public function upload_saminar_link()
	{
		$id = $this->input->post("id");
		$data['saminar_day'] = $this->input->post("saminar_day");
		$data['saminar_link'] = $this->input->post("saminar_link");
		$this->db->where("id",$id);
		$this->db->update("products",$data);
		return redirect(back());
	}

	public function seminar_meet_link($id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$this->load->view("admin/seminar_meet_link",$data);
	}

	public function add_video_link()
	{
		$data = $this->input->post();
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

	public function edit_video_link()
	{
		$data = $this->input->post();
		$vid_descr = $data['vid_descr'];
		$adbr = str_replace(PHP_EOL, "<br>", $vid_descr);
		$data['vid_descr'] = htmlentities($adbr);

		$dir_name ='./uploads/vid_thumb';
			if (!is_dir($dir_name)) {
			mkdir($dir_name);
		}

		$config['upload_path'] = './uploads/vid_thumb/';
        $config['max_size'] = '*';
		$config['allowed_types'] = 'jpg|png'; 
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = false;
		$this->load->library('upload', $config);

		if(empty($_FILES['thumbnail']['name']))
		{
			$this->db->where("id",$data['id']);
			$this->db->update("videos",$data);
			$this->session->set_flashdata("Feed","Video link updated Successfully");
			return redirect(back());
		}
		else
		{
			if (!$this->upload->do_upload('thumbnail'))
			{
				$this->session->set_flashdata("err","Please Select a Image file!");
				return redirect(back());
			}
			else
			{
				$fileData = $this->upload->data();
				$data['thumbnail'] = $fileData['file_name'];
				$this->db->where("id",$data['id']);
				$this->db->update("videos",$data);
				$this->session->set_flashdata("Feed","Video link updated Successfully");
				return redirect(back());
			}
		}
	}

	public function del_vids($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("videos");
		$this->session->set_flashdata("Feed","Video Deleted Successfully");
		return redirect(back());
	}
}