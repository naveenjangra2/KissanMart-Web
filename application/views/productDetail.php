<!DOCTYPE html>
<html lang="en">
<head>
 
 <?php $this->load->view('includes/head'); ?>
 <style type="text/css">
    img.makePhot{
     object-fit: cover;
     width:360px !important;
     height:448px !important;
     display:flex !important;
     justify-content:center;
     align-items:center;
     overflow:hidden;
    }
    img.makePhotSimillar{
     object-fit: cover;
     width:150px !important;
     height:190px !important;
     display:flex !important;
     justify-content:center;
     align-items:center;
     overflow:hidden;
    }
    img.thumMkPh{
     object-fit: cover;
     width:100px !important;
     height:124px !important;
     display:flex !important;
     justify-content:center;
     align-items:center;
     overflow:hidden;
    }
    .pro_color_sel {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .pro_color_sel li {
      display: inline-block;
      position: relative;
      overflow: hidden;
      margin: 0px 1px;
    }
    .pro_color_sel li input {
      position: absolute;
      left: 0;
      opacity: 0;
      visibility: hidden;
    }
    .pro_color_sel li input:checked + label {
      border: none;
      opacity: 1;
    }
    .pro_color_sel li input:checked + label:after {
      content: "ï€Œ";
      /*opacity: 1;*/
      opacity: 0;
    }
    .pro_color_sel li label {
      width: 30px;
      color: #fff;
      height: 30px;
      line-height: 30px;
      border-radius: 30px;
      display: inline-block;
      position: relative;
      border: 2px solid #e6e6e6;
      cursor: pointer;
      text-align: center;
      opacity: 0.5;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      transition: all 0.15s ease-out 0s;
    }
    .pro_color_sel li label:after {
      content: "ï€";
      position: absolute;
      left: 50%;
      margin-left: -7px;
      top: 50%;
      margin-top: -7px;
      font: normal normal normal 14px FontAwesome;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
      -webkit-transition: opacity 0.3s ease-in-out;
      moz-transition: opacity 0.3s ease-in-out;
      o-transition: opacity 0.3s ease-in-out;
    }
    .product-info-block .product-options ul{
     display: unset;
    }
    .product-options .ps-product__style ul li {
        display: inline-block;
        margin-right: 10px; 
    }
    .product-options .ps-product__style ul li a {
     display: inline-block;
     width: 60px;
     border: 3px solid #e5e5e5; 
    }
    .product-options .ps-product__style ul li a:hover {
     border-color: #ffa927; 
    }
    .ps-select > i {
      position: absolute;
      top: 50%;
      -webkit-transform: translateY(-50%);
      -moz-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      -o-transform: translateY(-50%);
      transform: translateY(-50%);
      right: 15px; 
    }
    .ps-select > select {
     -webkit-appearance: none;
     -moz-appearance: none;
     -ms-appearance: none;
     -o-appearance: none;
     appearance: none;  
    } 
    .ps-select {
     display: inline-block; 
    }
    .ps-select button.btn.dropdown-toggle.btn-default {
     height: 50px;
     border: solid 1px #979797;
     -webkit-border-radius: 0;
     -moz-border-radius: 0;
     -ms-border-radius: 0;
     border-radius: 0;
     outline: none;
     -webkit-transition: all 0.4s ease;
     -moz-transition: all 0.4s ease;
     transition: all 0.4s ease;
     color: #303030; 
    }
    .ps-select button.btn.dropdown-toggle.btn-default:hover {
     outline: none !important;
     background-color: #fff; 
    }
    .ps-select button.btn.dropdown-toggle.btn-default:focus, .ps-select button.btn.dropdown-toggle.btn-default:active {
     outline: none !important;
     background-color: #fff; 
    }
    .ps-product--detail .ps-product__size .bootstrap-select.ps-select {
     width: calc(100% - 130px);
     float: left; 
    }
    select.ps-select{
     width: 37%;
     padding: 6px;
     -webkit-appearance: menulist;
    }
    @media screen and (max-width: 457) {
      .navHeight{
        padding-top: 0px;
      }
    }
 </style>
</head>
<body class="boxed">
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
    <div class="block navHeight" style="padding-top: 103px !important;">
     <div class="container" style="margin-top: 40px;">
      <ul class="breadcrumbs">
       <li><a href="<?=base_url()?>"><i class="icon icon-home"></i></a></li>
       <?php $cate = $this->uri->segment(2); ?>
       <li>/<a href="javascript:void(0);"><?=$cate?></a></li>
       <li>/<span><?=$product->name?></span></li> 
      </ul>
     </div>
    </div>
    <div class="block product-block">
     <div class="container">
      <div class="row ps-product--detail">
        <pre>
          <?php
            print_r($proImg);
            print_r($pro_attribute_val);
          ?>
        </pre>
       <div class="col-sm-6 col-md-6 col-lg-4">
        <!-- Product Gallery -->
        <div class="main-image">
         <img src="<?=PHOTO_DOMAIN?>products/<?=$proImg[0]->photo_path?>-med.jpg" class="zoom makePhot" alt="" data-zoom-image="<?=PHOTO_DOMAIN?>products/<?=$proImg[0]->photo_path?>-med.jpg" /> 
         <a href="<?=PHOTO_DOMAIN?>products/<?=$proImg[0]->photo_path?>-med.jpg" class="zoom-link"><i class="icon icon-zoomin"></i></a>
        </div>
        <div class="product-previews-wrapper">
         <div class="product-previews-carousel" id="previewsGallery">
          <?php foreach ($proImg as $img) {?>
          <a href="#" data-image="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-med.jpg" onclick="chngeImg('<?=$img->photo_title?>');" data-zoom-image="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-med.jpg">
           <img src="<?=PHOTO_DOMAIN?>products/<?=$img->photo_path?>-thu.jpg" class="thumMkPh"  alt="<?=$img->photo_title?>" id="photoid_<?=$img->pid?>"/>
          </a>
          <?php } ?>  
         </div>
        </div>
        <!-- /Product Gallery -->
       </div>
       <div class="col-sm-6 col-md-6 col-lg-5">
        <div class="product-info-block classic ps-product__info">
         <!-- <div class="product-info-top">
          <div class="product-sku">SKU: <span>Stock Keeping Unit</span></div>
          <div class="rating">
           <i class="icon icon-star fill"></i><i class="icon icon-star fill"></i><i class="icon icon-star fill"></i><i class="icon icon-star fill"></i><i class="icon icon-star"></i><span class="count">248 reviews</span>
          </div>
         </div> -->
         <div class="product-name-wrapper">
          <h1 class="product-name" id="pro_name" pro-id="<?=$product->pro_id?>" sub-pro-id="0" quantity="<?=$product->quantity?>"><?=$product->name?></h1><br>
          <!-- <div class="product-labels">
           <span class="product-label sale">SALE</span>
           <span class="product-label new">NEW</span>
          </div> -->
         </div>
          <h3 id="sub_pro_name"></h3>
         <div class="product-availability" id="ShortDesc">Availability: <span id="stck-qty"><?php if(0<$product->quantity&&$product->quantity<=10){ echo $product->quantity." In stock ";}else if(10<$product->quantity){ ?>More than 10 available <?php }?> <?php if(10<$product->sales_count){ echo '/ <span>'.$product->sales_count." Sold </span>";} ?></span></div>
         <div class="product-description" style="height: 190px; overflow: hidden;">
          <p><?=$product->short_description?></p>
         </div>
         <!-- <div class="countdown-circle hidden-xs">
          <div class="countdown-wrapper">
           <div class="countdown" data-promoperiod="100000000"></div>
           <div class="countdown-text">
            <div class="text1">Discount 45% OFF</div>
            <div class="text2">Hurry, there are only <span>14</span> item(s) left!</div>
           </div>
          </div>
         </div> -->
         <div class="product-options">
          <?php 
           foreach ($attributes as $attr) {
               if ($attr->show_to_all==0&&$attr->price_effect==0) {
                   if ($attr->type==3||$attr->type==4) {
           ?>
           <div class="ps-product__block ps-product__style">
           	<!-- <h5><? if (isset($product->sub_pro_code)){ echo $product->sub_pro_code; } ?></h5> -->
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
          <div class="product-qty">
           <span class="option-label">Qty:</span>
           <div class="qty qty-changer ps-number">
            <fieldset>
             <input type="button" value="&#8210;" class="decrease">
             <input type="text" class="qty-input" value="1" data-min="0" id="pro_qty">
             <input type="button" value="+" class="increase">
            </fieldset>
           </div>
          </div>
         </div>
         <div class="product-actions">
          <div class="row">
           <div class="col-md-6">
            <div class="product-meta">
             <span><a href="javascript:addToWishlist('<?=$product->pro_id?>');"><i class="icon icon-heart"></i> Add to wishlist</a></span>
             <!-- <span><a href="#"><i class="icon icon-balance"></i> Add to Compare</a></span> -->
            </div>
            <!-- <div class="social">
             <div class="share-button toLeft">
              <span class="toggle">Share</span>
              <ul class="social-list">
               <li>
                <a href="#" class="icon icon-google google"></a>
               </li>
               <li>
                <a href="#" class="icon icon-fancy fancy"></a>
               </li>
               <li>
                <a href="#" class="icon icon-pinterest pinterest"></a>
               </li>
               <li>
                <a href="#" class="icon icon-twitter-logo twitter"></a>
               </li>
               <li>
                <a href="#" class="icon icon-facebook-logo facebook"></a>
               </li>
              </ul>
             </div>
            </div> -->
           </div>
           <div class="col-md-6">
            <div class="price" id="productPrice">
             <?php if($product->price_poi!=0){?><span class="old-price"><span>LKR.<?=$product->price_poi?></span></span><?php } ?>
             <span class="special-price"><span>LKR.<?=$product->price?></span></span>
            </div>
            <div class="actions">
             <?php if($product->attr_count==0){?>
              <?php if($product->quantity==0){?>
             <button data-loading-text='<i class="icon icon-cart"></i><span>SOLD OUT</span>' class="btn btn-lg btn-loading pro_oreder_btn_disabled" id="addToCartBtn"><i class="icon icon-cart"></i><span>SOLD OUT</span></button>
             <?php }else{ ?>
             <button data-loading-text='<i class="icon icon-cart"></i><span>Add to cart</span>' class="btn btn-lg btn-loading pro_oreder_btn" onclick="addCart();" id="addToCartBtn"><i class="icon icon-cart"></i><span>Add to cart</span></button>
             <?php }?>
            <?php }else{ ?>
             <button data-loading-text='<i class="icon icon-cart"></i><span>Add to cart</span>' class="btn btn-lg btn-loading pro_oreder_btn" onclick="addCart();" id="addToCartBtn"><i class="icon icon-cart"></i><span>Add to cart</span></button>
            <?php }?>
             <a href="#" class="btn btn-lg product-details"><i class="icon icon-external-link"></i></a>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="col-md-12 col-lg-3 hidden-quickview">
	        <div class="box-icon-row text-center" style="width: 100%;">
<!-- product -->
	        
<!-- product end -->
          <?php
            foreach ($otherProducts as $row) {
              $cate_name = $this->aayusmain->createHtmlName($row->category);
              $pro_name = $this->aayusmain->createHtmlName($row->name);

              $seg_pro_id = $this->uri->segment(4);
              
              if ($row->pro_id == $seg_pro_id) {
                continue;
              }
          ?>

	         <div class="product-item large category1" style="height: 254px;">
	        	<div class="product-item-inside">
	        		<div class="product-item-info" style="border-style: solid; border-color: #ff8080;">
	        			<div class="product-item-photo">
	        				<div class="product-item-gallery">
	        					<div class="product-item-gallery-main">
	        						<a href="<?=base_url()?>product-detail/<?=$cate_name?>/<?=$pro_name?>/<?=$row->pro_id?>">
	        							<img class="product-image-photo makePhotSimillar" src="<?=PHOTO_DOMAIN?>products/<?=$row->photo_path?>-std.jpg" alt="<?=$row->name?>" style="margin:0 auto;"></a>
	        						</div>
	        					</div>
	        					<div class="price-box text-center"> <span class="price-container"> <span class="price-wrapper"><span class="price">LKR. <?=$row->price?></span></span>
                        </span>
                    </div>
	        				</div>
	        				</div>
	        			</div>
	        		</div>
          <?php } ?>
	        </div>

          <!-- <pre><?php print_r($otherProducts); ?></pre> -->

       </div>
      </div>
     </div>
    </div>
    <div class="block">
     <div class="tabaccordion">
      <div class="container">
       <!-- Nav tabs -->
       <ul class="nav-tabs product-tab" role="tablist">
        <li><a href="#Tab1" role="tab" data-toggle="tab">Description</a></li>
        <li><a href="#Tab2" role="tab" data-toggle="tab">Ingredients</a></li>
        <li><a href="#Tab3" role="tab" data-toggle="tab">How to use</a></li>
       </ul>
       <!-- Tab panes -->
       <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="Tab1">
         <?=$product->description?>
        </div>
        <div role="tabpanel" class="tab-pane" id="Tab2">
	           	<?=$product->ingredients?>
        </div>
        <div role="tabpanel" class="tab-pane" id="Tab3"> 
         	    <?=$product->how_to_use?>
        </div>
      
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- <div class="block">
     <div class="container">
      <div class="row">
       <div class="col-md-6">
        <div class="title">
         <h2>From Blog</h2>
         <div class="carousel-arrows"></div>
        </div>
        <div class="blog-carousel">
         <div class="blog-item">
          <a href="blog.html" class="blog-item-photo"> <img class="product-image-photo" src="images/blog/blog-1.jpg" alt="From Blog"> </a>
          <div class="blog-item-info">
           <a href="blog.html" class="blog-item-title">Inventore consectetur ullam</a>
           <div class="blog-item-teaser">Repellat aspernatur esse minus. Molestiae ipsum earum, aspernatur fugit veniam ducimus doloremque repellat suscipit. Cumque!</div>
           <div class="blog-item-links"> <span class="pull-left"> <span><a href="#" class="readmore">Read more</a></span> </span> <span class="pull-right"> <span>Post by <a href="#">Admin</a></span> </span>
           </div>
          </div>
         </div>
         <div class="blog-item">
          <a href="blog.html" class="blog-item-photo"> <img class="product-image-photo" src="images/blog/blog-2.jpg" alt="From Blog"> </a>
          <div class="blog-item-info">
           <a href="blog.html" class="blog-item-title">Aperiam, vero facilis</a>
           <div class="blog-item-teaser">Commodo delectus consequuntur consectetur culpa ea doloremque repellat laoreet semper tincidunt lorem Euismod euismod Suspendisse </div>
           <div class="blog-item-links"> <span class="pull-left"> <span><a href="#" class="readmore">Read more</a></span> </span> <span class="pull-right"> <span>Post by <a href="#">Admin</a></span> </span>
           </div>
          </div>
         </div>
         <div class="blog-item">
          <a href="blog.html" class="blog-item-photo"> <img class="product-image-photo" src="images/blog/blog-3.jpg" alt="From Blog"> </a>
          <div class="blog-item-info">
           <a href="blog.html" class="blog-item-title">Repellat aspernatur</a>
           <div class="blog-item-teaser">Omnis, nihil hic ratione culpa atque ipsum repellat quaerat impedit, ipsam odio delectus consequuntur consectetur culpa ea doloremque repellat</div>
           <div class="blog-item-links"> <span class="pull-left"> <span><a href="#" class="readmore">Read more</a></span> </span> <span class="pull-right"> <span>Post by <a href="#">Admin</a></span> </span>
           </div>
          </div>
         </div>
         <div class="blog-item">
          <a href="blog.html" class="blog-item-photo"> <img class="product-image-photo" src="images/blog/blog-4.jpg" alt="From Blog"> </a>
          <div class="blog-item-info">
           <a href="blog.html" class="blog-item-title">Commodo laoreet tincidunt</a>
           <div class="blog-item-teaser">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi provident earum minus delectus voluptatum asperiores consectetur culpa ea doloremque</div>
           <div class="blog-item-links"> <span class="pull-left"> <span><a href="#" class="readmore">Read more</a></span> </span> <span class="pull-right"><span>Post by <a href="#">Admin</a></span> </span>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="col-md-6">
        <div class="title">
         <h2 class="custom-color">Deal of the day</h2>
         <div class="toggle-arrow"></div>
         <div class="carousel-arrows"></div>
        </div>
        <div class="collapsed-content">
         <div class="deal-carousel-2 products-grid product-variant-5">
          <div class="product-item large">
           <div class="product-item-inside">
            <div class="product-item-info">
             <div class="product-item-photo">
              <div class="product-item-label label-new"><span>New</span></div>
              <div class="product-item-gallery">
               <div class="product-item-gallery-main">
                <a href="#"><img class="product-image-photo" src="images/products/product-13.jpg" alt=""></a>
                <a href="quick-view.html" title="Quick View" class="quick-view-link quick-view-btn"> <i class="icon icon-eye"></i><span>Quick View</span></a>
               </div>
              </div>
              <a href="#" title="Add to Wishlist" class="no_wishlist"> <i class="icon icon-heart"></i><span>Add to Wishlist</span> </a>
              <div class="product-item-actions">
               <div class="share-button toBottom">
                <span class="toggle"></span>
                <ul class="social-list">
                 <li>
                  <a href="#" class="icon icon-google google"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-fancy fancy"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-pinterest pinterest"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-twitter-logo twitter"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-facebook-logo facebook"></a>
                 </li>
                </ul>
               </div>
              </div>
             </div>
             <div class="product-item-details">
              <div class="product-item-name"> <a title="Style Dome Men's Solid Red Color" href="product.html" class="product-item-link">Style Dome Men's Solid Red Color</a> </div>
              <div class="product-item-description">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonkdni numquam eius modi tempora incidunt ut labore</div>
              <div class="price-box"> <span class="price-container"> <span class="price-wrapper"><span class="price">$359.00</span> </span>
               </span>
              </div>
              <div class="product-item-rating"> <i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i></div>
              <button class="btn add-to-cart" data-product="789123"> <i class="icon icon-cart"></i><span>Add to Cart</span> </button>
             </div>
            </div>
           </div>
          </div>
          <div class="product-item previews-3 large">
           <div class="product-item-inside">
            <div class="product-item-info">
             <div class="product-item-photo">
              <div class="product-item-label label-new"><span>New</span></div>
              <div class="product-item-label label-sale"><span>-20%</span></div>
              <div class="product-item-gallery-main">
               <a href="#"><img class="product-image-photo" src="images/products/product-11-1.jpg" alt=""></a>
               <a href="quick-view.html" title="Quick View" class="quick-view-link quick-view-btn"> <i class="icon icon-eye"></i><span>Quick View</span></a>
              </div>
              <a href="#" title="Add to Wishlist" class="no_wishlist"> <i class="icon icon-heart"></i><span>Add to Wishlist</span> </a>
              <div class="product-item-actions">
               <div class="share-button toBottom">
                <span class="toggle"></span>
                <ul class="social-list">
                 <li>
                  <a href="#" class="icon icon-google google"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-fancy fancy"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-pinterest pinterest"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-twitter-logo twitter"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-facebook-logo facebook"></a>
                 </li>
                </ul>
               </div>
              </div>
              <div class="product-item-gallery-previews-wrapper">
               <div class="product-item-gallery-previews">
                <div class="item">
                 <a href="#"><img src="images/products/product-11.jpg" alt=""></a>
                </div>
                <div class="item">
                 <a href="#"><img src="images/products/product-11-1.jpg" alt=""></a>
                </div>
                <div class="item">
                 <a href="#"><img src="images/products/product-11-2.jpg" alt=""></a>
                </div>
               </div>
               <div class="carousel-arrows"></div>
              </div>
             </div>
             <div class="product-item-details">
              <div class="product-item-name"> <a title="Boyfriend Shorts Denim" href="product.html" class="product-item-link">Boyfriend Shorts Denim</a> </div>
              <div class="product-item-description">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonkdni numquam eius modi tempora incidunt ut labore</div>
              <div class="price-box"> <span class="price-container"> <span class="price-wrapper"> <span class="old-price">$190.00</span> <span class="special-price">$149.00</span> </span>
               </span>
              </div>
              <div class="product-item-rating"> <i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i></div>
              <button class="btn add-to-cart" data-product="789123"> <i class="icon icon-cart"></i><span>Add to Cart</span> </button>
             </div>
            </div>
           </div>
          </div>
          <div class="product-item large">
           <div class="product-item-inside">
            <div class="product-item-info">
             <div class="product-item-photo">
              <div class="product-item-gallery-main">
               <a href="#"><img class="product-image-photo" src="images/products/product-19.jpg" alt=""></a>
               <a href="quick-view.html" title="Quick View" class="quick-view-link quick-view-btn"> <i class="icon icon-eye"></i><span>Quick View</span></a>
              </div>
              <div class="product-item-label label-new"><span>New</span></div>
              <a href="#" title="Add to Wishlist" class="wishlist active"> <i class="icon icon-heart"></i><span>Add to Wishlist</span> </a>
              <div class="product-item-actions">
               <div class="share-button toBottom">
                <span class="toggle"></span>
                <ul class="social-list">
                 <li>
                  <a href="#" class="icon icon-google google"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-fancy fancy"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-pinterest pinterest"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-twitter-logo twitter"></a>
                 </li>
                 <li>
                  <a href="#" class="icon icon-facebook-logo facebook"></a>
                 </li>
                </ul>
               </div>
              </div>
              <div class="product-item-gallery-previews-wrapper">
               <div class="product-item-gallery-previews">
                <div class="item">
                 <a href="#"><img src="images/products/product-19.jpg" alt=""></a>
                </div>
                <div class="item">
                 <a href="#"><img src="images/products/product-19-1.jpg" alt=""></a>
                </div>
                <div class="item">
                 <a href="#"><img src="images/products/product-19-2.jpg" alt=""></a>
                </div>
                <div class="item">
                 <a href="#"><img src="images/products/product-19-3.jpg" alt=""></a>
                </div>
               </div>
               <div class="carousel-arrows"></div>
              </div>
              <ul class="color-swatch hidden-xs">
               <li class="active">
                <a data-image="images/products/product-19.jpg" href="#"><img src="images/colorswatch/color-yellow.png" alt="Yellow"></a>
               </li>
               <li>
                <a data-image="images/products/product-19-c1.jpg" href="#"><img src="images/colorswatch/color-blue.png" alt="Blue"></a>
               </li>
               <li>
                <a data-image="images/products/product-19-c2.jpg" href="#"><img src="images/colorswatch/color-red.png" alt="Red"></a>
               </li>
               <li>
                <a data-image="images/products/product-19-c3.jpg" href="#"><img src="images/colorswatch/color-grey.png" alt="Grey"></a>
               </li>
               <li>
                <a data-image="images/products/product-19-c4.jpg" href="#"><img src="images/colorswatch/color-green.png" alt="Green"></a>
               </li>
               <li>
                <a data-image="images/products/product-19-c5.jpg" href="#"><img src="images/colorswatch/color-violet.png" alt="Violet"></a>
               </li>
              </ul>
             </div>
             <div class="product-item-details">
              <div class="product-item-name"> <a title="Cover up tunic" href="product.html" class="product-item-link">Cover up tunic</a></div>
              <div class="product-item-description">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonkdni numquam eius modi tempora incidunt ut labore</div>
              <div class="price-box"> <span class="price-container"> <span class="price-wrapper"> <span class="price">$110.00</span></span>
               </span>
              </div>
              <div class="product-item-rating"> <i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i><i class="icon icon-star-fill"></i></div>
              <button class="btn add-to-cart" data-product="789123"> <i class="icon icon-cart"></i><span>Add to Cart</span> </button>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div> -->
   </main>
   <!-- /Page Content -->
   
   <!-- whatsapp -->
      <?php $this->load->view('includes/whatsapp'); ?>

   <?php $this->load->view('includes/footer'); ?>
  </div>
  <!-- Page Content -->
 </div>
 
 <?php $this->load->view('includes/footerjs'); ?>
 <script type="text/javascript">
 	$( document ).ready(function() {
        if (validate_select()&&validate_radio()) {
            getSubPro();
        }
    });
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
                    var data = $('.ps-product__block select,.ps-product__block input[type=radio]').serializeArray();
                    if ($('.ps-product__block select').length) {
                        $('.ps-product__block select').each(function() {
                            if($(this).val()!=''){
                                var name1 = 'attrshow['+$(this).attr('attr_id')+']';
                                var name1val = $(this).attr('id');
                                var name2 = 'attrVal['+$(this).attr('attr_id')+']';
                                var name2val = $(this).find('option:selected').text();
                                data.push({name: name1, value: name1val},{name: name2, value: name2val});
                            }
                        });
                    }
                    if ($('.ps-product__block:has(:radio)').length) {
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
                var priceStr = '';
                if (responsedata['poi_price'] != 0) {
                	priceStr = '<span class="old-price"><span>LKR.'+responsedata['poi_price']+'</span></span><br>';
                }
                priceStr = priceStr+'<span class="special-price"><span>LKR.'+responsedata['price']+'</span></span>';
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
                    $('#addToCartBtn .icon span').text("ADD TO CART");
                    $("#addToCartBtn").removeClass( "pro_oreder_btn_disabled" ).addClass( "pro_oreder_btn" );
                }
                if(responsedata['subprod_available']==1){
                    $('#pro_name').attr("sub-pro-id",responsedata['sub_pro_id']);
                    // $('#pro_name').attr("sub_pro_code",responsedata['sub_pro_code']);
                }else{
                    $('#pro_name').attr("sub-pro-id",0);
                	// $('#pro_name').attr("sub_pro_code",responsedata['sub_pro_code']);
                }
                if(responsedata['sub_images']!=null||responsedata['sub_images']!=''){
                    $('#photoid_'+responsedata['sub_images']).trigger('click');
                    $('#sub_pro_name').text(responsedata['sub_product_attr_name']);
                    // $('#ShortDesc').text(responsedata['quantity']);
                }
                $('#pro_name').attr("quantity",responsedata['quantity']);
            },
            error: function(result) {
                toastr["error"](result);
            }
        });
    }
    function chngeImg(val){
       $('#sub_pro_name').text(val);
      alert(val);
    }
 </script>
</body>
</html>