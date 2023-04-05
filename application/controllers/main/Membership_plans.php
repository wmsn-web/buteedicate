<?php /**
 * 
 */
class Membership_plans extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['all_plans'] = $this->SiteModel->get_all_plans();
		$this->load->view("fronts/Membership_plans",$data);
	}

	public function subscribe($slug)
	{
		if(!$this->session->userdata("userId"))
		{
			return redirect(base_url('Login'));
		}
		$data['usr'] = $this->SiteModel->get_user_by_id($this->session->userdata("userId"));
		$data['pln'] = $this->SiteModel->get_plan_by_slug($slug);
		$this->load->view("fronts/paypal_subscription",$data);
	}

	public function payment_success($codes)
	{

		$this->load->view("fronts/process_ipn");

		$user_id = base64_decode(urldecode($codes));
		$this->session->set_userdata("userId",$user_id);
		//return redirect(base_url());
	}

	public function payment_cancel()
	{
		$this->session->set_flashdata("errMsg","Transaction Failed!");
		return redirect(base_url('membership-plans'));
	}

	public function payment_ipn()
	{
		$file = file_get_contents("./ipn.txt");
		$ipndatax = json_decode($file);
		$ipndata = json_decode(json_encode($ipndatax),TRUE);
		//print_r($ipndata);
		$txn = explode("_",$ipndata['txn_type']);
		//if($txn[0] == "subscr")
		if($ipndata['txn_type'] == "subscr_payment" || $ipndata['txn_type'] == "subscr_signup")
		{
			$this->db->where(['ipn_track_id' => $ipndata["ipn_track_id"]]);
            $prevPayment = $this->db->get("payments")->row_array();
            if(empty($prevPayment)){ 
            	if($ipndata['txn_type'] == "subscr_payment")
            	{
            		$data['payment_gross']    = $ipndata["mc_gross"];
            		$subs['paid_amount'] = $ipndata["mc_gross"];
            		$data['txn_id']    = $ipndata["txn_id"];
            		$subs['txn_id']    = $ipndata["txn_id"]; 
            	}
            	else
            	{
            		$data['payment_gross']    = $ipndata["mc_amount3"];
            		$subs['paid_amount'] = $ipndata["mc_amount3"];
            		$data['txn_id']    = "";
            		$subs['txn_id']    = ""; 
            	}
                $data['plan_id']    = $ipndata["item_number"];
                $data['user_id']    = $ipndata["custom"]; 
                 
                 
                $data['currency_code']    = $ipndata["mc_currency"]; 
                $data['payer_name']    = trim($ipndata["first_name"].' '.$ipndata["last_name"], ' '); 
                $data['payer_email']    = $ipndata["payer_email"]; 
                $data['status'] = $ipndata["payment_status"];
                $data['txn_type'] = $ipndata['txn_type']; 
                $data['duration'] = 1;
                $data['ord_date'] = date('Y-m-d');
                $data['ipn_track_id'] = $ipndata["ipn_track_id"];

                //Subscriber-details
                $subs['user_id'] = $ipndata["custom"];
                $subs['plan_id'] = $ipndata["item_number"];
                
                $subs['paypal_subscr_id'] = $ipndata["subscr_id"];
                $subs['payer_name']    = trim($ipndata["first_name"].' '.$ipndata["last_name"], ' '); 
                $subs['payer_email']    = $ipndata["payer_email"]; 
                $subs['payment_status'] = $ipndata["payment_status"];
                $subs['ipn_track_id'] = $ipndata["ipn_track_id"];
                $subs['plan_status'] = 1;

                $this->db->where("id",$ipndata["item_number"]);
                $pln = $this->db->get("mem_plans")->row_array();
                if(!empty($pln))
                {
                    $subs['subscr_interval'] = $pln["intervals"];
                    $subs['subscr_interval_count'] = $pln['duration'];
                    $subs['valid_from'] = date('Y-m-d H:i:s');

                    $this->db->where(["plan_id"=>$pln['id'],"plan_status"=>0]);
                	$this->db->delete("user_subscriptions");
                }

                //$this->db->insert("payments",$data);

                $this->db->where("ipn_track_id",$ipndata['ipn_track_id']);
                $chk = $this->db->get("user_subscriptions")->num_rows();
                if($chk == 0)
                {
                    //$this->db->insert("user_subscriptions",$subs);
                }
            }
		}

		return redirect(base_url());
	}

	public function cancel_subs()
	{
		
	}


}