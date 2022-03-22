<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- head ================================================================================================================== -->
    <?php $this->load->view('includes/head'); ?>
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        .attrcls{
            margin: 0 5px 0 0; 
        }
        .colored{
            width: 18px;
            height: 18px;
            margin:auto;
            display:inline-block;
            border: 1px solid #e6e6e6;
            vertical-align: middle;
            border-radius: 18px; 
        }
        .otherVal{
            width: 18px;
            height: 18px;
            border: 1px solid #e6e6e6;
            margin:auto;
            padding: 2px;
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
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>All Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $Sub_total =0;
                            foreach ($this->cart->contents() as $items){ 
                                $price = str_replace(".","",$items['price']);
                                $qty = $items['qty'];
                                $Sub_total += $price*$qty;
                        ?>
                        <tr id="row<?=$items["rowid"]?>" class="row<?=$items["rowid"]?>">
                            <td><a class="ps-product--compare" href="<?=base_url();?>productDetail"><img class="mr-15" src="<?=PHOTO_DOMAIN?>products/<?=$items['options']['image']?>-thu.jpg" alt="<?php echo $items['name']; ?>" height="60"><?php echo $items['name']; ?></a></td>
                            <td class="price">Rs.<?=number_format($price); ?></td>
                            <td class="cart_qty">  
                                <div class="form-group--number"><div class="sp-quantity">
                                    <button class="minus"><span>-</span></button>
                                    <input class="quntity-input form-control" type="number" value="<?php echo $qty; ?>" id="qty<?=$items['rowid']?>" rowid="<?=$items["rowid"]?>" price="<?=$items['price']?>"/>
                                    <button class="plus"><span>+</span></button>
                                </div></div>
                            </td>
                            <td class="total" id="cart_total<?=$items["rowid"]?>">Rs.<?php echo number_format($price*$qty); ?></td>
                            <td>
                                <div class="ps-remove" onclick="removeItem('<?=$items["rowid"]?>');"></div>
                            </td>
                        </tr>
                        <?php if(!empty($items['options']['attributes'])){?>
                        <tr class="row<?=$items["rowid"]?>">
                			<td colspan="5">
		                    		<?php 
                                    $regex_rgb = '/^(\#[\da-f]{3}|\#[\da-f]{6})$/';
		                    		foreach ($items['options']['attributes'] as $item_attr){?>
                                    <span class="attrcls"><?=$item_attr['att_name']?> : 
                                        <?php if (preg_match($regex_rgb, $item_attr['value_show'])) {?>
                                            <span class="colored" style="background:<?=$item_attr['value_show']?>;"></span>
                                        <?php }else{ ?>
                                            <span class="otherVal"><?=$item_attr['value_show']?></span>
                                        <?php } ?>
		                        	</span>
		                     		<?php } ?>
                			</td>
		            	</tr>
                        <?php }}?>
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code" id="promo_code" value="<?php if($this->session->userdata('coupon')!=null){echo $this->session->userdata['coupon']['code'];}?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>Cart Total : <span id="crtSubTot">Rs.<?php echo number_format($Sub_total);?></span></h3>
                        <a class="ps-btn" href="javascript:checkCart();">Process to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================================= Footer ================================================================ -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
   <!-- ===================================================== footer script =========================================================== -->
    <?php $this->load->view('includes/footerjs'); ?>
    <script>
        $(".sp-quantity button").on("click", function () {
            var button = $(this);
            var oldValue = button.closest('.sp-quantity').find("input.quntity-input").val();
            var rowid = button.closest('.sp-quantity').find("input.quntity-input").attr('rowid');
            var price = button.closest('.sp-quantity').find("input.quntity-input").attr('price');
            var newVal = 0;
            if (button.text() == "+") {
                newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue > 0) {
                    newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            itemCal(rowid,price,newVal);
        });

        function itemCal(id,price,newqty) {
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>updateItemQty",
                data: 'rowid='+ id +'&qty='+ newqty,
                cache: false,
                success: function(result){
                    var responsedata = $.parseJSON(result);
                    if(responsedata.status=='success'){
                        var subtot = parseInt(responsedata.message);
                        $('#cart_total'+id).text("Rs."+(newqty*price).toLocaleString('en'));
                        $('#crtSubTot').text("Rs."+(subtot).toLocaleString('en'));
                        $("#qty"+id).val(newqty);
                    }else{
                        toastr["warning"](responsedata.message)
                    }
                },
                error: function(result) {
                    toastr["error"](result);
                }
            });
        }

        function removeItem(rowid) {
            $.ajax({
                type: "POST",
                url: "<?= base_url();?>removeItem",
                data: 'rowid='+ rowid,
                cache: false,
                success: function(result){
                    var responsedata = $.parseJSON(result);
                    $('.row'+rowid).animate( {backgroundColor:'yellow'}, 100).fadeOut(100,function() {
                        $('.row'+rowid).remove();
                    });
                    $('#crtSubTot').text("Rs."+(responsedata.total).toLocaleString('en'));
                    $("#cart_count").text(responsedata.count);
                }
            });
        }

        function checkCart() {
            $.ajax({
                type: "POST",
                url: "<?= base_url();?>checkCart",
                data: 'promo='+ $('#promo_code').val(),
                cache: false,
                success: function(result){
                	var responsedata = $.parseJSON(result);
                    if (responsedata.status=='success') {
                    	if ($('#promo_code').val().trim()!='') {
                    		if (responsedata.promo==true) {
                    			if (responsedata.type==1) {
                    				toastr["success"]('You are eligible for '+responsedata.amount+'% discount from your order total')
                    			}else{
                    				toastr["success"]('You are eligible for LKR '+responsedata.amount+' discount from your order total')
                    			}
                    		}else{
                    			toastr["warning"]('Coupon code is not valid');
                    		}
                    	}
                    	setTimeout(function(){
                    		window.location.href = "<?=base_url();?>checkout";
                        }, 600);
                    }else{
                        toastr["warning"]('Cart is empty');
                    }
                }
            });
        }
    </script>
</body>
</html>