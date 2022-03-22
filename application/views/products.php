<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('includes/head'); ?>
	<style type="text/css">
		img.makePhot{
			  height: 191px;
			  width: 191px;
			  object-fit: contain;
			  display:flex;
			  justify-content:center;
			  align-items:center;
			  overflow:hidden;
					}

		.product-item-name a{
			display: -webkit-box;
		    margin: 0 auto;
		    -webkit-line-clamp: 3;
		    -webkit-box-orient: vertical;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    height: 54px;
		}

		@media screen and (max-width: 457) {
            img.makePhot{
                width:100% !important;
                height:359px !important;
            }
            .navHeight{
            	padding-top: 0px !important;
            }
        }

		.Editfilter{
		    font-size: 15px !important;
		    padding: 5px 19px !important;
		}

		.togglePlus{
			width: 29px !important;
    		height: 29px !important;
    		line-height: 30px !important;
		}
		.imageCard{
			height: 191px !important;
		}
	</style>
</head>
<body class="boxed" onload="getProducts();">
	<!-- Loader -->
	<div id="loader-wrapper">
		<div class="cube-wrapper">
			<div class="cube-folding">
				<span class="leaf1"></span>
				<span class="leaf2"></span>
				<span class="leaf3"></span>
				<span class="leaf4"></span>
			</div>
		</div>
	</div>
	<!-- /Loader -->
	<div class="fixed-btns">
		<!-- Back To Top -->
		<a href="#" class="top-fixed-btn back-to-top"><i class="icon icon-arrow-up"></i></a>
		<!-- /Back To Top -->
	</div>
	<div id="wrapper">
		<!-- Page -->
		<div class="page-wrapper">
			<?php $this->load->view('includes/header'); ?>
			<!-- Page Content -->
			<main class="page-main">
				<div class="block">
					<div class="container navHeight" style="margin-top: 30px;">
						<ul class="breadcrumbs">
							<li><a href="<?=base_url()?>"><i class="icon icon-home"></i></a></li>
							<li>/<span><?php if ($category) { echo($category->category); }else if($brand){echo($brand->brand);}else{ echo $page->headline; } ?></span></li>
						</ul>
					</div>
				</div>
				<div class="container">
					<!-- Two columns -->
					<div class="row row-table">
						<!-- Left column -->
						<div class="col-md-3 filter-col fixed aside">
							<div class="filter-container">
								<div class="fstart"></div>
								<div class="fixed-wrapper">
									<div class="fixed-scroll">
										<div class="filter-col-header">
											<div class="title">Filters</div>
											<a href="#" class="filter-col-toggle"></a>
										</div>
										<div class="filter-col-content">
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

				                                    	<div class="sidebar-block collapsed">
															<div class="block-title Editfilter">
											 					<a href="<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>">
											 						<span><?=$cate->category?></span data-toggle="collapse" data-target="#menu<?=$cate->cate_id?>" aria-expanded="<?php if(in_array($cate->cate_id, $tree_path_arr)){echo 'true';}else{echo "false";}?>" class=""></span>
											 					</a>
																<div class="toggle-arrow togglePlus"></div>
															</div>
														</a>
															<div class="block-content">
																<ul class="category-list">
																	<?php
				                                                       foreach ($cate->sub_cat as $child_cat) {
				                                                           write_with_child($child_cat, $selected_cate); 
				                                                        }
				                                                    ?>
																</ul>
																<div class="bg-striped"></div>
															</div>
														</div> 
				                                    <?php
				                                    } else { ?>
				                                   <!-- <li <?php if($selected_cate && $cate->cate_id == $selected_cate->cate_id){echo 'class="active"';}?>><a href="<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>" onclick="go_link('<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>');" class="value"><?=$cate->category?></a><a href="#" class="clear"></a></li> -->
				                                         <div class="sidebar-block collapsed">
															<div class="block-title">
											 					<a href="<?=base_url();?>category/<?=$cate_link?>/<?=$cate->cate_id?>">
											 						<span><?=$cate->category?></span data-toggle="collapse" data-target="#menu<?=$cate->cate_id?>" aria-expanded="<?php if(in_array($cate->cate_id, $tree_path_arr)){echo 'true';}else{echo "false";}?>" class=""></span>
											 					</a>
																<!-- <div class="toggle-arrow togglePlus"></div> -->
															</div>
														</a>
													</div> 

				                                    <?php 
				                                    }
				                                }
				                                foreach ($cates as $cate) {
				                                    write_with_child($cate, $category);
				                                }
				                            ?>
										<!-- price -->	
											<div class="sidebar-block collapsed">
												<div class="block-title Editfilter">
													<span>Price</span>
													<div class="toggle-arrow togglePlus"></div>
												</div>
												<div class="block-content">
													<div class="price-slider-wrapper">
														<?php 
										                    $max_p=$price_range->max_price;
										                    if($price_range->min_price==$price_range->max_price){
										                        $max_p=$price_range->max_price+1;
										                }?>
														<div class="price-values">
															<div class="pull-left"><span id="priceMin"><?=$price_range->min_price?></span></div>
															<div class="pull-right"><span id="priceMax"><?=$max_p?></span></div>
														</div>
														<div id="priceSlider" class="price-slider"></div>
													</div>
													<div class="bg-striped"></div>
												</div>
											</div>
										</div>
										<!-- //price -->
									</div>
								</div>
								<div class="fend"></div>
							</div>
						</div>
						<!-- /Left column -->
						<!-- Center column -->
						<div class="col-md-9 aside">
							<!-- Page Title -->
							<div class="page-title">
								<div class="title center">
									<h1><?php if ($category) { echo($category->category); }else if($brand){echo($brand->brand);}else{ echo $page->headline; } ?></h1>
								</div>
							</div>
							<!-- /Page Title -->
							<!-- Filter Row -->
							<div class="filter-row">
								<div class="row">
									<div class="col-xs-8 col-sm-7 col-lg-5 col-left">
										<div class="filter-button">
											<a href="#" class="btn filter-col-toggle"><i class="icon icon-filter"></i><span>FILTER</span></a>
										</div>
										<div class="form-label">Sort by:</div>
										<div class="select-wrapper-sm">
											<select class="form-control input-sm" id="sortingSel" onchange="getProducts();">
												<option value="">Default Sorting</option>
			                                    <option value="price_asc">Price Lowest First</option>
			                                    <option value="price_desc">Price Highest First</option>
			                                    <option value="added_date">Newly Listed</option>
			                                    <option value="sales_count">Top Sales</option>
			                                    <option value="view_count">Most Viewed</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 col-lg-2 hidden-xs">
										
									</div>
									<div class="col-xs-4 col-sm-3 col-lg-5 col-right">
										<div class="form-label">Show:</div>
										<div class="select-wrapper-sm">
											<select class="form-control input-sm" id="limitsortsel" onchange="getProducts();">
												<option value="20">20</option>
												<option value="40">40</option>
												<option value="60">60</option>
											</select>
										</div>
									</div>
								</div>
								<div class="bg-striped"></div>
							</div>
							<!-- /Filter Row -->
							<!-- Total -->
							<div class="items-total"></div>
							<!-- /Total -->
							<!-- Products Grid -->
							<div class="products-grid four-in-row product-variant-5" id="product_body">  
							</div>
							<!-- /Products Grid -->
							<!-- Filter Row -->
							<div id="pagination_div">
								<ul class="pagination pull-right" id="pagination_ul">
									
								</ul>
							</div>
							<!-- <div class="filter-row">
								<div class="row">
									<div class="col-xs-8 col-sm-7 col-lg-5 col-left">
										<div class="filter-button">
											<a href="#" class="btn filter-col-toggle"><i class="icon icon-filter"></i><span>FILTER</span></a>
										</div>
										<div class="form-label">Sort by:</div>
										<div class="select-wrapper-sm">
											<select class="form-control input-sm">
												<option value="featured">Featured</option>
												<option value="rating">Rating</option>
												<option value="price">Price</option>
											</select>
										</div>
										<div class="directions">
											<a href="#"><i class="icon icon-arrow-down"></i></a>
											<a href="#"><i class="icon icon-arrow-up"></i></a>
										</div>
									</div>
									<div class="col-sm-2 col-lg-2 hidden-xs">
										<div class="view-mode">
											<a href="#" class="grid-view"><i class="icon icon-th"></i></a>
											<a href="#" class="list-view"><i class="icon icon-th-list"></i></a>
										</div>
									</div>
									<div class="col-xs-4 col-sm-3 col-lg-5 col-right">
										<div class="form-label">Show:</div>
										<div class="select-wrapper-sm">
											<select class="form-control input-sm">
												<option value="featured">12</option>
												<option value="rating">36</option>
												<option value="price">100</option>
											</select>
										</div>
									</div>
								</div>
							</div> -->
							<!-- /Filter Row -->
						</div>
						<!-- /Center column -->
					</div>
					<div class="ymax"></div>
					<!-- /Two columns -->
				</div>
			</main>
			<input type="hidden" id="proCate" value="<?php if ($this->uri->segment(1)=='category') {echo($this->uri->segment(3));}else{echo(0);}?>">
		    <input type="hidden" id="proBrand" value="<?php if ($this->uri->segment(1)=='brand') {echo($this->uri->segment(3));}else{echo(0);}?>">
		    <input type="hidden" id="offset_field" value="0">
			<!-- /Page Content -->


			<!-- whatsapp -->
			<?php $this->load->view('includes/whatsapp'); ?>
			

			<?php $this->load->view('includes/footer'); ?>
		</div>
		<!-- Page Content -->
	</div>
	
	<?php $this->load->view('includes/footerjs'); ?>
	<script type="text/javascript">
		function getProducts() {
			var priceSlider = document.getElementById('priceSlider');
			var inputPriceMax = $('#priceMax').text();
			var inputPriceMin = $('#priceMin').text(); 
            var limit = parseInt($('#limitsortsel').val());
            var offset = parseInt($('#offset_field').val());
            // alert(offset);
            var price = ['', ''];
            if ((inputPriceMin!=""||inputPriceMin!=null)&&(inputPriceMax!=""||inputPriceMax!=null)) {
                price = priceSlider.noUiSlider.get();
                // alert(price);
            }
            var priceRange = '&price-min='+price[0]+'&price-max='+price[1];
            var type = 0;
            var offer_seg = '<?=$this->uri->segment(1);?>';
            if (offer_seg == 'offers') {
            	type = 1;
            }else{
            	type = 0;
            }
            run_waitMe('.ps-content');
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>getProducts",
                data: 'search='+$('#proSearch').val()+'&category='+$('#proCate').val()+'&brand='+$('#proBrand').val()+'&sorting='+$('#sortingSel').val()+'&limit='+limit+'&offset='+offset+priceRange+'&type='+type,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    $('#pagination_div').hide();
                    $('#product_body,#pagination_ul').empty();
                    var tbody = '';
                    if (responsedata.rowcount==0) {
                        $('#showing_res').text('');
                        $('#product_body').append('<h4 class="ps-btn--fullwidth">No Results</h4>');
                    }else{
                    	var seg = '<?=$this->uri->segment(1);?>';
                    	if (seg=='offers') {
                    		// alert(responsedata.rowcount);
                    		var a = 0;
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
                            if (poi==0.00) {
                                continue;
                            }else {
                            	var dis = (((poi-price)/poi)*100);
                                badge = '<div class="product-item-label label-sale"><span>'+Math.round(dis)+'%</span></div>';
                                show='<span class="old-price">LKR.'+poi+'</span><br>';
                                a++;
                                // badge = '<div class="product-item-label label-new"><span>New</span></div>';
                            }
                            img = '<?=PHOTO_DOMAIN?>products/'+responsedata.products[i]['photo_path']+'-std.jpg';
                            var to_cart = '<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'';
                            tbody+='<div class="product-item large category1">'+
								'<div class="product-item-inside">'+
									'<div class="product-item-info">'+
										'<div class="product-item-photo">'+badge+
											'<div class="product-item-gallery">'+
												'<div class="product-item-gallery-main">'+
													'<a href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'"><img class="product-image-photo makePhot" src="'+img+'" alt="'+responsedata.products[i]['photo_title']+'" style="margin:0 auto;"></a>'+
												'</div>'+
											'</div>'+
											'<a href="javascript:addToWishlist('+responsedata.products[i]['pro_id']+');" title="Add to Wishlist" class="no_wishlist"> <i class="icon icon-heart"></i><span>Add to Wishlist</span> </a>'+
										'</div>'+
										'<div class="product-item-details">'+
											'<div class="product-item-name"> <a title="'+responsedata.products[i]['name']+'" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" class="product-item-link">'+responsedata.products[i]['name']+'</a> </div>'+
											'<div class="product-item-description">'+responsedata.products[i]['description']+'</div>'+
											'<div class="price-box"> <span class="price-container"> <span class="price-wrapper">'+show+'<span class="price">LKR.'+price+'</span></span>'+
												'</span>'+
											'</div>'+ 
											'<a class="btn add-to-cart" data-product="789123" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'"> <i class="icon icon-cart"></i><span>Add to Cart</span> </a>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'; 
                        }

                        	if ((offset + limit)>a) {
                        		var NoOfProducts = a;
                        	}
                        	else{
                        		var NoOfProducts = offset + limit;
                        	}

                        	$(".items-total").text((offset+1)+" to "+NoOfProducts+" of "+a);

	                         }
	                         else{

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
                                badge = '<div class="product-item-label label-sale"><span>'+Math.round(dis)+'%</span></div>';
                                show='<span class="old-price">LKR.'+poi+'</span><br>';
                            }else if(diff_date<8) {
                                badge = '<div class="product-item-label label-new"><span>New</span></div>';
                            }
                            img = '<?=PHOTO_DOMAIN?>products/'+responsedata.products[i]['photo_path']+'-std.jpg';
                            var to_cart = '<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'';
                            tbody+='<div class="product-item large category1">'+
								'<div class="product-item-inside">'+
									'<div class="product-item-info">'+
										'<div class="product-item-photo">'+badge+
											'<div class="product-item-gallery">'+
												'<div class="product-item-gallery-main imageCard">'+
													'<a href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'"><img class="product-image-photo makePhot" src="'+img+'" alt="'+responsedata.products[i]['photo_title']+'" style="margin:0 auto;"></a>'+
												'</div>'+
											'</div>'+
											'<a href="javascript:addToWishlist('+responsedata.products[i]['pro_id']+');" title="Add to Wishlist" class="no_wishlist"> <i class="icon icon-heart"></i><span>Add to Wishlist</span> </a>'+
										'</div>'+
										'<div class="product-item-details">'+
											'<div class="product-item-name"> <a title="'+responsedata.products[i]['name']+'" href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" class="product-item-link">'+responsedata.products[i]['name']+'</a> </div>'+
											'<div class="product-item-description">'+responsedata.products[i]['description']+'</div>'+
											'<div class="price-box"> <span class="price-container"> <span class="price-wrapper">'+show+'<span class="price">LKR.'+price+'</span></span>'+
												'</span>'+
											'</div>'+ 
											'<input type="hidden" id="linkname'+responsedata.products[i]['pro_id']+'" value="'+link_name+'">'+
											'<input type="hidden" id="cate'+responsedata.products[i]['pro_id']+'" value="'+link_cate+'">'
												+
											'<a class="btn add-to-cart" data-product="789123" href="javascript:test(`'+responsedata.products[i]['pro_id']+'`)"> <i class="icon icon-cart"></i><span>Add to Cart</span> </a>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'; 
                        }

                        	var NoOfProducts = offset + limit;
                        	$(".items-total").text((offset+1)+" to "+NoOfProducts+" of "+responsedata.rowcount);

	                         }

                        $('#product_body').append(tbody);
                        var pagination_str = "";
                        var row_count = parseInt(responsedata.rowcount);
                        var pages = Math.ceil(row_count/limit);
                        // alert(pages);
                        // var NoOfProducts = offset + limit;
                        // $(".items-total").text(offset+" to "+NoOfProducts+" of "+responsedata.rowcount);
                        var j=1;
                        if (1<pages) {
                            if (0<=(offset-limit)) {
                                pagination_str+='<li><a href="javascript:set_offset('+(offset-limit)+')"><i class="icon icon-angle-left"></i></a></li>'; 
                            }else{
                                pagination_str+='<li class="disabled"><a><i class="icon icon-angle-left"></i></a></li>';
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
                                pagination_str+='<li><a href="javascript:set_offset('+(offset+limit)+')"><i class="icon icon-angle-right"></i></a></li>';
                            }else{
                                pagination_str+='<li class="disabled"><a><i class="icon icon-angle-right"></i></a></li>';
                            }
                            if (type == 0) {
    	                        $('#pagination_ul').append(pagination_str);
                            	$('#pagination_div').show();
                            }
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
            $('#offset_field').val(value);limitsortsel
            getProducts();
        }
        function getProductsByFilter() {
            $('#offset_field').val(0);
            getProducts();
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
        function go_link(link) {
        	location.href=link;
        }

        function test(id){

        	var pro_id = id;
			var cate = $('#cate'+id).val();
			var name = $('#linkname'+id).val();
        	//alert(cate+name+id);

        	$.ajax({
                type: "POST",
                url: "<?=base_url()?>checkproduct",
                data: 'cate='+cate+'&name='+name+'&id='+id,
                success: function(result) {
                    var responsedata = $.parseJSON(result);
                    var msg = responsedata['message'];
                    var sub_pro_id = responsedata.product['sub_pro_id'];
	                var quantity = responsedata.product['quantity'];
	                var qty = 1;

                    if (msg=='yes') {
                    	 window.location="<?=base_url()?>product-detail/"+name+"/"+cate+"/"+id;
                    }else{
                 		// addCart();

                       // alert(quantity);

                       	if(qty<1){
                       		
			            toastr["warning"]("Quantity should be minimum 1");
				        }else if(quantity<qty){
				            toastr["warning"]("Requested quantity not available");
				        }else{

				        	// alert(responsedata.product['attr_count'])
		                    var data = []; 
		                    data.push({name: "pro_id", value: pro_id},{name: "sub_pro_id", value: 0},{name: "qty", value: qty});
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
				               

                    }
                }
            });

        }



	</script>
</body>
</html>