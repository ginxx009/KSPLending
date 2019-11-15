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
	<a class="btn btn-info btn-min-width mr-1 mb-1 pull-right" href="<?php echo site_url('home/create'); ?>"><i class="la la-plus-circle"></i>Add Lendee</a>
	<!--<a class="btn btn-info btn-min-width mr-1 mb-1 pull-right" href="<?php echo site_url('home/create_investor'); ?>"><i class="la la-plus-circle"></i>Add Lender</a>-->


	<div class="table-responsive">
		<table id="table" class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Loan</th>
					<th>Loan Type</th>
					<th>Loan Amount</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
                <tr>
                    <th>Loan</th>
					<th>Loan Type</th>
					<th>Loan Amount</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Action</th>
                </tr>
            </tfoot>
		</table>
	</div>
</div>
