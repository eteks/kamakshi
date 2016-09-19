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
                <form role="form">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="email" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php if(!empty($category_data['category_name'])) echo $category_data['category_name']; ?>">
                    </div>  
                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" id="category_image">
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                <option value="">Select</option>
                                <option value="1" <?php if ($category_data['category_name'] == 1) echo "selected"; ?>>
                                    <span>Active</span>
                                </option>
                                <option value="0" <?php if ($category_data['category_name'] == 0) echo "selected"; ?>>
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
