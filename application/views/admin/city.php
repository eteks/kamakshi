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
                <a href="#">City </a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->City</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_city">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
    <div class="alert alert_blue alert-info col-md-10"></div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
        <tr>
            <th class="product">City Name</th>
            <th class="product">State </th>
            <th class="product_small">Status</th>
            <th class="product_small">Created Date</th>
            <th class="product_small">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($city as $city): ?>
        <tr>
                <td><?php echo $city["city_name"] ?></td>
                <td><?php echo $city["state_name"] ?></td>
                <td><?php echo $city["state_name"] ?></td>
                <td class="center"><span class="<?php if($city["city_status"] ==1 ){ ?>label-success<?php } ?> label label-default"><?php if($city["city_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
                <td class="center">
                    <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_city/<?php echo $city["city_id"] ?>">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>
                   <a class="btn btn-danger" href="#myModal1" data-toggle="modal" id="delete">
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

    

</div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>