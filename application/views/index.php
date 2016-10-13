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
            <!-- *** ADVANTAGES HOMEPAGE *** -->
            <div id="advantages">
                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>
                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best Services</a></h3>
                                <p>To distinguish ourselves from surrounding specialty retailers, we provide numerous customized services that offer customers a satisfying and unique shopping experience.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>
                                <h3><a href="#">Key to Success</a></h3>
                                <p>Establish a "Brand Identity" that personifies high-quality, gift giving merchandise and outstanding customer service.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#advantages -->
            <!-- *** ADVANTAGES END *** -->
            <!--Product Categories-->
            <div class="container">
                <div id="product-terms" class="product_category_name"> 
                    <a id="item_all" class="" href="#"> All </a>
                    <?php 
                        if(!empty($recipient_list)): 
                        foreach($recipient_list as $res_list):
                    ?>
                        <a id="item<?php echo $res_list['recipient_id']; ?>" class="" href="#"><?php echo $res_list['recipient_type']; ?></a>
                    <?php
                        endforeach;
                        endif;
                    ?>                                          
        		</div>
    			<div id="owl-demo" class="owl-carousel">
					<?php 
                        $array_temp = array();
                        foreach ($category_recipient_list as $cat): 
                        if (!in_array($cat['category_id'], $array_temp)):
                        $array_temp[] = $cat['category_id'];
                    ?>   
                        <div class="project item<?php echo $cat['recipient_mapping_id']; ?> primary_list">
                            <div class="product recipient_based_categories">
                              <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>">
                                                <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                    </a>
                                </div>
                               </div>
                                <div class="text product_title">
                                    <h3><a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name'] ?></a></h3>
                                    <br>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php 
                        else:
                        ?>
                        <div class="project item<?php echo $cat['recipient_mapping_id']; ?> secondary_list">
                            <div class="product recipient_based_categories">
                              <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>">
                                                <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$cat['category_image']; ?>" class="img-responsive position_images">
                                    </a>
                                </div>
                               </div>
                                <div class="text product_title">
                                    <h3><a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name'] ?></a></h3>
                                    <br>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    <?php
                        endif;
                        endforeach; 
                    ?>
            	</div>
				<div id="projects-copy" class="hide"></div>
			</div>
			<!--Product Categories-->
            <!--Popular, Futured Products-->
             <div id="hot">
            <section id="our-works" class="page bg-style1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu">
                                        <ul id="filters">
                                            <li class="active_prot_menu latest_products"><a href="#portfolio_menu" data-filter="*">Latest Products</a></li>
                                        </ul>
                                   </div>
         
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </section>

                <!-- <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div> -->
                <div class="container">
                    <div id="container"> 
                    <div class="product-slider">
                    <?php foreach ($giftstore_product as $pro): ?>
                        <div class="item-img">
                            <div class="product">
                              <div class="home_latest_product">
                                <div class="flip-container latest_product_images">
                                    <div class="flipper latest_product_images">
                                        <div class="front latest_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                            </a>
                                        </div>
                                        <div class="back latest_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $pro['product_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                    </a>
                                </div>
                               </div>
                                <div class="text product_title">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/<?php echo $pro['product_id']; ?>"><?php echo $pro['product_title'] ?></a></h3>
                                    <h3><?php echo $pro['product_price'] ?></h3>
                                    <br />
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php endforeach ?>
                 </div>
                    <!-- /.product-slider -->
                   </div>
                </div>
                <!-- /.container -->
            </div>
        </div>
        <!-- /#content -->
 </div><!--all-->
<?php include "templates/footer.php"; ?>
 