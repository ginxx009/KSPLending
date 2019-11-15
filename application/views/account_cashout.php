<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
<?php echo form_open('investor/setupCashout/' . $investors[0]['id'], "class='form-horizontal'"); ?>
<div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                    </div>
                                    <div>Cashout
                                        <div class="page-title-subheading">
                                            Withdrawal of profit and bonuses will process here.
                                        </div>
                                        <!-- <div class="page-title-subheading">
                                            Before you're account is fully activated, please wait the approval of your account, we are now veriying your information. Thank you.
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Profit Sharing</div>
                                            <div class="widget-subheading">Monthly Bonus</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>Php <?php echo number_format($totalProfit, 2); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Lender's Fee</div>
                                            <div class="widget-subheading">Lender's Bonus</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>Php <?php echo number_format($investors[0]['bonus'],2);?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>Bank Deposit</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Bank Information</h5>
                                                <div class="position-relative form-group">
                                                    <label for="bank_accnt_name" class="">Bank Name</label>
                                                    <input name="bank_accnt_name" id="bank_accnt_name" placeholder="Bank Account Name" type="text" class="form-control" value="<?php echo set_value('bank_accnt_name');?>">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="bank_accnt_no" class="">Account Number</label>
                                                    <input name="bank_accnt_no" id="bank_accnt_no" placeholder="Bank Account Number" type="text" class="form-control" value="<?php echo set_value('bank_accnt_no');?>">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="cashout_type" class="">Select Source</label>
                                                    <select name="cashout_type" id="cashout_type" class="form-control" value="<?php echo set_value('cashout_type'); ?>">
                                                        <option value="1">Profit Sharing</option>
                                                        <option value="2">Lender's Fee</option>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label for="cash_amount" class="">Amount</label>
                                                    <input name="cash_amount" id="cash_amount" placeholder="Enter Amount" type="number" class="form-control" value="<?php echo set_value('cash_amount'); ?>">
                                                </div>
                                                <button class="mt-1 btn btn-primary">Submit</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>