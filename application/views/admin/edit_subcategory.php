<?php include "templates/header.php" ?>
        <!--/span-->
        <!-- left menu ends -->
<div class="ch-container">
    <div class="row footer_content"> 
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
            <a href="#">Edit Subcategory</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Subcategory</h2>

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
            <p class="error_msg_reg"><?php if (isset($status)) echo $status; ?></p>
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_subcategory/<?php echo $subcategory_data['subcategory_id']; ?>" name="edit_subcategory_form">
                    <div class="form-group">
                        <label for="subcategory_name">Subcategory Name</label>
                        <input type="text" class="form-control" id="subcategory_name" name="edit_subcategory_name" placeholder="Enter SubCategory Name"
                        value="<?php if(!empty($subcategory_data['subcategory_name'])) echo $subcategory_data['subcategory_name']; ?>" >
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Choose Category</label>
                        <div class="controls">
                            <select id="sel_c" class="product-type-filter form-control city_act" name="edit_select_category[]" multiple>
                            <option value="">Select Category</option>
                            <?php foreach ($category_list as $cat): ?>
                                <option value="<?php echo $cat["category_id"] ?>" <?php if (in_array($cat["category_id"], $subcategory_category)) echo "selected"; ?>><?php echo $cat["category_name"] ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="edit_subcategory_status" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($subcategory_data['subcategory_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($subcategory_data['subcategory_status'] == 0) echo "selected"; ?>>
                                    <span>Inactive</span>
                                </option>
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
</div>
<?php include "templates/footer.php" ?>
