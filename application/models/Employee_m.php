<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model {

#region dashboard admin
    var $table = 'employee';
    var $column_order = array(null, 'loan','loan_type','loan_amount','firstname','lastname'); //set column field database for datatable orderable
    var $column_search = array('loan','loan_type','loan_amount','firstname','lastname'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order
#endregion

#region logs admin
    var $history_table = "logs";
    var $history_column_order = array(null, 'date','action');
    var $history_column_search = array('date', 'action');
    var $history_order = array('id' => 'asc');
#endregion

#region investors admin
    var $investor_table = "investor";
    var $investor_column_order = array(null, 'firstname','lastname','investment_amount','mobilenumber','referal_code','status');
    var $investor_column_search = array('firstname', 'lastname', 'investment_amount', 'mobilenumber', 'referal_code', 'status');
    var $investor_order = array('id' => 'asc');
#endregion

#region CASHOUT PENDING
    var $cashout_pending_table = "cashout";
    var $cashout_pending_column_order = array(null, 'cashout_amount','bank_accnt_name','bank_accnt_no','request_date','cashout_type','status');
    var $cashout_pending_column_search = array('cashout_amount','bank_accnt_name','bank_accnt_no','request_date','cashout_type','status');
    var $cashout_pending_order = array('id' => 'asc');
#endregion

#region LENDERS FEE REQUEST
    var $lendersfee_request_table = "invest_details";
    var $lendersfee_request_column_order = array(null, 'cashout_amount','bank_accnt_name','bank_accnt_no','timestamp','status');
    var $lendersfee_request_column_search = array('cashout_amount','bank_accnt_name','bank_accnt_no','timestamp','status');
    var $lendersfee_request__order = array('id' => 'asc');
#endregion

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


#region LOGS ADMIN
    private function _get_datatables_query_logs()
    {
        $this->db->from($this->history_table);
        $i = 0;

        foreach($this->history_column_search as $item) //loop item
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->history_column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['history_order'])) // here order processing
        {
            $this->db->order_by($this->history_column_order[$_POST['history_order']['0']['column']], $_POST['history_order']['0']['dir']);
        } 
        else if(isset($this->history_order))
        {
            $history_order = $this->history_order;
            $this->db->order_by(key($history_order), $history_order[key($history_order)]);
        }
    }

    function get_datatables_history()
    {
        $this->_get_datatables_query_logs();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_history()
    {
        $this->_get_datatables_query_logs();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_history()
    {
        $this->db->from($this->history_table);
        return $this->db->count_all_results();
    }
#endregion
#region ADMIN DASHBOARD DATATABLE
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach($this->column_search as $item) //loop item
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
#endregion

#region INVESTORS ADMIN
 private function _get_datatables_query_investor()
    {
        $this->db->from($this->investor_table);
        $i = 0;

        foreach($this->investor_column_search as $item) //loop item
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->investor_column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['investor_order'])) // here order processing
        {
            $this->db->order_by($this->investor_column_order[$_POST['investor_order']['0']['column']], $_POST['investor_order']['0']['dir']);
        } 
        else if(isset($this->investor_order))
        {
            $investor_order = $this->investor_order;
            $this->db->order_by(key($investor_order), $investor_order[key($investor_order)]);
        }
    }

    function get_datatables_investor()
    {
        $this->_get_datatables_query_investor();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_investor()
    {
        $this->_get_datatables_query_investor();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_investor()
    {
        $this->db->from($this->investor_table);
        return $this->db->count_all_results();
    }
#endregion

#region CASHOUT_PENDING
    private function _get_datatables_query_cashout_pending()
    {
        $this->db->from($this->cashout_pending_table);
        $i = 0;

        foreach($this->cashout_pending_column_search as $item) //loop item
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->cashout_pending_column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['cashout_pending_order'])) // here order processing
        {
            $this->db->order_by($this->cashout_pending_column_order[$_POST['cashout_pending_order']['0']['column']], $_POST['cashout_pending_order']['0']['dir']);
        } 
        else if(isset($this->cashout_pending_order))
        {
            $cashout_pending_order = $this->cashout_pending_order;
            $this->db->order_by(key($cashout_pending_order), $cashout_pending_order[key($cashout_pending_order)]);
        }
    }

    function get_datatables_cashout_pending()
    {
        $this->_get_datatables_query_cashout_pending();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_cashout_pending()
    {
        $this->_get_datatables_query_cashout_pending();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_cashout_pending()
    {
        $this->db->from($this->cashout_pending_table);
        return $this->db->count_all_results();
    }



#region Lenders Fee Request
    private function _get_datatables_query_lendersfee_request()
    {
        $this->db->from($this->lendersfee_request_table);
        $i = 0;

        foreach($this->lendersfee_request_column_search as $item) //loop item
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->lendersfee_request_column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['lendersfee_request_order'])) // here order processing
        {
            $this->db->order_by($this->lendersfee_request_column_order[$_POST['lendersfee_request_order']['0']['column']], $_POST['lendersfee_request_order']['0']['dir']);
        } 
        else if(isset($this->lendersfee_request_order))
        {
            $lendersfee_request_order = $this->lendersfee_request_order;
            $this->db->order_by(key($lendersfee_request_order), $lendersfee_request_order[key($lendersfee_request_order)]);
        }
    }

    function get_datatables_lendersfee_request()
    {
        $this->_get_datatables_query_lendersfee_request();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_lendersfee_request()
    {
        $this->_get_datatables_query_lendersfee_request();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_lendersfee_request()
    {
        $this->db->from($this->lendersfee_request_table);
        return $this->db->count_all_results();
    }
#endregion

    function can_login($username, $password)
    {
        
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->result();

        if($query->num_rows() > 0 && password_verify($password, $user[0]->password))
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    function get_employees($limit, $start, $id=0)
    {
		if(empty($id)){
			$this->db->limit($limit, $start);
			$query = $this->db->get('employee');
            if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
				return $data;
			}
			return false;
        } else {
			$query = $this->db->get_where('employee', array('id' => $id));
			return $query->row_array();
		}
    }

    function getPendingAccount($limit, $start,$id)
    {

        if(empty($id)){
            $this->db->limit($limit, $start);
            $query = $this->db->get('investor');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('investor', array('id' => $id));
            $result = $query->result_array();
            $data = array(
                'status' => 1
                );
            $this->db->where('id', $id);
            $this->db->update('investor',$data);

             $data2 = array(
                'activity' => 'Account Request',
                'description' => 'Admin has approved your request!',
                'status' => 1,
                'date' => date('Y-m-d H:i:s'),
                'referal_code' => $result[0]['referal_code']

            );
            $this->db->where('id', $id);
            $this->db->update('history', $data2);

            $data3 = array(
                'stats' => 1
            );
            $this->db->where('id', $id);
            $this->db->update('invest_details', $data3);

            return $query->row_array();
        }
    }


    function getCashoutPending($limit, $start,$id)
    {
        $investors = $this->investor->get_investor($this->session->userdata('refcode'));

        $query = $this->db->get_where('cashout', array('id' => $id));
        
        $result = $query->result_array();

        $data = array(
            'cashout_amount' => $result[0]['cashout_amount'],
            'bank_accnt_name' => $result[0]['bank_accnt_name'],
            'bank_accnt_no' => $result[0]['bank_accnt_no'],
            'request_date' => $result[0]['request_date'],
            'referal_code' => $result[0]['referal_code'],
            'cashout_type' => $result[0]['cashout_type'],
            'status' => 1,
            );

        if($result[0]['cashout_type'] == 1)
        {
            $data3 = array(
            'investment_amount' => $investors[0]['investment_amount'] ,
            'id' => $investors[0]['id'],
            'firstname' => $investors[0]['firstname'],
            'lastname' => $investors[0]['lastname'],
            'middlename' => $investors[0]['middlename'],
            'gender' => $investors[0]['gender'],
            'civilstatus' => $investors[0]['civilstatus'],
            'birthday' => $investors[0]['birthday'],
            'age' => $investors[0]['age'],
            'dependents' => $investors[0]['dependents'],
            'spousefirstname' => $investors[0]['spousefirstname'],
            'spouselastname' =>  $investors[0]['spouselastname'],
            'spousemiddlename' => $investors[0]['spousemiddlename'],
            'spouseage' => $investors[0]['spouseage'],
            'spousebirthday' => $investors[0]['spousebirthday'],
            'homeaddress' => $investors[0]['homeaddress'],
            'zipcode' => $investors[0]['zipcode'],
            'lengthofstay' => $investors[0]['lengthofstay'],
            'hometype' => $investors[0]['hometype'],
            'emailaddress' => $investors[0]['emailaddress'],
            'homephonenumber' => $investors[0]['homephonenumber'],
            'businessphonenumber' => $investors[0]['businessphonenumber'],
            'mobilenumber' => $investors[0]['mobilenumber'],
            'nameofbusiness' => $investors[0]['nameofbusiness'],
            'natureofbusiness' => $investors[0]['natureofbusiness'],
            'addressofbusiness' => $investors[0]['addressofbusiness'],
            'yearsofbusiness' => $investors[0]['yearsofbusiness'],
            'referal_code' => $investors[0]['referal_code'],
            'referral_link' => $investors[0]['referral_link'],
            'bonus' => $investors[0]['bonus'] - $result[0]['cashout_amount'],
            'package' => $investors[0]['package'],
            'status' => $investors[0]['status'],
            'profit' => $investors[0]['profit']
            );
        }
        else
        {
            $data3 = array(
            'investment_amount' => $investors[0]['investment_amount'] ,
            'id' => $investors[0]['id'],
            'firstname' => $investors[0]['firstname'],
            'lastname' => $investors[0]['lastname'],
            'middlename' => $investors[0]['middlename'],
            'gender' => $investors[0]['gender'],
            'civilstatus' => $investors[0]['civilstatus'],
            'birthday' => $investors[0]['birthday'],
            'age' => $investors[0]['age'],
            'dependents' => $investors[0]['dependents'],
            'spousefirstname' => $investors[0]['spousefirstname'],
            'spouselastname' =>  $investors[0]['spouselastname'],
            'spousemiddlename' => $investors[0]['spousemiddlename'],
            'spouseage' => $investors[0]['spouseage'],
            'spousebirthday' => $investors[0]['spousebirthday'],
            'homeaddress' => $investors[0]['homeaddress'],
            'zipcode' => $investors[0]['zipcode'],
            'lengthofstay' => $investors[0]['lengthofstay'],
            'hometype' => $investors[0]['hometype'],
            'emailaddress' => $investors[0]['emailaddress'],
            'homephonenumber' => $investors[0]['homephonenumber'],
            'businessphonenumber' => $investors[0]['businessphonenumber'],
            'mobilenumber' => $investors[0]['mobilenumber'],
            'nameofbusiness' => $investors[0]['nameofbusiness'],
            'natureofbusiness' => $investors[0]['natureofbusiness'],
            'addressofbusiness' => $investors[0]['addressofbusiness'],
            'yearsofbusiness' => $investors[0]['yearsofbusiness'],
            'referal_code' => $investors[0]['referal_code'],
            'referral_link' => $investors[0]['referral_link'],
            'bonus' => $investors[0]['bonus'],
            'package' => $investors[0]['package'],
            'status' => $investors[0]['status'],
            'profit' => $investors[0]['profit'] - $result[0]['cashout_amount']
            );
        }
        


        $this->db->where('id', $id);
        $this->db->update('cashout',$data);
        $cashouttype = "";
        if($result[0]['cashout_type'] == 1)
        {
            $cashouttype = "Profit";
        }else{
            $cashouttype = "Lenders fee";
        }
        $data2 = array(
            'activity' => 'Cashout Request' . ' from '. $cashouttype,
            'description' => 'Amount of ' . $result[0]['cashout_amount'],
            'status' => 1,
            'date' => date('Y-m-d H:i:s'),
            'referal_code' => $result[0]['referal_code']
        );
        $this->db->where('id',$id);
        $this->db->update('history', $data2);

        $this->db->where('id',$investors[0]['id']);
        $this->db->update('investor', $data3);

        return $query->row_array();
    }


    function getLendersfeeRequest($limit, $start,$ref_id)
    {
        $investors = $this->investor->get_investor($this->session->userdata('refcode'));

        $query = $this->db->get_where('invest_details', array('ref_id' => $ref_id));
        
        $result = $query->result_array();


        $data = array(
            'amnt' => $result[0]['amnt'],
            'bank_accnt_name' => $result[0]['bank_accnt_name'],
            'bank_accnt_no' => $result[0]['bank_accnt_no'],
            'timestamp' => $result[0]['timestamp'],
            'referal_code' => $result[0]['referal_code'],
            'stats' => 1,
            'ref_id' => $result[0]['ref_id']
            );


            $data3 = array(
            'investment_amount' => $investors[0]['investment_amount'] + $result[0]['amnt'] ,
            'id' => $investors[0]['id'],
            'firstname' => $investors[0]['firstname'],
            'lastname' => $investors[0]['lastname'],
            'middlename' => $investors[0]['middlename'],
            'gender' => $investors[0]['gender'],
            'civilstatus' => $investors[0]['civilstatus'],
            'birthday' => $investors[0]['birthday'],
            'age' => $investors[0]['age'],
            'dependents' => $investors[0]['dependents'],
            'spousefirstname' => $investors[0]['spousefirstname'],
            'spouselastname' =>  $investors[0]['spouselastname'],
            'spousemiddlename' => $investors[0]['spousemiddlename'],
            'spouseage' => $investors[0]['spouseage'],
            'spousebirthday' => $investors[0]['spousebirthday'],
            'homeaddress' => $investors[0]['homeaddress'],
            'zipcode' => $investors[0]['zipcode'],
            'lengthofstay' => $investors[0]['lengthofstay'],
            'hometype' => $investors[0]['hometype'],
            'emailaddress' => $investors[0]['emailaddress'],
            'homephonenumber' => $investors[0]['homephonenumber'],
            'businessphonenumber' => $investors[0]['businessphonenumber'],
            'mobilenumber' => $investors[0]['mobilenumber'],
            'nameofbusiness' => $investors[0]['nameofbusiness'],
            'natureofbusiness' => $investors[0]['natureofbusiness'],
            'addressofbusiness' => $investors[0]['addressofbusiness'],
            'yearsofbusiness' => $investors[0]['yearsofbusiness'],
            'referal_code' => $investors[0]['referal_code'],
            'referral_link' => $investors[0]['referral_link'],
            'bonus' => $investors[0]['bonus'],
            'package' => $investors[0]['package'],
            'status' => $investors[0]['status'],
            'profit' => $investors[0]['profit']
            );

        $data2 = array(
            'activity' => 'Lenders Fee Request',
            'description' => 'Amount of ' . $result[0]['amnt'],
            'status' => 1,
            'date' => date('Y-m-d H:i:s'),
            'referal_code' => $result[0]['referal_code'],
            'ref_id' => $result[0]['ref_id']
        );

        $this->db->where('ref_id',$ref_id);
        $this->db->update('invest_details', $data);

        $this->db->where('ref_id',$ref_id);
        $this->db->update('history', $data2);

        $this->db->where('id',$investors[0]['id']);
        $this->db->update('investor', $data3);

        return $query->row_array();
    }


    function get_logs($limit, $start, $id=0)
    {
        if(empty($id)){
            $this->db->limit($limit, $start);
            $query = $this->db->get('logs');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('logs', array('id' => $id));
            return $query->row_array();
        }
    }
    public function saveAccount()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'type' => $this->input->post('accountType')
        );
            
        return $this->db->insert('users', $data);
        
    }
	public function saveEmployee($id = 0)
    {
        //$this->load->helper('url');
        
        $data = array(
            'loan' => $this->input->post('loan'),
            'id' => $id,
            'loan_type' => $this->input->post('loan_type'),
			'loan_amount' => $this->input->post('loan_amount'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'gender' => $this->input->post('gender'),
            'civilstatus' => $this->input->post('civilstatus'),
            'birthday' => $this->input->post('birthday'),
            'age' => $this->input->post('age'),
            'dependents' => $this->input->post('dependents'),
            'spousefirstname' => $this->input->post('spousefirstname'),
            'spouselastname' => $this->input->post('spouselastname'),
            'spousemiddlename' => $this->input->post('spousemiddlename'),
            'spouseage' => $this->input->post('spouseage'),
            'spousebirthday' => $this->input->post('spousebirthday'),
            'homeaddress' => $this->input->post('homeaddress'),
            'zipcode' => $this->input->post('zipcode'),
            'lengthofstay' => $this->input->post('lengthofstay'),
            'hometype' => $this->input->post('hometype'),
            'emailaddress' => $this->input->post('emailaddress'),
            'homephonenumber' => $this->input->post('homephonenumber'),
            'businessphonenumber' => $this->input->post('businessphonenumber'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'nameofbusiness' => $this->input->post('nameofbusiness'),
            'natureofbusiness' => $this->input->post('natureofbusiness'),
            'addressofbusiness' => $this->input->post('addressofbusiness'),
            'yearsofbusiness' => $this->input->post('yearsofbusiness'),
            'nameofcomaker' => $this->input->post('nameofcomaker'),
            'addressofcomaker' => $this->input->post('addressofcomaker'),
            'numberofcomaker' => $this->input->post('numberofcomaker'),
            'dateofloan' => date('Y-m-d')
        );

        $data2 = array(
            'date' => date('Y-m-d H:i:s'),
            'action' => $this->input->post('firstname').' ' .$this->input->post('lastname').' Inserted data successfully'
        );

        $data3 = array(
            'date' => date('Y-m-d H:i:s'),
            'action' => $this->input->post('firstname').' ' .$this->input->post('lastname').' Update data successfully'
        );

        
        if ($id == 0) {
            return [$this->db->insert('employee', $data),$this->db->insert('logs', $data2)];
        } else {
            $this->db->where('id', $id);
            return [$this->db->update('employee', $data),$this->db->insert('logs',$data3)];
        }
    }

    public function saveAccountToUserAndInvestor($id = 0)
    {
        $inp_arr = array(
            'investment_amount' => $this->input->post('invest_amount'),
            'id' => $id,
            'firstname' => '',
            'lastname' => '',
            'middlename' => '',
            'gender' => '',
            'civilstatus' => '',
            'birthday' => '',
            'age' => 0,
            'dependents' => 0,
            'spousefirstname' => '',
            'spouselastname' => '',
            'spousemiddlename' => '',
            'spouseage' => 0,
            'spousebirthday' => '',
            'homeaddress' => '',
            'zipcode' => '',
            'lengthofstay' => 0,
            'hometype' => '',
            'emailaddress' => '',
            'homephonenumber' => '',
            'businessphonenumber' => '',
            'mobilenumber' => '',
            'nameofbusiness' => '',
            'natureofbusiness' => '',
            'addressofbusiness' => '',
            'yearsofbusiness' => 2,
            'referal_code' => $this->input->post('ref_code'),
            'referral_link' => $this->input->post('ref_link'),
            'package' => '',
            'status' => 1
        );
        // "<pre>"; print_r($inp_arr); die();
        $data2 = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'type' => 3,
            'refcode' => $inp_arr['referal_code']
        );
        if($id == 0)
        {
            return [$this->db->insert('investor', $inp_arr), $this->db->insert('users', $data2)];  
        }
        else
        {
            return $this->db->update('investor', $inp_arr);   
        }
    }

    public function SaveSetupAccount($id,$ref_code)
    {
        $ref_code = $this->session->userdata('refcode');
         $package = 0;
        //5 levels
        if($this->input->post('investment_amount') >= 5000 && $this->input->post('investment_amount') <= 49999)
        {
            $package = 1;
        }
        //10 levels
        else if ($this->input->post('investment_amount') >= 50000 && $this->input->post('investment_amount') <= 499999)
        {
            $package = 2;
        }
        //15 levels
        else if ($this->input->post('investment_amount') >= 500000 && $this->input->post('investment_amount') <= 4999999)
        {
            $package = 3;
        }
        //20 levels
        else
        {
            $package = 4;
        }

        $inp_arr = array(
            'investment_amount' => $this->input->post('investment_amount'),
            'id' => $this->input->post('id'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'gender' => $this->input->post('gender'),
            'civilstatus' => $this->input->post('civilstatus'),
            'birthday' => $this->input->post('birthday'),
            'age' => $this->input->post('age'),
            'dependents' => $this->input->post('dependents'),
            'spousefirstname' => $this->input->post('spousefirstname'),
            'spouselastname' => $this->input->post('spouselastname'),
            'spousemiddlename' => $this->input->post('spousemiddlename'),
            'spouseage' => $this->input->post('spouseage'),
            'spousebirthday' => $this->input->post('spousebirthday'),
            'homeaddress' => $this->input->post('homeaddress'),
            'zipcode' => $this->input->post('zipcode'),
            'lengthofstay' => $this->input->post('lengthofstay'),
            'hometype' => $this->input->post('hometype'),
            'emailaddress' => $this->input->post('emailaddress'),
            'homephonenumber' => $this->input->post('homeaddress'),
            'businessphonenumber' => $this->input->post('businessphonenumber'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'nameofbusiness' => $this->input->post('nameofbusiness'),
            'natureofbusiness' => $this->input->post('natureofbusiness'),
            'addressofbusiness' => $this->input->post('addressofbusiness'),
            'yearsofbusiness' => $this->input->post('yearsofbusiness'),
            'referal_code' => $this->input->post('referral_code'),
            'referral_link' => $this->input->post('referral_link'),
            'package' => $package,
            'status' => $this->input->post('status')
        );


        //get first level
        //get direct and indirect for bonus
        $current_ref = $this->input->post('referral_link');
        $ref_link = $this->investor->get_refcode($current_ref);
        $level_counter = 0;

        //20 level
        while($level_counter <= 20)
        {
            if(count($ref_link) > 0)
            {
                $level_counter++;
                //direct and indirect
                if($level_counter == 1)
                {
                    $isContinue = false;

                    $package = $ref_link[0]['package'];

                    if($package == 1 && $level_counter <= 5)
                    {
                        $isContinue = true;
                    }
                    else if($package == 2 && $level_counter <= 10)
                    {
                        $isContinue = true;
                    }
                    else if($package == 3 && $level_counter <= 15)
                    {
                        $isContinue = true;
                    }
                    else if($package == 4 && $level_counter <= 20)
                    {
                        $isContinue = true;
                    }

                    if($isContinue)
                    {
                        $bonus = $this->input->post('investment_amount') * 0.05;
                        $data_bonus = array(
                        'bonus' => $ref_link[0]['bonus']+ $bonus
                        );
                        
                        $this->db->where('id', $ref_link[0]['id']);
                        $this->db->update('investor',$data_bonus);
                    }
                }
                else
                {
                    $isContinue = false;

                    $package = $ref_link[0]['package'];

                    if($package == 1 && $level_counter <= 5)
                    {
                        $isContinue = true;
                    }
                    else if($package == 2 && $level_counter <= 10)
                    {
                        $isContinue = true;
                    }
                    else if($package == 3 && $level_counter <= 15)
                    {
                        $isContinue = true;
                    }
                    else if($package == 4 && $level_counter <= 20)
                    {
                        $isContinue = true;
                    }

                    if($isContinue)
                    {
                        $bonus = $this->input->post('investment_amount') * 0.01;
                        $data_bonus = array(
                            'bonus' => $ref_link[0]['bonus']+ $bonus
                        );
                        
                        $this->db->where('id', $ref_link[0]['id']);
                        $this->db->update('investor',$data_bonus);
                    }
                }
            }
            else
            {
                break;
            }

            $current_ref = $ref_link[0]['referral_link'];
            $ref_link = $this->investor->get_refcode($current_ref);
            
        }

            $this->db->where('referal_code', $ref_code);
            return $this->db->update('investor',$inp_arr);
    }

    public function saveInvestors($id = 0)
    {
        $package = 0;
        //5 levels
        if($this->input->post('investment_amount') >= 5000 && $this->input->post('investment_amount') <= 49999)
        {
            $package = 1;
        }
        //10 levels
        else if ($this->input->post('investment_amount') >= 50000 && $this->input->post('investment_amount') <= 499999)
        {
            $package = 2;
        }
        //15 levels
        else if ($this->input->post('investment_amount') >= 500000 && $this->input->post('investment_amount') <= 4999999)
        {
            $package = 3;
        }
        //20 levels
        else
        {
            $package = 4;
        }

        $data = array(
            'investment_amount' => $this->input->post('investment_amount'),
            'id' => $id,
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'gender' => $this->input->post('gender'),
            'civilstatus' => $this->input->post('civilstatus'),
            'birthday' => $this->input->post('birthday'),
            'age' => $this->input->post('age'),
            'dependents' => $this->input->post('dependents'),
            'spousefirstname' => $this->input->post('spousefirstname'),
            'spouselastname' => $this->input->post('spouselastname'),
            'spousemiddlename' => $this->input->post('spousemiddlename'),
            'spouseage' => $this->input->post('spouseage'),
            'spousebirthday' => $this->input->post('spousebirthday'),
            'homeaddress' => $this->input->post('homeaddress'),
            'zipcode' => $this->input->post('zipcode'),
            'lengthofstay' => $this->input->post('lengthofstay'),
            'hometype' => $this->input->post('hometype'),
            'emailaddress' => $this->input->post('emailaddress'),
            'homephonenumber' => $this->input->post('homephonenumber'),
            'businessphonenumber' => $this->input->post('businessphonenumber'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'nameofbusiness' => $this->input->post('nameofbusiness'),
            'natureofbusiness' => $this->input->post('natureofbusiness'),
            'addressofbusiness' => $this->input->post('addressofbusiness'),
            'yearsofbusiness' => $this->input->post('yearsofbusiness'),
            'referal_code' => $this->input->post('referral_code'),
            'referral_link' => $this->input->post('referral_link'),
            'package' => $package,
            'status' => 0
        );

        //get first level
        //get direct and indirect for bonus
        $current_ref = $this->input->post('referral_link');
        $ref_link = $this->investor->get_refcode($current_ref);
        $level_counter = 0;

        //20 level
        while($level_counter <= 20)
        {
            if(count($ref_link) > 0)
            {
                $level_counter++;
                //direct and indirect
                if($level_counter == 1)
                {
                    $isContinue = false;

                    $package = $ref_link[0]['package'];

                    if($package == 1 && $level_counter <= 5)
                    {
                        $isContinue = true;
                    }
                    else if($package == 2 && $level_counter <= 10)
                    {
                        $isContinue = true;
                    }
                    else if($package == 3 && $level_counter <= 15)
                    {
                        $isContinue = true;
                    }
                    else if($package == 4 && $level_counter <= 20)
                    {
                        $isContinue = true;
                    }

                    if($isContinue)
                    {
                        $bonus = $this->input->post('investment_amount') * 0.05;
                        $data_bonus = array(
                        'bonus' => $ref_link[0]['bonus']+ $bonus
                        );
                        
                        $this->db->where('id', $ref_link[0]['id']);
                        $this->db->update('investor',$data_bonus);
                    }
                }
                else
                {
                    $isContinue = false;

                    $package = $ref_link[0]['package'];

                    if($package == 1 && $level_counter <= 5)
                    {
                        $isContinue = true;
                    }
                    else if($package == 2 && $level_counter <= 10)
                    {
                        $isContinue = true;
                    }
                    else if($package == 3 && $level_counter <= 15)
                    {
                        $isContinue = true;
                    }
                    else if($package == 4 && $level_counter <= 20)
                    {
                        $isContinue = true;
                    }

                    if($isContinue)
                    {
                        $bonus = $this->input->post('investment_amount') * 0.01;
                        $data_bonus = array(
                            'bonus' => $ref_link[0]['bonus']+ $bonus
                        );
                        
                        $this->db->where('id', $ref_link[0]['id']);
                        $this->db->update('investor',$data_bonus);
                    }
                }
            }
            else
            {
                break;
            }

            $current_ref = $ref_link[0]['referral_link'];
            $ref_link = $this->investor->get_refcode($current_ref);
            
        }


        if ($id == 0)
        {
            //validate referal code if exists
            $this->db->where('referal_code', $this->input->post('referral_link'));
            $query = $this->db->get('investor');
            $user = $query->result();

            if($query->num_rows() > 0 )
            {
                return $this->db->insert('investor', $data);
            }
            else
            {
                return false;
            }
        }
        else
        {
            $this->db->where('id', $id);
            return $this->db->update('investor', $data);
        }
    }

    public function validateReferalLink()
    {
        $this->db->where('referal_code', $this->input->post('ref_link'));
        $query = $this->db->get('investor');
        $user = $query->result();

        if($query->num_rows() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function validateUsername($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->result();

        if($query->num_rows() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deduct($id)
    {
        $data = array(
            'loan' => $this->input->post('loan'),
            'id' => $id,
            'loan_type' => $this->input->post('loan_type'),
            'loan_amount' => $this->input->post('loan_amount') - $this->input->post('cash_amount'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'gender' => $this->input->post('gender'),
            'civilstatus' => $this->input->post('civilstatus'),
            'birthday' => $this->input->post('birthday'),
            'age' => $this->input->post('age'),
            'dependents' => $this->input->post('dependents'),
            'spousefirstname' => $this->input->post('spousefirstname'),
            'spouselastname' => $this->input->post('spouselastname'),
            'spousemiddlename' => $this->input->post('spousemiddlename'),
            'spouseage' => $this->input->post('spouseage'),
            'spousebirthday' => $this->input->post('spousebirthday'),
            'homeaddress' => $this->input->post('homeaddress'),
            'zipcode' => $this->input->post('zipcode'),
            'lengthofstay' => $this->input->post('lengthofstay'),
            'hometype' => $this->input->post('hometype'),
            'emailaddress' => $this->input->post('emailaddress'),
            'homephonenumber' => $this->input->post('homephonenumber'),
            'businessphonenumber' => $this->input->post('businessphonenumber'),
            'mobilenumber' => $this->input->post('mobilenumber'),
            'nameofbusiness' => $this->input->post('nameofbusiness'),
            'natureofbusiness' => $this->input->post('natureofbusiness'),
            'addressofbusiness' => $this->input->post('addressofbusiness'),
            'yearsofbusiness' => $this->input->post('yearsofbusiness'),
            'nameofcomaker' => $this->input->post('nameofcomaker'),
            'addressofcomaker' => $this->input->post('addressofcomaker'),
            'numberofcomaker' => $this->input->post('numberofcomaker'),
            'balance' => $this->input->post('cash_amount'),
            'lastdateofloan' => date('Y-m-d') 
        );

        $data2 = array(
            'date' => date('Y-m-d H:i:s'),
            'action' => 'Inserted ' . $this->input->post('cash_amount') . ' successfully to ' . $this->input->post('firstname'). ' ' . $this->input->post('lastname') 
        );
        $data3 = array(
            'total_cash_amount' => $this->input->post('cash_amount')
        );


        $this->db->where('id', $id);
        return [$this->db->update('employee', $data),$this->db->insert('logs', $data2),$this->db->insert('total_cash',$data3)];
        
        
    }

	public function record_count() {
        return $this->db->count_all("employee");
    }

    public function logs_count() {
        return $this->db->count_all("logs");
    }
    public function investors_count()
    {
        return $this->db->count_all("investor");
    }

	public function delete_employee($id)
    {
        $data = array(
            'date' => date('Y-m-d H:i:s'),
            'action' => 'successfully deleted an account'
        );

        $this->db->where('id', $id);
        return [$this->db->delete('employee'),$this->db->insert('logs',$data)];
    }

    public function delete_investor($id)
    {
        $data = array(
            'date' => date('Y-m-d H:i:s'),
            'action' => 'successfully deleted an investors account'
        );

        $this->db->where('id', $id);
        return [$this->db->delete('investor'),$this->db->insert('logs',$data)];
    }


    public function get_all_balance()
    {
        $this->db->select_sum('loan_amount');
        $result = $this->db->get('employee')->row();
        return $result->loan_amount;
    }

    public function get_total_cash_amount()
    {
        $this->db->select_sum('total_cash_amount');
        $result = $this->db->get('total_cash')->row();;
        return $result->total_cash_amount;
    }

    public function get_all_investors($limit,$start,$id=0)
    {
        if(empty($id)){
            $this->db->limit($limit, $start);
            $query = $this->db->get('investor');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('investor', array('id' => $id));
            return $query->row_array();
        }
    }

    public function get_all_investors_cashout($limit,$start,$refcode)
    {
        if(empty($refcode)){
            $this->db->limit($limit, $start);
            $query = $this->db->get('investor');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('investor', array('referal_code' => $refcode));
            return $query->row_array();
        }
    }


    public function get_all_cashout($limit, $start, $id=0)
    {
        if(empty($id))
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get('cashout');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            } 
            return false;
        } else {
            $query = $this->db->get_where('cashout', array('id' => $id));
            return $query->row_array();
        }
    }


    public function cashout_count()
    {
        return $this->db->count_all("cashout");
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
}