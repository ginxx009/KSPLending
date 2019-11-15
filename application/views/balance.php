<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1 style="font-size:20pt">Lending System</h1>
	<?php if($this->session->flashdata('message')): ?>
	<div class="alert alert-info">
		<?php echo $this->session->flashdata('message');?>
	</div>
	<?php endif;?>
<div class="row">
	<div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Balance</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php echo number_format($data, 2);?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Cash Deposit</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>Php <?php echo number_format($total_cash_amount, 2);?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>