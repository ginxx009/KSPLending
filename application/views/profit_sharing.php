<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="app-page-title">
    
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-plugin"></i>
            </div>
            <div>Account
                <div class="page-title-subheading">
                    Lender's Amount will be display here. Please click the button activate to activate your specific lender's amount. 
                </div>
                <!-- <div class="page-title-subheading">
                    Before you're account is fully activated, please wait the approval of your account, we are now veriying your information. Thank you.
                </div> -->
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    Request
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="add_amount" class="nav-link">
                                <span>
                                    Lender's Amount
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>    
    </div>
</div>            
<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Lender's Amount</div>
                    <div class="widget-subheading">Accumulated Amount</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php echo number_format($lendersamount,2);?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Profit Sharing</div>
                    <div class="widget-subheading">Monthly Bonus</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php echo number_format($totalProfit,2);?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Lender's Amount</div>
            <div class="table-responsive" style="overflow-x: unset;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Lender's Capital</th>
                        <th>Profit Sharing</th>
                        <th>Avail Plan</th>
                        <th>Plan Started</th>
                        <th>Plan Ended</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php if($getLenderRequest != null) {?>
                        <?php $i=1;foreach($getLenderRequest as $rec): ?>
                        <tr>
                            <td><?php echo number_format($rec['amnt'],2); ?></td>
                            <td><?php echo number_format($rec['profit'],2); ?></td>
                            <td><?php
                                if($rec['avail_plan'] == 0.1)
                                {
                                    echo "Plan 1";
                                }
                                else if($rec['avail_plan'] == 0.15)
                                {
                                    echo "Plan 2";
                                }
                                else if($rec['avail_plan'] == 0.20)
                                {
                                    echo "Plan 3";
                                }
                                else
                                {
                                    echo "Plan 4";
                                } 
                             ?>    
                             </td>
                            <td><?php echo $rec['date_invest']; ?></td>
                            <td><?php echo $rec['trade_duedate']; ?></td>
                            <?php
                             if($rec['stats'] == 0)
                             {
                                echo "<td>Pending</td>";
                             } 
                             else 
                             {
                                if($rec['date_invest'] != null)
                                {
                                    echo "<td>Active</td>";
                                }
                                else
                                {
                                    echo "<td>Available</td>";
                                } 
                            } 
                            ?>
                            
                            <td>
                                <?php if($rec['stats'] == 0) { ?>
                                    <button class="btn btn-shadow btn-info" disabled>Plan</button>
                                <?php }else{ ?>
                                    <?php if ($rec['date_invest'] != null) { ?>
                                    <button class="btn btn-shadow btn-info" disabled>Ongoing</button>
                                <?php } else { ?>
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            Plan
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="select_pack/<?php echo $rec['id'];?>/1" class="nav-link">
                                                        <span>
                                                            2 Months Plan (10% Monthly)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="select_pack/<?php echo $rec['id'];?>/2" class="nav-link">
                                                        <span>
                                                            4 Months Plan (15% Monthly)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="select_pack/<?php echo $rec['id'];?>/3" class="nav-link">
                                                        <span>
                                                            6 Months Plan (20% Monthly)
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="select_pack/<?php echo $rec['id'];?>/4" class="nav-link">
                                                        <span>
                                                            1 Year Plan (25% Monthly)
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } }?>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
