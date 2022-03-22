<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Footer -->
<!-- <div class="ps-section--partner">
    <div class="ps-container">
        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="40" data-owl-nav="false" data-owl-dots="false" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="4" data-owl-item-md="6" data-owl-item-lg="8" data-owl-duration="1000" data-owl-mousedrag="on">
            <?php foreach ($brands as $row) {?>
            <a href="<?=base_url();?>brand/<?=$this->aayusmain->createHtmlName($row->brand)?>/<?=$row->brand_id?>"><img src="<?=PHOTO_DOMAIN?>brands/<?=$row->photo_path?>-org.jpg" alt="<?=$row->brand?>" title="<?=$row->brand?>" style="height: 80px;width: auto;"></a>
            <?php } ?>
        </div>
    </div>
</div> -->

<div class="ps-subscribe">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-md-push-6">
            <div class="ps-subscribe__content"><i class="ps-icon-notify"></i>
                <h3>SIGN UP TO NEWSLETTERS</h3>
                <p>And receive <strong>offer coupons</strong> for shopping ...!</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-md-pull-6">
            <form class="ps-form--subscribe" id="subscribe_form" data-toggle="validator">
                <div class="form-group">
                    <div class="form-group__icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" placeholder="Type Your Email" name="subs_mail" id="subs_mail" required>
                </div>
                <button type="submit"><i class="ps-icon-arrow-right"></i></button>
            </form>
        </div>
    </div>
</div>

<div class="ps-section--features">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <div class="ps-iconbox">
                    <header><i class="ps-icon-delivery-truck"></i>
                        <h3>FREE SHIPPING</h3>
                        <p>ON ORDER OVER LKR 50000</p>
                    </header>
                    <p>Find tracking information and order details from Your HEXSTYLE Account.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <div class="ps-iconbox">
                    <header><i class="fa fa-globe"></i>
                        <h3>WE SHIPS WORLD WIDE</h3>
                        <p>NOW WE SHIP OVER 200 COUNTRIES WORLDWIDE</p>
                    </header>
                    <p>We strive to ensure timely delivery of International orders to most of the countries.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <div class="ps-iconbox">
                    <header><i class="ps-icon-customer-service"></i>
                        <h3>SUPPORT 24/7.</h3>
                        <p>WE CAN HELP YOU ONLINE.</p>
                    </header>
                    <p>We offer a 24/7 customer hotline so you’re never alone if you have a question.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="ps-footer site-footer">
    <div class="ps-footer__content">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-site-info site-info"><a class="ps-logo" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/Hex_Logo.png" alt="HexStyle"></a>
                        <p>HexStyle is a global fashion destination built on the idea that online shopping for Indian ethnic wear can be hassle free, enjoyable and rewarding. The brand believes in making special memories even more precious so that everyone celebrates occasions with full zing. Our headquarters in Sri Lanka & India and delivering worldwide,  We offers over 200,000 ethnic apparels</p>
                        <div class="ps-site-info__contact">
                            <h4>Contact Info</h4>
                            <p><a href="callto:+94777223010">(+94) 777 223 010</a><a href="callto:+94777361122">(+94) 777 361 122</a></p>
                            <p><a href="mailto:info@hexstyle.com">info@hexstyle.com</a></p>
                        </div>
                        <ul class="ps-social">
                            <li><a href="https://www.facebook.com/Hexstyle/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/hex_style/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.pinterest.com/hexstyles/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-widget ps-widget--footer widget widget_footer">
                                <h2 class="ps-widget__title">QUICK LINKS</h2>
                                <ul class="ps-list--line">
                                    <li><a class="text-uppercase" href="<?=base_url()?>">Home</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>signup">Buyers Sign Up</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>seller-request">Seller Request</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>products">Products</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>about-us">About Us</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>contact-us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-widget ps-widget--footer widget widget_footer">
                                <h2 class="ps-widget__title">POLICIES & INFO</h2>
                                <ul class="ps-list--line">
                                    <li><a class="text-uppercase" href="<?=base_url()?>terms-and-condition">Terms & Conditions</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>buyers-policy">Policy for Buyers</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>sellers-policy">Policy for Sellers</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>shipping-refund-policy">Return and Exchange</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>international-orders">International Orders</a></li>
                                    <li><a class="text-uppercase" href="<?=base_url()?>faq">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-widget ps-widget--footer widget widget_footer">
                                <h2 class="ps-widget__title">Your Account</h2>
                                <ul class="ps-list--line">
                                    <li><a class="text-uppercase" href="<?=base_url()?>cart">Cart</a></li>
                                    <li><a class="text-uppercase" <?php if($this->session->userdata('cust_logged_in')==null){?> data-toggle="modal" href="#login-popup"<?php }else{?> href="<?=base_url()?>account"<?php } ?>>Account</a></li>
                                    <li><a class="text-uppercase" <?php if($this->session->userdata('cust_logged_in')==null){?> data-toggle="modal" href="#login-popup"<?php }else{?> href="<?=base_url()?>orders"<?php } ?>>Your Orders</a></li>
                                    <li><a class="text-uppercase" <?php if($this->session->userdata('cust_logged_in')==null){?> data-toggle="modal" href="#login-popup"<?php }else{?> href="<?=base_url()?>wishlist"<?php } ?>>Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer__copyright">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p><?=date("Y");?> &copy; Copyright by <span>HEXSTYLE</span>. Design by <a href="https://www.aayussolutions.com/" target="_blank" style="color: red;">AAYUS</a> Solution(Pvt)Ltd.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <div class="ps-footer__payment-methods"><a href="#"><img src="<?=base_url()?>assets/images/payment-method/amex.png" alt=""></a><a href="#"><img src="<?=base_url()?>assets/images/payment-method/visa.png" alt=""></a><a href="#"><img src="<?=base_url()?>assets/images/payment-method/master-card.png" alt=""></a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Popup: Login -->
<div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">                
        <a class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>

        <div class="modal-content">
            <div class="login-wrap text-center">
                <h2 class="title-3"> sign in </h2>
                <p> Sign in to <strong> HexStyle </strong> for getting all features </p>                        

                <div class="login-form clrbg-before">
                    <form class="login" id="loginForm" data-toggle="validator">
                        <input type="hidden" name="redirect" id="redirectURL" value="<?php if ($this->uri->segment(1)=='checkout') {echo 'checkout';}else{echo 'account';}?>" />
                        <div class="form-group">
                            <input placeholder="Email address" class="form-control" type="email" name="email" id="modalloginemail" placeholder="Email Address" data-error="Please enter a valid email address." data-remote="<?=base_url()?>checkDBfieldOpt?data=email&input=email&table=customers" data-remote-error="Email address not registered" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" name="password" data-required-error="Password is Required" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button class="ps-btn ps-btn--fullwidth" type="submit"> Sign in now </button>
                        </div>
                    </form>
                    <a href="javascript:forgotPass();" class="gray-clr"> Forgot Passoword? </a>                            
                </div>   
                <!-- <div class="divider"><span></span><span>OR</span><span></span></div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="#" class="social-signup fb">
                          <div class="darken">
                            <i class="fa fa-facebook-square"></i>
                          </div>
                          <p>Signin with Facebook</p>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="#" class="social-signup google">
                          <div class="darken">
                            <i class="fa fa-google"></i>
                          </div>
                          <p>Signin with Google</p>
                        </a>
                    </div>
                </div> -->
            </div>
            <div class="create-accnt">
                <a href="#" class="white-clr"> Don’t have an account? </a>  
                <h2 class="title-2"> <a href="<?=base_url();?>signup" class="green-clr under-line">Create a free account</a> </h2>
            </div>
        </div>
    </div>
</div>
<!-- /Popup: Login --> 

<a href="https://api.whatsapp.com/send?phone=94777223010" class="whatsappBtn" target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>
