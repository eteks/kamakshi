<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php"; ?>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="">Home</a>
                        </li>
                        <li> Search </li>
                    </ul>
                </div>
                <?php 
                // include "sidebar_list.php"; 
                ?>
                <div class="col-md-12">
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 products-showing">
                            	<strong class="category_name">Products for "<?php echo $search_keyword; ?>" </strong>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div id="all_products_section" class="row products">
                        <?php 
                        if(!empty($product_list)): 
                        foreach ($product_list as $cat_pro):
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product listing_product">
                            	<div class="product_img_position">
                                    <div class="flip-container listing_images">
                                        <div class="flipper listing_images">
                                            <div class="front listing_images">
                                                <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive images_alignment">
                                                </a>
                                            </div>
                                            <div class="back listing_images">
                                                <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>">
                                                    <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive images_alignment">
                                                </a>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>" class="invisible">
                                        <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive images_alignment">
                                        </a>
                                    </div>
                                </div>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>"> <?php echo $cat_pro['product_title']; ?> </a></h3>
                                    <p class="price">  Rs.<?php echo $cat_pro['product_price']; ?> </p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>" class="btn btn-default">View detail</a>
                                        <!-- <a data-id="<?php echo $cat_pro['product_id']; ?>" class="btn btn-primary add_to_cart_items"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php 
                        endforeach; 
                        else: 
                        ?>
                        <p class="not_available"> No product(s) found for this keyword.</p>
                        <?php 
                        endif; 
                        ?>
                        <div class="cb"> </div>
                        <div class="bottom_pagination">
                            <?php echo $this->ajax_pagination->create_links(); ?> 
                        </div>
                    </div>
                </div>
                <?php if(!$this->input->is_ajax_request()){ ?>
                    <input type="hidden" class="search_keyword_section" value="<?php echo $search_keyword; ?>" />
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div><!--all-->
<?php include "templates/footer.php"; ?>
<?php } ?>