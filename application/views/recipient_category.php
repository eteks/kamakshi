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
            <!-- *** HOT PRODUCT SLIDESHOW *** -->
            <div id="hot">
                <div class="category_product">
                	<h4 class="category_product_name"><?php echo $recipient_name['recipient_type']; ?></h4>
                </div>
                <div class="container">
                    <div id="container"> 
                    <?php
                        if(!empty($recipients_category_list)):
                        foreach ($recipients_category_list as $rec_list): 
                    ?>
                        <div class="product recipient_category">
                            <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/category/<?php echo $rec_list['category_id']; ?>">
                                                <img src="<?php echo base_url().$rec_list['category_image'] ?>" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/category/<?php echo $rec_list['category_id']; ?>">
                                                <img src="<?php echo base_url().$rec_list['category_image'] ?>" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/category/<?php echo $rec_list['category_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$rec_list['category_image'] ?>" alt="" class="img-responsive position_images">
                                    </a>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="<?php echo base_url(); ?>index.php/category/<?php echo $rec_list['category_id']; ?>"><?php echo $rec_list['category_name'] ?></a></h3>
                                <br />
                            </div>
                        </div>
                    <?php
                        endforeach;
                        endif;
                    ?>
                    </div> 
                    <!-- /.container -->
                </div>
                <!-- /#hot -->
            </div>
            <!-- *** HOT END *** -->
        </div>
        <!-- /#content -->
    </div><!--all-->
<?php include "templates/footer.php"; ?>
 