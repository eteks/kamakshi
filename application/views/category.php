<?php include "templates/header.php"; ?>

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><?php echo $cat_name->category_name; ?></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS *** -->
                    <div class="panel panel-default sidebar-menu">                       
                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat_name->category_id; ?>"><?php echo $cat_name->category_name; ?> <span class="badge pull-right"> <?php echo $sub_count; ?></span></a>
                                    <ul>
                                     <?php foreach ($gift_subcategory as $subcat):?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/category/<?php echo $cat_name->category_id; ?>/<?php echo $subcat['subcategory_id'] ?>"><?php echo $subcat['subcategory_name'] ?><span class="badge pull-right">5</span></a>
                                        </li>
                                    <?php endforeach; ?> 
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Price</h3>
                        </div>
                        <input data-addui='slider' data-min='0' data-max='1000' data-range='true' value='0,1000'/> 
                        </div>


                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Recipient</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <?php foreach ($gift_recipient as $recipient) : ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>/index.php/category/<?php echo $recipient['recipient_id']; ?>"><?php echo $recipient['recipient_type']; ?></a> 
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                  
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1><?php echo $cat_name->category_name; ?></h1>
                        <p>In our Watches department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
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
                    <div class="row products">
                        <!-- <?php foreach ($giftstore_subcategory as $subcat):?> -->
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url().$subcat['subcategory_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url(); ?>/index.php/detail/">
                                                <img src="<?php echo base_url().$subcat['subcategory_image'] ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url().$subcat['subcategory_image'] ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?php echo base_url(); ?>/index.php/detail/">Fashion and Style</a></h3>
                                    <p class="price">$143.00</p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url(); ?>/index.php/detail/" class="btn btn-default">View detail</a>
                                        <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- <?php endforeach ?> -->

                        
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