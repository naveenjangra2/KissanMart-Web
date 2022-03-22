<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Header -->
<header class="header" data-sticky="true">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>Hotline: <a href="callto:+94777223010">(+94) 777 223 010</a> | Email - <a href="mailto:info@hexstyle.com">info@hexstyle.com</a></p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        <div class="btn-group ps-dropdown">
                            <div class="ps-topbar--search">
                                <input class="form-control" type="text" placeholder="Search Product…" id="proSearch" value="<?php if ($this->uri->segment(2)=='search'&&$this->uri->segment(3)!='') {echo(urldecode($this->uri->segment(3)));}else{echo '';}?>" style="height: 40px;">
                                <button onclick="productSearch();"><i class="ps-icon-search"></i></button>
                            </div>
                        </div>
                        <?php if($this->session->userdata('cust_logged_in')==null){?><a data-toggle="modal" href="#login-popup">Login & Regiser</a><?php }else{?>
                        <a href="<?=base_url()?>account">My Account</a>
                        <!-- <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="<?=base_url()?>account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url()?>account">Visit Account</a></li>
                                <li><a href="#">Profile</a></li>
                                <li><a href="<?=base_url()?>logout">Sign out</a></li>
                            </ul>
                        </div> -->
                        <?php }?>

                        <!-- <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img src="<?=base_url()?>assets/images/flag/lk.svg" alt=""> LKR</a></li>
                                <li><a href="#"><img src="<?=base_url()?>assets/images/flag/us.svg" alt=""> USD</a></li>
                                <li><a href="#"><img src="<?=base_url()?>assets/images/flag/in.svg" alt=""> INR</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="left">
                <div class="header__logo"><a class="ps-logo" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/Hex_Logo.png" alt="HexStyle"></a></div>
            </div>
            <div class="center">
                <ul class="main-menu menu">
                    <!-- <li class=""><a href="<?=base_url()?>">Home</a></li> -->
                    <?php
                        function createHtmlName($string){
                            $search  = array('(', ')', '---', '--');
                            $replace = array('', '', '-', '-');
                            $string = strtolower(preg_replace("/[^a-zA-Z0-9_-]/","-",$string));
                            return str_replace($search, $replace, $string);
                        }

                        function write_with_child_header($cate) {
                            $arr = explode("|",$cate->tree_path);
                            $depth = count($arr)-1;
                            $val_str = $cate->category;
                            
                            if($depth<=2){
                                if (isset($cate->sub_cat) && sizeof($cate->sub_cat) > 0 && $depth<2) {?>
                                
                                    <li class="menu-item-has-children dropdown">
                                        <a href="<?=base_url();?>category/<?=createHtmlName($val_str)?>/<?=$cate->cate_id?>"><?=$val_str?></a>
                                    
                                        <ul class="sub-menu">
                                            <?php
                                                foreach ($cate->sub_cat as $child_cat) {
                                                    write_with_child_header($child_cat); 
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                } else { ?>
                                    <li><a href="<?=base_url();?>category/<?=createHtmlName($val_str)?>/<?=$cate->cate_id?>"><?=$val_str?></a></li>
                                <?php 
                                }
                            }
                        }
                        foreach (array_slice($cates, 0, 12) as $cate) {
                            write_with_child_header($cate);
                        }
                    ?>
                    <!-- <li><a href="<?=base_url();?>contact">Contact</a></li> -->
                </ul>
            </div>
            <div class="right">
                <div class="menu-toggle"><span></span></div>
                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="<?=base_url();?>cart">
                        <span><i id="cart_count"><?=count($this->cart->contents())?></i></span>
                        <i class="ps-icon-cart"></i>
                    </a>
                </div>
                <!-- <div class="ps-form--search">
                    <input class="form-control" type="text" placeholder="Search Product…" id="proSearch" value="<?php if ($this->uri->segment(2)=='search'&&$this->uri->segment(3)!='') {echo(urldecode($this->uri->segment(3)));}else{echo '';}?>">
                    <button onclick="productSearch();"><i class="ps-icon-search"></i></button>
                </div> -->
            </div>
        </div>
    </nav>
</header>
<!-- /.Header -->