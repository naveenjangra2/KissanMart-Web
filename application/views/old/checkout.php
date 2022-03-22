<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- =========================================== head ============================================================================== -->
    <?php $this->load->view('includes/head'); ?>

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

        /*.filter-option .filter-option-inner-inner{
            padding: 6px 12px;
            line-height: 1.7;
        }*/
    </style>
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    
    <!-- ===================================================== header ========================================================= -->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3><?=$page->headline?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>
    <div class="ps-checkout pt-40 pb-40">
        <div class="ps-container">
            <form data-toggle="validator" class="ps-form--checkout" action="<?=base_url();?>Welcome/checkoutOrder" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <?php if($this->session->userdata('cust_logged_in')==null){?>
                                    <input class="form-control" type="checkbox" id="cb01">
                                    <label for="cb01">Sign in to HexStyle?</label>
                                    <?php }else{?>
                                    <input class="form-control" type="checkbox" id="loadAddress">
                                    <label for="loadAddress">Load your address(es)?</label>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>First Name<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="first_name" id="fname" placeholder="First Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid first name" data-error="Minimum of 3 characters" data-required-error="First name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="text" name="last_name" id="lname" placeholder="Last Name" pattern="^[a-zA-Z. ]+$" data-minlength="3" data-pattern-error="Invalid last name" data-error="Minimum of 3 characters" data-required-error="Last name is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span></label>
                                <div class="form-group__content">
                                    <input class="form-control" type="number" name="phone" id="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <div class="form-group__content">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" data-error="Please enter a valid email address." required>
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
                                <label>Region<span>*</span>
                                </label>
                                <div class="form-group__content">
                                    <select class="selectpicker" name="region" id="region" data-live-search="true" data-width="100%" title="Select your Region" data-required-error="Region is required" required>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <div class="form-group__content">
                                    <textarea class="form-control" name="address" id="address" style="resize: none;" placeholder="Address" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>City<span>*</span>
                                </label>
                                <select class="selectpicker" name="city" id="city" data-live-search="true" data-width="100%" title="Select your City" data-required-error="City is required" required>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <h3 class="mt-40"> Addition information</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>Order Notes</label>
                                <textarea class="form-control" id="ordernote" name="ordernote" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order Summary</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <tbody>
                                        <tr>
                                            <td>Cart Total</td>
                                            <td>LKR <span id="subTotal"><?=number_format((float)$subtotal, 2, '.', '')?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td>LKR <span id="discountVal"><?=number_format((float)$discount, 2, '.', '')?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Charge</td>
                                            <td>LKR <span id="del_charge">0</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Order Total</td>
                                            <td>LKR <span id="orderTotal"><?=number_format((float)$total, 2, '.', '')?></span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class="form-group bankdep">
                                    <div class="ps-radio ps-radio--small">
                                        <input class="form-control" type="radio" name="paymenttype" id="rdo00" value="3" required>
                                        <label for="rdo00">Cash on Delivery - Bank Deposit</label>
                                    </div>
                                    <p>You have to pay 25% from the total bill & Balance can pay cash on delivery.<br>
                                    You can Pay total bill to bank.<br>
                                    <span>Note : Advance Payments must be made to account within 4 days of placing the order. We shall email you bank details. Once deposited please send us the slip by email or whatsapp / Viber / IMO</span></p>                                    
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group bankdep">
                                    <div class="ps-radio ps-radio--small">
                                        <input class="form-control" type="radio" name="paymenttype" id="rdo03" value="4" required>
                                        <label for="rdo03">Pay Total - Bank Deposit</label>
                                    </div>
                                    <p>You have to pay full payments to Bank<br>
                                    You can Pay total bill to bank.<br>
                                    <span>Note : Payments must be made to account within 4 days of placing the order. We shall email you bank details. Once deposited please send us the slip by email or whatsapp / Viber / IMO</span></p>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group cheque">
                                    <div class="ps-radio ps-radio--small">
                                        <input class="form-control" type="radio" name="paymenttype" id="rdo01" value="2" required>
                                        <label for="rdo01">Cash on delivery - Online</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/1.png" alt=""></a></li>
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/2.png" alt=""></a></li>
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/3.png" alt=""></a></li>
                                    </ul>
                                    <p>You have to pay 25% from the total bill for cash on delivery<span>Note : Within Sri Lanka Only</span></p>

                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--small">
                                        <input class="form-control" type="radio" name="paymenttype" id="rdo02" value="1" checked required>
                                        <label for="rdo02">Pay Total - Online</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/1.png" alt=""></a></li>
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/2.png" alt=""></a></li>
                                        <li><a href="#"><img src="<?=base_url()?>assets/images/payment/3.png" alt=""></a></li>
                                    </ul>
                                    <div class="help-block with-errors"></div>
                                    <button class="ps-btn ps-btn--fullwidth" type="submit" id="placeBtn">Place Order</button>
                                </div>
                            </footer>
                        </div>
                        <!-- <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.
                                <br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade address-popup" id="address-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">                
            <a class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>

            <div class="modal-content">
                <div class="address-wrap text-center">                        
                    <h2 class="title-3"> Your Address(es) </h2>
                    <p> Select an adress for continue </p> 

                    <div class="ps-load-address clrbg-before">
                        
                        <table class="table ps-address__table">
                            <tbody id="addressTbody">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ======================================================= footer ======================================================== -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
    
    <!-- ============================================================ footer Script ================================================ -->
    <?php $this->load->view('includes/footerjs'); ?>

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
                if ($(this).val()!='200') {
                    $('#rdo01,#rdo00').attr('disabled', true);
                    $('#rdo01,#rdo00').prop('checked', false);
                }else{
                    $('#rdo01,#rdo00').attr('disabled', false);
                }
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

        $("#cb01").change(function() {
            if(this.checked) {
                /*$('#loginForm #redirectURL').val('checkout');*/
                $('#login-popup').modal('show');
            }
        });

        $("#loadAddress").change(function() {
            if(this.checked) {
                $("#placeBtn").prop("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>loadAddresses",
                    cache: false,
                    success: function(result) {
                        var responsedata = $.parseJSON(result);
                        if(responsedata.status=='error'){
                            toastr["error"](responsedata.message)
                        }else{
                            $('#addressTbody').empty();
                            var tbody = '';
                            for (var i = 0; i < responsedata.address.length; i++) {
                                var address = responsedata.address[i]['address'];
                                var coma = address.slice(-1);
                                if (coma!=',') {
                                    address += ','
                                }
                                var addr = responsedata.address[i]['fname']+" "+responsedata.address[i]['lname']+", "+address+" "+responsedata.address[i]['city_name']+", "+responsedata.address[i]['region_name']+", "+responsedata.address[i]['nicename']
                                tbody+='<tr onclick=getAddress('+responsedata.address[i]['add_id']+')><td>'+addr+'</td></tr>';
                            }
                            $('#addressTbody').append(tbody);
                            $('#address-popup').modal('show');
                        }
                        $("#placeBtn").prop("disabled",false);
                    },
                    error: function(result) {
                        toastr["error"]('Somthing went wrong :(');
                    }
                });
            }else{
                document.getElementById('checkout-form').reset(); 
                $('#checkout-form').find("input").val("");
                $("#address").val("");
                $('#checkout-form').validator('destroy').validator();
                $('.selectpicker').selectpicker('refresh');
            }
        });

        function getAddress(id) {
            $("#placeBtn").prop("disabled",true);
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>getSingleAddress",
                data: 'id='+id,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    if(responsedata.status=='error'){
                        toastr["error"](responsedata.message)
                    }else{
                        $('#fname').val(responsedata.fname);
                        $('#lname').val(responsedata.lname);
                        $('#mobile').val(responsedata.phone);
                        $('#email').val(responsedata.email);
                        $('#address').val(responsedata.address);
                        $('#country').val(responsedata.country_id);
                        $('#country').trigger('change');
                        $('#country').selectpicker('refresh');
                        setTimeout(function(){
                            $('#region').val(responsedata.reg_id);
                            $('#region').trigger('change');
                            $('#region').selectpicker('refresh');
                        }, 1000);
                        setTimeout(function(){
                            $('#city').val(responsedata.city_id);
                            $('#city').trigger('change');
                            $('#city').selectpicker('refresh');
                            $("#placeBtn").prop("disabled",false);
                        }, 3000);
                    }
                    $('#address-popup').modal('hide');
                },
                error: function(result) {
                    toastr["error"]('Error :'+result)
                }
            });
        }

        $(".ps-checkout__billing select").change(function() {
            if (validate_select()) {
                $("#placeBtn").prop("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>getdelcharge",
                    data: 'country='+$('#country').val()+'&region='+$('#region').val()+'&city='+$('#city').val(),
                    success: function(result) {
                        var responsedata = $.parseJSON(result);
                        if(responsedata.status=='error'){
                            toastr["error"](responsedata.message)
                        }else{
                            if (responsedata.total!='0') {
                                $('#del_charge').text(parseFloat(Math.round(responsedata.del_charge * 100) / 100).toFixed(2));
                                $('#orderTotal').text(parseFloat(Math.round(responsedata.total * 100) / 100).toFixed(2));
                            }
                        }
                        $("#placeBtn").prop("disabled",false);
                    },
                    error: function(result) {
                        toastr["error"]('Error :'+result)
                    }
                });
            }
        });

        function validate_select() {
            var status = false;
            var count = 0;
            if ($('.ps-checkout__billing select').length) {
                $('.ps-checkout__billing select').each(function() {
                    if($(this).val()!=''){
                       count ++; 
                    }
                });
                if ($('.ps-checkout__billing select').length==count) {
                    status = true;
                }
            }else{
                status = true;
            }
            return status;
        }

        $('#checkout-form').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                $('.selectpicker').each(function() {
                    $(this).trigger("focusout");
                });
            } else {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    $("#placeBtn").prop("disabled",true);
                    var country = $("#country").find('option:selected').text();
                    var city = $("#city").find('option:selected').text();
                    var data = $('#checkout-form').serializeArray();
                    data.push({name: 'country_name', value: country},{name: 'city_name', value: city});
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>place-order",
                        data: data,
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='error'){
                                toastr["error"](responsedata.message)
                                $("#placeBtn").prop("disabled",true);
                            }else if(responsedata.status=='success'){
                                toastr["success"](responsedata.message)
                                setTimeout(function(){
                                    window.location = "<?=base_url()?>";
                                }, 600);
                            }else{
                                sendToMerchant(responsedata);
                            }
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            }
        });

        function sendToMerchant(data) {
            $('<form>', {
                "method": "POST",
                "html": data,
                "action": 'https://www.payhere.lk/pay/checkout'
            }).appendTo(document.body).submit();
        }

        function run_waitMe(el){
            $(el).waitMe({
              effect: 'facebook',
              text: 'Please wait...',
              bg: 'rgba(255,255,255,0.7)',
              color: '#000',
              maxSize: '',
              source: '../assets/img/img.svg',
              onClose: function() {}
            });
        }
    </script>
    
</body>

</html>