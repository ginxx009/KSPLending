<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('home/edit_investor/'.$data['id'], "class='form-horizontal'"); ?>

	<div class=form-group>
		<div class="row">
			<div class="col-sm-3">
				<input type="number" id="form-field-2" placeholder="Investment Amount" name="investment_amount" value="<?php echo $data['investment_amount']; ?>" >
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Referral Link" name="referral_link" value="<?php echo $data['referral_link']; ?>" readonly>
			</div>
			<div class="col-sm-3">
				<input type="hidden" id="form-field-2" placeholder="Investment Amount" name="referral_code" value="<?php echo $data['referal_code']; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Middle Name" name="middlename" value="<?php echo $data['middlename']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="First Name" name="firstname" value="<?php echo $data['firstname']; ?>">
			</div>
			<div class="col-sm-3">
				<input type="text" id="form-field-2" placeholder="Last Name" name="lastname" value="<?php echo $data['lastname']; ?>">
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
				 <input type="text" id="form-field-2" class="form-control date-withicon" placeholder="Birthday" name="birthday" value="<?php echo $data['birthday']; ?>"/>
				 <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Age" name="age" value="<?php echo $data['age']; ?>">
			</div>
			<div class="col-md-3">
				 <input type="number" id="form-field-2" placeholder="No. Of Dependents" name="dependents" value="<?php echo $data['dependents']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Name" name="spousefirstname" value="<?php echo $data['spousefirstname']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Last Name" name="spouselastname" value="<?php echo $data['spouselastname']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Spouse Middle Name" name="spousemiddlename" value="<?php echo $data['spousemiddlename']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Spouse Age" name="spouseage" value="<?php echo $data['spouseage']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="input-group date" data-provide="datepicker">
				 <input type="text" id="form-field-2" class="form-control date-withicon" placeholder="Spouse Birthday" name="spousebirthday" value="<?php echo $data['spousebirthday']; ?>"/>
				 <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Home Address" name="homeaddress" value="<?php echo $data['homeaddress']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Zipcode" name="zipcode" value="<?php echo $data['zipcode']; ?>">
			</div>
			<div class="col-md-3">
				<select class="form-control" id="hometype form-field-2" name="hometype" value="<?php echo $data['hometype']; ?>" required>
                    <option value="0">Home Type</option>
                    <option value="Owned">Owned</option>
                    <option value="Rented">Rented</option>
                    <option value="LivingWithParentsOrRelative">Living with parents / Relatives</option>
              	</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Length of Stay" name="lengthofstay" value="<?php echo $data['lengthofstay']; ?>">
			</div>
			<div class="col-md-3">
				<select class="form-control" id="civilstatus form-field-2" name="civilstatus" value="<?php echo set_value('civilstatus'); ?>">
                    <option value="0">Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Others">Others</option>
              	</select>
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Email Address" name="emailaddress" value="<?php echo $data['emailaddress']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Home Phone Number" name="homephonenumber" value="<?php echo $data['homephonenumber']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Business Phone Number" name="businessphonenumber" value="<?php echo $data['businessphonenumber']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Mobile Number" name="mobilenumber" value="<?php echo $data['mobilenumber']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Name Of Business" name="nameofbusiness" value="<?php echo $data['nameofbusiness']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Nature Of Business" name="natureofbusiness" value="<?php echo $data['natureofbusiness']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<input type="text" id="form-field-2" placeholder="Address Of Business" name="addressofbusiness" value="<?php echo $data['addressofbusiness']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Years of Business" name="yearsofbusiness" value="<?php echo $data['yearsofbusiness']; ?>">
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Bonus" name="bonus" value="<?php echo $data['bonus']; ?>" readonly>
			</div>
			<div class="col-md-3">
				<input type="number" id="form-field-2" placeholder="Package" name="package" value="<?php echo $data['package']; ?>"readonly>
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
