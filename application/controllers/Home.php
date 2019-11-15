<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
    {
		header("Access-Control-Allow-Origin: *");
        parent::__construct();
        $this->load->model('Employee_m', 'employee');
        $this->load->model('Investor_m', 'investor');
		$this->load->helper('url');
		$this->load->library("pagination");
		$this->load->library("session");
		$this->load->helper("password_hashing_helper");
		// $this->output->enable_profiler(TRUE);
    }

	public function index()
	{
		$data['title'] = 'Lending System Login';  
		$this->template->load('login','contents','home', $data);
	}

	public function registeraccnt()
	{
		$data['title'] = "Lending System Registration";
		$this->template->load('registeraccnt', 'content', 'home', $data);
	}


	public function admin_dashboard_datatable()
    {
        $list = $this->employee->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->loan;
            $row[] = $customers->loan_type;
            $row[] = $customers->loan_amount;
            $row[] = $customers->firstname;
            $row[] = $customers->lastname;
     		$row[] = '<a class="btn btn-xs btn-success" href="profile/'.$customers->id.'"><i class="la la-eye font-small-3"></i></a>

            		<a class="btn btn-xs btn-danger" href="delete/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>
            ';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->employee->count_all(),
                        "recordsFiltered" => $this->employee->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function history_datatable()
    {
        $list = $this->employee->get_datatables_history();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->date;
            $row[] = $customers->action;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->employee->count_all_history(),
                        "recordsFiltered" => $this->employee->count_filtered_history(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function investors_datatable()
    {
    	$list = $this->employee->get_datatables_investor();
        $data = array();
        $no = $_POST['start'];
        $status = "";
        $statusBtn;
        foreach ($list as $customers) {
        	if($customers->firstname == '' && $customers->lastname == '')
            {
                $status = "Setting Up Account";
                $statusBtn='';
            }
            else
            {
                if($customers->status == 0)
                {
                    $status = "pending";
                    $statusBtn = '
                        <a class="btn btn-xs btn-warning" href="pendingStatus/'.$customers->id.'"><i class="la la-check font-small-3"></i></a>
                        <a class="btn btn-xs btn-success" href="profile_investor/'.$customers->id.'"><i class="la la-eye font-small-3"></i></a>
                        <a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
                }
                else
                {
                    $status = "confirmed";
                    $statusBtn='
                        <a class="btn btn-xs btn-success" href="profile_investor/'.$customers->id.'"><i class="la la-eye font-small-3"></i></a>
                        <a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
                }
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->firstname;
            $row[] = $customers->lastname;
            $row[] = $customers->investment_amount;
            $row[] = $customers->mobilenumber;
            $row[] = $customers->referal_code;
            $row[] = $status;
            $row[] = $statusBtn;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->employee->count_all_investor(),
                        "recordsFiltered" => $this->employee->count_filtered_investor(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    public function cashout_pending_datatable()
    {
    	$list = $this->employee->get_datatables_cashout_pending();
        $data = array();
        $no = $_POST['start'];
        $status = "";
        $statusBtn;
        foreach ($list as $customers) {
        	if($customers->status == 0)
        	{
        		$status = "pending";
        		$statusBtn = '
        			<a class="btn btn-xs btn-warning" href="cashoutPendingStatus/'.$customers->id.'"><i class="la la-check font-small-3"></i></a>
        			<a class="btn btn-xs btn-success" href="profile_investor_cashout/'.$customers->referal_code.'"><i class="la la-eye font-small-3"></i></a>
            		<a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
        	}
        	else
        	{
        		$status = "confirmed";
        		$statusBtn='
        			<a class="btn btn-xs btn-success" href="profile_investor_cashout/'.$customers->referal_code.'"><i class="la la-eye font-small-3"></i></a>
            		<a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
        	}
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->cashout_amount;
            $row[] = $customers->bank_accnt_name;
            $row[] = $customers->bank_accnt_no;
            $row[] = $customers->request_date;
            $row[] = $customers->cashout_type;
            $row[] = $status;
            $row[] = $statusBtn;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->employee->count_all_cashout_pending(),
                        "recordsFiltered" => $this->employee->count_filtered_cashout_pending(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function lendersfee_request_datatable()
    {
        $list = $this->employee->get_datatables_lendersfee_request();
        $data = array();
        $no = $_POST['start'];
        $status = "";
        $statusBtn;
        foreach ($list as $customers) {
            if($customers->stats == 0)
            {
                $status = "pending";
                $statusBtn = '
                    <a class="btn btn-xs btn-warning" href="lendersfeerequestStatus/'.$customers->ref_id.'"><i class="la la-check font-small-3"></i></a>
                    <a class="btn btn-xs btn-success" href="profile_investor_cashout/'.$customers->referal_code.'/'.$customers->receipt.'"><i class="la la-eye font-small-3"></i></a>
                    <a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
            }
            else
            {
                $status = "confirmed";
                $statusBtn='
                    <a class="btn btn-xs btn-success" href="profile_investor_cashout/'.$customers->referal_code.'/'.$customers->receipt.'"><i class="la la-eye font-small-3"></i></a>
                    <a class="btn btn-xs btn-danger" href="delete_investor/'.$customers->id.'"><i class="la la-trash font-small-3"></i></a>';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->amnt;
            $row[] = $customers->bank_accnt_name;
            $row[] = $customers->bank_accnt_no;
            $row[] = $customers->timestamp;
            $row[] = $status;
            $row[] = $statusBtn;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->employee->count_all_lendersfee_request(),
                        "recordsFiltered" => $this->employee->count_filtered_lendersfee_request(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function admin_dashboard()
	{
		if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			
			$data = array();
			$data['title'] = 'Home';
			$this->template->load('default_layout', 'contents' , 'home', $data);
		}
		else
		{
			redirect(base_url() .'');
		}
	}

	public function cashier_dashboard()
	{
		if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			$data = array();
			$data['title'] = 'Home';
			$config = array();
	        $config["base_url"] = base_url().'home/cashier_dashboard';
	        $config["total_rows"] = $this->employee->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = 'Next &rarr;';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&larr; Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["data"] = $this->employee->get_employees($config["per_page"], $page);
			$this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
	        
			
			$this->template->load('cashier_dashboard', 'contents' , 'cashier', $data);
		}
		else
		{
			redirect(base_url() .'');
		}
	}

	public function account_dashboard()
	{
		if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			$data = array();
			$data['title'] = 'Account';
			$this->template->load('account_layout', 'contents' , 'account', $data);
		}
		else
		{
			redirect(base_url() .'');
		}
	}

	public function logs()
	{
		if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			$data = array();
			$data['title'] = 'Logs';

	        if($this->session->userdata('type') == 2)
	        {
	        	$this->template->load('logs_layout','contents','logs', $data);
	        }
	        else
	        {
	        	$this->template->load('logs_layout_admin','contents','logs', $data);
	        }
	    }
	    else
	    {
	    	redirect(base_url() . '');
	    }
	}

	public function balance()
	{
		$data=array();
		$data['title'] = 'Balance';
		$data["data"] = $this->employee->get_all_balance();
		$data["total_cash_amount"] = $this->employee->get_total_cash_amount();
		$this->template->load('default_layout','contents','balance', $data);
	}

	public function investors()
	{
		if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			$data = array();
			$data['title'] = 'Investors';
			// $data["count_investor"] = $this->investor->get_all_investor();
	        $this->template->load('default_layout','contents','investors',$data);
	    }
	    else
	    {
	    	redirect(base_url() . '');
	    }
	}

	public function login_validation()  
    {  
       $this->load->library('form_validation');  
       $this->form_validation->set_rules('username', 'Username', 'required');  
       $this->form_validation->set_rules('password', 'Password', 'required');  
       if($this->form_validation->run())  
       {  
            //true  
            $username = $this->input->post('username');  
            $password = $this->input->post('password');
            $user_data = $this->employee->can_login($username,$password);
            if($user_data)  
            {  
                 $session_data = array(  
                      'username' => $user_data['username'],
                      'type' => $user_data['type'],
                      'refcode' => $user_data['refcode'],
                      'logged_in' => true  
                 );  
                 $this->session->set_userdata($session_data);  
                 redirect(base_url() . 'home/enter');
            }  
            else  
            {  
                 $this->session->set_flashdata('error', 'Invalid Username and Password');  
                 redirect(base_url() . '');  
            }  
       }  
       else  
       {  
            //false  
            $this->index();  
       }  
    }

    public function registration()
    {
    	$data = array();
    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('accountType','accountType','required|callback_check_default');
    	$this->form_validation->set_message('check_default', 'Please select account type');
    	$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
    	if($this->form_validation->run() === false)
    	{
    		$data["data"] = array();
    		$this->template->load('registeraccnt', 'content', 'home', $data);
    	}
    	else
    	{
    		//confirm password validation
    		if($this->input->post('password') != $this->input->post('confirmpassword'))
    		{
    			$this->session->set_flashdata('error', 'Password did not matched with the confirm password!');

    			redirect(base_url() . 'home/registeraccnt');
    		}
    		else
    		{
    			$this->employee->saveAccount();
    			redirect(base_url() . '');
    		}
    	}
    }

    public function enter()
    {  
       if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)  
       {
        //check what type 
        //1 - admin
        //2 - cashier
          if($this->session->userdata('type') == 1)
          {
            $this->admin_dashboard();
          }
          else if($this->session->userdata('type') == 2)
          {
            $this->cashier_dashboard();
          }
          else
          {
          	redirect(base_url() . 'investor/account');
          }
            
       }  
       else  
       {  
            $this->template->load('index', 'contents' , 'login');  
       }  
    }  

	public function logout()  
	{  
	   $array_items = array('username' => '','type' => '', 'logged_in' => false);
	   $this->session->unset_userdata($array_items);
	   $this->session->sess_destroy();
	   redirect(base_url() . '');
	}

	public function about()
	{
		$data = array();
		$this->template->set('title', 'about');
		$this->template->load('default_layout', 'contents' , 'about', $data);
	}
	public function profile($id)
	{
		$data = array();
		$this->template->set('title', 'profile view');
		$data["data"] = $this->employee->get_employees('', '', $id);
		$this->template->load('default_layout', 'contents' , 'profile', $data);
	}

	public function profile_investor($id)
	{
		$data = array();
		$this->template->set('title', 'profile view');
		$data["data"] = $this->employee->get_all_investors('', '', $id);
		$this->template->load('default_layout', 'contents' , 'profile_investor', $data);
	}

    public function profile_investor_cashout($refcode,$receipt = null)
    {
        $data = array();
        $this->template->set('title', 'profile view');
        $data["data"] = $this->employee->get_all_investors_cashout('','',$refcode);
        $data["indet"] = null;
        if($receipt!=null)
        {
            $data["indet"] = $receipt;
        }
        
        $this->template->load('default_layout', 'contents' , 'profile_investor', $data);
    }

	public function edit($id)
	{
		$data = array();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('civilstatus', 'civilstatus', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
		
        if ($this->form_validation->run() === FALSE)
        {
			$data["data"] = $this->employee->get_employees('', '', $id);
			$this->template->set('title', 'Profile edit - '.$data["data"]['firstname']);
            $this->template->load('default_layout', 'contents' , 'edit', $data);
 
        }
        else
        {
            $this->employee->saveEmployee($id);
            redirect( base_url() ."home/admin_dashboard");
        }	
    }

    public function edit_investor($id)
	{
		$data = array();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('civilstatus', 'civilstatus', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
		
        if ($this->form_validation->run() === FALSE)
        {
			$data["data"] = $this->employee->get_all_investors('', '', $id);
			$this->template->set('title', 'Profile edit - '.$data["data"]['firstname']);
            $this->template->load('default_layout', 'contents' , 'edit_investor', $data);
 
        }
        else
        {
            $this->employee->saveInvestors($id);
            redirect( base_url() ."home/investors");
    	}
    }	

	function check_default($post_string)
	{
	  return $post_string == '0' ? FALSE : TRUE;
	}

	public function create()
	{
		$data = array();
		$this->template->set('title', 'Add New Employee');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('loan', 'loan', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
        if ($this->form_validation->run() === FALSE)
        {
			
			$data["data"] = array();
            $this->template->load('default_layout', 'contents' , 'create', $data);
 
        }
        else
        {
            $this->employee->saveEmployee();
            redirect(base_url() ."home/admin_dashboard");
        }
	}

	public function registerLender($ref_code = null)
	{
	    $investinfores = null;
	    $investinfo = null;
		$data['title'] = "Register Account";
        $data["data"] = array();
        $data["randomString"] = $this->employee->generateRandomString();
        $data["refcodelink"] = $ref_code;
        $investinfores = $this->investor->get_investor($ref_code);
        if(count($investinfores) > 0){
            if(!empty($investinfores[0]['firstname'])){
                $investinfo = "Your we're referred by ".$investinfores[0]['firstname']." ".$investinfores[0]['lastname'];
            }else{
                $investinfo = "This user is not yet activated";
            }
        }
        
        $data["getinvestinfo"] = $investinfo;
        $this->template->load('registerInvestor', 'contents' , 'home', $data);
	}

	public function registerInvestorAccount()
	{
		$data = array();
    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('ref_link','ref_link','required|callback_check_default');
    	$this->form_validation->set_message('check_default', 'Referral Link Not Valid');
    	$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
    	if($this->form_validation->run() === false)
    	{
    		$data["data"] = array();
    		$this->template->load('registerLender', 'content', 'account', $data);
    	}
    	else
    	{
    		//confirm password validation
    		if($this->input->post('password') != $this->input->post('confirmpassword'))
    		{
    			$this->session->set_flashdata('error', 'Password did not matched with the confirm password!');

    			redirect(base_url() . 'home/registerLender');
    		}
    		else
    		{
    		    if($this->employee->validateUsername($this->input->post('username'))){
    			    $this->session->set_flashdata('error', 'Username already exist!');
    			    redirect(base_url() . 'home/registerLender');
    		    }else{
        			$validate = $this->employee->validateReferalLink();
        			if($validate)
        			{
        				$this->employee->saveAccountToUserAndInvestor();
        				redirect(base_url() . '');
        			}
        			else
        			{
        				$this->session->set_flashdata('error', 'Sorry Invalid Referral Link');  
                		redirect(base_url() .'home/registerLender');
        			}
    		    }
    			
    		}
    	}
	}

	public function pendingStatus($id)
	{
		$data = array();
		$this->template->set('title', 'profile view');
		$data["data"] = $this->employee->getPendingAccount('', '', $id);
		
		redirect(base_url(). "home/investors");
	}

    public function cashoutPendingStatus($id)
    {
        $data = array();
        $data["data"] = $this->employee->getCashoutPending('','',$id);

        redirect(base_url(). "home/cashout_pending");

    }

    public function lendersfeerequestStatus($ref_id)
    {
        $data = array();
        $data["data"] = $this->employee->getLendersfeeRequest('','',$ref_id);

        redirect(base_url(). "home/lendersfee_request");

    }

	public function create_investor()
	{
		$data = array();
		$this->template->set('title', 'Add New Investor');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('investment_amount', 'investment_amount', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
        if ($this->form_validation->run() === FALSE)
        {
			
			$data["data"] = array();
			$data["randomString"] = $this->employee->generateRandomString();
            $this->template->load('default_layout', 'contents' , 'create_investor', $data);
 
        }
        else
        {
            $validate = $this->employee->saveInvestors();
            if($validate)
            {
            	redirect(base_url() ."home/investors");
            }
            else
            {
            	$this->session->set_flashdata('error', 'Sorry Invalid Referral Link');  
            	redirect(base_url() .'home/create_investor');
            }
        }
	}

	public function delete($id)
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $news_item = $this->employee->get_employees('', '', $id);;
        
        if($this->employee->delete_employee($id)){
			$this->session->set_flashdata('message', 'Deleted Sucessfully');

			redirect( base_url() ."home/admin_dashboard");  
		}		
    }

    public function delete_investor($id)
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $news_item = $this->employee->get_all_investors('', '', $id);;
        
        if($this->employee->delete_investor($id)){
			$this->session->set_flashdata('message', 'Deleted Sucessfully');

			redirect( base_url() ."home/investors");  
		}		
    }

    public function pay($id)
    {
    	$data = array();
		$this->template->set('title', 'Payment Section');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('cash_amount', 'cash_amount', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
        if ($this->form_validation->run() === FALSE)
        {
			$data["data"] = $this->employee->get_employees('', '', $id);
	        $this->template->load('cashier_dashboard', 'contents' , 'payment', $data);
    	}	
    	else
    	{
			$this->employee->deduct($id);
        	redirect(base_url(). "home/cashier_dashboard");
    	}
    }

    public function cashout_pending()
    {
    	if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
		{
			$data = array();
			$data['title'] = 'Cashout';
			$data["investors"] = $this->investor->get_all_investor();
	        $this->template->load('default_layout','contents','cashout_pending',$data);
	    }
	    else
	    {
	    	redirect(base_url() . '');
	    }
    }

    public function lendersfee_request()
    {
        if($this->session->userdata('username') != '' && $this->session->userdata('type') != null)
        {
            $data = array();
            $data['title'] = 'Lenders Amount Request';
            $data["investors"] = $this->investor->get_all_investor();
            $this->template->load('default_layout','contents','lendersfee_request',$data);
        }
        else
        {
            redirect(base_url() . '');
        }
    }
}
