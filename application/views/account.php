<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if($investors != null){?>
<?php if($investors[0]['firstname'] == null) { ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-pendrive"></i>
            </div>

            <div>Dashboard
                <div class="page-title-subheading">
                    You may now complete your information before we proceed, thank you.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    Setup
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="<?php echo site_url('investor/setupAccount/' . $this->session->userdata('refcode')); ?>" class="nav-link">
                                <span>
                                    Update Information
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>    
    </div>
</div>    
<?php } else if($investors[0]['status'] == 0 && $investors[0]['firstname'] != null) { ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-pendrive"></i>
            </div>

            <div>Dashboard
                <div class="page-title-subheading">
                    Please wait while your account is being verified by the administrator!
                </div>
            </div>
        </div>   
    </div>
</div> 
<?php } else { ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-pendrive"></i>
            </div>

            <div>Dashboard
                <div class="page-title-subheading">
                    Your account has been verified!
                </div>
            </div>
        </div>   
    </div>
</div> 
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Profit Sharing</div>
                    <div class="widget-subheading">Monthly Bonus</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php echo number_format($totalProfit, 2);?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Lender's Fee</div>
                    <div class="widget-subheading">Lender's Bonus</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php 
                    if(!empty($investors[0]['bonus']) || $investors[0]['bonus'] > 0){
                        echo number_format($investors[0]['bonus'],2);
                    }else{
                        echo number_format(0,2);
                    }?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Withdrawal</div>
                    <div class="widget-subheading">Accumulated Cashout</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php 
                    if(!empty($accwithdrawal) || $accwithdrawal > 0){
                        echo number_format($accwithdrawal,2);
                    }else{
                        echo number_format(0,2);
                    };?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Lender's History</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Reference Code</th>
                            <th>Activity</th>
                            <th>Description</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($cashoutrequest != null) {?>
                    <?php $i=1;foreach($cashoutrequest as $rec): ?>
                    <tr>
                        <td><?php echo $rec['referal_code']; ?></td>
                        <td><?php echo $rec['activity']; ?></td>
                        <td><?php echo $rec['description']; ?></td>
                        <td><?php echo $rec['date']; ?></td>
                        <?php if($rec['status'] == 0) { echo "<td>pending</td>"; } else { echo "<td>confirmed</td>"; } ?>
                
                    </tr>
                    <?php endforeach; ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>