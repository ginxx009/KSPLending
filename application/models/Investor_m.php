<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_investor()

    {
    	return $this->db->count_all("investor");
    }

    /*
	*Get all referal_code with the same referral_link to know who refered
    */
    public function get_ref($referral_link)
    {
    	//query which has been referred
    	$sql = "SELECT * FROM investor WHERE referral_link = '{$referral_link}'";
    	$query = $this->db->query($sql);

    	return $query->result_array();
    }

    public function get_first($id)
    {
    	$sql = "SELECT *FROM investor WHERE id = '{$id}'";
    	$query = $this->db->query($sql);

		return $query->result_array();

    }
    //Method get Id of the TOP
    public function getId()
    {
    	$sql = "SELECT *FROM investor WHERE referral_link = ''";
    	$query = $this->db->query($sql);

    	return $query->result();
    }

    public function get_refcode($referal_code)
    {
    	//query which has been referred
    	$sql = "SELECT * FROM investor WHERE referal_code = '{$referal_code}'";
    	$query = $this->db->query($sql);

    	return $query->result_array();
    }

    public function get_investor($ref_code)
    {
        $sql = "SELECT * FROM investor WHERE referal_code = '{$ref_code}'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_investor_withpar($ref_code, $refid)
    {
        $sql = "SELECT * FROM invest_details WHERE referal_code = '{$ref_code}' AND id = '{$refid}'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function get_total_amnt_requested($ref_code)
    {
        $this->db->select_sum('amnt');
        $result = $this->db->get_where('invest_details', array('referal_code' => $ref_code))->row();
        return $result->amnt;
    }

    public function get_invest_details($ref_id)
    {
        $sql = "SELECT * FROM invest_details WHERE ref_id = '{$ref_id}'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function AccumulatedWithdrawal($refcode)
    {
        $this->db->select_sum('cashout_amount');
        $result = $this->db->get_where('cashout', array('referal_code' => $refcode))->row();;
        return $result->cashout_amount;
    }

    public function saveCashoutAmount($id = 0)
    {
        $cashout_type = $this->input->post('cashout_type');
        $investors = $this->get_investor($this->session->userdata('refcode'));

         // echo "<pre>" . var_dump($cashout_type); die();
        //Investment
        if($cashout_type == 1)
        {
            $data = array(
            'id' => $id,
            'cashout_amount' => $this->input->post('cash_amount'),
            'bank_accnt_name' => $this->input->post('bank_accnt_name'),
            'bank_accnt_no' => $this->input->post('bank_accnt_no'),
            'referal_code' => $this->session->userdata('refcode'),
            'request_date' => date('Y-m-d'),
            'cashout_type' => $this->input->post('cashout_type'),
            'status' => 0
            );

            $data3 = array(
                'activity' => 'Cashout Request!',
                'description' => 'Amount of '. $this->input->post('cash_amount') . ' in profit',
                'status' => 0,
                'date' => date('Y-m-d H:i:s'),
                'referal_code' => $data['referal_code']
            );

            return [$this->db->insert('cashout', $data),$this->db->insert('history',$data3)];
        }
        //Bonus
        else if($cashout_type == 2)
        {
            $data = array(
            'id' => $id,
            'cashout_amount' => $this->input->post('cash_amount'),
            'bank_accnt_name' => $this->input->post('bank_accnt_name'),
            'bank_accnt_no' => $this->input->post('bank_accnt_no'),
            'referal_code' => $this->session->userdata('refcode'),
            'request_date' => date('Y-m-d'),
            'cashout_type' => $this->input->post('cashout_type'),
            'status' => 0
            );

            $data3 = array(
                'activity' => 'Cashout Request!',
                'description' => 'Amount of '. $this->input->post('cash_amount') . ' in lenders fee',
                'status' => 0,
                'date' => date('Y-m-d H:i:s'),
                'referal_code' => $data['referal_code']

            );

            return [$this->db->insert('cashout', $data),$this->db->insert('history', $data3)];
        }
        else
        {
            return false;
        }
    }

    public function logs_count() 
    {
        $ref_code = $this->input->post('referal_code');

        $sql = "SELECT COUNT(*) as mycount FROM history WHERE referal_code = '{$ref_code}'";
        $query = $this->db->query($sql);

        return $query->row()->mycount;
    }

    function get_logs($limit, $start, $ref_code)
    {
        if(empty($id)){
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('history',array('referal_code' => $ref_code));
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('history', array('referal_code' => $ref_code));
            return $query->row_array();
        }
    }
    
    public function lenders_count() 
    {
        $ref_code = $this->input->post('referal_code');

        $sql = "SELECT COUNT(*) as mycount FROM invest_details WHERE referal_code = '{$ref_code}'";
        $query = $this->db->query($sql);

        return $query->row()->mycount;
    }


    function get_lenders($limit, $start, $ref_code)
    {
        if(empty($id)){
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('invest_details',array('referal_code' => $ref_code));
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('invest_details', array('referal_code' => $ref_code));
            return $query->row_array();
        }
    }

    public function directReferral($ref_code)
    {
        $SQL= "SELECT * FROM investor WHERE referral_link ='".$ref_code."'";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    public function getCashoutRequest($ref_code)
    {
        $SQL= "SELECT * FROM history WHERE referal_code='{$ref_code}'";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    public function getEmailAdd($email)
    {
        $SQL= "SELECT * FROM investor WHERE emailaddress='".$email."'";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    
    public function getLenderRequest($ref_code)
    {
        $SQL= "SELECT A.id, A.amnt,A.avail_plan,A.trade_duedate,SUM(B.profit) AS profit, A.stats, A.date_invest FROM invest_details as A  left join invest_history as B ON A.id = B.invest_id WHERE A.referal_code ='{$ref_code}'GROUP BY A.id" ;
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    public function addAmount($orderID = null)
    {
        
        $data = array(
            'referal_code' => $this->session->userdata('refcode'),
            'amnt' => $this->input->post('cash_amount'),
            'stats' => 0,
            'timestamp' => date('Y-m-d H:i:s'),
            'bank_accnt_name' => $this->input->post('bank_accnt_name'),
            'bank_accnt_no' => $this->input->post('bank_accnt_no'),
            'receipt' => $orderID,
            'ref_id' => $this->generateRandomString()
        );

        $data2 = array(
            'activity' => 'Request for Additional Lenders Amount!',
            'description' => 'Amount of '. $this->input->post('cash_amount') . ' in lenders fee',
            'status' => 0,
            'date' => date('Y-m-d H:i:s'),
            'referal_code' => $this->session->userdata('refcode'),
            'ref_id' => $data['ref_id']
        );

        return [$this->db->insert('invest_details', $data),$this->db->insert('history', $data2)];
    }

    public function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sumupcapital($ref_code)
    {   
        $this->db->select_sum('amnt');
        $result = $this->db->get_where('invest_details', array('referal_code' => $ref_code))->row();
        return $result->amnt;
    }

    public function get_total_investProfit($invest_id)
    {   
        $this->db->select_sum('profit');
        $result = $this->db->get_where('invest_history', array('invest_id' => $invest_id))->row();
        return $result->profit;
    }

    public function user_totalprofit_invest($ref_code)
    {
        $this->db->select_sum('profit');
        $result = $this->db->get_where('invest_history', array('referal_code' => $ref_code))->row();
        return $result->profit;   
    }
}