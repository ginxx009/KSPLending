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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    <link href="<?php echo base_url()?>assets/ksp/main.css" rel="stylesheet"></head>
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
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <!--<img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">-->
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a class="btn dropdown-item" href="<?php echo base_url(). 'home/logout'?>">Logout</a>
                                        </div>
                                    </div>
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
                            <li class="app-sidebar__heading">Main</li>
                            <li class="<?php echo $title == 'Home' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/admin_dashboard" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="<?php echo $title == 'Logs' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/logs" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Logs
                                </a>
                            </li>
                            <li class="<?php echo $title == 'Balance' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/balance" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Balance
                                </a>
                            </li>
                            <li class="<?php echo $title == 'Investors' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/investors" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Lenders
                                </a>
                            </li>
                            <li class="<?php echo $title == 'Cashout' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/cashout_pending" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Cashout Pending
                                </a>
                            </li>
                            <li class="<?php echo $title == 'Lenders Amount Request' ? 'mm-active' : '' ?>">
                                <a href="<?php echo base_url();?>home/lendersfee_request" class=>
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Lenders Amount Request
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php echo $contents; ?>
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
                </div>    
            </div>
        </div>
    </div>
    
  <div class="modal fade" id="modal-proof">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">
          <div class="modal-header" style="background-color: #ffffff;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="color: #000000;">Proof Of Payment</h4>
          </div>
          <div class="modal-body" id="viewproof">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- DATATABLE -->
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable.js"  type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/assets/ksp/scripts/main.js"></script>

     <script>
         
        $('.btn-proof-show').click(function(){
        //   $("#viewproof").empty();
        //   var orderid = $(this).data('orderid');
        //   var display_proof = "<img src='<?php echo base_url() ?>uploads/proof/"+orderid+".jpg' class='proof-img' width='100%'>";
        //   $("#viewproof").append(display_proof);
        //   $('#modal-proof').modal('show');
            alert('hahaha');
        });
        
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-14" ).datepicker();
         });
        
      </script>

</body>
</html>
