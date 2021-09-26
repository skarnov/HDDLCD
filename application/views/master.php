<!DOCTYPE html>

<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <!-- Custom Theme files -->
        <link href="<?php echo base_url(); ?>asset/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>asset/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>asset/public/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>asset/public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <!-- End of Custom Theme files -->
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url(); ?>asset/public/css/font-awesome.css" rel="stylesheet"> 
        <!-- End of Font Awesome Icons -->
        <!-- js -->
        <script src="<?php echo base_url(); ?>asset/public/js/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/css/jquery.countdown.css" />
        <!-- End of js -->  
        <!-- Web Fonts --> 
        <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- End of Web Fonts -->  
        <!-- Start Smooth Scrolling -->
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- End of Smooth Scrolling --> 
    </head> 
    <body>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/public/js/bootstrap-3.1.1.min.js"></script>
        <!-- Header -->
        <div class="header" id="home1">
            <div class="container">
                <div class="w3l_logo">
                    <h1><a href="<?php echo base_url(); ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HDDLCD<span>Your stores. Your place.</span></a></h1>
                </div>
                <div class="search">
                    <input class="search_box" type="checkbox" id="search_box">
                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                    <div class="search_form">
                        <form action="#" method="post">
                            <input type="text" name="Search" placeholder="Search...">
                            <input type="submit" value="Click">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header -->
        <div class="navigation">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url(); ?>" class="act">Home</a></li>	
                            <!-- Mega Menu -->
                            <?php foreach ($all_category as $v_category) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $v_category->category_name; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <?php
                                            foreach ($all_subcategory as $v_subcategory) {
                                                if ($v_subcategory->category_id == $v_category->category_id) {
                                                    ?>
                                                    <div class="col-sm-3">
                                                        <ul class="multi-column-dropdown">
                                                            <li><a href="<?php echo base_url(); ?>store/product_listing/<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <li><a href="about.html">About Us</a></li> 
                            <li><a href="mail.html">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <?php echo $home; ?>
        <!-- Newsletter -->
        <div class="newsletter">
            <div class="container">
                <div class="col-md-6 w3agile_newsletter_left">
                    <h3>Newsletter</h3>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
                </div>
                <div class="col-md-6 w3agile_newsletter_right">
                    <form action="#" method="post">
                        <input type="email" name="Email" placeholder="Email" required="">
                        <input type="submit" value="" />
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- End of Newsletter -->
        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="w3_footer_grids">
                    <div class="col-md-3 w3_footer_grid">
                        <h3>Contact</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                        <ul class="address">
                            <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                        </ul>
                    </div>
                    <div class="col-md-3 w3_footer_grid">
                        <h3>Information</h3>
                        <ul class="info"> 
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="mail.html">Contact Us</a></li>
                            <li><a href="codes.html">Short Codes</a></li>
                            <li><a href="faq.html">FAQ's</a></li>
                            <li><a href="products.html">Special Products</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 w3_footer_grid">
                        <h3>Category</h3>
                        <ul class="info"> 
                            <li><a href="products.html">Mobiles</a></li>
                            <li><a href="products1.html">Laptops</a></li>
                            <li><a href="products.html">Purifiers</a></li>
                            <li><a href="products1.html">Wearables</a></li>
                            <li><a href="products2.html">Kitchen</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 w3_footer_grid">
                        <h3>Profile</h3>
                        <ul class="info"> 
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="products.html">Today's Deals</a></li>
                        </ul>
                        <h4>Follow Us</h4>
                        <div class="agileits_social_button">
                            <ul>
                                <li><a href="#" class="facebook"> </a></li>
                                <li><a href="#" class="twitter"> </a></li>
                                <li><a href="#" class="google"> </a></li>
                                <li><a href="#" class="pinterest"> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="footer-copy1">
                    <div class="footer-copy-pos">
                        <a href="#home1" class="scroll">
                            <img src="<?php echo base_url(); ?>asset/public/images/arrow.png" alt=" " class="img-responsive" />
                        </a>
                    </div>
                </div>
                <div class="container">
                    <p>&copy; 2017 HDDLCD. All rights reserved</p>
                </div>
            </div>
        </div>
        <!-- End of Footer -->
    </body>
</html>