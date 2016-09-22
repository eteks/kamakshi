<?php 
    foreach ($products_subcategory as $subcat_pro):
?>
    <div class="col-md-4 col-sm-6">
        <div class="product">
            <div class="flip-container">
                <div class="flipper">
                    <div class="front">
                        <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $subcat_pro['product_id']; ?>">
                        <img src="<?php echo base_url().$subcat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="back">
                        <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $subcat_pro['product_id']; ?>">
                            <img src="<?php echo base_url().$subcat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $subcat_pro['product_id']; ?>" class="invisible">
            	<img src="<?php echo base_url().$subcat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
            </a>
            <div class="text">
                <h3><a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $subcat_pro['product_id']; ?>"> <?php echo $subcat_pro['product_title']; ?> </a></h3>
                <p class="price">  Rs.<?php echo $subcat_pro['product_price']; ?> </p>
                <p class="buttons">
            	    <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $subcat_pro['product_id']; ?>" class="btn btn-default">View detail</a>
                	<a href="<?php echo base_url(); ?>/index.php/basket/<?php echo $subcat_pro['product_id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </p>
            </div>
        </div>
    </div>
<?php 
	endforeach;
?> 
                        