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
            <a href="#">Edit Category</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Category</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_category/<?php echo $category_data['category_id']; ?>" enctype="multipart/form-data" name="edit_category_form">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php if(!empty($category_data['category_name'])) echo $category_data['category_name']; ?>" name="edit_category_name">
                    </div>  
                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" id="category_image" name="edit_category_image">
                        <?php
                            $img_source = $category_data['category_image']; 
                        ?>
                            <a class='dispaly_hide_offer' href='<?php echo $img_source; ?>' target='_blank'> 
                            <?php if($img_source != '') {?>
                             <img class='edit_category_image' src='<?php echo base_url().$img_source; ?>'/> 
                            <?php } ?>
                            <input type="hidden" name="hidden_category_image" value="<?php echo $img_source; ?>">
                            </a>
                            <input type="hidden" value="<?php echo $img_source; ?>" name="old_path_name" />
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="edit_category_status" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($category_data['category_status'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($category_data['category_status'] == 0) echo "selected"; ?>>
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

<?php include "templates/footer.php" ?>
