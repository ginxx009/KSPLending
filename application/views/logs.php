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
		<table id="history_table" class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Date</th>
					<th>Logs</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
