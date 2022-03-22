<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- ============================================ head ================================================================ -->
    <?php $this->load->view('includes/head'); ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/waitMe/waitMe.css">
    <style type="text/css">
        .side-menu {
          width: 100%;
          height: auto;
          padding-bottom: 25px;
          margin-bottom: 25px;
          z-index: 1000;
          position: relative;
        }
        .side-menu .navbar {
          border: none;
          max-height: 600px;
          overflow-y: auto;
        }
        .brand_widget .ps-list--checked{
            max-height: 250px;
            overflow-y: auto;
        }
        .side-menu .navbar::-webkit-scrollbar-track, .brand_widget .ps-list--checked::-webkit-scrollbar-track{
            background-color: #F5F5F5;
        }

        .side-menu .navbar::-webkit-scrollbar, .brand_widget .ps-list--checked::-webkit-scrollbar{
            width: 5px;
            background-color: #F5F5F5;
        }

        .side-menu .navbar::-webkit-scrollbar-thumb, .brand_widget .ps-list--checked::-webkit-scrollbar-thumb{
            background-color: #333;
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover, .side-menu .nav>li>a:focus, .side-menu .nav>li>a:hover, .side-menu .nav>.active>a {
            background-color: #fff;
            color: #ffa927;
        }
        .side-menu .navbar-nav li {
          display: block;
          width: 100%;
        }
        .side-menu .expandedBtn{
          position: absolute;
          top: 7px;
          right: 10px;
          cursor: pointer;
          font-size: 22px;
        }
        .side-menu .expandedBtn[aria-expanded="true"]:before{
            content:"-";
        }
        .side-menu .expandedBtn[aria-expanded="false"]:before{
            content:"+";
        }
        .side-menu .navbar-nav li a {
          color: #313131;
          font-size:14px;
          padding-top: 10px;
          padding-bottom: 10px;
        }
        .side-menu .panel {
          border: 0;
          margin-bottom: 0;
          border-radius: 0;
          box-shadow: none;
        }
        .side-menu .panel .caret {
          float: right;
          margin: 9px 5px 0;
        }
        .side-menu .panel a {
          border-bottom: 1px solid #e5e5e5;
        }
        .side-menu .panel a:hover {
          background-color: #fff;
        }
        .side-menu .panel .panel-body {
          padding: 0;
        }
        .side-menu .panel .panel-body .navbar-nav {
          width: 100%;
        }
        .side-menu .ps-menu_title h3{
            font-size: 18px;
            font-weight: 700;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .ps-widget__header>h3>span{
            float: right;
            font-size: 12px;
            cursor: pointer;
        }
        .ps-filter__trigger {
            display: none;
        } 
        .ps-sidebar{
            display: block;
        }
        @media (max-width: 1199px) {
            .ps-filter__trigger {
                display: block;
            } 
            .ps-sidebar{
                display: none;
            }
        }

    </style>
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading" onload="getProducts();">
    <div class="header--sidebar"></div>
    
    <!-- ===================================================== header ============================================ -->
    <?php $this->load->view('includes/header'); ?>    
    
    <div class="ps-hero">
        <div class="container">
            <h3 id="mainTitle"><?php if ($category) { echo($category->category); }else if($brand){echo($brand->brand);}else{ echo $page->headline; } ?></h3>
            <p><?=$page->second_title?></p>
        </div>
    </div>
    
    <main class="ps-main ps-products-listing">

        <div class="ps-filter__trigger">
            <div class="ps-filter__icon"><span></span></div>
            <p>Filter Product</p>
        </div>

        <aside class="ps-sidebar">

            <div class="side-menu">
                <div class="ps-menu_title"><h3>Category</h3></div>
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <ul class="nav">
                            <?php

                                function write_with_child($cate, $selected_cate) {
                                    $cate_link = createHtmlName($cate->category);
                                    $arr = explode("|",$cate->tree_path);
                                    $depth = count($arr)-1;
                                    $val_str = "";
                                    for ($i=0; $i <$depth ; $i++) { 
                                      $val_str ="&#160;&#160;". $val_str;
                                    }
                                    $val_str = $val_str.$cate->category;

                                    $tree_path_arr = array();
                                    if ($selected_cate) { 
                                        $tree_path_arr = explode("|",$selected_cate->tree_path);
                                    }
                                    
                                    if (isset($cate->sub_cat) && sizeof($cate->sub_cat) > 0) {?>
                                        
                                        <li class="panel<?php if($selected_cate && $cate->cate_id == $selected_cate->cate_id){echo ' active';}?>">
                                            <a href="<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>"><?=$val_str?></a><span data-toggle="collapse" data-target="#menu<?=$cate->cate_id?>" aria-expanded="<?php if(in_array($cate->cate_id, $tree_path_arr)){echo 'true';}else{echo "false";}?>" class="expandedBtn"></span>
                                        
                                            <div id="menu<?= $cate->cate_id?>" 
                                                class="panel-collapse <?php if(in_array($cate->cate_id, $tree_path_arr)){echo 'collapse in';}
                                                else{echo 'collapse';} ?>">
                                                <div class="panel-body">
                                                   <ul class="nav navbar-nav">
                                                    <?php
                                                        foreach ($cate->sub_cat as $child_cat) {
                                                            write_with_child($child_cat, $selected_cate); 
                                                        }
                                                    ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    } else { ?> 
                                        <li class="panel<?php if($selected_cate && $cate->cate_id == $selected_cate->cate_id){echo ' active';}?>"><a href="<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>"><?=$val_str?></a></li> 
                                    <?php 
                                    }
                                }
                                
                                foreach ($cates as $cate) {
                                    write_with_child($cate, $category);
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>

            <aside class="ps-widget--sidebar ps-widget--category brand_widget" style="z-index: 1000;position: relative;">
                <div class="ps-widget__header">
                    <h3>Brands <span id="brand_clear" <?php if(!$brand){echo "style='display:none;'";}?>>Clear</span></h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked" id="brandUl">
                        <?php foreach ($proBrands as $row) {
                            $current='';
                            if ($brand) {
                                if ($row->brand_id==$brand->brand_id) {
                                    $current='current';
                                }
                            }
                        ?>
                        <li id="brandLi<?=$row->brand_id?>" class="<?=$current?>"><a href="javascript:filterByBrand(<?=$row->brand_id?>);"><?=$row->brand?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </aside>

            <aside class="ps-widget--sidebar ps-widget--filter price_filter" style="padding-bottom: 70px;">
                <div class="ps-widget__header">
                    <h3>Price Filter</h3>
                </div>
                <div class="col-md-12" style="padding-left: 9px;">
                    <?php 
                    $max_p=$price_range->max_price;
                    if($price_range->min_price==$price_range->max_price){
                        $max_p=$price_range->max_price+1;
                    }?>
                    <div id="range" price-min="<?=$price_range->min_price?>" price-max="<?=$max_p?>"></div>
                </div>
            </aside>

            <!-- <aside class="ps-widget--sidebar ps-widget--category" style="z-index: 1000;position: relative;">
                <div class="ps-widget__header">
                    <h3>Brands <span id="brand_clear" <?php if(!$brand){echo "style='display:none;'";}?>>Clear</span></h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked" id="brandUl">
                        <?php foreach ($proBrands as $row) {
                            $current='';
                            if ($brand) {
                                if ($row->brand_id==$brand->brand_id) {
                                    $current='current';
                                }
                            }
                        ?>
                        <li id="brandLi<?=$row->brand_id?>" class="<?=$current?>"><a href="javascript:filterByBrand(<?=$row->brand_id?>);"><?=$row->brand?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </aside> -->

<!-- 
            <aside class="ps-widget--sidebar ps-widget--filter hide">
                <div class="ps-widget__header">
                    <h3>Price Filter</h3>
                </div>
                <div class="ps-widget__content">
                    <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                    <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Width</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.html">Narrow</a></li>
                        <li><a href="product-listing.html">Regular</a></li>
                        <li><a href="product-listing.html">Wide</a></li>
                        <li><a href="product-listing.html">Extra Wide</a></li>
                    </ul>
                </div>
            </aside>
            <div class="ps-sticky">
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Size</h3>
                    </div>
                    <div class="ps-widget__content">
                        <table class="table ps-table--size">
                            <tbody>
                                <tr>
                                    <td class="active">3</td>
                                    <td>5.5</td>
                                    <td>8</td>
                                    <td>10.5</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>3.5</td>
                                    <td>6</td>
                                    <td>8.5</td>
                                    <td>11</td>
                                    <td>13.5</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>6.5</td>
                                    <td>9</td>
                                    <td>11.5</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>4.5</td>
                                    <td>7</td>
                                    <td>9.5</td>
                                    <td>12</td>
                                    <td>14.5</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>7.5</td>
                                    <td>10</td>
                                    <td>12.5</td>
                                    <td>15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Color</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--color">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </aside>
            </div> -->
        </aside>

        <div class="ps-content">
            <div class="ps-product-group">
                <div class="ps-product-group__content">
                    <div class="ps-product-group__action">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <p id="showing_res"></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <select class="ps-select" title="Default Sorting" id="sortingSel" onchange="getProducts();">
                                    <option value="">Default Sorting</option>
                                    <option value="price_asc">Price Lowest First</option>
                                    <option value="price_desc">Price Highest First</option>
                                    <option value="added_date">Newly Listed</option>
                                    <option value="sales_count">Top Sales</option>
                                    <option value="view_count">Most Viewed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="product_body" class="row">
                        <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="ps-product_grid_item">
                                <a class="ps_image-wrap" href="">
                                <img src="http://localhost/hexstyle/photos/products/dc6533e7f5a93900fb6f743e4ab8f692-std.jpg" alt=""></a>
                                <div class="ps-badge ps-badge--sale-off"><span>-40%</span></div>
                                <a class="ps-product_fav" href="#" title="Favorite"><i class="ps-icon-heart"></i></a>
                                <div class="ps-pro_desc">
                                    <a class="ps-product__title" href="product-detail.html">PARKER BACKPACK</a>
                                    <p class="ps-product__price"><del>$450.89</del>$200</p>
                                    <a class="ps-product__cart" href="#" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="ps-product-group__footer" id="pagination_div">
                    <div class="ps-pagination">
                        <ul class="pagination" id="pagination_ul">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <input type="hidden" id="proCate" value="<?php if ($this->uri->segment(1)=='category') {echo($this->uri->segment(3));}else{echo(0);}?>">
    <input type="hidden" id="proBrand" value="<?php if ($this->uri->segment(1)=='brand') {echo($this->uri->segment(3));}else{echo(0);}?>">
    <input type="hidden" id="offset_field" value="0">
    <!-- ======================================================== footer =============================================== -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- =========================================================== footer script ========================================= -->
    <?php $this->load->view('includes/footerjs'); ?>
    <script src="<?=base_url()?>assets/plugins/nouislider/nouislider.js"></script>
    <script src="<?=base_url()?>assets/plugins/waitMe/waitMe.js"></script>
    <script type="text/javascript">
        var range = document.getElementById('range');

        var pmin = $('#range').attr('price-min');
        var pmax = $('#range').attr('price-max');

        if ((pmin!=""||pmin!=null)&&(pmax!=""||pmax!=null)) {
            noUiSlider.create(range, {
                start: [Math.ceil(pmin), Math.ceil(pmax)],
                connect: true,
                range: {
                    'min': Math.ceil(pmin),
                    'max': Math.ceil(pmax)
                },
                tooltips: true
            }); 
        }else{
            $('.price_filter').hide();
        }

        range.noUiSlider.on('end.one', function(){
            getProductsByFilter();
        });

        $( ".ps-filter__trigger" ).click(function() {
            $(this).find('.ps-filter__icon').toggleClass('active');
            $('.ps-sidebar').slideToggle();
        });

        /*$('.ps-filter__trigger').on('click', function(e) {
            e.preventDefault();
            var el = $(this);
            el.find('.ps-filter__icon').toggleClass('active');
            $('.ps-sidebar').slideToggle();
        });*/

        function getProducts() {
            var limit = 40;
            var offset = parseInt($('#offset_field').val());
            var price = ['', ''];
            if ((pmin!=""||pmin!=null)&&(pmax!=""||pmax!=null)) {
                price = range.noUiSlider.get();
            }
            var priceRange = '&price-min='+price[0]+'&price-max='+price[1];
            run_waitMe('.ps-content');
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>getProducts",
                data: 'search='+$('#proSearch').val()+'&category='+$('#proCate').val()+'&brand='+$('#proBrand').val()+'&sorting='+$('#sortingSel').val()+'&limit='+limit+'&offset='+offset+priceRange,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    $('#pagination_div').hide();
                    $('#product_body,#pagination_ul').empty();
                    var tbody = '';
                    if (responsedata.rowcount==0) {
                        $('#showing_res').text('');
                        $('#product_body').append('<h4 class="ps-btn--fullwidth">No Results</h4>');
                    }else{
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

                            /*tbody+='<div class="ps-product-wrap">'+
                            '<div class="ps-product--fashion">'+
                                '<div class="ps-product__thumbnail"><a class="ps-product__overlay" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'"></a><img src="'+img+'" alt="'+responsedata.products[i]['photo_title']+'">'+
                                    badge+
                                    '<ul class="ps-product__actions">'+
                                        '<li><a href="#" title="Favorite"><i class="ps-icon-heart"></i></a></li>'+
                                    '</ul>'+
                                '</div>'+
                                '<div class="ps-product__content"><a class="ps-product__title" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" title="'+responsedata.products[i]['name']+'">'+responsedata.products[i]['name']+'</a>'+
                                    '<p class="ps-product__price">'+
                                        show+''+price+
                                    '</p><a class="ps-product__cart" href="#" title="Add To Cart"><i class="ps-icon-cart-2"></i></a>'+
                                '</div></div></div>';*/
                        }
                        $('#product_body').append(tbody);

                        var pagination_str = "";
                        var row_count = parseInt(responsedata.rowcount);
                        var pages = Math.ceil(row_count/limit);
                        var j=1;
                        if (1<pages) {
                            if (0<=(offset-limit)) {
                                pagination_str+='<li><a href="javascript:set_offset('+(offset-limit)+')"><i class="fa fa-angle-left"></i></a></li>';
                            }else{
                                pagination_str+='<li class="disabled"><a><i class="fa fa-angle-left"></i></a></li>';
                            }
                            if(1<((offset/limit)+1)){
                                pagination_str+='<li><a href="javascript:set_offset('+0+')">'+1+'</a></li>';
                            }

                            if(((offset/limit)+1)>3){
                                pagination_str+='<li><a>...</a></li>';
                            }

                            if(((offset/limit)+1)>2){
                                pagination_str+='<li><a href="javascript:set_offset('+(offset-limit)+')">'+(offset/limit)+'</a></li>';
                            }

                            pagination_str+='<li class="active"><a>'+((offset/limit)+1)+'</a></li>';

                            if(((offset/limit)+1)<(pages-1)){
                                pagination_str+='<li><a href="javascript:set_offset('+(offset+limit)+')">'+((offset/limit)+2)+'</a></li>';
                            }

                            if(((offset/limit)+1)<(pages-2)){
                                pagination_str+='<li><a>...</a></li>';
                            }

                            if(pages>((offset/limit)+1)){
                                pagination_str+='<li><a href="javascript:set_offset('+((pages-1)*limit)+')">'+pages+'</a></li>';
                            }
                            if ((offset+limit)<(pages*limit)) {
                                pagination_str+='<li><a href="javascript:set_offset('+(offset+limit)+')"><i class="fa fa-angle-right"></i></a></li>';
                            }else{
                                pagination_str+='<li class="disabled"><a><i class="fa fa-angle-right"></i></a></li>';
                            }
                            $('#pagination_ul').append(pagination_str);
                            $('#pagination_div').show();
                        }
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        var shows = '';
                        var s = 's';
                        if (row_count==1) {
                            s = '';
                        }
                        shows = 'Showing '+(offset+1)+'–'+(offset+limit)+' from '+row_count+' item'+s;
                        $('#showing_res').text(shows);
                    }
                    $('.ps-content').waitMe('hide');
                },
                error: function(result) {
                  alert('error');
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

        /*function addToCart(id) {
            var qty = 1;
            var price = $("#item-price").text();
            var name = $("#item-name").text();
      
            if(0==qty){
                toastr["warning"]("Quantity is 0.");
            }else{
                //var mian_id = id+"_"+attr_id;
                if (id!=null&&qty!=null&&price!=null&&name!=null) {
                    var data = 'id='+ id + '&qty='+ qty + '&price='+ price + '&name='+ name;
                    $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>addToCart",
                    data: data,
                    success: function(result) {
                        var responsedata = $.parseJSON(result);
                        if (responsedata.exists==1) {
                           toastr["info"]("Quantity was updated!<br> Visit cart for more info.");
                        } else if(responsedata.exists==2){
                            $("#cart_count").text(responsedata.count);
                            toastr["success"]("Added To Cart!<br> Visit cart for more info.");
                        }
                    },
                    error: function(result){
                        toastr["error"](result);
                    }
                    });
                }
            }
        }*/

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

        function set_offset(value) {
            $('#offset_field').val(value);
            getProducts();
        }

        function getProductsByFilter() {
            $('#offset_field').val(0);
            getProducts();
        }
        
        function filterByBrand(brand) {
            var proBrand = $('#proBrand').val();
            var proCate = $('#proCate').val();
            if (proCate==0||proCate=='') {
                var text = $("#brandLi"+brand).find('a').text();
                $('#mainTitle').text(text);
            }
            $("#brandUl li").removeClass("current");
            $("#brandLi"+brand).addClass( "current" );
            $("#brand_clear").show();
            $('#proBrand').val(brand);
            getProductsByFilter();
        }

        $("#brand_clear").click(function() {
            var proBrand = $('#proBrand').val();
            var proCate = $('#proCate').val();
            if (proCate==0||proCate=='') {
                $('#mainTitle').text('Products');
            }
            $("#brandUl li").removeClass("current");
            $('#proBrand').val(0);
            $("#brand_clear").hide();
            getProductsByFilter();
        });

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
