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
                <h3>Profile</h3>
            </div>
        </div>
        <div class="ps-content pr-10 pl-10">
            <form data-toggle="validator" id="profile-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>First Name<span>*</span></label>
                            <div class="form-group__content">
                                <input class="form-control" type="text" value="<?php if(!(empty($profile))){echo($profile->fname);} ?>" name="first_name" id="fname" placeholder="First Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid first name" data-error="Minimum of 3 characters" data-required-error="First name is required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Last Name<span>*</span></label>
                            <div class="form-group__content">
                                <input class="form-control" type="text" value="<?php if(!(empty($profile))){echo($profile->lname);} ?>" name="last_name" id="lname" placeholder="Last Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid last name" data-error="Minimum of 3 characters" data-required-error="Last name is required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone<span>*</span></label>
                            <div class="form-group__content">
                                <input class="form-control" type="number" value="<?php if(!(empty($profile))){echo($profile->mobile);} ?>" name="phone" id="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address<span></span>
                            </label>
                            <div class="form-group__content">
                                <input class="form-control" type="email" value="<?php if(!(empty($profile))){echo($profile->email);} ?>" name="email" id="email" placeholder="Email Address" data-error="Please enter a valid email address." disabled="disabled">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="form-group">
                            <label>Country<span>*</span>
                            </label>
                            <div class="form-group__content">
                                <select class="selectpicker" name="country" id="country" data-live-search="true" data-width="100%" title="Select your Country" data-required-error="Country is required" required>
                                  <?php foreach ($countries as $row) {
                                    $sel = '';
                                    if(!(empty($profile))){
                                      if ($row->country_id==$profile->country_id) {
                                        $sel = 'selected="selected"';
                                      }
                                    }
                                    
                                  ?>
                                    <option value="<?=$row->country_id?>" <?=$sel?>><?=$row->nicename?></option>
                                  <?php } ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Region<span>*</span>
                            </label>
                            <div class="form-group__content">
                                <select class="selectpicker" name="region" id="region" data-live-search="true" data-width="100%" title="Select your Region" data-required-error="Region is required" required>
                                    <?php foreach ($region as $row) {
                                        $sel = '';
                                        if(!(empty($profile))){
                                          if ($row->reg_id==$profile->reg_id) {
                                            $sel = 'selected="selected"';
                                          }
                                        }
                                        
                                      ?>
                                        <option value="<?=$row->reg_id?>" <?=$sel?>><?=$row->region_name?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address<span>*</span>
                            </label>
                            <div class="form-group__content">
                                <textarea class="form-control" name="address" id="address" style="resize: none;" placeholder="Address" required><?php if(!(empty($profile))){echo($profile->address);} ?></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>City<span>*</span>
                            </label>
                            <select class="selectpicker" name="city" id="city" data-live-search="true" data-width="100%" title="Select your City" data-required-error="City is required" required>
                                <?php foreach ($city as $row) {
                                    $sel = '';
                                    if(!(empty($profile))){
                                      if ($row->city_id==$profile->city_id) {
                                        $sel = 'selected="selected"';
                                      }
                                    }
                                  ?>
                                    <option value="<?=$row->city_id?>" <?=$sel?>><?=$row->city_name?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="ps-hero mb-20 mt-20">
            <div class="container">
                <h3>Change Password</h3>
            </div>
        </div>

        <div class="ps-content pr-10 pl-10">
            <form data-toggle="validator" id="password-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Current Password<span>*</span></label>
                            <div class="form-group__content">
                                <input type="password" placeholder="Current Password" class="form-control" data-minlength="6" class="form-control" name="cpassword" id="password" data-error="Minimum of 6 characters" data-required-error="Current Password is Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>New Password<span>*</span></label>
                            <div class="form-group__content">
                                <input type="password" placeholder="New Password" class="form-control" data-minlength="6" class="form-control" name="npassword" id="npassword" data-error="Minimum of 6 characters" data-required-error="New Password is Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Confirm Password<span>*</span></label>
                            <div class="form-group__content">
                                <input type="password" class="form-control" data-match="#npassword" data-match-error="Password doesn't match" placeholder="Confirm password" data-required-error="Confirm Password is Required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <button type="submit" class="ps-btn ps-btn--fullwidth" style="margin-top: 25px;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JS Library-->
    <!-- ======================================================footer script ======================================== -->
    <?php $this->load->view('includes/acfootjs'); ?>
    <script type="text/javascript">
        $('.selectpicker').selectpicker({
            style: 'specialsel',
            size: 7
        });

        $('.selectpicker').on( 'hide.bs.select', function ( ) {
            $(this).trigger("focusout");
        });

        $('#country').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {  
            if ($(this).val()!=''&&$(this).val()!=null) {
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
            }
        });

        $('#region').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            if ($(this).val()!=''&&$(this).val()!=null) {
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
            }
        });

        $('#profile-form').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                $('.selectpicker').each(function() {
                    $(this).trigger("focusout");
                });
            } else {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    var data = $('#profile-form').serializeArray();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>update-profile",
                        data: data,
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='error'){
                                toastr["error"](responsedata.message)
                            }else{
                                toastr["success"](responsedata.message)
                            }
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            }
        });

        $('#password-form').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                $('.selectpicker').each(function() {
                    $(this).trigger("focusout");
                });
            } else {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    var data = $('#password-form').serializeArray();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>update-password",
                        data: data,
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            $('#password-form').find("input").val("");
                            if(responsedata.status=='error'){
                                toastr["error"](responsedata.message)
                            }else{
                                toastr["success"](responsedata.message)
                            }

                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            }
        });
        
    </script>
</body>

</html>