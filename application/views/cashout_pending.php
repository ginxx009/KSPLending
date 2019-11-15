<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="">
    <h1 style="font-size:20pt">Lending System</h1>
    <?php if($this->session->flashdata('message')): ?>
    <div class="alert alert-info">
        <?php echo $this->session->flashdata('message');?>
    </div>
    <?php endif;?>
    <div class="table-responsive">
        <table id="cashout_pending_table" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cashout Amount</th>
                    <th>Bank Account Name</th>
                    <th>Bank Account No</th>
                    <th>Request Date</th>
                    <th>Cashout Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
