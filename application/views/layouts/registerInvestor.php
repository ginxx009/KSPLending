<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>KSP Lending</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div><image src= "<?php echo base_url()?>assets/images/main_logo.png" style="width: 25%;
    height: auto;margin-left: 25%;"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>       
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>        
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Authentication</li>
                                <li>
                                    <a href="<?php echo base_url();?>home/index" class="<?php echo $title == 'Lending System Login' ? 'mm-active' : ' ' ?>">
                                        <i class="metismenu-icon pe-7s-plugin"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>home/registerLender" class="<?php echo $title == 'Register Account' ? 'mm-active' : '' ?>">
                                        <i class="metismenu-icon pe-7s-plugin"></i>
                                        Register
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registration</div>
                                    <div class="card-body">
                                        <?php  
                                          echo '<div class="alert alert-danger">'.$this->session->flashdata("error").'</div>';  
                                        ?>
                                        <form method="post" action="<?php echo base_url(); ?>home/registerInvestorAccount">
                                            <?php if($refcodelink!=null){?>
                                                <?php if($getinvestinfo!=null){ ?>
                                                    <div class="alert alert-info text-center">
                                                        <?php echo $getinvestinfo;?>
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="alert alert-danger text-center">
                                                        Invalid referral link
                                                    </div>
                                                <?php } ?>
                                                <input type="hidden" id="ref_link" class="fadeIn second form-control" value="<?php echo $refcodelink;?>" name="ref_link" placeholder="Referral Link" required>
                                            <?php }else{ ?>
                                              <div class="form-group">
                                                <input type="text" id="ref_link" class="fadeIn second form-control" name="ref_link" placeholder="Referral Link" required>
                                                <span class="text-danger"><?php echo form_error('ref_link'); ?> </span>
                                              </div>
                                            <?php } ?>
                                                <input type="hidden" id="ref_code" class="fadeIn second form-control" name="ref_code" value="<?php echo $randomString;?>">
                                                <input type="number" id="invest_amount" class="fadeIn second form-control" name="invest_amount" placeholder="Lend Amount" style="display:none">
                                        
                                              <div class="form-group">
                                                <input type="text" id="username" class="fadeIn second form-control" name="username" placeholder="Username" required>
                                                <span class="text-danger"><?php echo form_error('username'); ?> </span>
                                              </div>
                                        
                                              <div class="form-group">
                                                <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Password" required>
                                                <span class="text-danger"><?php echo form_error('password'); ?> </span>
                                              </div>
                                        
                                              <div class="form-group">
                                                <input type="password" id="confirmpassword" class="fadeIn third form-control" name="confirmpassword" placeholder="Confirm Password" required>
                                                <span class="text-danger"><?php echo form_error('password'); ?> </span>
                                              </div>
                                          
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <button class="btn btn-info center-block" type="submit">
                                                  Register
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-right">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            Developed by:
                                            <a href="#">
                                               ksplending IT Department
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>    </div>
                <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url()?>/assets/scripts/main.js"></script></body>
</html>
