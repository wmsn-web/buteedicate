<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
     } 
      
    function success(){ 
        // Get the transaction data 
        $paypalInfo = $_REQUEST; 
        
        $data['user_id']    = $paypalInfo["custom"]; 
        $data['product_id']    = $paypalInfo["item_number"]; 
        $data['txn_id']    = $paypalInfo["txn_id"]; 
        $data['payment_gross']    = $paypalInfo["mc_gross"]; 
        $data['currency_code']    = $paypalInfo["mc_currency"]; 
        $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
        $data['payer_email']    = $paypalInfo["payer_email"]; 
        $data['status'] = $paypalInfo["payment_status"];
        $data['txn_type'] = $paypalInfo['txn_type'];

        $this->db->where("id",$data['product_id']);
        $prd = $this->db->get("products")->row_array();

        $data['duration'] = $prd['duration'];
        $data['ord_date'] = date('Y-m-d');

        $myc['user_id']    = $paypalInfo["custom"]; 
        $myc['prod_id']    = $paypalInfo["item_number"]; 
        $myc['txn_id']    = $paypalInfo["txn_id"]; 
        $myc['status'] = 1;
        $myc['duration'] = $prd['duration'];
        $myc['ord_date'] = date('Y-m-d');

        $this->db->where(['txn_id' => $paypalInfo["txn_id"]]);
        $chk2 = $this->db->get("my_courses")->num_rows();
        if($chk2 == 0)
        {
            $this->db->insert("my_courses",$myc);
        }

        $this->db->where(['txn_id' => $paypalInfo["txn_id"]]);
        $prevPayment = $paymentData = $this->db->get("payments")->num_rows();
        if($prevPayment == 0)
        {
            $this->db->insert("payments",$data);
        }
        
        $this->session->set_userdata("userId",$data['user_id']);
        return redirect(base_url('my-account/my-courses'));
    
        //echo "<pre>";
        //print_r($data);
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $ipndata = $this->input->post(); 

        $myfile = fopen("./ipn.txt", "w") or die("Unable to open file!");
        $dt = json_encode($ipndata);
        $txt = $dt;
        fwrite($myfile, $txt);
        fclose($myfile);

        $txn = explode("_",$ipndata['txn_type']);
        //if($txn[0] == "subscr")
        if($ipndata['txn_type'] == "subscr_cancel")
        {
            $this->db->where("paypal_subscr_id",$ipndata['subscr_id']);
            $this->db->delete("user_subscriptions");
        }
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

                $this->db->insert("payments",$data);

                $this->db->where("ipn_track_id",$ipndata['ipn_track_id']);
                $chk = $this->db->get("user_subscriptions")->num_rows();
                if($chk == 0)
                {
                    $this->db->insert("user_subscriptions",$subs);
                }
            }
        } 
    } 
}
