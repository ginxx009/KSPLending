<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('home/edit/'.$data['id'], "class='form-horizontal'"); ?>

	<div class="row">
		<div class="col-xs-2 col-md-4">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="text" class="form-control" name="loan" id="placeholderInput" value="<?php echo $data['loan']; ?>" placeholder="Loan" readonly>
                  </fieldset>
              </div>
          </div>
		</div>
		<div class="col-xs-2 col-md-4">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="text" class="form-control" name="loan_type" id="placeholderInput" value="<?php echo $data['loan_type']; ?>" placeholder="Loan Type" readonly>
                  </fieldset>
              </div>
          </div>
		</div>
		<div class="col-xs-2 col-md-4">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="number" class="form-control" name="loan_amount" id="placeholderInput" value="<?php echo $data['loan_amount']; ?>" placeholder="Loan Amount" readonly>
                  </fieldset>
              </div>
          	</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="text" class="form-control" name="lastname" id="placeholderInput" value="<?php echo $data['lastname']; ?>" placeholder="Last Name">
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="text" class="form-control" name="firstname" id="placeholderInput" value="<?php echo $data['firstname']; ?>" placeholder="First Name">
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="text" class="form-control" name="middlename" id="placeholderInput" value="<?php echo $data['middlename']; ?>" placeholder="Middle Name">
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                        <select class="form-control" id="gender" name="gender" value="<?php echo set_value('gender'); ?>" required>
		                    <option value="0">Select Gender</option>
		                    <option value="Male">Male</option>
		                    <option value="Female">Female</option>
              			</select>
                  </fieldset>
              </div>
          	</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <select class="form-control" id="civilstatus form-field-2" name="civilstatus" value="<?php echo set_value('civilstatus'); ?>">
	                    <option value="0">Civil Status</option>
	                    <option value="Single">Single</option>
	                    <option value="Married">Married</option>
	                    <option value="Others">Others</option>
	              	</select>
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input id="datepicker" type="text" value="<?php echo set_value('birthday');?>">

					    <script>
					        var datepicker = new ej.calendars.DatePicker({ width: "170px" });
					        datepicker.appendTo('#datepicker');
					    </script>
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="number" class="form-control" name="age" id="placeholderInput" value="<?php echo $data['age']; ?>" placeholder="Age">
                  </fieldset>
              </div>
          	</div>
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="card-block">
              <div class="card-body">
                  <fieldset class="form-group">
                      <input type="number" class="form-control" name="dependents" id="placeholderInput" value="<?php echo $data['dependents']; ?>" placeholder="Dependents">
                  </fieldset>
              </div>
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
