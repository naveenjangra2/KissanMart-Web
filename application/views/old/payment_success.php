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

    <div class="ps-content pt-30 pb-80">
        <div class="ps-container" style="text-align: center;">
            <div class="check_mark">
              <div class="sa-icon sa-success animate">
                <span class="sa-line sa-tip animateSuccessTip"></span>
                <span class="sa-line sa-long animateSuccessLong"></span>
                <div class="sa-placeholder"></div>
                <div class="sa-fix"></div>
              </div>
            </div>

            <div style="margin: 0px 10%;line-height: 2em;">
              <?=$page->page_text?>
            </div>

            <h5 class="countdownDiv">
              Back to home after <b id="countdown">10</b> seconds
            </h5>
        </div>
    </div>
    
    <!-- ======================================================= Footer ================================================================ -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
   <!-- ===================================================== footer script =========================================================== -->
    <?php $this->load->view('includes/footerjs'); ?>

    <script type="text/javascript">
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
    </script>

</body>

</html>