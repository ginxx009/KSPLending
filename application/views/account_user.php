<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-plugin"></i>
            </div>
            <div>User Account
                <div class="page-title-subheading">
                    Referral links and code are located here.
                </div>
                <!-- <div class="page-title-subheading">
                    Before you're account is fully activated, please wait the approval of your account, we are now veriying your information. Thank you.
                </div> -->
            </div>
        </div>
    </div>
</div>  
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Referral Code</div>
                    <div class="widget-subheading">
                        <span id="refcode"><?php echo $this->session->userdata('refcode');?> </span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white">
                        <button type="button"  onclick="copyToClipboard('#refcode')" class="btn-shadow btn btn-info">
                            Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-12">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Referral Link</div>
                    <div class="widget-subheading">
                        <span id="reflink"><?php echo base_url(); ?>home/registerLender/<?php echo $this->session->userdata('refcode');?> </span>
                    </div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white">
                        <button type="button"  onclick="copyToClipboard('#reflink')" class="btn-shadow btn btn-info">
                            Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

