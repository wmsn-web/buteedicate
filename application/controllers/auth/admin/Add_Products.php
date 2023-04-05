<?php /**
 * 
 */
class Add_Products extends CI_controller
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

	public function index()
	{
		$this->load->view("admin/Add_Products");
	}

	public function save_prod()
	{
		$data = $this->input->post();
		$data['prod_slug'] = slugify($data['prod_name']);
		$data['descr'] = htmlentities($data['descr']);
		$this->db->where("prod_slug",$data['prod_slug']);
		$chk = $this->db->get("products")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("err","Product Already Exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("products",$data);
			$this->session->set_flashdata("Feed","Product Added Successfully");
			return redirect(back());
		}
	}

	public function update_prod()
	{
		$data = $this->input->post();
		$data['prod_slug'] = slugify($data['prod_name']);
		$data['descr'] = htmlentities($data['descr']);
		$this->db->where("prod_slug",$data['prod_slug']);
		$chk = $this->db->get("products");
		if($chk->num_rows() > 0)
		{
			$row = $chk->row();
			if($row->id == $data['id'])
			{
				$this->db->where("id",$data['id']);
				$this->db->update("products",$data);
				$this->session->set_flashdata("Feed","Product Updated Successfully");
				return redirect(back());
			}
			else
			{
				$this->session->set_flashdata("err","Product Already Exists!");
				return redirect(back());
			}
		}
		else
		{
			$this->db->where("id",$data['id']);
			$this->db->update("products",$data);
			$this->session->set_flashdata("Feed","Product Updated Successfully");
			return redirect(back());
		}
	}

	public function add_fetures()
	{
		$data = $this->input->post();
		$this->db->where($data);
		$chk = $this->db->get("prod_features")->num_rows();
		if($chk > 0)
		{
			$this->session->set_flashdata("err","Features Already Exists!");
			return redirect(back());
		}
		else
		{
			$this->db->insert("prod_features",$data);
			$this->session->set_flashdata("Feed","Features Added Successfully");
			return redirect(back());
		}
	}

	public function del_features($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("prod_features");
		$this->session->set_flashdata("Feed","Features Deleted Successfully");
		return redirect(back());
	}
}