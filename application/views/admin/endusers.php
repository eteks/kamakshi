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
                <a href="#">Edit End Users </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Edit End Users</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <!-- <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_area">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a> -->
    <div class="alert alert_blue alert-info col-md-10"></div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Area Name</th>
        <th>Delivery charge</th> 
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <!-- <td>David R</td>
        <td class="center">2012/01/01</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Chris Jack</td>
        <td class="center">2012/01/01</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Jack Chris</td>
        <td class="center">2012/01/01</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Muhammad Usman</td>
        <td class="center">2012/01/01</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Sheikh Heera</td>
        <td class="center">2012/02/01</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Helen Garner</td>
        <td class="center">2012/02/01</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Saruar Ahmed</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Ahemd Saruar</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Habib Rizwan</td>
        <td class="center">2012/01/21</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Rizwan Habib</td>
        <td class="center">2012/01/21</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Amrin Sana</td>
        <td class="center">2012/08/23</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Sana Amrin</td>
        <td class="center">2012/08/23</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Ifrah Jannat</td>
        <td class="center">2012/06/01</td>
        <td class="center">
            <span class="label-default label">Inactive</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Jannat Ifrah</td>
        <td class="center">2012/06/01</td>
        <td class="center">
            <span class="label-default label">Inactive</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Robert</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Dave Robert</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Brown Robert</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Usman Muhammad</td>
        <td class="center">2012/01/01</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Abdullah</td>
        <td class="center">2012/02/01</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Dow John</td>
        <td class="center">2012/02/01</td>
        <td class="center">
            <span class="label-default label">Inactive</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>John R</td>
        <td class="center">2012/02/01</td>
        <td class="center">
            <span class="label-default label">Inactive</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Paul Wilson</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Wilson Paul</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Heera Sheikh</td>
        <td class="center">2012/01/21</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Sheikh Heera</td>
        <td class="center">2012/01/21</td>
        <td class="center">
            <span class="label-success label label-default">Active</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers"> 
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Christopher</td>
        <td class="center">2012/08/23</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Andro Christopher</td>
        <td class="center">2012/08/23</td>
        <td class="center">
            <span class="label-default label label-danger">Banned</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Jhon Doe</td>
        <td class="center">2012/06/01</td>
        <td class="center">
            <span class="label-default label">Inactive</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_area">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Lorem Ipsum</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_area">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Abraham</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr>
        <td>Brown Blue</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="#">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <tr> -->
        <td>Worth Name</td>
        <td class="center">2012/03/01</td>
        <td class="center">
            <span class="label-warning label label-default">Pending</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_endusers">
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