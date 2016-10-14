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
                            <?php echo $product_details->subcategory_name;  ?>
                        </li>
                        <li><?php echo $product_details->product_title;  ?></li>
                        <input type="hidden" value="<?php echo $product_details->product_id; ?>" id="product_id" class="product_id_detail" />
                    </ul>
                </div>
                <div class="col-md-12">
                    <div id="productMain" class="row">
                        <div class="col-sm-4">
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
                            <div class="col-sm-3">
                            <div class="thumb_carosel">
							    <div>
							        <div id="thumbs2">
							            <div class="inner">
							                <ul>
                                                <?php 
                                                    if(!empty($product_image_details)):
                                                    foreach($product_image_details as $pro_det): 
                                                ?>
    					                        <li class="product_thumb_images">
						                            <a class="thumb" href="<?php echo base_url(); ?><?php echo $pro_det['product_upload_image']; ?>"></a>
						                        </li>
                                                <?php 
                                                    endforeach;
                                                    endif;
                                                ?>
		                                    </ul>
						                </div>
						            </div>
						        </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="box1">
                            <div class="product_attributes"
                            	<!-- Dummy dropdown for functionality purpose -->
			                            <select class="dummy_dropdown attr_value">
			                        <?php
			                            if(!empty($product_attributes)):
			                            $temp_attribute = array();
			                            $temp_value = array();
			                            foreach($product_attributes as $attribute):
			                                if (!in_array($attribute['product_attribute_id'], $temp_attribute)):
			                                    $temp_attribute[] = $attribute['product_attribute_id'];
			                        ?>
			                                    </select>
			                                    <label> <?php echo $attribute['product_attribute']; ?> </label>
			                                    <select class="attributes attr_value" id="attribute_<?php echo $attribute['product_attribute']; ?>">
			                                <?php
			                                endif;  
			                                if (!in_array($attribute['product_attribute_value_id'], $temp_value)):   
			                                    $temp_value[] = $attribute['product_attribute_value_id'];
			                                ?> 
			                                    <option value="<?php echo $attribute['product_attribute_value_id']; ?>"> <?php echo $attribute['product_attribute_value']; ?> </option>           
			                                <?php endif; ?> 
			
			                            <?php endforeach; ?>
			                            </select>  <!-- / Dummy dropdown for functionality purpose -->
			                            <span class="attribute_status"> </span>
			                            <input type="hidden" value="<?php echo $product_attributes[0]['product_attribute_group_id']; ?>" class="ordinary_product_arrtibute_group" />
			                            <input type="hidden" value="<?php echo $product_attributes[0]['product_attribute_group_id']; ?>" class="update_product_arrtibute_group" />
			                            <input type="hidden" class="attribute_combination" value=""/>
			                            <?php endif; ?>  
			                            </select> 
			                           <!-- Select attributes ends -->
			                          </div>
                                <h1 class="text-center"><?php echo $product_details->product_title;  ?></h1>
                                <p class="goToDescription"><a class="scroll-to" href="#details">Scroll to product details, material &amp; care and sizing</a>
                                </p>
                                <p class="price product_detail_attribute_price">Rs <?php echo $product_details->product_price;  ?></p>
                                <input type="hidden" value="<?php echo $product_details->product_price;  ?>" class="ordinary_price" />

                                <p class="text-center buttons">
                                    <a class="btn btn-primary" id="add_to_cart_details"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                                    <!-- <a class="btn btn-default" href="<?php echo base_url(); ?>index.php/customer_wishlist"><i class="fa fa-heart"></i> Add to wishlist</a> -->
                                </p>
                                <p class="add_to_cart_section"> </p>
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
                                <span class='st_googleplus_large' displayText='Google +'></span>
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <!-- <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                <span class='st_pinterest_large' displayText='Pinterest'></span> -->
                                <!-- <span class='st_email_large' displayText='Email'></span> -->
                            </p>
                        </div>
                    </div>
                    <div class="row same-height-row common-cls-alignment">
                        <h3>You may also like these products</h3>
                        <div class="product-slider">
                            <?php foreach($recommanded_products as $rec_pro): ?>
                             <div class="item-img">
                                <div class="product">
                                  <div class="home_latest_product">
                                    <div class="flip-container latest_product_images">
                                        <div class="flipper latest_product_images">
                                            <div class="front latest_product_images">
                                                <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>">
                                                    <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive product_position">
                                                </a>
                                            </div>
                                            <div class="back latest_product_images">
                                                <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>">
                                                    <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive product_position">
                                                </a>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $rec_pro['product_id']; ?>" class="invisible">
                                        <img src="<?php echo base_url().$rec_pro['product_upload_image']; ?>" alt="" class="img-responsive product_position">
                                        </a>
                                    </div>
                                   </div>
                                    <div class="text product_title">
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
