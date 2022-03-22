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
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <?php $this->load->view('includes/account_header'); ?>
    <!--include ../partials/module/subscribe-popup-->
    <div class="ps-template-3">
        <?php if (4<=$popular['rowcount']) {?>
            <div class="ps-hero mb-20">
                <div class="container">
                    <h3>POPULAR PRODUCTS</h3>
                    <p>Popular collections filtered from most viewed products.</p>
                </div>
            </div>
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
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="ps-product_grid_item">
                        <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                        <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                        <?=$badge?>
                        
                        <div class="ps-pro_desc">
                            <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                            <p class="ps-product__price"><?=$show.$price?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (4<=$top['rowcount']) {?>
            <div class="ps-hero mb-20">
                <div class="container">
                    <h3>TOP SELLING PRODUCTS</h3>
                    <p>Here are key products that bring fashionistas to HexStyle Store.</p>
                </div>
            </div>
            <div class="row">
                <?php 
                    if($top['rowcount']<8){
                        $limit = 4;
                    }else{
                        $limit = 8;
                    }
                    foreach (array_slice($top['products'], 0, $limit) as $row) {
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
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="ps-product_grid_item">
                        <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                        <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                        <?=$badge?>
                        
                        <div class="ps-pro_desc">
                            <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                            <p class="ps-product__price"><?=$show.$price?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (4<=$new['rowcount']) {?>
            
            <div class="ps-hero mb-20">
                <div class="container">
                    <h3>NEW ARRIVALS</h3>
                    <p>Here are our just arrived products.</p>
                </div>
            </div>
            <div class="row">
                <?php 
                    if($new['rowcount']<8){
                        $limit = 4;
                    }else{
                        $limit = 8;
                    }
                    foreach (array_slice($new['products'], 0, $limit) as $row) {
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
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="ps-product_grid_item">
                        <a class="ps_image-wrap" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>">
                        <img src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->photo_title?>"></a>
                        <?=$badge?>
                        
                        <div class="ps-pro_desc">
                            <a class="ps-product__title" href="<?=base_url()?>product-detail/<?=$link_cate?>/<?=$link_name?>/<?=$row->pro_id?>" title="<?=$row->name?>"><?=$row->name?></a>
                            <p class="ps-product__price"><?=$show.$price?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <!-- JS Library-->
    <!-- ======================================================footer script ======================================== -->
    <?php $this->load->view('includes/acfootjs'); ?>
    
</body>

</html>