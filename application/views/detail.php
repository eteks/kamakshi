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
                         <li>
                            <!-- <a href="<?php echo base_url(); ?>index.php/category/<?php echo $product_details->category_id; ?>/<?php echo $product_details->subcategory_id; ?>"><?php echo $product_details->subcategory_name;  ?></a> -->
                            <a href="#"><?php echo $product_details->subcategory_name;  ?></a>
                        </li>
                        <li><?php echo $product_details->product_title;  ?></li>
                        <input type="hidden" value="<?php echo $product_details->product_id; ?>" id="product_id" />
                    </ul>
                </div>
                <div class="col-md-12">
                    <div id="productMain" class="row">
                        <div class="col-sm-7">
                            <div id="mainImage">
                                <img src="<?php echo base_url(); ?><?php echo $product_default_image; ?>" alt="" class="img-responsive main-image-position">
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
                        <div class="col-sm-5">
                            <div class="box">
                                <h1 class="text-center"><?php echo $product_details->product_title;  ?></h1>
                                <p class="goToDescription"><a class="scroll-to" href="#details">Scroll to product details, material &amp; care and sizing</a>
                                </p>
                                <p class="price">Rs <?php echo $product_details->product_price;  ?></p>

                                <p class="text-center buttons">
                                    <a class="btn btn-primary" id="add_to_cart_details"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <a class="btn btn-default" href="basket.html"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>
                                <p class="add_to_cart_section"> </p>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div id="thumbs" class="row">
                                <?php foreach($product_image_details as $pro_det): ?>
                                <div class="col-xs-4 images-list">
                                    <a href="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" class="thumb">
                                        <img src="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" alt="" class="img-responsive">
                                    </a>
                                    <a href="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" class="thumb">
                                        <img src="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <?php endforeach; ?>
                        </div>
                       </div>
                    </div>
                    <div id="details" class="box">
                        <p></p>
                         <h4>Product details</h4>
                        <p><?php echo $product_details->product_description;  ?></p>
                       <!--  <h4>Material &amp; care</h4>
                        <ul>
                            <li>Polyester</li>
                            <li>Machine wash</li>
                        </ul>
                        <h4>Size &amp; Fit</h4>
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
                                <a data-animate-hover="pulse" class="external facebook" href="#"><i class="fa fa-facebook"></i></a>
                                <a data-animate-hover="pulse" class="external gplus" href="#" style="opacity: 1;"><i class="fa fa-google-plus"></i></a>
                                <a data-animate-hover="pulse" class="external twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a data-animate-hover="pulse" class="email" href="#"><i class="fa fa-envelope"></i></a>
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

                   <!--  <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height" style="height: 380px;">
                                <h3>Products viewed recently</h3>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" style="height: 380px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product2.jpg">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product2_2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible" href="detail.html">
                                    <img class="img-responsive" alt="" src="img/product2.jpg">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!- /.product -->
                        <!-- </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" style="height: 380px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product1.jpg">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product1_2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible" href="detail.html">
                                    <img class="img-responsive" alt="" src="img/product1.jpg">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!- /.product -->
                        <!-- </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" style="height: 380px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product3.jpg">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img class="img-responsive" alt="" src="img/product3_2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="invisible" href="detail.html">
                                    <img class="img-responsive" alt="" src="img/product3.jpg">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!- /.product -->
                        <!-- </div>

                    </div> -->

                </div>
                <!-- /.col-md-9 -->
            </div>
        </div>
        <!-- /#content -->

<input type="hidden" id="attribute_group_id" value="" />


    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>



<script>
$(document).ready(function() {
    //  AJAX for add to cart items
    $("#add_to_cart_details").click(function() {
        var pro_id = $('#product_id').val();
        // var grp_id = $('#attribute_group_id').val();
        var grp_id = "0";
        jQuery.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/add_to_cart_details",
        data: {pro_id: pro_id , grp_id : grp_id},
        success: function(res) {
        if (res)
        {
           var order_count = res.order_count;
           var add_to_cart_status = res.add_to_cart_status;
           $('.add_to_cart').html(order_count);
           $('.add_to_cart_section').html(add_to_cart_status);
           $('.add_to_cart_section').slideDown(350);
           $('.add_to_cart_section').slideUp(2000);
        }
        }
        });
    }); 

});
</script>