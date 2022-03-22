<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- ================================================= head ============================================================== -->
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
    
    <!-- ================================================== header =========================================================== -->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3><?=$page->headline?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>
    
    <main class="ps-main">
        <div class="ps-container">
            <div class="ps-product--detail">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    <?php foreach ($proImg as $img) {?>
                                    <div class="item"><img src="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-thu.jpg" alt="<?=$img->photo_title?>" id="photoid_<?=$img->pid?>"></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="ps-product__image">
                                <?php foreach ($proImg as $img) {?>
                                <div class="item"><img class="zoom" src="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-med.jpg" alt="<?=$img->photo_title?>" data-zoom-image="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-big.jpg"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <p style="text-align: center;font-size: 12px;">Disclaimer : Slight variation in actual color vs. image is possible due to the screen resolution.</p>
                    </div>
                    <?php 
                        $link_cate = $this->aayusmain->createHtmlName($product->category);
                        $link_brand = $this->aayusmain->createHtmlName($product->brand);
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="ps-product__info">
                            <h1 id="pro_name" pro-id="<?=$product->pro_id?>" sub-pro-id="0" quantity="<?=$product->quantity?>"><?=$product->name?></h1>
                            <p class="ps-product__category">
                                <a href="<?=base_url();?>category/<?=$link_cate?>/<?=$product->cate_id?>"><?=$product->category?></a>,
                                <a href="<?=base_url();?>brand/<?=$link_brand?>/<?=$product->brand_id?>"><?=$product->brand?></a>
                            </p>
                            <h3 class="ps-product__price" id="productPrice"><span>LKR.</span> <?=$product->price?> <del><?php if($product->price_poi!=0){?><span>LKR.</span> <?php echo $product->price_poi; }?></del></h3>
                            <div class="ps-product__short-desc" id="ShortDesc">
                                <p><?php if(0<$product->quantity&&$product->quantity<=10){ echo $product->quantity." available ";}else if(10<$product->quantity){ ?>More than 10 available <?php }?> <?php if(10<$product->sales_count){ echo '/ <span>'.$product->sales_count." Sold </span>";} ?></p>
                            </div>

                            <?php 
                            foreach ($attributes as $attr) {
                                if ($attr->show_to_all==0&&$attr->price_effect==0) {
                                    if ($attr->type==3||$attr->type==4) {
                            ?>
                            <div class="ps-product__block ps-product__style">
                                <h4>CHOOSE YOUR <?=$attr->attribute?></h4>
                                <div class="form-group">
                                    <ul class="pro_color_sel" id="<?=$attr->attribute?>" attr_id="<?=$attr->attr_id?>">
                                        <?php foreach ($pro_attribute_val as $row) {
                                            if ($row->attr_id==$attr->attr_id) {
                                                $checked = '';
                                                if ($attr->total==1) {
                                                    $checked = 'checked="checked"';
                                                }
                                        ?>
                                        <li><input type="radio" name="attribute[<?=$attr->attr_id?>]" id="<?=$attr->attribute.$row->av_id?>" value="<?=$row->av_id?>" label_val="<?=$row->value?>" <?=$checked?> required/>
                                        <label for="<?=$attr->attribute.$row->av_id?>" style="background-color:<?=$row->value?>;" title="<?=$row->description?>"></label></li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </div>

                            <?php }else {?>

                            <div class="ps-product__block ps-product__size">
                                <h4>CHOOSE <?=$attr->attribute?></h4>
                                <select class="ps-select" title="Select <?=$attr->attribute?>" name="attribute[<?=$attr->attr_id?>]" id="<?=$attr->attribute?>" attr_id="<?=$attr->attr_id?>">
                                    <?php foreach ($pro_attribute_val as $row) {
                                        if ($row->attr_id==$attr->attr_id) {
                                            $selected = '';
                                            if ($attr->total==1) {
                                                $selected = 'selected="selected"';
                                            }
                                    ?>
                                    <option value="<?=$row->av_id?>" title="<?=$row->description?>" <?=$selected?>><?=$row->value?></option>
                                    <?php } } ?>
                                </select>
                            </div>

                            <?php } } } ?>

                            <div class="form-group ps-number btnDet col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <input class="form-control" type="number" value="1" id="pro_qty"><span class="up"></span><span class="down"></span>
                            </div>
                            <div class="btnDet col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <?php if($product->attr_count==0){?>
                                    <?php if($product->quantity==0){?>
                                    <button class="pro_oreder_btn_disabled" id="addToCartBtn">SOLD OUT</button>
                                    <?php }else{ ?>
                                    <button class="pro_oreder_btn" onclick="addCart();" id="addToCartBtn">ADD TO CART</button> 
                                    <?php }?>
                                <?php }else{ ?>
                                    <button class="pro_oreder_btn" onclick="addCart();" id="addToCartBtn">ADD TO CART</button>
                                <?php }?>
                            </div>
                            <div class="btnDet col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <a class="pro_fav_btn" href="javascript:addToWishlist('<?=$product->pro_id?>');"><i class="ps-icon-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-product__content">
                    <ul class="tab-list" role="tablist">
                        <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Description</a></li>
                        <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Shipping</a></li>
                        <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">Payment</a></li>
                        <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">Returns</a></li>
                        <li><a href="#tab_05" aria-controls="tab_05" role="tab" data-toggle="tab">Colour & wash care</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab_01" style="overflow-x: auto;"><?=$product->description?></div>

                    <div class="tab-pane" role="tabpanel" id="tab_02">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td rowspan="4">Shipping In Sri lanka</td>
                            </tr>
                            <tr>
                                <td>Locations</td>
                                <td>We deliver orders to all pincodes across Sri lanka via Simplify, Pronto, Domex & SpeedPost (remote areas).</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>4 Business days. Orders from remote locations might be slightly delayed.</td>
                            </tr>
                            <tr>
                                <td>Charges</td>
                                <td>Shipping charges mentioned on order page across all locations in Sri lanka.</td>
                            </tr>

                            <tr>
                                <td rowspan="4">Shipping Outside Sri lanka/ International</td>
                            </tr>
                            <tr>
                                <td>Locations</td>
                                <td>Please note that we require minimum order value of LKR 2200.0 for shipping outside Sri lanka.</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>4-8 business days basis destination country. If ‘Custom Stitching’ is selected, we need 2-4 days extra.</td>
                            </tr>
                            <tr>
                                <td>Charges</td>
                                <td>Approx. USD 10- First item, and Approx. USD 5 - Every additional item. Total shipping charges basis the weight of items in your order will be reflected on ‘checkout’ page.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab_03">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td rowspan="5">Payments In Sri lanka</td>
                                </tr>
                                <tr>
                                    <td>Credit Cards, Debit Cards</td>
                                </tr>
                                <tr>
                                    <td>Cash on Delivery with Advance Payments</td>
                                </tr>
                                <tr>
                                    <td>eZ-Cash, m-Cash, Sampath Vishwa</td>
                                </tr>
                                <tr>
                                    <td>Bank deposit to our Sri Lankan bank account.</td>
                                </tr>
                                <tr>
                                    <td rowspan="4">Payments Outside Sri lanka/ International</td>
                                </tr>
                                <tr>
                                    <td>Credit Cards</td>
                                </tr>
                                <tr>
                                    <td>Bank deposit to our Sri Lankan bank account.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab_04">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Time</td>
                                    <td>If you are not happy with a product you have received, don’t worry. You can always return it back within 3 days without any deductions.</td>
                                </tr>
                                <tr>
                                    <td>Process</td>
                                    <td>Send us an email preferably within few hours of receiving the product. Our team will reply with the instructions and return shipping address to which you need to send back the product. If you need to exchange sealed packing or discount products contact our Hotline for checking eligible</td>
                                </tr>
                                <tr>
                                    <td>Refunds/Replacements</td>
                                    <td>If you wish to replace a damaged product, we will send you a new one. We can also refund the amount or offer you a store credit redeemable towards future purchases depends on product type.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab_05">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>General</td>
                                    <td>Color and Texture may have slight variation. This happens because of photography. Dry Clean only. Cold water recommended.</td>
                                </tr>
                                <tr>
                                    <td>Embroidery</td>
                                    <td>Embroidery, Patch work and thread work may have slight irregularities. Turn the garment inside out before washing to avoid abraison.</td>
                                </tr>
                                <tr>
                                    <td>Handloom</td>
                                    <td>Yarns and Slubs may have some uneven and missing contrasts.They are inherent chararcteristic of the fabric that make its style peculiar.</td>
                                </tr>
                                <tr>
                                    <td>Block Print</td>
                                    <td>Color, Design, Overlapping and Placement may have slight variation. These is because they are hand printed. Woven Motifs Design may have slight variation</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <div class="ps-section pb-50">
        <div class="ps-container">
            <div class="ps-section__header text-center">
                <h2 class="ps-section__title">YOU MIGHT ALSO LIKE</h2>
                <p>Here are key products that bring fashionistas to Xuper Store.</p>
            </div>
            <div class="ps-section__content">
                <div class="ps-slider--center owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-nav-left="&lt;i class='ps-icon-arrow-left'&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class='ps-icon-arrow-right'&gt;&lt;/i&gt;">
                    <div class="ps-product--fashion">
                        <div class="ps-product__thumbnail"><a class="ps-product__overlay" href="product-detail.html"></a><img class="lazy" src="<?=base_url()?>assets/images/product/fashion-1.jpg" alt="">
                            <div class="ps-badge ps-badge--sale-off"><span>-40%</span></div>
                            <ul class="ps-product__actions">
                                <li><a href="#" title="Quick View"><i class="ps-icon-eye"></i></a></li>
                                <li><a href="#" title="Compare"><i class="ps-icon-compare"></i></a></li>
                                <li><a href="#" title="Favorite"><i class="ps-icon-heart"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">PARKER BACKPACK</a>
                            <p class="ps-product__price">
                                <del>$450.89</del>$200
                            </p><a class="ps-product__cart" href="#" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- ================================================== footer ========================================================== -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->

    <!-- ====================================================== footer script =================================================== -->
    <?php $this->load->view('includes/footerjs'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/waitMe/waitMe.js"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            if (validate_select()&&validate_radio()) {
                getSubPro();
            }
        });

        $(".ps-number span").on("click", function () {
            var cls = $(this).attr("class");
            var numberValue = $('.ps-number #pro_qty').val();
            if (cls=='up') {
                numberValue++;
                $('.ps-number #pro_qty').val(numberValue);
            }else if(cls=='down'){
                if (numberValue > 1) {
                    numberValue--;
                    $('.ps-number #pro_qty').val(numberValue);
                }
            }
        });

        function addCart() {
            var pro_id = $("#pro_name").attr('pro-id');
            var sub_pro_id = $("#pro_name").attr('sub-pro-id');
            var quantity = parseInt($('#pro_name').attr("quantity"));
            var qty = parseInt($("#pro_qty").val());
            if(qty<1){
                toastr["warning"]("Quantity should be minimum 1");
            }else if(quantity<qty){
                toastr["warning"]("Requested quantity not available");
            }else{
                if (validate_select()&&validate_radio()) {
                    if (pro_id!=null&&qty!=null&&sub_pro_id!=null) {
                        var data = $('.ps-product__info select,.ps-product__info input[type=radio]').serializeArray();
                        if ($('.ps-product__info select').length) {
                            $('.ps-product__info select').each(function() {
                                if($(this).val()!=''){
                                    var name1 = 'attrshow['+$(this).attr('attr_id')+']';
                                    var name1val = $(this).attr('id');
                                    var name2 = 'attrVal['+$(this).attr('attr_id')+']';
                                    var name2val = $(this).find('option:selected').text();
                                    data.push({name: name1, value: name1val},{name: name2, value: name2val});
                                }
                            });
                        }
                        if ($('.ps-product__info:has(:radio)').length) {
                            $('.pro_color_sel').each(function() {
                                var name1 = 'attrshow['+$(this).attr('attr_id')+']';
                                var name1val = $(this).attr('id');
                                var name2 = 'attrVal['+$(this).attr('attr_id')+']';
                                var name2val = $(this).find('li input[type="radio"]:checked').attr('label_val');
                                data.push({name: name1, value: name1val},{name: name2, value: name2val});
                            });
                        }
                        data.push({name: "pro_id", value: pro_id},{name: "sub_pro_id", value: sub_pro_id},{name: "qty", value: qty});
                        $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>addToCart",
                            data: data,
                            success: function(result) {
                              var responsedata = $.parseJSON(result);
                              if (responsedata.exists==1) {
                                  toastr["info"]("Quantity was updated!<br> Visit cart for more info");
                              }else if(responsedata.exists==2){
                                  $("#cart_count").text(responsedata.count);
                                  toastr["success"]("Added To Cart!<br> Visit cart for more info");
                              }else{
                                toastr["warning"](responsedata.message);
                              }
                            },
                            error: function(result) {
                                toastr["error"](result);
                            }
                        });
                    }
                }else{
                    toastr["error"]('Please select attributes to continue');
                }
            }
        }

        $( ".ps-product__info select,.ps-product__info input[type=radio]" ).change(function() {
            if (validate_select()&&validate_radio()) {
                getSubPro();
            }
        });

        function getSubPro() {
            var pro_id = $("#pro_name").attr('pro-id');
            var data = $('.ps-product__info select,.ps-product__info input[type=radio]').serializeArray();
            data.push({name: "pro_id", value: pro_id});
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>getSubPro",
                data: data,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    var priceStr = "<span>LKR.</span>"+responsedata['price']+"<del>";
                    if(responsedata['poi_price']!=0){
                        priceStr = priceStr+"<span>LKR.</span>"+responsedata['poi_price'];
                    }
                    priceStr = priceStr+"</del>";
                    $('#productPrice').html(priceStr);

                    if(responsedata['quantity']==0){
                        $('#ShortDesc').hide();
                        $('#addToCartBtn').prop("disabled",true);
                        $('#addToCartBtn').text("SOLD OUT");
                        $("#addToCartBtn").removeClass( "pro_oreder_btn" ).addClass( "pro_oreder_btn_disabled" );
                    }else{
                        if(responsedata['quantity']<10){
                            $('#ShortDesc').hide();
                        }else{
                            $('#ShortDesc').show();
                        }
                        $('#addToCartBtn').prop("disabled",false);
                        $('#addToCartBtn').text("ADD TO CART");
                        $("#addToCartBtn").removeClass( "pro_oreder_btn_disabled" ).addClass( "pro_oreder_btn" );
                    }
                    if(responsedata['subprod_available']==1){
                        $('#pro_name').attr("sub-pro-id",responsedata['sub_pro_id']);
                    }else{
                        $('#pro_name').attr("sub-pro-id",0);
                    }
                    if(responsedata['sub_images']!=null||responsedata['sub_images']!=''){
                        $('#photoid_'+responsedata['sub_images']).trigger('click');
                    }
                    $('#pro_name').attr("quantity",responsedata['quantity']);
                },
                error: function(result) {
                    toastr["error"](result);
                }
            });
        }

        function validate_select() {
            var status = false;
            var count = 0;
            if ($('.ps-product__info select').length) {
                $('.ps-product__info select').each(function() {
                    if($(this).val()!=''){
                       count ++; 
                    }
                });
                if ($('.ps-product__info select').length==count) {
                    status = true;
                }
            }else{
                status = true;
            }
            return status;
        }

        function validate_radio() {
            var status = true;
            if ($('.ps-product__info:has(:radio)').length) {
                if ($('.ps-product__info:not(:has(:radio:checked))').length) {
                    status = false;
                }
            }
            return status;            
        }

        function addToWishlist(id) {
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>addToWishlist",
                data: 'id='+id,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    if (responsedata.status=='error') {
                        toastr["error"](responsedata.message)
                    }else if(responsedata.status=='info'){
                       toastr["info"](responsedata.message);
                    }else if(responsedata.status=='success'){
                       toastr["success"](responsedata.message);
                    }
                },
                error: function(result){
                    toastr["error"](result);
                }
            });
        }
    </script>

</body>

</html>