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
            <a href="#">Edit Gift Product</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Edit Gift Product</h2>

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
                        <label for="exampleInputEmail1">Title Name</label>
                        <input type="email" class="form-control" id="title_name" placeholder="Enter title Name">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputFile">Category Image</label>
                        <input type="file" id="category_image">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea type="email" class="form-control" id="description" placeholder="Enter description"></textarea>
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="email" class="form-control" id="price" placeholder="Enter price ">
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Total Iteams</label>
                        <input type="email" class="form-control" id="total_iteams" placeholder="Enter total iteams">
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Sold</label>
                        <input type="email" class="form-control" id="sold" placeholder="Enter Sold">
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="email" class="form-control" id="size" placeholder="Enter Size">
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Wight</label>
                        <input type="email" class="form-control" id="wight" placeholder="Enter Wight">
                    </div> 
                     <div class="form-group">
                        <label for="exampleInputEmail1">Colorname</label>
                        <input type="email" class="form-control" id="color_name" placeholder="Enter Color Name">
                    </div> 
                     <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                 <option selected hidden>Select</option>
                                <option>Active</option>
                                <option>Inactive</option>
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
