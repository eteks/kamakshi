<?php include "templates/header.php" ?>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Add Gift Product</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Gift Product</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
             <p class="error_msg_reg"><?php if (isset($error_message)) echo $error_message; ?></p>
             <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_giftproduct" enctype="multipart/form-data" name="product_form">
                <form role="form" id="giftproduct">
                    <div class="form-group">
                        <label for="titlename">Product Title</label>
                        <input type="text" class="form-control" id="titlename" placeholder="Enter title Name" name="product_title">
                    </div>  
                    <div class="form-group">
                        <label for="category_image">Product Image</label>
                        <input type="file" id="category_image" name="product_image[]" multiple>
                    </div>
                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Enter description" name="product_description"></textarea>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose Category</label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control category_act" name="select_category">
                            <option value="">Select Category</option>
                                <?php foreach ($category_list as $cat): ?>
                                    <option value="<?php echo $cat["category_id"] ?>"><?php echo $cat["category_name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose SubCategory</label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control subcategory_act" name="select_subcategory">
                            <option value="">Select Subcategory</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose Recipient</label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control recipient_act" name="select_recipient">
                            <option value="">Select Recipient</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" name="product_price">
                    </div> 
                     <div class="form-group">
                        <label for="total_iteams">Total Items</label>
                        <input type="text" class="form-control" id="total_iteams" placeholder="Enter total items" name="product_totalitems">
                    </div> 
                    <!-- <div class="form-group">
                        <label for="sold">Sold</label>
                        <input type="text" class="form-control" id="sold" placeholder="Enter Sold" disabled="">
                        <input type="hidden" name="product_sold">
                    </div>  -->
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="product_status" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

<?php include "templates/footer.php" ?>