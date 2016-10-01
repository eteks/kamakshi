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
            <a href="#">Add Area</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Add Area</h2>
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
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/add_area" enctype="multipart/form-data" name="city_form">
            <div class="control-group">
                        <label for="sel_a">Select State</label>
                    <select name="state_name" id="sel_a" class="product-type-filter form-control city_act">
                   <option value="" >Select State</option>
                    <?php foreach ($states as $state_row): ?>
                         <?php   
                            if($city_edit['city_state_id'] == $state_row['state_id'])  echo "<option selected value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                            else
                                echo "<option value='".$state_row['state_id']."'>".$state_row['state_name']."</option>";
                        ?>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="control-group">
                        <label for="sel_a">Select City</label>
                    <select name="state_name" id="sel_a" class="form-control">
                   <option value="">
                     Select City 
                    </option>
                    <?php
                    $query = mysql_query("select * from giftstore_city  where city_status='1' order by city_name asc");
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $row['city_id']; ?>"><span><?php echo $row['city_name']; ?></span></option>
                <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="area_name">Area Name</label>
                        <input type="text" class="form-control" id="area_name" placeholder="Enter area Name" name="area_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Delivery charge</label>
                        <input type="text" class="form-control" id="deliverycharge" placeholder="Enter delivery charge" name="delivery_charge">
                    </div>  
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Area status</label>
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
</div>
<?php include "templates/footer.php" ?>
