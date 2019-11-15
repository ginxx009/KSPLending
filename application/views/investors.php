<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="">
	<h1 style="font-size:20pt">Lending System</h1>
	<a href="<?php echo site_url('home/create_investor'); ?>"><i class="menu-icon fa fa-plus-circle" style="font-size: 24px;"></i></a>
	<?php if($this->session->flashdata('message')): ?>
	<div class="alert alert-info">
		<?php echo $this->session->flashdata('message');?>
	</div>
	<?php endif;?>
	<div class="table-responsive">
		<table id="investors_table" class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Amount Invested</th>
					<th>Mobile Number</th>
					<th>Referral Code</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
