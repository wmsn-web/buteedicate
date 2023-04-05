<?php /**
 * 
 */
class View_Products extends CI_controller
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
		$data['all_products'] = $this->AdminPanelModel->get_all_products();
		$this->load->view("admin/View_Products",$data);
	}
	public function edit($id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		if(empty($data['alp']))
		{
			return redirect(base_url('auth/admin/View_Products'));
		}
		$this->load->view("admin/edit_product",$data);
	}

	public function product_features($id)
	{
		$data['alp'] = $this->AdminPanelModel->get_product_by_id($id);
		$data['fetrs'] = $this->AdminPanelModel->get_prod_features($id);
		$this->load->view("admin/product_features",$data);
	}
}