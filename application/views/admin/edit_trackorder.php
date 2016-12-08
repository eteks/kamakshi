<?php if(!$this->input->is_ajax_request()){ ?>
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
            <a href="#">Edit Track Order</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Edit Track Order</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
<?php } ?>
                <?php if (isset($error_message)){ 
                    echo "<p class='error_msg_reg alert alert-info'>".$error_message."</p>";
                }?>
                <?php ?>
                <form role="form" method="POST" action="<?php echo base_url(); ?>index.php/admin/adminindex/edit_trackorder/<?php echo $trackorder_data['order_id']; ?>" name="edit_trackorder_form" class="form_submit">
                 <div class="form-errors"></div>
                    <div class="form-group">
                        <label for="order_user_id">Order User Id<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="order_user_id" disabled="readonly" placeholder="Order User Id"
                        value="<?php if ($trackorder_data['order_user_id'] === NULL) echo "None"; else echo($trackorder_data['order_user_id']); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="order_id">Order Id<span class="fill_symbol"> *</span></label>
                        <input type="text" class="form-control" id="order_id" disabled="readonly" name="order_id" placeholder="Order User Id"
                        value="<?php if(!empty($trackorder_data['order_id'])) echo $trackorder_data['order_id']; ?>" >
                        <input type="hidden" name="order_id"
                        value="<?php echo($trackorder_data['order_id']); ?>" >
                        <input type="hidden" name="order_shipping_email"
                        value="<?php echo($trackorder_data['order_shipping_email']); ?>" >
                    </div>
                     <div class="control-group">
                        <label class="control-label" for="sel_c">Status<span class="fill_symbol"> *</span></label>
                        <div class="controls">
                            <select name="order_delivery_status" id="sel_c" class="product-type-filter form-control order_act">
                                <option>
                                        <span>Select Order Status</span>
                                        </option>
                                        <option value="processing" <?php if ($trackorder_data['order_delivery_status'] == "processing") echo "selected"; ?>>Processing</option>
                                        <option value="completed" <?php if ($trackorder_data['order_delivery_status'] == "completed") echo "selected"; ?>>Completed</option>
                                        <option value="shipped" <?php if ($trackorder_data['order_delivery_status'] == "shipped") echo "selected"; ?>>Shipped</option>
                                        <option value="delivered" <?php if ($trackorder_data['order_delivery_status'] == "delivered") echo "selected"; ?>>Delivered</option>
                                    </select>
                        </div>
                    </div>
                    <div class="form-group">
                                    <label for="last-name">Date Of Delivered<span class="required"></span></label>
                                    <input type="text" class="form-control" id="dateofdelivered" placeholder="Date Of Delivered" autocomplete="off" name="order_delivery_date" value="<?php $deliverydate=strtotime($trackorder_data['order_delivery_date']); $delivery = date('d/m/Y', $deliverydate); echo $delivery; ?>">
                                </div>
                    <div class="group">    
                    <button type="submit" class="btn submit-btn btn-default">Submit</button>
                    </div>
                </form>
<?php if(!$this->input->is_ajax_request()){ ?>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<!-- <script>
$(document).ready(function(){
$('#user_dob').datepicker();
});
</script> -->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
</div>
<?php include "templates/footer.php" ?>
<?php } ?>

