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
                    <div class="box">
                        <h1><?php echo $cat_name->category_name; ?></h1>
                        <p>In our Watches department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong><?php echo $cat_pro_count; ?></strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="all_products_section" class="row products">
                        <?php 
                        foreach ($product_category as $cat_pro):
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>">
                                            <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>">
                                                <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/<?php echo $cat_pro['product_id']; ?>" class="invisible">
                                    <img src="<?php echo base_url().$cat_pro['product_upload_image'] ?>" alt="" class="img-responsive">
                                </a>
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
                        ?> 
                        
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        </div><!--all-->

<?php include "templates/footer.php"; ?>




<script>
// Ajax post
$(document).ready(function() {
    //  AJAX for subcategories products
    $(".subcategories").click(function() {
        var sub_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/ajax_subcategory_products",
        data: {sub_id: sub_id , cat_id : cat_id},

        success: function(res) {
        if (res)
        {
            $('#all_products_section').html(res);
        }
        }
        });
    });
    //  AJAX for recipients products
    $(".recipients").click(function() {
        var rec_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/ajax_recipient_products",
        data: {rec_id : rec_id, cat_id : cat_id},

        success: function(res) {
        if (res)
        {
            $('#all_products_section').html(res);
        }
        }
        });
    });
    
    //  AJAX for recipients products
    // $(".add_to_cart_items").click(function() {
    //     var rec_id = $(this).data('id');
    //     var cat_id = $('#category_id').val();
    //     jQuery.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/ajax_recipient_products",
    //     data: {rec_id : rec_id, cat_id : cat_id},

    //     success: function(res) {
    //     if (res)
    //     {
    //         $('#all_products_section').html(res);
    //     }
    //     }
    //     });
    // });

});
</script>