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
            <a href="#">Edit Order</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Edit Order</h2>
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
               <form role="form" id="edit_order">
                 <div class="form-errors"></div>
                    <div class="form-group">
                        <label for="area_name">User Id<span class="fill_symbol"> *</span></label>
                        <input type="email" class="form-control" id="userid" placeholder="Enter User Id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Items<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control totalitem" id="" placeholder="Enter Total Items">
                    </div>
                     <div class="control-group">
                        <label for="sel_a">User Type<span class="fill_symbol"> *</span></label>
                    <select name="city_id" id="sel_a" class="form-control">
                   <option value="">
                     Select State 
                    </option>
                    <option>super user</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="area_name">Customer Name<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="area_name" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email<span class="fill_symbol"> *</span></label>
                        <input type="email" class="form-control" id="delivery_charge" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping_line1<span class="fill_symbol"> *</span></label>
                        <input type="email" class="form-control" id="delivery_charge" placeholder="Enter Shipping_line1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Shipping_line2<span class="fill_symbol"> *</span></label>
                        <input type="email" class="form-control" id="delivery_charge" placeholder="Enter Shipping_line2">
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="sel_a">State<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                 <option selected hidden>Select</option>
                                <option>tamilnadu</option>
                                <option>Us</option>
                            </select>
                        </div>
                        <div class="control-group">
                        <label class="control-label" for="sel_b">City<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                 <option selected hidden>Select</option>
                                <option>madurai</option>
                                <option>Aruppukottai</option>
                            </select>
                        </div>
                        <label class="control-label" for="sel_c">Area<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="city_id" id="sel_c" class="product-type-filter form-control city_act">
                                 <option selected hidden>Select</option>
                                <option>tamilnadu</option>
                                <option>Us</option>
                            </select>
                        </div>
                     <div class="form-group">
                        <label for="area_name">Mobile<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Amount<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="totalamount" placeholder="Enter Total Amount">
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
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

</div><!--/row--
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
</div>
</div>
<?php include "templates/footer.php" ?>
