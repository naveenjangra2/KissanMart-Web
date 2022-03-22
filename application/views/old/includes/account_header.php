<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Header -->
<header class="header--left">
    <div class="menu-toggle"><span></span></div>
    <div class="header__top">
        <div class="header__actions">
            <a href="<?=base_url();?>cart">Cart</a>
            <div class="btn-group ps-dropdown"><a href="<?=base_url()?>profile">Profile</a></div>
            <div class="btn-group ps-dropdown"><a href="<?=base_url()?>logout">Sign out</a></div>
        </div>
        <div class="header__brand"><a class="ps-logo" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/Hex_LogoW.png" alt="HexStyle"></a></div>
    </div>
    <ul class="menu menu--sidebar">
        <li class="<?php if(strpos($pageTitle, 'ACCOUNT')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>account">Home</a></li>
        <li class="<?php if(strpos($pageTitle, 'ORDERS')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>orders">Orders</a></li>
        <li class="<?php if(strpos($pageTitle, 'WISHLIST')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>wishlist">Wishlist</a></li>
        <li class="<?php if(strpos($pageTitle, 'ADDRESSES')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>addresses">Addresses</a></li>
        <li class="<?php if(strpos($pageTitle, 'MESSAGES')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>messages">Messages</a></li>
        <!-- <li class="<?php if(strpos($pageTitle, 'CONTACT')!== false) {echo 'current-menu-item';}?>"><a href="<?=base_url()?>contact-us">Contact</a></li> -->
    </ul>
    <div class="header__bottom">
        <ul class="ps-list--social">
            <li><a href="https://www.facebook.com/Hexstyle/" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/hex_style/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="https://www.pinterest.com/hexstyles/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
        </ul>
        <p class="ps-copyright"><?=date("Y");?> &copy; Copyright by<a href="<?=base_url()?>"> HEXSTYLE.</a></p>
        <div class="ps-payment-methods"><a href="#"><img src="<?=base_url()?>assets/images/payment-method/amex.png" alt=""></a><a href="#"><img src="<?=base_url()?>assets/images/payment-method/visa.png" alt=""></a><a href="#"><img src="<?=base_url()?>assets/images/payment-method/master-card.png" alt=""></a></div>
    </div>
</header>
<!-- /.Header -->