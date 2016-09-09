<?php include "templates/header.php"; ?>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" style="display: none;" data-animate-hover="shake"></a>  <a href="#"></a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/register/">Register</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/customer_orders/">Profile</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/contact/">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/customer_orders/" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="<?php echo base_url(); ?>index.php/register/"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="<?php echo base_url(); ?>index.php/" data-animate-hover="bounce">
                    <img src="" alt="Kamakshi" class="hidden-xs">
                    <img src="" alt="Kamakshi" class="visible-xs"><span class="sr-only">Kamakshi -Giftshop</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="<?php echo base_url(); ?>index.php/basket/">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Gift By Categories<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Category</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Baby</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Beauty & Personal Care</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Business & Executive Gifts</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Chocolates & Cookies</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Computer & Mobile </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                           <!--  <h5>Shoes</h5> -->
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Accessories</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Eco-Friendly</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Fashion & Style</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Flowers & Cakes</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Garden Gifts</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Gag & Quirky Gifts</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <h5>Accessories</h5> -->
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Gift Baskets & Hampers</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Home & Living</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Jewellery</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Watches</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Kids</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Love & Romance</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- <h5>Featured</h5> -->
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Naughty Gifts</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Party Return Gifts & Favours</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Perfumes</a>
                                                </li>
                                            </ul>
                                            <!-- <h5>Looks and trends</h5> -->
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Personalised Gifts</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Pets</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Religious Gifts</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Gift By Recipient<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Recipient</h5>
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Men</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Women</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Boy</a>
                                                </li>
                                                <li><a href="<?php echo base_url(); ?>/index.php/category/">Girl</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    <li class="about-us"><a href="<?php echo base_url(); ?>index.php/">About Us</a>
                    </li>
                    <li class="contact-us"><a href="<?php echo base_url(); ?>index.php/">Contact US</a>
                    </li>
                      
                      </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Ladies</a>
                        </li>
                        <li><a href="#">Tops</a>
                        </li>
                        <li>White Blouse Armani</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>/index.php/category/">Baby<span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Bathing & Changing</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Toys & Activity</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Baby Gear</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Collectibles</a>
                                        </li>
                                    </ul>
                                </li>

                                <div class="panel-heading"> 
                            <h4 class="panel-title">                        
                            Price                         
                            </h4>  
                            <input data-addui='slider' data-min='0' data-max='1000' data-range='true' value='0,2'/>                             
                   </div>
                            </ul>

                        </div>
                    </div>
                    
                        

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Recipient</h3>
                        </div>

                        <div class="panel-body">
                            
                                 <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                   <!--  <a href="<?php echo base_url(); ?>/index.php/category/">Baby<span class="badge pull-right">42</span></a> -->
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Men</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Women</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Boy</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Girl</a>
                                        </li>
                                    </ul>
                                </li>
                        </ul>

                        </div>
                    </div>
                   
                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?php echo base_url(); ?>assets/img/detailbig1.jpg" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center">White Blouse Armani</h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price">$124.00</p>

                                <p class="text-center buttons">
                                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url(); ?>assets/img/detailbig1.jpg" class="thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/detailsquare.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url(); ?>assets/img/detailbig2.jpg" class="thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/detailsquare2.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url(); ?>assets/img/detailbig3.jpg" class="thumb">
                                        <img src="<?php echo base_url(); ?>assets/img/detailsquare3.jpg" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                            <h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                            </ul>

                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                </p>
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>Products viewed recently</h3>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


     <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.php">About us</a>
                            </li>
                            <li><a href="text.php">Terms and conditions</a>
                            </li>
                            <li><a href="faq.php">FAQ</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/contact/">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/register/">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Gift By categories</h5>

                        <ul>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Baby</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Beauty & Personal Care</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Accessories</a>
                            </li>
                        </ul>
                         <hr />
                        <h5>Gift By Recipient</h5>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Men</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Women</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Boy</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>/index.php/category/">Girl</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="<?php echo base_url(); ?>index.php/contact/">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                <button class="btn btn-default" type="button">Subscribe!</button>

            </span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Designed and Developed by <a href="http://etekchnoservices.com/">Etekchno Services</a> Pvt Ltd.
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>