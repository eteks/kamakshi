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
             <p class="product_tab">Basic Product Details</p>
                    <div class="form-group">
                        <label for="titlename">Product Title</label>
                        <input type="text" class="form-control" id="titlename" placeholder="Enter title Name" name="product_title">
                    </div>  
                    <div class="form-group">
                        <label for="category_image">Product Image</label>
                        <input type="file" id="category_image" name="product_image[]" multiple="multiple">
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
            <p class="product_tab"><input type="checkbox" class="attribute_status"> Want to Add Product Attributes?</p>
                    <div class="attribute_main_block">
                        <div class="attribute_group fl" id="attribute_group1">
                            <div class="form-group attribute_block">
                                <div class="clone_attribute_group">
                                    <div class="clone_attribute" id="clone_attribute1">
                                    	<label for="total_iteams" class="fl">Attribute Option</label>
                                        <select name="select_attribute[]" id="sel_c" class="product-type-filter form-control fl">
                                                <option value="">Select Attribute</option>
                                                <?php foreach ($attribute_list as $att): ?>
                                                    <option value="<?php echo $att["product_attribute_id"] ?>"><?php echo $att["product_attribute"] ?></option>
                                                <?php endforeach ?>
                                        </select>
                                        <input class="form-control fl" id="total_iteams" placeholder="Enter Attribute value" name="attribute_value[]" type="text">
                                    </div> <!--  clone_attribute -->
                                    <div class="add-rmv-btn">
			                                <input value="Add" class="btn submit-btn btn-default attibute_add_btn" type="button">
			                                <input value="Remove" class="btn submit-btn btn-default attibute_add_btn" type="button">
	                                </div>
                               </div> <!-- clone_attribute_group -->
                                   <div class="clr-screen"></div>
                            </div>
                            <div class="form-group attribute_block">
                                <label for="price" class="fl">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Enter price" name="product_attribute_price[]">
                            </div> 
                             <div class="form-group attribute_block">
                                <label for="total_iteams" class="fl">Total Items</label>
                                <input type="text" class="form-control" id="total_iteams" placeholder="Enter total items" name="product_attribute_totalitems[]">
                            </div> 
                        </div>   
                    </div>
                    <div class="group">
                        <input type="button" value="Add" class="btn submit-btn btn-default attibute_add product-btns">
                        <input type="button" value="Remove" class="btn submit-btn btn-default attibute_add product-btns">      
                    </div>
                    <div class="group_values_block">
                        <input type="hidden" class="group_values" name="group_values" value="1"> 
                    </div> <!-- group_values_block -->
                    <button type="submit" class="btn submit-btn btn-default submiit">Submit</button>
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