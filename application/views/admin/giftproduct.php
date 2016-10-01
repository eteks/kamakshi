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
                <a href="#">Giftproduct</a>
            </li>
        </ul>
    </div>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><!-- <i class="glyphicon glyphicon-user"></i> -->Giftproduct</h2>
        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
   <div class="box-content">
        <a class="btn btn-success" id="add" href="<?php echo base_url(); ?>index.php/admin/adminindex/add_giftproduct">
        <i class="glyphicon glyphicon-edit icon-white"></i>
        Add
        </a>
    <div class="alert alert_blue alert-info col-md-10"></div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-content">
    <thead>
    <tr>
        <th class="product-details-title">Product Title</th>
        <th class="product-details">Product Image</th>
        <th class="product-details">Description</th>
        <th class="product-details-title">Category</th>
        <th class="product-details-title">Subcategory</th>
        <th class="product-details-title">Recipient</th>
        <th class="product-details-title">Price</th>
        <th class="product-details-title">Available Items</th>
        <th class="product-details-title">No. Of Items Sold</th>
        <th class="product-details-title">Status</th>
        <th class="product-details-title">Created Date</th>
        <th class="product-details-title">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($product_list as $product): ?>
        <tr>
            <td><?php echo $product['product_title'] ?></td>
            <td class="center">
                <?php foreach ($product_image as $img):
                    if ($img['product_mapping_id'] == $product['product_id']){
                        $image_path = base_url().$img["product_upload_image"];
                        echo "<a href='".$image_path."' target='_blank'><img class='image_icon' src='".$image_path."'>";
                    }
                endforeach ?>
            </td>
            <td class="center" style="width:100% !important"><?php echo $product['product_description'] ?></td>
            <td class="center" style="width:100% !important"><?php echo $product['category_name'] ?></td> 
            <td class="center" style="width:100% !important"><?php echo $product['subcategory_name'] ?></td>
            <td class="center" style="width:100% !important"><?php echo $product['recipient_type'] ?></td>
            <td class="center" style="width:100% !important"><?php echo $product['product_price'] ?></td>
            <td class="center" style="width:100% !important"><?php echo $product['product_totalitems'] ?></td> 
            <td class="center" style="width:100% !important"><?php echo $product['product_sold'] ?></td>    
            <td class="center" style="width:100% !important"><span class="<?php if($product["product_status"] ==1 ){ ?>label-success<?php } ?> label label-default"><?php if($product["product_status"] ==1 )echo "Active";else echo "InActive"; ?></span></td>
            <td><?php echo date("d/m/Y", strtotime($product["product_createddate"])); ?></td>
            <td class="center">
                <a class="btn btn-info" href="<?php echo base_url(); ?>index.php/admin/adminindex/edit_giftproduct">
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
</div><!--/.fluid-container-->
<?php include "templates/footer.php" ?>