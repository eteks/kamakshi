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
            <a href="#">Add City</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add City</h2>

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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_city" enctype="multipart/form-data" name="city_form">
                <div class="control-group">
                        <label for="sel_a">Select State</label>
                    <select name="state_name" id="sel_a" class="form-control">
                   <option value="">
                     Select State 
                    </option>
                    <?php
                    $query = mysql_query("select * from giftstore_state  where state_status='1' order by state_name asc");
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $row['state_id']; ?>"><span><?php echo $row['state_name']; ?></span></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="city_name">City Name</label>
                        <input type="text" class="form-control" id="city_name" placeholder="Enter City Name" name="city_name">
                    </div>  
                    <div class="control-group">
                        <label class="control-label" for="sel_c">Status</label>
                        <div class="controls">
                            <select name="city_status" id="city_status" class="product-type-filter form-control city_act">
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
</div>
<?php include "templates/footer.php" ?>