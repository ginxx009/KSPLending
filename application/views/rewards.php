<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                    </div>
                                    <div>Affiliates
                                        <div class="page-title-subheading">
                                            Lender's Affiliates will display here. This is based on what lender's package amount you avail.
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
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Lender's Affiliates</div>
                                            <div class="widget-subheading">Total Lender's Member</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <?php if($directreferrals == null) {?>
                                            <div class="widget-numbers text-white"><span><?php echo "0";?></span></div>
                                        <?php }else{ ?>
                                            <div class="widget-numbers text-white"><span><?php echo number_format(sizeof($directreferrals,0));?></span></div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Lender's Affiliates</div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
												<tr>
													<th>Id</th>
													<th>Full Name</th>
													<th>Lenders Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1;if($indirectinfo != null){

												foreach($indirectinfo as $rec): ?>
												<tr>
													<td><?php echo $rec['id']; ?></td>
										            <td><?php echo $rec['name']; ?></td>
										            <td><?php 
                                                    if($rec['tot_cap']!=null){
                                                        echo number_format($rec['tot_cap'],2);
                                                    }else{
                                                        echo 0;
                                                    }; ?></td>
												</tr>
												<?php endforeach; } ?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>