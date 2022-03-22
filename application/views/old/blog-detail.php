<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    
    <!-- ============================================ header ======================================================================    -->
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
    <!-- ============================== header ============================================================================== -->
    <?php $this->load->view('includes/header'); ?>

    <div class="ps-hero">
        <div class="container">
            <h3>Blog Single</h3>
            <p>Our Stories</p>
        </div>
    </div>
    <main class="ps-main">
        <div class="ps-container">
            <div class="ps-blog">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-post--detail">
                            <div class="ps-post__thumbnail"><img src="<?=base_url()?>assets/images/blog/blog-detail.jpg" alt=""></div>
                            <div class="ps-post__header">
                                <h3 class="ps-post__title">Unpacking the Breaking 2 Race Strategy</h3>
                                <p class="ps-post__meta">Posted by <a href="blog-grid.html">Alena Studio</a> on August 17, 2016 in <a href="blog-grid.html">Men Shoes</a> , <a href="blog-grid.html">Stylish</a></p>
                            </div>
                            <div class="ps-post__content">
                                <p>No matter how far along you are in your sophistication as an amateur astronomer, there is always one fundamental moment that we all go back to. That is that very first moment that we went out where you could really see the cosmos well and you took in the night sky. For city dwellers, this is a revelation as profound as if we discovered aliens living among us. Most of us have no idea the vast panorama of lights that dot a clear night sky when there are no city lights to interfere with the view.</p>
                                <blockquote>
                                    <p>It seems from the moment you begin to take your love of astronomy seriously, the thing that is on your mind is what kind of telescope will you get. And there is no question, investing in a good telescope can really enhance your enjoyment of your new passion in astronomy.</p>
                                    <p class="author">Rodney
                                        <br> <span>Cannon</span></p>
                                </blockquote>
                            </div>
                            <div class="ps-post__footer">
                                <p class="ps-post__tags"><i class="fa fa-tags"></i><a href="blog-list.html">Man shoe</a>,<a href="blog-list.html"> Woman</a>,<a href="blog-list.html"> Nike</a></p>
                                <div class="ps-post__actions"><span><i class="fa fa-comments"></i> 23 Comments</span><span><i class="fa fa-heart"></i>  likes</span>
                                    <div class="ps-post__social"><i class="fa fa-share-alt"></i><a href="#">Share</a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="ps-heading--2 mb-20 text-uppercase">Author</h3>
                        <div class="ps-author">
                            <div class="ps-author__thumbnail bg--cover" data-background="<?=base_url()?>assets/images/user/1.jpg" data-mh="author"></div>
                            <div class="ps-author__content" data-mh="author">
                                <header>
                                    <h4>MARK GREY</h4>
                                    <p>WEB DESIGNER</p>
                                </header>
                                <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                            </div>
                        </div>
                        <div class="ps-comments">
                            <h3 class="ps-heading">Comment(4)</h3>
                            <div class="ps-comment">
                                <div class="ps-comment__thumbnail"><img src="<?=base_url()?>assets/images/user/2.jpg" alt=""></div>
                                <div class="ps-comment__content">
                                    <header>
                                        <h4>MARK GREY <span>(15 minutes ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-right"></i></a>
                                    </header>
                                    <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                                    <div class="ps-comment">
                                        <div class="ps-comment__thumbnail"><img src="<?=base_url()?>assets/images/user/3.jpg" alt=""></div>
                                        <div class="ps-comment__content">
                                            <header>
                                                <h4>MARK GREY <span>(3 hours ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-right"></i></a>
                                            </header>
                                            <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses continue ace explore.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-comment">
                                <div class="ps-comment__thumbnail"><img src="<?=base_url()?>assets/images/user/4.jpg" alt=""></div>
                                <div class="ps-comment__content">
                                    <header>
                                        <h4>MARK GREY <span>(1 day ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-right"></i></a>
                                    </header>
                                    <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                                </div>
                            </div>
                        </div>
                        <form class="ps-form--post-comment" action="do_action" method="post">
                            <h3 class="mb-20">LEAVE A COMMENT</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" placeholder="Text your message here..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn ps-btn--sm ps-contact__submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-blog__sidebar">
                            <div class="widget widget_search">
                                <form class="ps-form--widget-search" action="do_action" method="post">
                                    <input class="form-control" type="text" placeholder="Search Post...">
                                    <button><i class="ps-icon-search"></i></button>
                                </form>
                            </div>
                            <div class="widget widget_category">
                                <h3 class="widget-title">Archive</h3>
                                <ul class="ps-list--arrow">
                                    <li><a href="#">All Shoes (321)</a></li>
                                    <li><a href="#">Amazin’ Glazin’</a></li>
                                    <li><a href="#">The Crusty Croissant</a></li>
                                    <li><a href="#">The Rolling Pin</a></li>
                                    <li><a href="#">Skippity Scones</a></li>
                                    <li><a href="#">Mad Batter</a></li>
                                    <li><a href="#">Confection Connection</a></li>
                                </ul>
                            </div>
                            <div class="widget widget_ads">
                                <h3 class="widget-title">Ads Banner</h3><img src="<?=base_url()?>assets/images/ads.jpg" alt="">
                            </div>
                            <div class="widget widget_recent-posts">
                                <h3 class="widget-title">Recent Post</h3>
                                <div class="ps-post--sidebar">
                                    <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="<?=base_url()?>assets/images/blog/sidebar/1.jpg" alt=""></div>
                                    <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Micenas Placerat Nibh Loreming Fentum</a>
                                        <p>Sep 29, 2017</p>
                                    </div>
                                </div>
                                <div class="ps-post--sidebar">
                                    <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="<?=base_url()?>assets/images/blog/sidebar/2.jpg" alt=""></div>
                                    <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Micenas Placerat Nibh Loreming Fentum</a>
                                        <p>Sep 29, 2017</p>
                                    </div>
                                </div>
                                <div class="ps-post--sidebar">
                                    <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="<?=base_url()?>assets/images/blog/sidebar/3.jpg" alt=""></div>
                                    <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Micenas Placerat Nibh Loreming Fentum</a>
                                        <p>Sep 29, 2017</p>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget_tags">
                                <h3 class="widget-title">Tags</h3><a href="#">Men</a><a href="#">Woman</a><a href="#">B&C</a><a href="#">Ugly fashion</a><a href="#">Nike</a><a href="#">Diar</a><a href="#">Adidas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ======================================== footer ================================================================= -->
    <?php $this->load->view('includes/footer'); ?>

    <!-- JS Library-->
    <!-- ============================================= footer Script ========================================================= -->
    <?php $this->load->view('includes/footerjs'); ?>

</body>

</html>