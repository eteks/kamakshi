<?php include "templates/header.php" ?>
<div class="ch-container">
    <div class="row"> 
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
                <a href="#">Admin Users </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Admin Users</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_adminusers">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
        <div class="row">
        <div class="col-md-6">
        <div id="DataTables_Table_0_length" class="dataTables_length">
        <label>
        <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
        <option value="10" selected="selected">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        </select> records per page</label>
        </div>
        </div>
        <div class="col-md-6">
        <div class="dataTables_filter" id="DataTables_Table_0_filter">
        	<label>Search: <input aria-controls="DataTables_Table_0" type="text"></label>
        	</div>
        	</div>
        	</div>
    <!-- <div class="alert alert_blue alert-info col-md-10"></div> -->
    <div class="dataTables_wrapper">
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
    <th>User Id</th>
        <th>Total Items</th> 
        <th>User Type</th>
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>State</th>
        <th>City</th>
        <th>Area</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Staus</th>
        <th>Delivery date</th>
        <th>Delivery time</th>
        <th>Total amount</th>
        <th>Staus</th>
        <th>Actions</th>
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
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_adminusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#myModal1" data-toggle="modal" id="delete">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    </tbody>
    </table>
    <div class="col-md-12 center-block"><div class="dataTables_paginate paging_bootstrap pagination"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li class="next disabled"><a href="#">Next → </a></li></ul></div></div>
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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center>
							<h5>Are you sure you want to delete this item? </h5>
						</center>
				</div>
				<div id="delete_btn" class="modal-footer footer_model_button" >
					<a name="action" id="del_link" class="btn btn-danger" href=""  value="Delete">Yes</a>						
					<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
				</div>
    </div><!--/row-->
        </div>
    </div>
    </div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>