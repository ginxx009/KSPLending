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
	<table class="table table-bordered table-hover" cellspacing="0" width="100%" id="employee">
		<thead>
			<tr>
				<th>Loan</th>
				<th>Loan Type</th>
				<th>Loan Amount</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Cash Amount</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		    
	        
		<?php $i=1;
		  if(!empty($data) || $data!=null){
		    foreach($data as $rec):  ?>
            <tr>
                <td><?php echo $rec->loan; ?></td>
                <td><?php echo $rec->loan_type; ?></td>
    			<td><?php echo $rec->loan_amount; ?></td>
    			<td><?php echo $rec->firstname; ?></td>
    			<td><?php echo $rec->lastname; ?></td>
    			<td><?php echo $rec->balance; ?></td>
    			<td>
    				<div class="hidden-sm hidden-xs btn-group">
    					<a class="btn btn-xs btn-success" href="<?php echo site_url('home/pay/'.$rec->id); ?>">
    						<i class="ace-icon fa fa-rub bigger-120"></i>
    					</a>
    				</div>
                </td>
            </tr>
		<?php endforeach; ?>
		<?php } ?>
		</tbody>
	</table>
	<div><?php echo $links; ?></div>
</div>
