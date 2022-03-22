<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- ========================================== head =================================================================== -->
    <?php $this->load->view('includes/head'); ?>

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    
    <!-- ======================================================== header ========================================================= -->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3><?=$page->headline?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>
    <main class="ps-main">
        <div class="ps-container">
            <div class="ps-contact">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <form class="ps-form--contact" data-toggle="validator" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Full Name <sup>*</sup></label>
                                        <input class="form-control" type="text" name="fname" placeholder="Full Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid full name" data-error="Minimum of 3 characters" data-required-error="Full name is required" required><div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Email <sup>*</sup></label>
                                        <input class="form-control" type="email" name="email" placeholder="Email Address" data-error="Please enter a valid email address." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Mobile <sup>*</sup></label>
                                        <input class="form-control" type="number" name="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Subject <sup>*</sup></label>
                                        <input class="form-control" type="text" name="subject" placeholder="Subject" data-minlength="3" data-error="Minimum of 3 characters" data-required-error="Subject is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your Message <sup>*</sup></label>
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" data-minlength="5" data-error="Minimum of 5 characters" data-required-error="Message is required" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ps-btn pl-60 pr-60">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="ps-contact__info">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="ps-block--contact">
                                        <h3>CONTACT INFO</h3>
                                        <p><i class="fa fa-envelope-o"></i><a href="mailto:info@hexstyle.com">info@hexstyle.com</a></p>
                                        <p><i class="fa fa-phone"></i><a href="callto:+94777223010">(+94) 777 223 010</a></p>
                                        <p><i class="fa fa-phone"></i><a href="callto:+94777361122">(+94) 777 361 122</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="ps-block--contact">
                                        <h3>FOLLOW US</h3>
                                        <ul class="ps-social">
                                            <li><a href="https://www.facebook.com/Hexstyle/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://www.instagram.com/hex_style/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="https://www.pinterest.com/hexstyles/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ==================================================== footer ========================================================== -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
    <!-- ========================================================= footer script ================================================= -->
    <?php $this->load->view('includes/footerjs'); ?>
    <script type="text/javascript">
        $('#contact-form').validator().on('submit', function (e) {
            if (!(e.isDefaultPrevented())) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>send-message",
                    data: $('#contact-form').serialize(),
                    success: function(result) {
                        var responsedata = $.parseJSON(result);
                        if(responsedata.status=='success'){
                            document.getElementById('contact-form').reset(); 
                            $('#contact-form').find("input").val("");
                            $('#contact-form').find("textarea").val("");
                            $('#contact-form').validator('destroy').validator();
                            toastr["success"](responsedata.message)
                        }else{
                            toastr["error"](responsedata.message)
                        }
                    },
                    error: function(result) {
                        toastr["error"]('Error :'+result)
                    }
                });
            }
        });
    </script>
</body>

</html>