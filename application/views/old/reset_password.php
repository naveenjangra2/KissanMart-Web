<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <?php $this->load->view('includes/head'); ?>
    <!-- ============================================= head ===================================================== -->

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        svg {
          width: 100px;
          display: block;
          margin: 40px auto 0;
        }
        @-webkit-keyframes dash {
          0% {
            stroke-dashoffset: 1000;
          }
          100% {
            stroke-dashoffset: 0;
          }
        }
        @keyframes dash {
          0% {
            stroke-dashoffset: 1000;
          }
          100% {
            stroke-dashoffset: 0;
          }
        }
        @-webkit-keyframes dash-check {
          0% {
            stroke-dashoffset: -100;
          }
          100% {
            stroke-dashoffset: 900;
          }
        }
        @keyframes dash-check {
          0% {
            stroke-dashoffset: -100;
          }
          100% {
            stroke-dashoffset: 900;
          }
        }
    </style>
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <!-- header ============================================================================================================-->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3><?=$page->headline?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>

    <?php if($valid==2||$valid==3){?>
        <div class="ps-content pt-30 pb-80">
            <div class="ps-container" style="text-align: center;">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                </svg>

                <div style="margin: 40px 10% 0;line-height: 2em;">
                  <?php if($valid==2){?>
                    <p><strong>SORRY!!</strong> This link is expired.</p>
                    <p>Please get a new link from provid your email in the signin page.</p>
                    <p>Thank You</p>
                    <p>Have a Wonderful day.</p>
                  <?php }elseif ($valid==3) {?>
                    <p><strong>SORRY!!</strong> This link is invalid.</p>
                    <p>Please get a new link from provid your email in the signin page.</p>
                    <p>Thank You</p>
                    <p>Have a Wonderful day.</p>
                  <?php } ?>
                </div>

                <h5 class="countdownDiv">
                  Back to home after <b id="countdown">10</b> seconds
                </h5>
            </div>
        </div>
    <?php }elseif ($valid==1) {?>
        <div class="ps-content pt-30 pb-80">
            <div class="ps-container" style="text-align: center;">
                
                <form data-toggle="validator" id="reset-form">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
                            <div class="ps-checkout__billing">
                                <div class="form-group form-group--inline">
                                    <label>New Password<span>*</span></label>
                                    <div class="form-group__content">
                                        <input type="password" placeholder="New Password" class="form-control" data-minlength="6" class="form-control" name="password" id="password" data-error="Minimum of 6 characters" data-required-error="New Password is Required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group form-group--inline">
                                    <label>Confirm Password<span>*</span></label>
                                    <div class="form-group__content">
                                        <input type="password" class="form-control" data-match="#password" data-match-error="Password doesn't match" placeholder="Confirm password" data-required-error="Confirm Password is Required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php } ?>
    <!-- ======================================================= Footer ================================================================ -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
   <!-- ===================================================== footer script =========================================================== -->
    <?php $this->load->view('includes/footerjs'); ?>

    <script type="text/javascript">
        <?php if($valid==2||$valid==3){?>
          var seconds = 10;
          function countdown() {
              seconds = seconds - 1;
              if (seconds < 0) {
                window.location = "<?=base_url()?>";
              } else {
                  document.getElementById("countdown").innerHTML = seconds;
                  window.setTimeout("countdown()", 1000);
              }
          }
          countdown();
        <?php }elseif ($valid==1) {?>
            $('#reset-form').validator().on('submit', function (e) {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>reset-pass",
                        data: $('#reset-form').serialize(),
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='success'){
                                toastr["success"](responsedata.message)
                                document.getElementById('reset-form').reset(); 
                                $('#reset-form').find("input").val("");
                            }else{
                                toastr["error"](responsedata.message)
                            }
                            setTimeout(function(){
                                window.location = "<?=base_url()?>";
                            }, 500);
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            });
        <?php } ?>
    </script>

</body>

</html>