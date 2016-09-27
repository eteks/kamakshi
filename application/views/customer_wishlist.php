<?php include "templates/header.php"; ?>
 
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php/">Home</a>
                        </li>
                        <li>My wishlist</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="<?php echo base_url(); ?>index.php/customer_orders/"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/customer_wishlist/"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/customer_account/"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="wishlist">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Ladies</li>
                    </ul>

                    <div class="box">
                        <h1>My wishlist</h1>
                        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    </div>

                    <div class="row products">

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Baby</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product6.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product6_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product6.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Watches</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
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

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product5.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product5_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product5.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Fashion and Style</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product9.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product9_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product9.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Flowers and Cakes</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product10.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product10_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product10.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Gardens Gift</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
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

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product11.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product11_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product11.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Chocolates and Cookies</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
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

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Beauty and Personal Care</a></h3>
                                    <p class="price"><del>$280</del> $143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
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

                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/">Accessories</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>
                    <!-- /.products -->

                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>