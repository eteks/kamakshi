<?php include "templates/header.php" ?>
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
                <a href="#">Track Order</a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Track Order</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <p class='error_msg_del alert alert-info'></p>
        <input type="hidden" class="table_name" value="giftstore_orderitem">
        <input type="hidden" class="field_name" value="orderitem_id">
        <input type="hidden" class="action" value="<?php echo base_url(); ?>index.php/admin/delete">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll " >
    <thead> 
		<th class="product_small">Order Id</th>
		<th class="product_small">User Id</th>
		<th class="product_small">Date Of Ordered</th>
		<th class="product_small">Order Deliver Status</th>
		<th class="product_small">Date Of Delivered</th>
		<th class="product_small">Action</th>
		</tr>
    </thead>
<tbody>
    <?php foreach ($trackorder_list as $trackorder): ?>
        <tr>
            <td><?php echo $trackorder["order_id"] ?></td>
            <td><?php echo $trackorder["order_user_id"] ?></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($trackorder["order_createddate"])); ?></td>
            <td class="center"><?php echo($trackorder["order_delivery_status"]); ?></td>
            <td class="center"><?php echo date("d/m/Y", strtotime($trackorder["order_delivery_date"])); ?></td>
            <td class="center">
                <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_trackorder/<?php echo $trackorder["order_id"] ?>">
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    Edit
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!--/span-->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body delete_message_style">
				<input type="hidden" name="delete" id="vId" value=""/>
				<button type="button" class="close " data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<center class="popup_tx">
					<h5>Are you sure you want to delete this item? </h5>
				</center>
			</div>
			<div id="delete_btn" class="modal-footer footer_model_button" >
				<a name="action" class="btn btn-danger popup_btn yes_btn_act" id="popup_btn1" value="Delete">Yes</a>
				<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
			</div>
    </div><!--/row-->
        </div>
    </div>
    </div><!--/.fluid-container-->
    </div>
    </div>
<?php include "templates/footer.php" ?>