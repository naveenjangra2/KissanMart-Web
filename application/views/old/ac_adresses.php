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
                <h3>Addresses</h3>
                <a href="javascript:addAddress();">Add Address <i class="fa fa-plus-square"></i></a>
            </div>
        </div>
        <div class="ps-content">
            <div class="table-responsive">
                <table class="table ps-address-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Region</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($addresses as $row) {
                            $type = 'Secondary';
                            $removeBtn = '<div class="ps-remove" onclick="removeAddress('.$row->add_id.');"></div>';
                            if ($row->add_type==0) {
                                $type = 'Primary ';
                                $removeBtn = '';
                            }
                        ?>
                        <tr id="addressRow<?=$row->add_id?>">
                            <td><?=$row->fname.' '.$row->lname?></td>
                            <td><?=$row->address.' '.$row->city_name?></td>
                            <td><?=$row->region_name?></td>
                            <td><?=$row->nicename?></td>
                            <td><?=$row->phone?></td>
                            <td><?=$type?></td>
                            <td><?=$removeBtn?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade address-popup" id="address-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">                
            <a class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>

            <div class="modal-content">
                <div class="login-wrap text-center">                        
                    <h2 class="title-3"> Add Address </h2>                     

                    <div class="login-form clrbg-before">
                        <form class="login" id="addressForm" data-toggle="validator">
                            <div class="form-group">
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="first_name" id="fname" placeholder="First Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid first name" data-error="Minimum of 3 characters" data-required-error="First name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="last_name" id="lname" placeholder="Last Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid last name" data-error="Minimum of 3 characters" data-required-error="Last name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
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
                            <div class="form-group">
                                <div class="form-group__content">
                                    <select class="selectpicker" name="region" id="region" data-live-search="true" data-width="100%" title="Select your Region" data-required-error="Region is required" required>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group__content">
                                    <textarea class="form-control" name="address" id="address" style="resize: none;" placeholder="Address" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker" name="city" id="city" data-live-search="true" data-width="100%" title="Select your City" data-required-error="City is required" required>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <div class="form-group__content">
                                    <input class="form-control" type="number" name="phone" id="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn ps-btn--fullwidth" type="submit"> Submit </button>
                            </div>
                        </form>                         
                    </div>   
                </div>
            </div>
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

        $('#addressForm').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                $('.selectpicker').each(function() {
                    $(this).trigger("focusout");
                });
            } else {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    var data = $('#addressForm').serializeArray();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>add-address",
                        data: data,
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='error'){
                                toastr["error"](responsedata.message)
                            }else{
                                toastr["success"](responsedata.message)
                                setTimeout(function(){
                                  $("#address-popup").modal('hide');
                                  location.reload();
                                }, 400);
                            }
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            }
        });

        function removeAddress(id) {
            toastr["warning"]("<button type='button' id='confirmBtn' class='btn btn-danger btn-sm' style='width:40%;display:inline;margin:3px;'>Yes</button><button type='button' id='closeBtn' class='btn btn-default btn-sm' style='width:40%;display:inline;margin:3px;'>No</button>",'Do you want to delete this address?',{
                closeButton: true,
                allowHtml: true,
                onShown: function (toast) {
                  $("#confirmBtn").click(function(){
                    $.ajax({
                      type: "POST",
                      url: "<?=base_url()?>deleteAddress",
                      data: 'id='+id,
                      success: function(result) {
                          var responsedata = $.parseJSON(result);
                          if (responsedata.status=='success') {
                            toastr.success(responsedata.message)
                            $('#addressRow'+id).fadeTo("slow",0.7, function(){
                                $(this).remove();
                            });
                          }else{
                            toastr.error(responsedata.message)
                          }
                      },
                      error: function(result) {
                        toastr.error("Somthing went wrong :(")
                      }
                    });
                  });
                  $("#closeBtn").click(function(){
                    toastr.clear()
                  });
                }
            });
        }

        function addAddress() {
            $('#address-popup').modal('show');
        }

        
    </script>
</body>

</html>