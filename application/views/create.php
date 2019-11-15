<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('home/create/', "class='form-horizontal'"); ?>
	
	<div class=form-group>
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="loan" class="">Select Loan</label>
	                <select class="form-control" id="loan form-field-2" name="loan" value="<?php echo set_value('loan'); ?>" required>
	                    <option value="0">Select Loan</option>
			            <option value="First Loan Application">First Loan Application</option>
			            <option value="Renewal">Renewal</option>
	              	</select>
	            </div>
        	</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
					<label for="loan" class="">Select Loan</label>
					<div id="loantype">
						<select class="form-control" id="loan_type form-field-2" name="loan_type" value="<?php echo set_value('loan_type'); ?>" required>
		                    <option value="0">Select Loan Type</option>
				            <option value="Personal">Personal</option>
		              		<option value="Business">Business</option>
		              	</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="loan_amount" class="">Loan Amount</label>
	                <input type="number" name="loan_amount" id="loan_amount" placeholder="Loan Amount" class="form-control" value="<?php echo set_value('loan_amount');?>" required>
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="lastname" class="">Last Name</label>
	                <input type="text" name="lastname" id="lastname" placeholder="Last Name"  class="form-control" value="<?php echo set_value('lastname');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="firstname" class="">First Name</label>
	                <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control" value="<?php echo set_value('firstname');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="middlename" class="">Middle Name</label>
	                <input type="text" name="middlename" id="middlename" placeholder="Middle Name" type="text" class="form-control" value="<?php echo set_value('middlename');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="gender" class="">Gender</label>
	                <select class="form-control" id="gender form-field-2" name="gender" value="<?php echo set_value('gender'); ?>" required>
	                    <option value="0">Select Gender</option>
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option>
	              	</select>
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="civilstatus" class="">Civil Status</label>
	                <select class="form-control" id="civilstatus form-field-2" name="civilstatus" value="<?php echo set_value('civilstatus'); ?>">
	                    <option value="0">Civil Status</option>
	                    <option value="Single">Single</option>
	                    <option value="Married">Married</option>
	                    <option value="Others">Others</option>
	              	</select>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="birthday" class="">Birthday</label>
	                <input type="text" class="form-control" id="datepicker-13" name="birthday" value="<?php echo set_value('birthday'); ?>">
	              	</select>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="age" class="">Age</label>
	                <input type="number" name="age" id="age" placeholder="Age" class="form-control" value="<?php echo set_value('age');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="dependents" class="">No of Dependents</label>
	                <input type="number" name="dependents" id="dependents" placeholder="Dependents" class="form-control" value="<?php echo set_value('dependents');?>" required>
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="spousefirstname" class="">Spouse's First Name</label>
	                <input type="text" name="spousefirstname" id="spousefirstname" placeholder="Spouse's First Name" class="form-control" value="<?php echo set_value('spousefirstname');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="spouselastname" class="">Spouse's Last Name</label>
	                <input type="text" name="spouselastname" id="spouselastname" placeholder="Spouse's Last Name" class="form-control" value="<?php echo set_value('spouselastname');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="spousemiddlename" class="">Spouse's Middle Name</label>
	                <input type="text" name="spousemiddlename" id="spousemiddlename" placeholder="Spouse's Middle Name" class="form-control" value="<?php echo set_value('spousemiddlename');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="spouseage" class="">Spouse Age</label>
	                <input type="number" name="spouseage" id="spouseage" placeholder="Spouse Age" class="form-control" value="<?php echo set_value('spouseage');?>" required>
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="spousebirthday" class="">Spouse Birthday</label>
	                <input type="text" class="form-control" id="datepicker-14" name="spousebirthday" value="<?php echo set_value('spousebirthday'); ?>">
	              	</select>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="homeaddress" class="">Home Address</label>
	                <input type="text" name="homeaddress" id="homeaddress" placeholder="Home Address" class="form-control" value="<?php echo set_value('homeaddress');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="zipcode" class="">Zip code</label>
	                <input type="number" name="zipcode" id="zipcode" placeholder="Zip code" class="form-control" value="<?php echo set_value('zipcode');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
	            <div class="position-relative form-group">
	                <label for="hometype" class="">Home Type</label>
	                <select class="form-control" id="hometype form-field-2" name="hometype" value="<?php echo set_value('hometype'); ?>">
	                    <option value="0">Home Type</option>
	                    <option value="Owned">Owned</option>
	                    <option value="Rented">Rented</option>
	                    <option value="LivingWithParentsOrRelative">Living with parents / Relatives</option>
	              	</select>
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="lengthofstay" class="">Length Of Stay</label>
	                <input type="number" name="lengthofstay" id="lengthofstay" placeholder="Length Of Stay" class="form-control" value="<?php echo set_value('lengthofstay');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="emailaddress" class="">Email Address</label>
	                <input type="email" name="emailaddress" id="emailaddress" placeholder="Email Address" class="form-control" value="<?php echo set_value('emailaddress');?>" required>
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="homephonenumber" class="">Home Phone Number</label>
	                <input type="number" name="homephonenumber" id="homephonenumber" placeholder="Home Phone Number" class="form-control" value="<?php echo set_value('homephonenumber');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="businessphonenumber" class="">Business Phone Number</label>
	                <input type="number" name="businessphonenumber" id="businessphonenumber" placeholder="Business Phone Number" class="form-control" value="<?php echo set_value('businessphonenumber');?>">
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="mobilenumber" class="">Mobile Number</label>
	                <input type="number" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number" class="form-control" value="<?php echo set_value('mobilenumber');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="nameofbusiness" class="">Name Of Business</label>
	                <input type="text" name="nameofbusiness" id="nameofbusiness" placeholder="Name Of Business" class="form-control" value="<?php echo set_value('nameofbusiness');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="natureofbusiness" class="">Nature Of Business</label>
	                <input type="text" name="natureofbusiness" id="natureofbusiness" placeholder="Nature Of Business" class="form-control" value="<?php echo set_value('natureofbusiness');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="addressofbusiness" class="">Address Of Business</label>
	                <input type="text" name="addressofbusiness" id="addressofbusiness" placeholder="Address Of Business" class="form-control" value="<?php echo set_value('addressofbusiness');?>">
	            </div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="yearsofbusiness" class="">Years Of Business</label>
	                <input type="text" name="yearsofbusiness" id="yearsofbusiness" placeholder="Years Of Business" class="form-control" value="<?php echo set_value('yearsofbusiness');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="nameofcomaker" class="">Name of Co maker</label>
	                <input type="text" name="nameofcomaker" id="nameofcomaker" placeholder="Name of Co maker" class="form-control" value="<?php echo set_value('nameofcomaker');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="addressofcomaker" class="">Address of Co maker</label>
	                <input type="text" name="addressofcomaker" id="addressofcomaker" placeholder="Address of Co maker" class="form-control" value="<?php echo set_value('addressofcomaker');?>">
	            </div>
			</div>
			<div class="col-md-3">
				<div class="position-relative form-group">
	                <label for="numberofcomaker" class="">Number of Co maker</label>
	                <input type="text" name="numberofcomaker" id="numberofcomaker" placeholder="Number of Co maker" class="form-control" value="<?php echo set_value('numberofcomaker');?>">
	            </div>
			</div>
		</div>
	</div>
	
	<button type="submit" class="mt-1 btn btn-primary">Submit</button>
	<button type="reset" class="mt-1 btn btn-info">Reset</button>
</form>
