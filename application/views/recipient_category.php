<?php include "templates/header.php"; ?>
      <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="<?php echo base_url(); ?>assets/img/main-slider1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/main-slider2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/main-slider4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>
           <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
        
        <div id="hot">
                <!-- <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div> -->
                <div class="category_product">
                	<h4 class="category_product_name">Products</h4>
                </div>
                <div class="container">
                    <div id="container"> 
                    <!-- <div class="recipient_category"> -->
                    <?php foreach ($giftstore_category as $cat): ?>
                        <!-- <div class="item-img women"> -->
                            <div class="product recipient_category">
                             <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive position_images">
                                    </a>
                                </div>
                                </div>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/"><?php echo $cat['category_name'] ?></a></h3>
                                    <br />
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        <!-- </div> -->
                        <?php endforeach; ?>
                 <!-- </div> -->
                    <!-- /.product-slider -->
                   <!-- </div> -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#hot -->
            <!-- *** HOT END *** -->
        </div>
        <!-- /#content -->
 </div><!--all-->
<?php include "templates/footer.php"; ?>
 