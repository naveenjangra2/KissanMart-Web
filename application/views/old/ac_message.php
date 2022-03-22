<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
   
    <!-- ================================================== head ================================================= -->
    <?php $this->load->view('includes/achead'); ?>

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">

    </style>
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <?php $this->load->view('includes/account_header'); ?>
    <!--include ../partials/module/subscribe-popup-->
    <div class="ps-template-3">
        <div class="ps-hero mb-20">
            <div class="container">
                <h3>Messages</h3>
            </div>
        </div>
        <div class="ps-content">
            <div class="table-responsive">
                <table class="table ps-address-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td colspan="4" style="text-align: center;">No Messages</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JS Library-->
    <!-- ======================================================footer script ======================================== -->
    <?php $this->load->view('includes/acfootjs'); ?>
    <script type="text/javascript">
        
        
    </script>
</body>

</html>