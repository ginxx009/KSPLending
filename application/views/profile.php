<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-body">
	<div id="user-profile">
		<div class="row">
		<div class="col-sm-12 col-xl-8">
		  <div class="media d-flex m-1 ">
		    <div class="align-left p-1">
		      <a href="#" class="profile-image">
		        <img src="<?php echo base_url()?>assets/images/avatar/profile-pic.jpg" class="rounded-circle img-border height-100" alt="Card image">
		      </a>
		    </div>
		    <div class="media-body text-left  mt-1">
		      <h3 class="font-large-1 black"><?php echo $data['firstname'] . " " . $data['lastname'] . " " . $data['middlename']; ?></h3>
		      <p class="black">
		        <i class="ft-map-pin black"> </i> <?php echo $data['homeaddress']?> </p>
		    </div>
		  </div>
		</div>
		</div>
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
		  <div class="card">
		    <div class="card-header pb-0">
		      <div class="card-title-wrap bar-primary">
		        <div class="card-title">Work History</div>
		        <hr>
		      </div>
		    </div>
		    <div class="card-content">
		      <div class="card-body p-0 pt-0 pb-1">
		      	<div class="row">
		      		<div class="col-md-6">
		      			<ul>
							<li>
								<strong>Date of loan :</strong>
								<?php echo $data['dateofloan'];?>
							</li>
							<li>
								<strong>Loan :</strong>
								<?php echo $data['loan']; ?>
							</li>
							<li>
							  	<strong>Loan Amount :</strong> 
								<?php echo $data['loan_amount']; ?>
							</li>
							<li>
							  	<strong>Loan Type :</strong>
							    <?php echo $data['loan_type'];?>
							</li>
				        </ul>
		      		</div>
		      		<div class="col-md-6">
		      			<ul>
							<li>
								<strong>Gender :</strong>
								<?php echo $data['gender'];?>
							</li>
							<li>
								<strong>Civil Status :</strong>
								<?php echo $data['civilstatus']; ?>
							</li>
							<li>
							  	<strong>Birthday :</strong> 
								<?php echo $data['birthday']; ?>
							</li>
							<li>
							  	<strong>Age :</strong>
							    <?php echo $data['age'];?>
							</li>
				        </ul>
		      		</div>
		      	</div>
		        
		      </div>
		    </div>

		  </div>
		  <div class="card">
		    <div class="card-header pb-0">
		      <div class="card-title-wrap bar-primary">
		        <div class="card-title">Other Details</div>
		        <hr>
		      </div>
		    </div>
		    <div class="card-content">
		      <div class="card-body p-0 pt-0 pb-1">
		      	<div class="row">
		      		<div class="col-md-4">
		      		 	<ul>
							<li>
								<strong>Dependents: </strong>
								<?php echo $data['dependents'];?>
							</li>
							<li>
								<strong>Spouse Full Name </strong> 
								<?php echo $data['spousefirstname'] . " " .$data['spouselastname'] . " " .$data['spousemiddlename'];?>
							</li>
							<li>
								  <strong>Spouse Age: </strong> 
							 	  <?php echo $data['spouseage']; ?>
							</li>
							<li>
								  <strong>Spouse Birthday: </strong> 
							 	  <?php echo $data['spousebirthday']; ?>
							</li>
				        </ul>
		      		</div>
		      		<div class="col-md-4">
		      		 	<ul>
							<li>
								<strong>Home Phone Number :</strong>
								<?php echo $data['homephonenumber'];?>
							</li>
							<li>
								<strong>Business Phone Number :</strong> 
								<?php echo $data['businessphonenumber']; ?>
							</li>
							<li>
								  <strong>Mobile Number: </strong> 
							 	  <?php echo $data['mobilenumber']; ?>
							</li>
							<li>
								  <strong>Name Of Business: </strong> 
							 	  <?php echo $data['nameofbusiness']; ?>
							</li>
				        </ul>
		      		</div>
		      		<div class="col-md-4">
		      		 	<ul>
							<li>
								<strong>Nature Of Business :</strong>
								<?php echo $data['natureofbusiness'];?>
							</li>
							<li>
								<strong>Address Of Business :</strong> 
								<?php echo $data['addressofbusiness']; ?>
							</li>
							<li>
								  <strong>Years Of Business: </strong> 
							 	  <?php echo $data['yearsofbusiness']; ?>
							</li>
							<li>
								  <strong>Name Of Business: </strong> 
							 	  <?php echo $data['nameofbusiness']; ?>
							</li>
				        </ul>
		      		</div>
		      	</div>
		      </div>
		    </div>
		  </div>
		  <div class="card">
		    <div class="card-header pb-0">
		      <div class="card-title-wrap bar-primary">
		        <div class="card-title">Co Makers Details</div>
		        <hr>
		      </div>
		    </div>
		    <div class="card-content">
		      <div class="card-body p-0 pt-0 pb-1">
		      	<div class="row">
		      		<div class="col-md-12">
		      		 	<ul>
							<li>
								<strong>Name Of Co Maker :</strong>
								<?php echo $data['nameofcomaker'];?>
							</li>
							<li>
								<strong>Address Of Co Maker :</strong> 
								<?php echo $data['addressofcomaker'];?>
							</li>
							<li>
								  <strong>Number Of Co Maker: </strong> 
							 	  <?php echo $data['numberofcomaker']; ?>
							</li>
				        </ul>
		      		</div>
		      	</div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>