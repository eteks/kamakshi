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
            <a href="#">Edit City</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Edit City</h2>

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
                <form role="form" id="add_city">
                	 <div class="control-group">
                        <label for="sel_a">State</label>
                    <select name="city_id" id="sel_a" class="product-type-filter form-control city_act">
                   <option value="">
                     Select City
                    </option>
                    <option>Tamilnadu</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="city_name">City Name</label>
                        <input type="email" class="form-control" id="city_name" placeholder="Enter City Name">
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="sel_c">City Status</label>
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
