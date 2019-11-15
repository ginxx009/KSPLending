<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('home/pay/'.$data['id'], "class='form-horizontal'"); ?>

	<div class=form-group>
		<div class="row">
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Loan" name="loan" value="<?php echo $data['loan']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Loan Type" name="loan_type" value="<?php echo $data['loan_type']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Loan Amount" name="loan_amount" value="<?php echo $data['loan_amount']; ?>" readonly>
			</div>
		</div>
	</div>

	<div class=form-group>
		<div class="row">
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="First Name" name="firstname" value="<?php echo $data['firstname']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Last Name" name="lastname" value="<?php echo $data['lastname']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Middle Name" name="middlename" value="<?php echo $data['middlename']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Cash Amount" name="cash_amount" value="<?php echo set_value('cash_amount'); ?>">
			</div>
		</div>
	</div>

	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info center-block" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
