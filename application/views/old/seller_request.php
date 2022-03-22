<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <?php $this->load->view('includes/head'); ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.css">

    <style type="text/css">
        .specialsel {
            height: 50px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none;
            box-shadow: none;
            border: 1px solid #ccc;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            border-radius: 0;
            color: #555;
            display: block;
            width: 100%;
            background-color: #fff;
            background-image: none;
        }
    </style>
    
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
    
    <!-- ================================================== header ===================================================== -->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3><?=$page->headline?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>


    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <form data-toggle="validator" id="signup-form">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
                        <div class="ps-checkout__billing">
                            <div class="form-group form-group--inline">
                                <label>First Name<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="fname" placeholder="First Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid first name" data-error="Minimum of 3 characters" data-required-error="First name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="lname" placeholder="Last Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid last name" data-error="Minimum of 3 characters" data-required-error="Last name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Company Name<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="companyName" placeholder="Company Name" pattern="^[a-zA-Z0-9_. ]+$" data-minlength="3" data-pattern-error="Invalid Company name" data-error="Minimum of 3 characters" data-required-error="Company name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>National Identity Card<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" id="nic" name="nic" placeholder="National Identity Card" data-minlength="10" data-error="National Identity Card is invalid" data-required-error="National Identity Card is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Date of Birth<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" id="dob" name="dob" placeholder="Date of Birth" data-required-error="Date of Birth is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <div class="form-group__content">
                                    <input class="form-control" type="email" name="email" placeholder="Email Address" data-error="Please enter a valid email address." data-remote="<?=base_url()?>checkfields?data=email&input=email&table=staff_users" data-remote-error="Email address already exist" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="number" name="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Country<span>*</span>
                                </label>
                                <div class="form-group__content">
                                    <select class="selectpicker" name="country" id="country" data-live-search="true" data-width="100%" title="Select your Country" data-required-error="Country is required" required>
                                      <?php foreach ($countries as $row) {
                                      ?>
                                        <option value="<?=$row->country_id?>"><?=$row->nicename?></option>
                                      <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Region<span>*</span></label>
                                <div class="form-group__content">
                                    <select class="selectpicker" name="region" id="region" data-live-search="true" data-width="100%" title="Select your Region" required>
                                      
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span></label>
                                <div class="form-group__content">
                                    <textarea class="form-control" name="address" style="resize: none;" placeholder="Address" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>City<span>*</span>
                                </label>
                                <select class="selectpicker" name="city" id="city" data-live-search="true" data-width="100%" title="Select your City" required>
                                      
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Username<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" pattern="[^\s]+" data-minlength="4" data-error="Minimum of 4 characters without space" name="username" placeholder="Username" data-error="Please enter a valid Username." data-remote="<?=base_url()?>checkfields?data=username&input=username&table=staff_users" data-remote-error="Username already exist" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Password<span>*</span></label>
                                <div class="form-group__content">
                                    <input type="password" placeholder="Password" class="form-control" data-minlength="6" class="form-control" name="password" id="password" data-error="Minimum of 6 characters" data-required-error="Password is Required" required>
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
    
    <!-- ================================================ footer ================================================ -->
    <?php $this->load->view('includes/footer'); ?>
    
    <!-- ==================================================== footer script ========================================== -->
    <?php $this->load->view('includes/footerjs'); ?>
    <script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $('.selectpicker').selectpicker({
            style: 'specialsel',
            size: 7
        });
        $('#dob').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('.selectpicker').on( 'hide.bs.select', function ( ) {
            $(this).trigger("focusout");
        });

        $('#country').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>getRegion",
                data: 'country='+$(this).val(),
                success: function(result) {
                var responsedata = $.parseJSON(result);
                    $("#region").empty();
                    for (var i = 0; i < responsedata.length; i++) {
                        if (responsedata[i].region_name!='') {
                            $("#region").append($("<option></option>").attr("value",responsedata[i].reg_id).text(responsedata[i].region_name));
                        }
                    }
                    $("#region").selectpicker('refresh');
                },
                error: function(result) {
                    toastr["error"]('Somthing went wrong :(');
                }
            });
        });

        $('#region').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>getCities",
                data: 'region='+$(this).val(),
                success: function(result) {
                var responsedata = $.parseJSON(result);
                    $("#city").empty();
                    for (var i = 0; i < responsedata.length; i++) {
                        if (responsedata[i].city_name!='') {
                            $("#city").append($("<option></option>").attr("value",responsedata[i].city_id).text(responsedata[i].city_name));
                        }
                    }
                    $("#city").selectpicker('refresh');
                },
                error: function(result) {
                    toastr["error"]('Somthing went wrong :(');
                }
            });
        });

        $('#signup-form').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                $('.selectpicker').each(function() {
                    $(this).trigger("focusout");
                });
            } else {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>submit-request",
                        data: $('#signup-form').serialize(),
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='success'){
                                document.getElementById('signup-form').reset(); 
                                $('#signup-form').find("input").val("");
                                $('#signup-form').find("textarea").val("");
                                $('#signup-form').validator('destroy').validator();
                                $('.selectpicker').selectpicker('refresh');
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
            }
        })
    </script>

</body>

</html>