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
                <a href="#">Product Attributes </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i>  -->Product Attributes</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_product_attributes">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll ">
    <thead>
    <tr>
		<th class="product">Product Title</th>
		<th class="product">Attribute Sets</th>
		<th class="product_small">Price</th>
        <th class="product_small">Total Items</th>
		<!-- <th class="product">Actions</th> -->
	</tr>
    </thead>
    <tbody>
    <?php foreach ($attribute_sets_list as $att): ?>
        <tr>
            <td><?php echo $att["product_title"] ?></td>
            <td>
                <?php
                    $att_res = array_map(null,$att['product_attribute'],$att['product_attribute_value']);
                    foreach ($att_res as $value) {
                       echo $value[0]."  --  ".$value[1]; 
                       echo "<br>";
                    }
                ?>
            </td>
            <td><?php echo $att["product_attribute_group_price"] ?></td>
            <td><?php echo $att["product_attribute_group_totalitems"] ?></td> 
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    <script type="text/javascript" >
		$(document).on("click", ".delete", function () {
		var myId = $(this).data('id');
		$(".modal-body #vId").val( myId );
		$("#del_link").prop("href", "users.php?delete="+myId);
		});
	</script>
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body delete_message_style">
				<input type="hidden" name="delete" id="vId" value=""/>
				<button type="button" class="close popup_tx" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<center class="popup_tx">
					<h5>Are you sure you want to delete this item? </h5>
				</center>
			</div>
			<div id="delete_btn" class="modal-footer footer_model_button" >
				<a name="action" id="del_link" class="btn btn-danger popup_btn" id="popup_btn1 href=""  value="Delete">Yes</a>
				<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
			</div>
    </div><!--/row-->
        </div>
    </div>
</div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>