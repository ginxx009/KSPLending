<!DOCTYPE html>  
<html>  
<head>  
    <title><?php echo $title; ?></title>  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/customize.css')?>">
</head>  
<body>  

<div class="navbar navbar-default">
  <div class="container">
      <h2><span class="glyphicon glyphicon-home"></span>&nbsp;LENDING SYSTEM</h2>
  </div>
</div>

<div class="container">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <br>
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="<?php echo base_url('assets/images/lending.png')?>" id="icon" alt="User Icon" />
      </div>
      <br>
      <!-- Login Form -->
      <form method="post" action="<?php echo base_url(); ?>home/registration">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group">
              <input type="text" id="username" class="fadeIn second form-control" name="username" placeholder="Username" required>
              <span class="text-danger"><?php echo form_error('username'); ?> </span>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group">
              <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Password" required>
              <span class="text-danger"><?php echo form_error('password'); ?> </span>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group">
              <input type="password" id="confirmpassword" class="fadeIn third form-control" name="confirmpassword" placeholder="Confirm Password" required>
              <span class="text-danger"><?php echo form_error('password'); ?> </span>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group">
              <select class="accountType form-control" id="accountType " name="accountType" value="<?php echo set_value('accountType');?>" required>
                  <option value="">Select Account Type</option>
                  <option value="1">Admin</option>
                  <option value="2">Cashier</option>
              </select> 
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <input type="submit" name="insert" class="fadeIn fourth" value="register">
          <?php  
            echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
          ?>
        </div>

      </form>
    </div>
  </div>
</div>  
 </body>  
 </html>  