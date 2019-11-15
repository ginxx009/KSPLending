<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="user-profile-1" class="user-profile row">
	<div class="col-xs-12 col-sm-3 center">
		<div>
			<span class="profile-picture">
				<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="<?php echo base_url();?>assets/avatars/profile-pic.jpg"></img>
			</span>

			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon fa fa-circle light-green"></i>
						&nbsp;
						<span class="white"><?php echo $data['firstname']; ?></span>
					</a>
				</div>
			</div>
			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon light-green"></i>
						&nbsp;
						<span class="white">Package: <?php echo $data['package']; ?></span>
					</a>
				</div>
			</div>
			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon light-green"></i>
						&nbsp;
						<span class="white">BONUS: <?php echo $data['bonus']; ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-9">
	    <img src="<?php echo base_url();?>uploads/proof/<?php echo $indet;?>.jpg" style="width: 100%;">
		<!--<div class="profile-user-info profile-user-info-striped">-->
		 <!--   <div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Investment Amount </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['investment_amount']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Investment Amount </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['investment_amount']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> First Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['firstname']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Middle Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['middlename']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->

			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Last Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['lastname']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Gender </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['gender']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Civil Status </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['civilstatus']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Birthday </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['birthday']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> age </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['age']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Dependents </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['dependents']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Spouse First Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['spousefirstname']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Spouse Last Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['spouselastname']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Spouse Middle Name </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['spousemiddlename']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Spouse Age </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['spouseage']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Spouse Birthday </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['spousebirthday']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Home Address </div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['homeaddress']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Zip Code</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['zipcode']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Home Phone Number</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['homephonenumber']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Business Phone Number</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['businessphonenumber']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Mobile Number</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['mobilenumber']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Name Of Business</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['nameofbusiness']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Nature Of Business</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['natureofbusiness']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Address Of Business</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['addressofbusiness']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="profile-info-row">-->
			<!--	<div class="profile-info-name"> Years Of Business</div>-->

			<!--	<div class="profile-info-value">-->
			<!--		<span><?php echo $data['yearsofbusiness']; ?></span>-->
			<!--	</div>-->
			<!--</div>-->
		<!--</div>-->

		<div class="hr hr2 hr-double"></div>
	</div>
</div>