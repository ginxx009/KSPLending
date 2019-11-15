<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends CI_Controller {

	public function __construct()
    {
		header("Access-Control-Allow-Origin: *");
        parent:: __construct();
        $this->load->helper('security');
        $this->load->model('Investor_m','investor');
        $this->load->model('Employee_m','employee');
		$this->load->helper('url');
        $this->load->library("upload");
		$this->load->library("pagination");
		$this->load->library("session");
    }

	public function rewards()
	{
	
		$data_all = array();

		$data = array();
		$data['title'] = "Networks Fee";
		
		$getId = $this->investor->getId();

		foreach($getId as $record)
		{
			$get_first = $this->investor->get_first($record->id);

			$data_all = $get_first;

			$id = $get_first[0]['referal_code'];
			
			$first_level = $this->investor->get_ref($id);

			foreach($first_level as $first_lvl => $value)
			{
				$value['level'] = 1;
				$first_level[$first_lvl] = $value;
			}

			$data_all = array_merge($data_all, $first_level);
			foreach ($first_level as $first_item) 
			{
				$second_level = $this->investor->get_ref($first_item['referal_code']);
				if(!empty($first_level))
				{
					foreach ($second_level as $second_lvl => $value) 
					{
						$value['level'] = 2;
						$second_level[$second_lvl] = $value;
					}
					$data_all = array_merge($data_all,$second_level);

					foreach ($second_level as $second_item)
					{
						$third_level = $this->investor->get_ref($second_item['referal_code']);
						if(!empty($second_level))
						{
							foreach ($third_level as $third_lvl => $value) 
							{
								$value['level'] = 3;
								$third_level[$third_lvl] = $value;
							}
							$data_all = array_merge($data_all, $third_level);

							foreach($third_level as $third_item)
							{
								$fourth_level = $this->investor->get_ref($third_item['referal_code']);
								foreach($fourth_level as $fourth_lvl => $value)
								{
									$value['level'] = 4;
									$fourth_level[$fourth_lvl] = $value;
								}
								$data_all = array_merge($data_all, $fourth_level);

								foreach($fourth_level as $fourth_item)
								{
									$fifth_level = $this->investor->get_ref($fourth_item['referal_code']);
									foreach($fifth_level as $fifth_lvl => $value)
									{
										$value['level'] = 5;
										$fifth_level[$fifth_lvl] = $value;
									}
									$data_all = array_merge($data_all, $fifth_level);
									//get fifth level
									$data['fifthlevel'] = $data_all;

									foreach($fifth_level as $fifth_item)
									{
										$sixth_level = $this->investor->get_ref($fifth_item['referal_code']);
										foreach($sixth_level as $sixth_lvl => $value)
										{
											$value['level'] = 6;
											$sixth_level[$sixth_lvl] = $value;
										}
										$data_all = array_merge($data_all, $sixth_level);
										foreach($sixth_level as $sixth_item)
										{
											$seventh_level = $this->investor->get_ref($sixth_item['referal_code']);
											foreach($seventh_level as $seventh_lvl => $value)
											{
												$value['level'] = 7;
												$seventh_level[$seventh_lvl] = $value;
											}
											$data_all = array_merge($data_all, $seventh_level);
											foreach($seventh_level as $seventh_item)
											{
												$eigth_level = $this->investor->get_ref($seventh_item['referal_code']);
												foreach($eigth_level as $eight_lvl => $value)
												{
													$value['level'] = 8;
													$eigth_level[$eight_lvl] = $value;
												}
												$data_all = array_merge($data_all, $eigth_level);
												foreach($eigth_level as $eigth_item)
												{
													$ninth_level = $this->investor->get_ref($eigth_item['referal_code']);
													foreach($ninth_level as $ninth_lvl => $value)
													{
														$value['level'] = 9;
														$ninth_level[$ninth_lvl] = $value;
													}
													$data_all = array_merge($data_all, $ninth_level);
													foreach($ninth_level as $ninth_item)
													{
														$tenth_level = $this->investor->get_ref($ninth_item['referal_code']);
														foreach($tenth_level as $tenth_lvl => $value)
														{
															$value['level'] = 10;
															$tenth_level[$tenth_lvl] = $value;
														}
														$data_all = array_merge($data_all, $tenth_level);
														//get tenth level
														$data['tenthlevel'] = $data_all;
														foreach($tenth_level as $tenth_item)
														{
															$eleventh_level = $this->investor->get_ref($tenth_item['referal_code']);
															foreach($eleventh_level as $eleventh_lvl => $value)
															{
																$value['level'] = 11;
																$eleventh_level[$eleventh_lvl] = $value;
															}
															$data_all = array_merge($data_all, $eleventh_level);
															foreach($eleventh_level as $eleventh_item)
															{
																$twelveth_level = $this->investor->get_ref($eleventh_item['referal_code']);
																foreach($twelveth_level as $twelveth_lvl => $value)
																{
																	$value['level'] = 12;
																	$twelveth_level[$twelveth_lvl] = $value;
																}
																$data_all = array_merge($data_all, $twelveth_level);
																foreach($twelveth_level as $twelveth_item)
																{
																	$thirteenth_level = $this->investor->get_ref($twelveth_item['referal_code']);
																	foreach($thirteenth_level as $thirteenth_lvl => $value)
																	{
																		$value['level'] = 13;
																		$thirteenth_level[$thirteenth_lvl] = $value;
																	}
																	$data_all = array_merge($data_all, $thirteenth_level);
																	foreach($thirteenth_level as $thirteenth_item)
																	{
																		$fourteenth_level = $this->investor->get_ref($thirteenth_item['referal_code']);
																		foreach($fourteenth_level as $fourteenth_lvl => $value)
																		{
																			$value['level'] = 14;
																			$fourteenth_level[$fourteenth_lvl] = $value;
																		}
																		$data_all = array_merge($data_all, $fourteenth_level);
																		foreach($fourteenth_level as $fourteenth_item)
																		{
																			$fifteenth_level = $this->investor->get_ref($fourteenth_item['referal_code']);
																			foreach($fifteenth_level as $fifteenth_lvl => $value)
																			{
																				$value['level'] = 15;
																				$fifteenth_level[$fifteenth_lvl] = $value;
																			}
																			$data_all = array_merge($data_all, $fifteenth_level);
																			//get fifteenth level
																			$data['fifteenthlevel'] = $data_all;
																			foreach($fifteenth_level as $fifteenth_item)
																			{
																				$sixteenth_level = $this->investor->get_ref($fifteenth_item['referal_code']);
																				foreach($sixteenth_level as $sixteenth_lvl => $value)
																				{
																					$value['level'] = 16;
																					$sixteenth_level[$sixteenth_lvl] = $value;
																				}
																				$data_all = array_merge($data_all, $sixteenth_level);
																				foreach($sixteenth_level as $sixteenth_item)
																				{
																					$seventeenth_level = $this->investor->get_ref($sixteenth_item['referal_code']);
																					foreach($seventeenth_level as $seventeenth_lvl => $value)
																					{
																						$value['level'] = 17;
																						$seventeenth_level[$seventeenth_lvl] = $value;
																					}
																					$data_all = array_merge($data_all, $seventeenth_level);
																					foreach($seventeenth_level as $seventeenth_item)
																					{
																						$eigtheenth_level = $this->investor->get_ref($seventeenth_item['referal_code']);
																						foreach($eigtheenth_level as $eigtheenth_lvl => $value)
																						{
																							$value['level'] = 18;
																							$eigtheenth_level[$eigtheenth_lvl] = $value;
																						}
																						$data_all = array_merge($data_all, $eigtheenth_level);
																						foreach($eigtheenth_level as $eigtheenth_item)
																						{
																							$nintheenth_level = $this->investor->get_ref($eigtheenth_item['referal_code']);
																							foreach($nintheenth_level as $nintheenth_lvl => $value)
																							{
																								$value['level'] = 19;
																								$nintheenth_level[$nintheenth_lvl] = $value;
																							}
																							$data_all = array_merge($data_all, $nintheenth_level);
																							foreach($nintheenth_level as $nintheenth_item)
																							{
																								$twentyth_level = $this->investor->get_ref($nintheenth_item['referal_code']);
																								foreach($twentyth_level as $twentyth_lvl => $value)
																								{
																									$value['level'] = 20;
																									$twentyth_level[$twentyth_lvl] = $value;
																								}
																								$data_all = array_merge($data_all, $twentyth_level);
																							}
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}

			// print("<pre>". print_r($data_all,true). "</pre>");

			sort($data_all);
			$data["data_all"] = $data_all;
		}

		$data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
		$data["directreferrals"] = $this->investor->directReferral($this->session->userdata('refcode'));
		$data["indirectinfo"] = $this->getIndirect($this->getDirect($this->session->userdata('refcode')));
		$this->template->load('account_layout','contents','rewards',$data);
	}

    public function account()
    {
        $data = array();
        $data['title'] = "Account Dashboard";
        $data['data'] = $this->session->userdata('refcode');
        $data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
        $data["accwithdrawal"] = $this->investor->AccumulatedWithdrawal($this->session->userdata('refcode'));

        $data['cashoutrequest'] = $this->investor->getCashoutRequest($this->session->userdata('refcode'));

        $config["base_url"] = base_url().'investor/account';
        $config["total_rows"] = $this->investor->logs_count();
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
        $data["logs"] = $this->investor->get_logs($config["per_page"], $page,$this->session->userdata('refcode'));
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        

        $referal_code = $this->session->userdata('refcode');
        $select = "SELECT *FROM  invest_details WHERE referal_code = '{referal_code}' and stats = '1' and complete = 0 and date_invest is not null and date_ended is null";

        $query = $this->db->query($select)->result();

        $showdaysdiff = 0;
        foreach ($query as $item) {

            $id = $item->id;
            $amnt = $item->amnt;
            $date_invest = $item->date_invest;
            $trade_duedate = $item->trade_duedate;
            $date_ended = $item->date_ended;
            $avail_plan = $item->avail_plan;

            $this->setDailyProfit($id,$amnt, $date_invest, $trade_duedate, $date_ended,$avail_plan);
        }

        // $total_profit = bcdiv($this->investor->get_total_investProfit($id), 1, 2);
        // $data['totalprofit'] = $total_profit;

        $user_profit = bcdiv($this->investor->user_totalprofit_invest($referal_code), 1, 2);
        $data['totalProfit'] = $user_profit;



        $this->template->load('account_layout', 'contents', 'account', $data);
    }

    public function logs()
    {   
        
		$data = array();
        $data['title'] = "Account History";
        $data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
        $config["base_url"] = base_url().'investor/logs';
        $config["total_rows"] = $this->investor->logs_count();
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
        $data["data"] = $this->investor->get_logs($config["per_page"], $page,$this->session->userdata('refcode'));
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $this->template->load('account_layout','contents','account_history', $data);

	}

    public function cashout()
    {
    	$data = array();
        $data['title'] = "Account Cashout";
        $data['data'] = $this->session->userdata('refcode');
        $data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
        $data["accwithdrawal"] = $this->investor->AccumulatedWithdrawal($this->session->userdata('refcode'));
        
        $referal_code = $this->session->userdata('refcode');
        $select = "SELECT *FROM  invest_details WHERE referal_code = '{referal_code}' and stats = '1' and complete = 0 and date_invest is not null and date_ended is null";

        $query = $this->db->query($select)->result();

        $showdaysdiff = 0;
        foreach ($query as $item) {

            $id = $item->id;
            $amnt = $item->amnt;
            $date_invest = $item->date_invest;
            $trade_duedate = $item->trade_duedate;
            $date_ended = $item->date_ended;
            $avail_plan = $item->avail_plan;

            $this->setDailyProfit($id,$amnt, $date_invest, $trade_duedate, $date_ended,$avail_plan);
        }

        // $total_profit = bcdiv($this->investor->get_total_investProfit($id), 1, 2);
        // $data['totalprofit'] = $total_profit;

        $user_profit = bcdiv($this->investor->user_totalprofit_invest($referal_code), 1, 2);
        $data['totalProfit'] = $user_profit;
        
        $this->template->load('account_layout', 'contents', 'account_cashout', $data);
    }

    public function setupCashout()
    {
    	$data = array();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('cash_amount', 'cash_amount', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','Please insert cash amount!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');

		if ($this->form_validation->run() === FALSE)
        {
        	$data = array();
			$this->template->set('title', 'Cashout- '.$this->session->userdata('username'));
			$data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
            $this->template->load('account_layout', 'contents' , 'account_cashout', $data);
        }
        else
        {

        	$isSuccess = $this->investor->saveCashoutAmount();
        	if($isSuccess)
        	{
        		redirect(base_url() . 'investor/cashout');  
        	}
        	else{
        		$this->session->set_flashdata('message', 'Please select Cashout Type!');
        		redirect(base_url() . 'investor/cashout');
        	}
        }
    }

    public function setupAccount()
  	{
  		$ref_code = $this->session->userdata('refcode');
        $data = array();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('civilstatus', 'civilstatus', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
		
        if ($this->form_validation->run() === FALSE)
        {
        	$data = array();
			$data["data"] = $this->investor->get_investor($ref_code);
			$this->template->set('title', 'Setup Account- '.$this->session->userdata('username'));
            $this->template->load('account_layout', 'contents' , 'setupaccount', $data);
        }
        else
        {

        	$isSuccess = $this->employee->SaveSetupAccount($this->input->post('id'),$ref_code);
        	if($isSuccess){
        		$session_data = array(  
                      'success' => true
                 );  
                 $this->session->set_userdata($session_data);
        		redirect(base_url() . 'investor/account');
        	}
        }
    }

    public function profit_sharing()
    {
    	$data = array();
    	$data['title'] = "Profit Sharing";
    	$data["investors"] = $this->investor->get_investor($this->session->userdata('refcode'));
    	$data["getLenderRequest"] = $this->investor->getLenderRequest($this->session->userdata('refcode'));
        $config["base_url"] = base_url().'investor/profit_sharing';
        $config["total_rows"] = $this->investor->lenders_count();
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
        $data["profit_sharing"] = $this->investor->get_lenders($config["per_page"], $page,$this->session->userdata('refcode'));
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();


        $referal_code = $this->session->userdata('refcode');
        $select = "SELECT *FROM  invest_details WHERE referal_code = '".$referal_code."' and stats = '1' and complete = 0 and date_invest is not null and date_ended is null";

        $query = $this->db->query($select)->result();

        // var_dump($query); die();

        $showdaysdiff = 0;
        foreach ($query as $item) {

            $id = $item->id;
            $amnt = $item->amnt;
            $date_invest = $item->date_invest;
            $trade_duedate = $item->trade_duedate;
            $date_ended = $item->date_ended;
            $avail_plan = $item->avail_plan;

            $this->setDailyProfit($id,$amnt, $date_invest, $trade_duedate, $date_ended,$avail_plan);
        }

        // $total_profit = bcdiv($this->investor->get_total_investProfit($id), 1, 2);
        // $data['totalprofit'] = $total_profit;

        $user_profit = bcdiv($this->investor->user_totalprofit_invest($referal_code), 1, 2);
        $data['totalProfit'] = $user_profit;
        $totalAmount = bcdiv($this->investor->get_total_amnt_requested($referal_code),1,2);
        $data['lendersamount'] = $totalAmount;
        
    	$this->template->load('account_layout', 'contents', 'profit_sharing',$data);
    }



    public function setDailyProfit($id,$amnt, $date_invest, $trade_duedate, $date_ended,$avail_plan){
        $total_profit = 0;

        $begin = strtotime($date_invest);
        $end = strtotime(date('Y-m-d H:i:s'));

        $datestart = date('Y-m-d', strtotime($date_invest));
        // if ($trade_duedate == NULL)
        //     $invest_stop = date('Y-m-d', strtotime($date_invest .' + 1 days'));
        // else
            $invest_stop = date('Y-m-d', strtotime($trade_duedate));
        
        
        $ref_code = $this->session->userdata('refcode');

        while($begin <= $end){
            $what_day = date("N",$begin);
            if(TRUE) { // 6 and 7 are weekend days
                if ($date_ended == NULL) {
                    if (strtotime($datestart) <= strtotime($invest_stop)) {
                        if (date('Y-m-d') > $datestart) {
                            
                        	$select  = "SELECT *FROM invest_history WHERE invest_id = '{id}' and referal_code ='{referal_code}' and profit_date = '{datestart}'";
                        	$result = $this->db->query($select)->result();
                            
                            if (count($result) == 0 && $datestart > $date_invest) {

                            	$curr_days_in_month = $this->getCurrentDaysInMonth();
                                
                                $profit_rate = $avail_plan / $curr_days_in_month;

                                $profit = $amnt * $profit_rate; 

                                $data = array(
                                	'invest_id' => $id,
                                	'referal_code' => $ref_code,
                                	'profit_date' => $datestart,
                                	'profit' => $profit
                                );

                                $this->db->insert('invest_history', $data);
 
                                if(strtotime($datestart) >= strtotime($invest_stop)) {

                                	$data2 =array(
                                		'date_ended' => $trade_duedate . date('H:i:s'),
                                		'date_invest' => NULL,
                                		'trade_duedate' => NULL
                                	);

                                	$this->db->where('id', $id);
                                	$this->db->update('invest_details', $data2);
									                                    
                                    // $this->ion_auth->updateProfit($orderID,1);
                                }
                            }
                        }
                    }
                    else{
                        break;
                    }
                }
            }
            
            $begin +=86400; // +1 day
            $datestart = date('Y-m-d', strtotime($datestart .' + 1 days'));
        }
        
        // return $total_profit;
    }

    public function Add_Amount()
    {
    	$ref_code = $this->session->userdata('refcode');
        $data = array();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('cash_amount', 'cash_amount', 'required|callback_check_default');
        $this->form_validation->set_message('check_default','There are some fields that are required to fill up!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" id="hideMe">', '</div>');
		
		$amount = $this->input->post('cash_amount');
		
        if ($this->form_validation->run() === FALSE)
        {
        	$data = array();
			$data["investors"] = $this->investor->get_investor($ref_code);
			$this->template->set('title', 'Add Lenders Amount- '.$this->session->userdata('username'));
			
			$referal_code = $this->session->userdata('refcode');
            $select = "SELECT *FROM  invest_details WHERE referal_code = '".$referal_code."' and stats = '1' and complete = 0 and date_invest is not null and date_ended is null";
    
            $query = $this->db->query($select)->result();
    
            // var_dump($query); die();
    
            $showdaysdiff = 0;
            foreach ($query as $item) {
    
                $id = $item->id;
                $amnt = $item->amnt;
                $date_invest = $item->date_invest;
                $trade_duedate = $item->trade_duedate;
                $date_ended = $item->date_ended;
                $avail_plan = $item->avail_plan;
    
                $this->setDailyProfit($id,$amnt, $date_invest, $trade_duedate, $date_ended,$avail_plan);
            }
    
            // $total_profit = bcdiv($this->investor->get_total_investProfit($id), 1, 2);
            // $data['totalprofit'] = $total_profit;
    
            $user_profit = bcdiv($this->investor->user_totalprofit_invest($referal_code), 1, 2);
            $data['totalProfit'] = $user_profit;
    			
    			
            $this->template->load('account_layout', 'contents' , 'add_amount', $data);
        }
        else
        {
            if($amount > 0){
                if($amount < 5000)
            	{
            		$this->session->set_flashdata('message', 'Below minimum amount input!');	
            		redirect(base_url(). 'investor/add_amount');
            	}else{	 
            	    if($this->security->xss_clean($this->input->post('receipt', TRUE), TRUE) === FALSE){
            	        $this->session->set_flashdata('message', 'Invalid Image!');	
            	    	redirect(base_url(). 'investor/add_amount');
            	    }else{
                        $uniq = uniqid();
                        $orderID = md5($uniq);
            	        
                        // Upload profile picture to server
                        $upload_path = "./uploads/proof";
                        if (!file_exists($upload_path))
                        mkdir($upload_path, 0777, true);

                        $config['upload_path'] = $upload_path;
                        $config['allowed_types'] = '*';
                        $config['file_name'] = $orderID.'.jpg';
                        $config['overwrite'] = TRUE;
                        $link = $orderID.'.jpg';

                        $error_upload = "success";
                        $this->load->library("upload");
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload("receipt")) {
                            $isSuccess = $this->investor->addAmount($orderID);
            	    
            	        	$data = array();
            	        	$data['issucess'] = $isSuccess;
            	        	if($isSuccess)
            	        	{
            	        		redirect(base_url() . 'investor/account');
            	        		$this->template->load('account_layout', 'contents' , 'add_amount', $data);  
            	        	}
            	        	else
            	        	{
            	        		$this->session->set_flashdata('message', 'Please check the fields!');
            	        		redirect(base_url() . 'investor/account');
            	        	}

    	        		    redirect(base_url() . 'investor/account');
                        }else{
        	        		$this->session->set_flashdata('message', $this->upload->display_errors());	
        		            redirect(base_url(). 'investor/add_amount');
                        }
            	    }
            	}
            }else{
        		$this->session->set_flashdata('message', 'Invalid Amount!');
        		redirect(base_url(). 'investor/add_amount');	
        	}
        }
    }

    function check_default($post_string)
	{
	  return $post_string == '0' ? FALSE : TRUE;
	}

	function getDirect($ref_code)
	{
		$refcode_direct = array();

		$result = $this->investor->directReferral($ref_code);
		for($x = 0; $x < count($result);$x++){
			array_push($refcode_direct, $result[$x]['referal_code']);
		}
// 		var_dump($result); die();
		return $refcode_direct;
	}

	function getIndirect($getFstlvl = array()){
		$ctr = 2;
		$allIndirect = array();
		array_push($allIndirect, $getFstlvl);
		
		$allIndirectInfo = array();

		$inname = "";
		$incap = 0;
		$inid = 0;

		$ref_code = $this->session->userdata('refcode');
		$cur_usr_cap = $this->getTotCap($ref_code);
		$cap_range = $this->getRangeLvl($cur_usr_cap);

		for($x = 0; $x < count($allIndirect); $x++){
			if($x < $cap_range){
				$cur_usr_drect = array();
				for($y = 0; $y < count($allIndirect[$x]); $y++){

					$inid = $allIndirect[$x][$y];
					if($this->getUsrInfo($allIndirect[$x][$y])[0]['firstname']!=null){
						$inname = $this->getUsrInfo($allIndirect[$x][$y])[0]['firstname']." ".$this->getUsrInfo($allIndirect[$x][$y])[0]['lastname'];
					}else{
						$inname = "Not Activated!";
					}
					
					$incap = $this->getTotCap($allIndirect[$x][$y]);

					$result = $this->investor->directReferral($inid);

				// 	var_dump($result); die();
				    if(count($result)>0){
    					for($z = 0; $z < count($result);$z++){
    						array_push($cur_usr_drect, $result[$z]['referal_code']);
    					}
				    }

					$cur_usr_info = array('id' => $inid,'name' => $inname, 'tot_cap' => $incap);
					array_push($allIndirectInfo,$cur_usr_info);
				}
				array_push($allIndirect, $cur_usr_drect);
			}
		}
		
// 		var_dump($allIndirectInfo); die();
		return $allIndirectInfo;
	}

	function getTotCap($ref_code){
		$this->investor->sumupcapital($ref_code);
	}

	function getRangeLvl($total_cap){
		$range = 0;

		if($total_cap >= 5000 && $total_cap <= 50000 )
		{
			$range = 5;
		}
		else if($total_cap > 50000 && $total_cap <= 500000 )
		{
			$range = 10;
		}
		else if($total_cap > 500000 && $total_cap <= 5000000 )
		{
			$range = 15;
		}
		else
		{
			$range = 20;
		}

		return $range;
	}

	function getUsrInfo($ref_code){
		// var_dump($this->investor->get_investor($ref_code)); die();
		return $this->investor->get_investor($ref_code);
	}

	function user_account()
	{
		$data = array();
		$data["title"] = "User Account";

		$this->template->load('account_layout', 'contents', 'account_user',$data);
	}

	function select_pack($refid,$plan)
	{
		$refcode = $this->session->userdata('refcode');
		// var_dump($refcode,$refid); die();
		$result = $this->investor->get_investor_withpar($refcode, $refid);

		// var_dump($result); die();
		$plan1 = 0.1;
		$plan2 = 0.15;
		$plan3 = 0.20;
		$plan4 = 0.25;

		$month1 = 2;
		$month2 = 4;
		$month3 = 6;
		$month4 = 12; 

		$cur_plan = 0;
		$cur_month = 0;
		$duedate = 0;

		$startdate = date('Y-m-d');

		if(count($result) > 0)
		{
			if($plan == 1)
			{
				$cur_plan = $plan1;
				$cur_month = $month1;

				$duedate = $this->endCycle($startdate,$cur_month);
			}
			else if($plan == 2)
			{
				$cur_plan = $plan2;
				$cur_month = $month2;
				$duedate = $this->endCycle($startdate,$cur_month);
			}
			else if($plan == 3)
			{
				$cur_plan = $plan3;
				$cur_month = $month3;
				$duedate = $this->endCycle($startdate,$cur_month);
			}
			else
			{
				$cur_plan = $plan4;
				$cur_month = $month4;
				$duedate = $this->endCycle($startdate,$cur_month);
			}

			$data = array(
				'date_invest' => $startdate." ".date('H:i:s'), 
				'avail_plan' => $cur_plan,
				'trade_duedate' => $duedate." ".date('H:i:s')
			);

			$this->db->where('id' , $refid);
			$this->db->update('invest_details', $data);
		}
		redirect(base_url(). 'investor/profit_sharing');
		$this->session->set_flashdata('message', 'Successfully traded!');
	}


	function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }

	function endCycle($d1, $months)
    {
        $date = new DateTime($d1);

        // call second function to add the months
        $newDate = $date->add($this->add_months($months, $date));

        // goes back 1 day from date, remove if you want same day of month
        $newDate->sub(new DateInterval('P1D')); 

        //formats final date to Y-m-d form
        $dateReturned = $newDate->format('Y-m-d'); 

        return $dateReturned;
    }


    function getCurrentDaysInMonth()
    {
    	return date('j');
    }
}