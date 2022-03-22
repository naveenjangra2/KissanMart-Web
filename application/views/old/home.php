<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <!-- ====================================head================================================================================= -->
    <?php $this->load->view('includes/head'); ?>

    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/revolution/css/navigation.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <!-- ===========================================header============================================================================== -->
    <?php $this->load->view('includes/header'); ?>
    
    <!-- <div class="ps-home-slider">
        <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-1" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div class="ps-slider--fashion3 owl-slider" data-owl-auto="true" data-owl-loop="false" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                <?php 
                if($page_img!=FALSE){
                foreach ($page_img as $row) {
                    $type = strtok($row->photo_title, '|');
                    $last = substr($row->photo_title, strpos($row->photo_title, '|') + 1);
                    $print = $last;
                    if ($type==1||$type==2) {
                        $print = 'onclick="redirect_fun('.$type.','.$last.');"';
                    }
                ?>
                <div class="ps-banner--3 bg--cover" <?=$print?>><img src="<?=PHOTO_DOMAIN?>pages/<?=$row->photo_path?>-org.jpg"></div>
                <?php }} ?>
            </div>
        </div>
    </div> -->

    <div class="ps-banner--2">
      <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="6000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1500" data-owl-mousedrag="on">
        <?php 
            if($page_img!=FALSE){
            foreach ($page_img as $row) {
                $type = strtok($row->photo_title, '|');
                $last = substr($row->photo_title, strpos($row->photo_title, '|') + 1);
                $print = $last;
                if ($type==1||$type==2) {
                    $print = 'onclick="redirect_fun('.$type.','.$last.');"';
                }
            ?>
        <div class="ps-banner--3 bg--cover" <?=$print?>><img src="<?=PHOTO_DOMAIN?>pages/<?=$row->photo_path?>-org.jpg"></div>
        <?php }} ?>
      </div>
    </div>


    <?php 
        $colmd = 0;
        $colsm = 2;
        $first = '';
        if (2<$cate_count) {
            if ($cate_count%2==1) {
                if ($cate_count==3) {
                    $colmd = 3;
                    $colsm = 3;
                }else if ($cate_count==5) {
                    $first = 'large';
                    $colmd = 4;
                }else if ($cate_count==7) {
                    $first = 'large';
                    $colmd = 5;
                }else{
                    $first = 'large';
                    $colmd = ($cate_count-1)/2;
                }
            }else{
                if ($cate_count==4) {
                    $colmd = $cate_count;
                }else{
                    $colmd = $cate_count/2;
                }
            }
    ?>
    <div class="ps-section--collection">
        <div class="masonry-wrapper" data-col-md="<?=$colmd?>" data-col-sm="<?=$colsm?>" data-col-xs="1" data-gap="0" data-radio="4:3">
            <div class="ps-masonry">
                <div class="grid-sizer"></div>
                <?php $i = 0; foreach ($cateImg as $row) {
                    $cate_link = $this->aayusmain->createHtmlName($row->category);
                ?>
                <div class="grid-item <?php if($i==0){echo($first);}?>">
                    <div class="grid-item__content-wrapper"><a class="ps-collection" href="<?=base_url();?>category/<?=$cate_link?>/<?=$row->cate_id?>"><img src="<?=PHOTO_DOMAIN?>categories/<?=$row->photo_path?>-org.jpg" alt=""></a></div>
                </div>
                <?php $i++;}?>
            </div>
        </div>
    </div>
    <?php }?>

    <!-- <?php if (4<=$popular['rowcount']) {?>
    <div class="ps-section pt-80 pb-30">
        <div class="ps-container">
            <div class="ps-section__header text-center">
                <h2 class="ps-section__title">POPULAR PRODUCTS</h2>
                <p>Popular collections filtered from most viewed products.</p>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <?php 
                    if($popular['rowcount']<8){
                        $limit = 4;
                    }else{
                        $limit = 8;
                    }
                    foreach (array_slice($popular['products'], 0, $limit) as $row) {
                        $price = $row->price;
                        $poi = $row->price_poi;
                        $link_name = $this->aayusmain->createHtmlName($row->name);
                        $link_cate = $this->aayusmain->createHtmlName($row->category);

                        $badge = '';
                        $show ='';
                        if ($poi!=0) {
                            $dis = ((($poi-$price)/$poi)*100);
                            $badge = '<div class="ps-badge ps-badge--sale-off"><span>'.round($dis,0,PHP_ROUND_HALF_DOWN).'%</span></div>';
                            $show='<del>'.$poi.'</del>';
                        }elseif (strtotime($row->added_date) > strtotime('-7 day')) {
                            $badge = '<div class="ps-badge ps-badge--new"><span>New</span></div>';
                        }
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="ps-product_grid_item">
                            <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                            <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                            <?=$badge?>
                            <a class="ps-product_fav" href="javascript:addToWishlist('<?=$row->pro_id?>');" title="Favorite"><i class="ps-icon-heart"></i></a>
                            <div class="ps-pro_desc">
                                <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                                <p class="ps-product__price"><?=$show.$price?></p>
                                <a class="ps-product__cart" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?> -->
    <?php if (4<$popular['rowcount']) {?>
    <div class="ps-section pt-20 pb-20">
        <div class="ps-container">
            <div class="ps-section__header text-center">
                <h2 class="ps-section__title">POPULAR PRODUCTS</h2>
                <p>Popular collections filtered from most viewed products.</p>
            </div>
            <div class="ps-section__content">
                <div class="ps-slider--center owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-nav-left="&lt;i class='ps-icon-arrow-left'&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class='ps-icon-arrow-right'&gt;&lt;/i&gt;">

                    <?php foreach ($popular['products'] as $row) {
                        $price = $row->price;
                        $poi = $row->price_poi;
                        $link_name = $this->aayusmain->createHtmlName($row->name);
                        $link_cate = $this->aayusmain->createHtmlName($row->category);

                        $badge = '';
                        $show ='';
                        if ($poi!=0) {
                            $dis = ((($poi-$price)/$poi)*100);
                            $badge = '<div class="ps-badge ps-badge--sale-off"><span>'.round($dis,0,PHP_ROUND_HALF_DOWN).'%</span></div>';
                            $show='<del>'.$poi.'</del>';
                        }elseif (strtotime($row->added_date) > strtotime('-7 day')) {
                            $badge = '<div class="ps-badge ps-badge--new"><span>New</span></div>';
                        }
                    ?>
                        <div class="ps-product_grid_item">
                            <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                            <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                            <?=$badge?>
                            <a class="ps-product_fav" href="javascript:addToWishlist('<?=$row->pro_id?>');" title="Favorite"><i class="ps-icon-heart"></i></a>
                            <div class="ps-pro_desc">
                                <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                                <p class="ps-product__price"><?=$show.$price?></p>
                                <a class="ps-product__cart" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if (4<$top['rowcount']) {?>
    <div class="ps-section pt-20 pb-20">
        <div class="ps-container">
            <div class="ps-section__header text-center">
                <h2 class="ps-section__title">TOP SELLING PRODUCTS</h2>
                <p>Here are key products that bring fashionistas to HexStyle Store.</p>
            </div>
            <div class="ps-section__content">
                <div class="ps-slider--center owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-nav-left="&lt;i class='ps-icon-arrow-left'&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class='ps-icon-arrow-right'&gt;&lt;/i&gt;">

                    <?php foreach ($top['products'] as $row) {
                        $price = $row->price;
                        $poi = $row->price_poi;
                        $link_name = $this->aayusmain->createHtmlName($row->name);
                        $link_cate = $this->aayusmain->createHtmlName($row->category);

                        $badge = '';
                        $show ='';
                        if ($poi!=0) {
                            $dis = ((($poi-$price)/$poi)*100);
                            $badge = '<div class="ps-badge ps-badge--sale-off"><span>'.round($dis,0,PHP_ROUND_HALF_DOWN).'%</span></div>';
                            $show='<del>'.$poi.'</del>';
                        }elseif (strtotime($row->added_date) > strtotime('-7 day')) {
                            $badge = '<div class="ps-badge ps-badge--new"><span>New</span></div>';
                        }
                    ?>
                        <div class="ps-product_grid_item">
                            <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                            <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                            <?=$badge?>
                            <a class="ps-product_fav" href="javascript:addToWishlist('<?=$row->pro_id?>');" title="Favorite"><i class="ps-icon-heart"></i></a>
                            <div class="ps-pro_desc">
                                <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                                <p class="ps-product__price"><?=$show.$price?></p>
                                <a class="ps-product__cart" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if (4<$new['rowcount']) {?>
    <div class="ps-section pt-20 pb-20">
        <div class="ps-container">
            <div class="ps-section__header text-center">
                <h2 class="ps-section__title">NEW ARRIVALS</h2>
                <p>Here are our just arrived products.</p>
            </div>
            <div class="ps-section__content">
                <div class="ps-slider--center owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="3000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-nav-left="&lt;i class='ps-icon-arrow-left'&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class='ps-icon-arrow-right'&gt;&lt;/i&gt;">

                    <?php foreach ($new['products'] as $row) {
                        $price = $row->price;
                        $poi = $row->price_poi;
                        $link_name = $this->aayusmain->createHtmlName($row->name);
                        $link_cate = $this->aayusmain->createHtmlName($row->category);

                        $badge = '';
                        $show ='';
                        if ($poi!=0) {
                            $dis = ((($poi-$price)/$poi)*100);
                            $badge = '<div class="ps-badge ps-badge--sale-off"><span>'.round($dis,0,PHP_ROUND_HALF_DOWN).'%</span></div>';
                            $show='<del>'.$poi.'</del>';
                        }elseif (strtotime($row->added_date) > strtotime('-7 day')) {
                            $badge = '<div class="ps-badge ps-badge--new"><span>New</span></div>';
                        }
                    ?>
                        <div class="ps-product_grid_item">
                            <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                            <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                            <?=$badge?>
                            <a class="ps-product_fav" href="javascript:addToWishlist('<?=$row->pro_id?>');" title="Favorite"><i class="ps-icon-heart"></i></a>
                            <div class="ps-pro_desc">
                                <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                                <p class="ps-product__price"><?=$show.$price?></p>
                                <a class="ps-product__cart" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php foreach ($category_per as $row) {?>
    <div cate-id="<?=$row['cate_id']?>" class="categoryclasses">
        <div class="ps-section pt-20 pb-20">
            <div class="ps-container">
                <div class="ps-section__header text-center">
                    <h2 class="ps-section__title"><?=$row['category']?></h2>
                </div>
                <div class="ps-section__content">
                    <div class="row cateinsidepro" id="catepro<?=$row['cate_id']?>">
                        
                        <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="ps-product_grid_item">
                                <a class="ps_image-wrap" href="<?=base_url()?>product-detail/">
                                <img src="https://aayus.hexstyle.com/photos/products/a36bdf09e6dd94f838b257d07412b51c-std.jpg" alt="aaa"></a>
                                <div class="ps-badge ps-badge--sale-off"><span>10%</span></div>
                                <a class="ps-product_fav" href="javascript:addToWishlist(1);" title="Favorite"><i class="ps-icon-heart"></i></a>
                                <div class="ps-pro_desc">
                                    <a class="ps-product__title" href="<?=base_url()?>product-detail/" title="aaa">aaaaaa</a>
                                    <p class="ps-product__price"><del>100.00</del>200.00</p>
                                    <a class="ps-product__cart" href="<?=base_url()?>product-detail/" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <!-- ========================================footer====================================================================================== -->
    <?php $this->load->view('includes/footer'); ?>
    <input type="hidden" id="cate_ids" value="0">
    <!-- JS Library-->
    <!-- =================================================footerScript================================================================== -->
    <?php $this->load->view('includes/footerjs'); ?>
<!-- <script src="<?=base_url()?>assets/plugins/jquery.montage.js"></script> -->
    <script src="<?=base_url()?>assets/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="<?=base_url()?>assets/js/slider-1.js"></script>
   
    <script type="text/javascript">
        /*$('.categoryclasses').on({'mouseover': function(){
            if(!$(this).hasClass("proLoaded")){
                $(this).addClass( "proLoaded" );
                getCateProducts($(this).attr('cate-id'));
                $(this).find('.cateinsidepro').show();
            }
        }});*/

        /*var isCatProdLoadDone = false;
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            if (st >= ($(document).height() - $(window).height())*0.7) {
               if (st > lastScrollTop){
                   getCateProducts();
               }
            }
            lastScrollTop = st;
        });*/
        var isCatProdLoadDone = true;
        $(window).scroll(function(event){
            if($('.ps-loading').hasClass("loaded")&&isCatProdLoadDone){
                isCatProdLoadDone = false;
                $('.categoryclasses').each(function(){
                    if(!$(this).hasClass("proLoaded")){
                        $(this).addClass( "proLoaded");
                        getCateProducts($(this).attr('cate-id'));
                        $(this).find('.cateinsidepro').show();
                    }
                });
            }
        });

        function getCateProducts(id) {
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>get-front-cate_pros",
                data: 'cate_id='+id,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    var tbody = '';
                    for (var i = 0; i < responsedata.products.length; i++) {
                        var price = responsedata.products[i]['price'];
                        var poi = responsedata.products[i]['price_poi'];
                        var link_name = createHtmlName(responsedata.products[i]['name']);
                        var link_cate = createHtmlName(responsedata.products[i]['category']);

                        var minutes = 1000*60;
                        var hours = minutes*60;
                        var days = hours*24;
                        var foo_date1 = new Date(responsedata.products[i]['added_date'].replace(/-/g,"/"));
                        var foo_date2 = new Date();
                        var diff_date = Math.round((foo_date2 - foo_date1)/days);

                        var badge = '';
                        var show ='';
                        if (poi!=0) {
                            var dis = (((poi-price)/poi)*100);
                            badge = '<div class="ps-badge ps-badge--sale-off"><span>'+Math.round(dis)+'%</span></div>';
                            show='<del>'+poi+'</del>';
                        }else if(diff_date<8) {
                            badge = '<div class="ps-badge ps-badge--new"><span>New</span></div>';
                        }
                        img = '<?=PHOTO_DOMAIN?>products/'+responsedata.products[i]['photo_path']+'-std.jpg';
                        tbody+='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">'+
                                    '<div class="ps-product_grid_item">'+
                                        '<a class="ps_image-wrap" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'">'+
                                            '<img src="'+img+'" alt="'+responsedata.products[i]['photo_title']+'"></a>'+
                                        badge+
                                        '<a class="ps-product_fav" href="javascript:addToWishlist('+responsedata.products[i]['pro_id']+');" title="Favorite"><i class="ps-icon-heart"></i></a>'+
                                        '<div class="ps-pro_desc">'+
                                            '<a class="ps-product__title" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" title="'+responsedata.products[i]['name']+'">'+responsedata.products[i]['name']+'</a>'+
                                            '<p class="ps-product__price">'+show+''+price+'</p>'+
                                            '<a class="ps-product__cart" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>'+
                                '</div></div></div>';
                    }
                    $('#catepro'+id).append(tbody);
                }
            });
        }

        function redirect_fun(type,id) {
            if (type==1) {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>get-single-cate",
                    data: 'cate_id='+id,
                    success: function(result) {
                        if (result!='false') {
                            var responsedata = $.parseJSON(result);
                            var link_cate = createHtmlName(responsedata.category);
                            window.location.href = '<?=base_url()?>category/'+link_cate+'/'+responsedata.cate_id;
                        }
                    },
                    error: function(result) {
                        toastr["error"]('Error :'+result)
                    }
                });
            }else if(type==2){
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>get-single-pro",
                    data: 'pro_id='+id,
                    success: function(result) {
                        if (result!='false') {
                            var responsedata = $.parseJSON(result);
                            var link_name = createHtmlName(responsedata.name);
                            var link_cate = createHtmlName(responsedata.category);
                            window.location.href = '<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.pro_id;
                        }
                    },
                    error: function(result) {
                        toastr["error"]('Error :'+result)
                    }
                });
            }
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
        
        function createHtmlName(string){
            string = string.toLowerCase();
            string = string.replace(/[^a-zA-Z0-9_-]/g, '-');
            string = string.replace("(", "");
            string = string.replace(")", "");
            string = string.replace("---","-");
            string = string.replace("--","-");
            return string;
        }

        function run_waitMe(el){
            $(el).waitMe({
              effect: 'timer',
              text: 'Please wait...',
              bg: 'rgba(255,255,255,0.7)',
              color: '#000',
              maxSize: '',
              source: '',
              onClose: function() {}
            });
        }
    </script>
</body>

</html>