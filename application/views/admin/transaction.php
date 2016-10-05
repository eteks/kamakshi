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
                <a href="#">Transaction</a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Transaction</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive scroll" >
    <thead>
   <th class="product_small">Order Id</th>
   <th class="product_small">User Id</th> 
   <th class="product">Tracking Id</th>
    <th class="product">Bank Reference Number</th>
   <th class="product">Payment Mode</th>
   <th class="product">Card Name</th>
   <th class="product_small">Amount</th>
    <th class="product_small">Currency</th>
    <th class="product_small">Status Code</th>
     <th class="product_small">Created Date</th>
    <th class="product_small">Delivery date</th>
   <th class="product_small">Delivery time</th>
     <th class="product_small">Total amount</th>
     <th class="product_small">Staus</th>
      <!-- <th class="product_small">Actions</th> -->
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Worth Name</td>
        <td class="center">xyz@gmail.com</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <!-- <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/users/edit_adminusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#myModal1" data-toggle="modal" id="delete">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td> -->
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!--/span-->
     <!-- <script type="text/javascript" >
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
						<button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
						<center class="popup_tx">
							<h5>Are you sure you want to delete this item? </h5>
						</center>
				</div>
				<div id="delete_btn" class="modal-footer footer_model_button" >
					<a name="action" id="del_link" class="btn btn-danger popup_btn" id="popup_btn1 href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
				</div> -->
    </div><!--/row-->
        </div>
    </div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>