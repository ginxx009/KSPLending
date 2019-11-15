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
		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Logs</th>
				</tr>
			</thead>
			<tbody>
				<?php if($investors[0]['status'] == 1) {?>
				<?php if($data != null) {?>
			<?php $i=1;foreach($data as $rec): ?>
		    <tr>
		        <td><?php echo $rec->date; ?></td>
		        <td><?php echo $rec->history; ?></td>
		    </tr>
			<?php endforeach; ?>
			<?php } ?>
		<?php }else{}?>
			</tbody>
		</table>
	</div>
	
<div><?php echo $links; ?></div>
</div>
