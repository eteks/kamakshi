<?php include "templates/header.php"; ?>

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php/">Home</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>index.php/category/<?php echo $product_details->category_id; ?>"><?php echo $product_details->category_name;  ?></a>
                        </li>
                        <li><?php echo $product_details->product_title;  ?></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="row" id="productMain">
                        <div class="col-sm-3">
                            <div id="mainImage">
                                <img src="<?php echo base_url(); ?><?php echo $product_default_image; ?>" alt="" class="img-responsive">
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
                        <div class="col-sm-3">
                            Total No of avaliable items <span> <?php echo $product_details->product_totalitems;  ?> </span>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $product_details->product_title;  ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price">Rs <?php echo $product_details->product_price;  ?></p>

                                <p class="text-center buttons">
                                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="thumbs">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <?php foreach($product_image_details as $pro_det): ?>
                                <div class="col-xs-4">
                                    <a href="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" class="thumb">
                                        <img src="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
               
                <div class="box" id="details">
                    <h4>Product details</h4>
                    <p><?php echo $product_details->product_description;  ?></p>
                        <!-- <h4>Material & care</h4>
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

                            <hr> -->
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
                    <h3>You may also like these products</h3>
                    <div class="product-slider">
                        <?php foreach($recommanded_products as $rec_pro): ?>
                         <div class="item-img">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>"><?php echo $rec_pro['product_title'] ?></a></h3>
                                    <h3> Rs <?php echo $rec_pro['product_price'] ?></h3>
                                    <br />
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                    <!-- <div class="row same-height-row">
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
                                                <img src="<?php echo base_url(); ?>assets/img/product10.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product10_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product10.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Garden Gifts</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!- /.product -->
                      <!--  </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product11.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product11_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product11.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Chocolates and Cookies</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!- /.product -->
                        <!--  </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product6.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product6_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product6.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Watches</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!- /.product -->
                       <!--  </div>

                    </div> -->

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>