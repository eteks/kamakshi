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
                                <p class="error_msg">Please fill all mandatory fields</p>
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
                        <li>Ladies</li>
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
                               
                        
                                <!-- <li class="active">
                                    <a href="<?php echo base_url(); ?>/index.php/category/">Ladies  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">T-shirts</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Skirts</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Pants</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>/index.php/category/">Kids  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">T-shirts</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Skirts</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Pants</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>/index.php/category/">Accessories</a>
                                        </li>
                                    </ul>
                                </li> -->

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

                    <!-- <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div> -->

                    <!-- *** MENUS AND FILTERS END *** -->

                   <!--  <div class="banner">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div> -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Ladies</h1>
                        <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Colourful Candle Set</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Red Teddy, Candles & Chocolate Hamper</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->

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

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Clock Cushion & Flower Hamper</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Chocolates & Candles Hamper</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Beautiful Morning Hamper</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Cushion & Photo Frame </a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon gift">
                                    <div class="theribbon">GIFT</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
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
                    <p class="pull-left">© 2016 Kamakshi.</p>

                </div>
                <div class="col-md-6">
                      <p class="pull-right">Designed and Developed by <a href="http://etekchnoservices.com/">Etekchno Services</a> Pvt Ltd.</p>
                </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>