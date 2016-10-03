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

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>
                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#advantages -->
            <!-- *** ADVANTAGES END *** -->
            <!-- *** HOT PRODUCT SLIDESHOW *** -->
        <div id="hot">
            <section id="our-works" class="page bg-style1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio">
                                <div class="portfoloi_content_area" >
                                    <div class="portfolio_menu">
                                        <ul id="filters">
                                        <?php 
                                            if(!empty($recipient_list)): 
                                            foreach($recipient_list as $res_list): 
                                            if($res_list['recipient_type']=="All"):
                                        ?>
                                            <li class="active_prot_menu recipient_all_section"><a href="#portfolio_menu" data-filter="*"><?php echo $res_list['recipient_type']; ?></a></li>
                                        <?php
                                            else :
                                        ?>
                                            <li class="recipient_list_section"><a href="#portfolio_menu" data-filter=".item<?php echo $res_list['recipient_id']; ?>"><?php echo $res_list['recipient_type']; ?></a></li>
                                        <?php
                                            endif;
                                            endforeach;
                                            endif;
                                        ?>                                            
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
                    <?php 
                        $array_temp = array();
                        foreach ($category_recipient_list as $cat): 
                        if (!in_array($cat['category_id'], $array_temp)):
                                $array_temp[] = $cat['category_id'];
                        ?>
                        <div class="item-img recipient_home item<?php echo $cat['recipient_mapping_id']; ?>">
                            <div class="product">
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
                        </div>
                        <?php 
                        else:
                        ?>
                        <div class="item-img secondary_list recipient_home item<?php echo $cat['recipient_mapping_id']; ?>" style="display:none;">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url().$cat['category_image'] ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/"><?php echo $cat['category_name'] ?></a></h3>
                                    <br />
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php
                        endif;
                        endforeach; ?>
                    </div>
                    <!-- /.product-slider -->
                   </div>
                </div>
                <!-- /.container -->
            </div>
            <!-- /#hot -->
            <!-- *** HOT END *** -->
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
                        <div class="item-img women">
                            <div class="product">
                              <div class="home_latest_product">
                                <div class="flip-container latest_product_images">
                                    <div class="flipper latest_product_images">
                                        <div class="front latest_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                            </a>
                                        </div>
                                        <div class="back latest_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url().$pro['product_upload_image'] ?>" alt="" class="img-responsive product_position">
                                    </a>
                                </div>
                               </div>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>index.php/detail/"><?php echo $pro['product_title'] ?></a>
                                    <p><?php echo $pro['product_price'] ?></p>
                                    </h3>
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
 