<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>
 
<?php echo form_open('investor/setupAccount/' . $this->session->userdata('refcode'), "class='form-horizontal'"); ?>

<?php if($this->session->flashdata('error')): ?>
	<div id="hideMe" class="alert alert-info">
		<?php echo $this->session->flashdata('error');?>
	</div>
<?php endif;?>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="" class="">Lenders Amount</label>
				<input type="number" id="investment_amount" class="form-control" name="investment_amount" placeholder="Investment Amount" value="<?php echo $data[0]['investment_amount'];?>" readonly>
			</div>
			<div class="col-md-3">
				<label for="" class="">Referal Link</label>
				<input type="text" class="form-control" placeholder="Referral Link" name="referral_link" value="<?php echo $data[0]['referral_link']; ?>" readonly>
			</div>
			<div class="col-md-3">
				<input type="hidden" name="referral_code" value="<?php echo $data[0]['referal_code'];?>">
			</div>
			<div class="col-md-3">
				<input type="hidden" name="id" value="<?php echo $data[0]['id'];?>">
			</div>
			<div class="col-md-3">
				<input type="hidden" name="status" value="<?php echo $data[0]['status'];?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="">Last Name</label>
				<input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $data[0]['lastname']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="">First Name</label>
				<input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $data[0]['firstname']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="">Middle Name</label>
				<input type="text" class="form-control" placeholder="Middle Name" name="middlename" value="<?php echo $data[0]['middlename']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="">Select Gender</label>
				<select class="form-control" id="gender" name="gender" value="<?php echo $data[0]['gender']; ?>" required>
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
				<label for="">Civil Status</label>
				<select class="form-control" id="civilstatus form-field-2" name="civilstatus" value="<?php echo $data[0]['civilstatus']; ?>">
                    <option value="0">Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Others">Others</option>
              	</select>
			</div>
			<div class="col-md-3">
				<label for="" >Birthday</label>
				<input type="text" id="datepicker-15" class="form-control date-withicon" name="birthday" value="<?php echo $data[0]['birthday']; ?>" required/>

			</div>
			<div class="col-md-3">
				<label for="" >Age</label>
				<input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $data[0]['age']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="" >Number of Dependents</label>
				 <input type="number" class="form-control" placeholder="No. Of Dependents" name="dependents" value="<?php echo $data[0]['dependents']; ?>" required>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="" >Spouse First Name</label>
				<input type="text" class="form-control" placeholder="Spouse Name" name="spousefirstname" value="<?php echo $data[0]['spousefirstname']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Spouse Last Name</label>
				<input type="text" class="form-control" placeholder="Spouse Last Name" name="spouselastname" value="<?php echo $data[0]['spouselastname']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Spouse Middle Name</label>
				<input type="text" class="form-control" placeholder="Spouse Middle Name" name="spousemiddlename" value="<?php echo $data[0]['spousemiddlename']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Spouse Age</label>
				<input type="number" class="form-control" placeholder="Spouse Age" name="spouseage" value="<?php echo $data[0]['spouseage']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="" >Spouse Birthday</label>
				<input type="text" id="datepicker-16" class="form-control date-withicon" name="spousebirthday" value="<?php echo $data[0]['spousebirthday']; ?>" />
			</div>
			<div class="col-md-3">
				<label for="" >Home Address</label>
				<input type="text" class="form-control" placeholder="Home Address" name="homeaddress" value="<?php echo $data[0]['homeaddress']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="" >Zip code</label>
				<input type="number" class="form-control" placeholder="Zipcode" name="zipcode" value="<?php echo $data[0]['zipcode']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="" >Home Type</label>
				<select class="form-control" id="hometype form-field-2" name="hometype" value="<?php echo $data[0]['hometype']; ?>" required>
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
				<label for="" >Length Of Stay</label>
				<input type="number" class="form-control" placeholder="Length of Stay" name="lengthofstay" value="<?php echo $data[0]['lengthofstay']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="" >Email Address</label>
				<input type="text" class="form-control" placeholder="Email Address" name="emailaddress" value="<?php echo $data[0]['emailaddress']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Home Phone Number</label>
				<input type="number" class="form-control" placeholder="Home Phone Number" name="homephonenumber" value="<?php echo $data[0]['homephonenumber']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Business Phone Number</label>
				<input type="number" class="form-control" placeholder="Business Phone Number" name="businessphonenumber" value="<?php echo $data[0]['businessphonenumber']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="" >Mobile Number</label>
				<input type="number" class="form-control" placeholder="Mobile Number" name="mobilenumber" value="<?php echo $data[0]['mobilenumber']; ?>" required>
			</div>
			<div class="col-md-3">
				<label for="" >Name of Business</label>
				<input type="text" class="form-control" placeholder="Name Of Business" name="nameofbusiness" value="<?php echo $data[0]['nameofbusiness']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Nature of Business</label>
				<input type="text" class="form-control" placeholder="Nature Of Business" name="natureofbusiness" value="<?php echo $data[0]['natureofbusiness']; ?>">
			</div>
			<div class="col-md-3">
				<label for="" >Address of Business</label>
				<input type="text" class="form-control" placeholder="Address Of Business" name="addressofbusiness" value="<?php echo $data[0]['addressofbusiness']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3">
				<label for="" >Years of business</label>
				<input type="number" class="form-control" placeholder="Years of Business" name="yearsofbusiness" value="<?php echo $data[0]['yearsofbusiness']; ?>">
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
