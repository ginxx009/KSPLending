<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('home/create_investor/', "class='form-horizontal'"); ?>

<?php if($this->session->flashdata('error')): ?>
	<div id="hideMe" class="alert alert-info">
		<?php echo $this->session->flashdata('error');?>
	</div>
<?php endif;?>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Investment Amount" name="investment_amount" value="<?php echo set_value('investment_amount'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Referral Link" name="referral_link" value="<?php echo set_value('referral_link'); ?>">
			</div>
			<div class="col-md-3">
				<input type="hidden" name="referral_code" value="<?php echo $randomString;?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Last Name" name="lastname" value="<?php echo set_value('lastname'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="First Name" name="firstname" value="<?php echo set_value('firstname'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Middle Name" name="middlename" value="<?php echo set_value('middlename'); ?>" required>
			</div>
			<div class="col-md-3">
				<select class="form-control" id="gender" name="gender" value="<?php echo set_value('gender'); ?>" required>
                    <option value="0">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
              </select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<select class="form-control" id="civilstatus form-field-2" name="civilstatus" value="<?php echo set_value('civilstatus'); ?>">
                    <option value="0">Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Others">Others</option>
              	</select>
			</div>
			<div class="col-md-3">
				<div class="input-group date" data-provide="datepicker">
				 <input type="text" id="form-field-2" class="form-control date-withicon" placeholder="Birthday" name="birthday" value="<?php echo set_value('birthday'); ?>" required/>
				 <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Age" name="age" value="<?php echo set_value('age'); ?>" required>
			</div>
			<div class="col-md-3">
				 <input type="number" id="form-field-2" placeholder="No. Of Dependents" name="dependents" value="<?php echo set_value('dependents'); ?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Name" name="spousefirstname" value="<?php echo set_value('spousefirstname'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Last Name" name="spouselastname" value="<?php echo set_value('spouselastname'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Middle Name" name="spousemiddlename" value="<?php echo set_value('spousemiddlename'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Spouse Age" name="spouseage" value="<?php echo set_value('spouseage'); ?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="input-group date" data-provide="datepicker">
				 <input type="text" id="form-field-2" class="form-control date-withicon" placeholder="Spouse Birthday" name="spousebirthday" value="<?php echo set_value('spousebirthday'); ?>" required/>
				 <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Home Address" name="homeaddress" value="<?php echo set_value('homeaddress'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Zipcode" name="zipcode" value="<?php echo set_value('zipcode'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Length of Stay" name="lengthofstay" value="<?php echo set_value('lengthofstay'); ?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<select class="form-control" id="hometype form-field-2" name="hometype" value="<?php echo set_value('hometype'); ?>" required>
                    <option value="0">Home Type</option>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="LivingWithParentsOrRelative">Living with parents / Relatives</option>
              	</select>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Email Address" name="emailaddress" value="<?php echo set_value('emailaddress'); ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Home Phone Number" name="homephonenumber" value="<?php echo set_value('homephonenumber'); ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Business Phone Number" name="businessphonenumber" value="<?php echo set_value('businessphonenumber'); ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Mobile Number" name="mobilenumber" value="<?php echo set_value('mobilenumber'); ?>" required>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Name Of Business" name="nameofbusiness" value="<?php echo set_value('nameofbusiness'); ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Nature Of Business" name="natureofbusiness" value="<?php echo set_value('natureofbusiness'); ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Address Of Business" name="addressofbusiness" value="<?php echo set_value('addressofbusiness'); ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Years of Business" name="yearsofbusiness" value="<?php echo set_value('yearsofbusiness'); ?>">
			</div>
		</div>
	</div>
	
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-4 col-md-9">
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
