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
                <a href="#">Subcategory</a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> --> Subcategory</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_subcategory">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
    <div class="alert alert_blue alert-info col-md-10"></div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Subcategory Name</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($subcategory_list as $subcat): ?>
        <tr>
            <td><?php echo $subcat["subcategory_name"] ?></td>
            <td class="center"><span class="<?php if($subcat["subcategory_status"] ==1 ){ ?>label-success<?php } ?> label label-default">
            <?php if($subcat["subcategory_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
            <td><?php echo date("d/m/Y", strtotime($subcat["subcategory_createddate"])); ?></td>
            <td class="center">
                <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_subcategory/<?php echo $subcat["subcategory_id"] ?>">
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    Edit
                </a>
                <a class="btn btn-danger" href="#">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#">Kamakshi</a> 2016</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://etekchnoservices.com/" target="_blank">Etekchno Services</a></p>
    </footer>

</div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>