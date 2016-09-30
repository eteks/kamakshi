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
                    <div class="filtering_sections">
                    </div>
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
                    <div id="all_products_section" class="row products">
                        <?php 
                        if(!empty($product_category)): foreach ($product_category as $cat_pro):
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
                        <?php endforeach; else: ?>
                        <p>Product(s) not available.</p>
                        <?php endif; ?>
                        <div class="cb"> </div>
                        <?php echo $this->ajax_pagination->create_links(); ?>
                        
                    </div>
                    <!-- /.products -->

                    <!-- <div class="pages">

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
                    </div> -->


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        </div><!--all-->

<?php include "templates/footer.php"; ?>




<script>
// Ajax Call
$(document).ready(function() {

    // Price filtering
    $('.addui-slider-handle').mouseup(function() {
   
        var price_range =  $('.addui-slider-input').val().split(',');
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var cat_id = $('#category_id').val();
        var sort_val = $('.sort_products').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0 && recipients_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort : sort_val};
        }
        else {
            var datavalues = { cat_id: cat_id , s_val : start_value, e_val : end_value, sort : sort_val};
        }   

        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    // Sort filtering
    $('.sort_products').on('change',function() {
   
        var price_range =  $('.addui-slider-input').val().split(',');
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var cat_id = $('#category_id').val();
        var sort_val = $(this).val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0 && recipients_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort : sort_val};
        }
        else {
            var datavalues = { cat_id: cat_id , s_val : start_value, e_val : end_value, sort : sort_val};
        }   
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    //  Subcategories filtering
    $(".subcategories").click(function() {

        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var this_text = $(this).text();
        var sub_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;

        if(sub_categories_filter_length > 0) {
            $('.sub_categories_filter').html(this_text+'<a data-id='+sub_id+' class="filtering_link" data-key="sub_cat"><i class="fa fa-times" aria-hidden="true"></i></a>');
        }
        else {
            $('.filtering_sections').append('<span class="sub_categories_filter">'+this_text+'<a data-id='+sub_id+' class="filtering_link" data-key="sub_cat"><i class="fa fa-times" aria-hidden="true"></i></a></span>');
        }
        if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};    
        }
        else {
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    //  Reipients fitering
    $(".recipients").click(function() {
    
        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var rec_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        var this_text = $(this).text();    
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(recipients_filter_length > 0) {
            $('.recipients_filter').html(this_text+'<a data-id='+rec_id+' class="filtering_link" data-key="rec"><i class="fa fa-times" aria-hidden="true"></i></a>');
        }
        else {
            $('.filtering_sections').append('<span class="recipients_filter">'+this_text+'<a data-id='+rec_id+' class="filtering_link" data-key="rec"><i class="fa fa-times" aria-hidden="true"></i></a></span>');
        }
        if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else {
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });
    
    //  Remove option filtering
    $(document).on('click','.filtering_link',function() {
        
        $(this).closest('span').remove();
        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var cat_id = $('#category_id').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;


        if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }


        else if(recipients_filter_length > 0) {
           var rec_id = $('.recipients_filter').find('a').data('id');
           var datavalues = {rec_id : rec_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else {
            var datavalues = {cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/filtering_product",
        data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

}); // end document
</script>