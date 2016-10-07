<?php if(!$this->input->is_ajax_request()){ ?>
    <?php include "templates/header.php"; ?>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li><?php echo $cat_name->category_name; ?></li>
                    </ul>
                </div>
                <?php include "sidebar_list.php"; ?>
                <div class="col-md-9">
                  <div class="filtering_title">
                  	<span class="filtering_titles filtering_name">Filtering  |</span>
                    <div class="filtering_sections filtering_titles"></div>
                  </div>
                    <!-- <div class="box product_name">
                        <h1><?php echo $cat_name->category_name; ?></h1>
                    </div> -->
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 products-showing">
                            	<strong class="category_name">Watches</strong>
                                <!-- Showing <strong>12</strong> of <strong><?php echo $cat_pro_count; ?></strong> products -->
                            </div>
                            <div class="col-sm-12 col-md-6  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <!-- <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div> -->
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="products-sort-by product_sorting">
                                                <strong>Sort by</strong>
                                                <select class="sort_products" id="sort_products" name="sort-by" class="form-control">
                                                    <option value="pricel">Price - Low to High</option>
                                                    <option value="priceh">Price - High to Low</option>
                                                    <option value="name">Name </option>
                                                    <option value="newest">Newest first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div id="all_products_section" class="row products">
                        <?php 
                        if(!empty($product_category)): foreach ($product_category as $cat_pro):
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                        <?php endforeach; else: ?>
                        <p class="not_available">Product(s) not available.</p>
                        <?php endif; ?>
                        <div class="cb"> </div>
                        <div class="bottom_pagination">
                            <?php echo $this->ajax_pagination->create_links(); ?> 
                        </div>
                    </div>
<?php if(!$this->input->is_ajax_request()){ ?>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div><!--all-->
    <?php include "templates/footer.php"; ?>
<?php } ?>
