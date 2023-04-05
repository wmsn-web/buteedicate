<?php /**
 * 
 */
class Products extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('paypal_lib'); 
	}

	public function index()
	{
		$data['all_products'] = $this->SiteModel->get_all_products();
		$this->load->view("fronts/Products",$data); 
	}
	public function details($slug)
	{
		$data['alp'] = $this->SiteModel->get_product_by_slug($slug);
		$data['fetrs'] = $this->SiteModel->get_prod_features($data['alp']['id']);
		$this->load->view("fronts/product_details",$data);
	}

	public function buynow($slug)
	{
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url("Login"));
		}
		$returnURL = base_url().'paypal/success'; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 
		$alp = $this->SiteModel->get_product_by_slug($slug);

		$userID = $this->session->userdata("userId");
		$this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $alp['prod_name']); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $alp['id']); 
        $this->paypal_lib->add_field('amount',  $alp['price']); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
	}
}