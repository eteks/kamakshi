<?php
// if(!empty($this->session->userdata("login_status"))):
$user_session = $this->session->userdata("login_status");
if (!empty($user_session)):
include "templates/header.php"; 
?>
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>My orders</li>
                </ul>
            </div>
            <div class="col-md-3">
            <!-- *** CUSTOMER MENU *** -->
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/profile/"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>index.php/my_orders/"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/index/logout"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- *** CUSTOMER MENU END *** -->
            </div>
            <div class="col-md-9" id="customer-orders">
                <div class="box">
                    <h1>My orders</h1>
                    <p class="lead">Your orders on one place.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="<?php echo base_url(); ?>index.php/contact/">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <?php 
                    if(!empty($order_status_address)) :
                    ?>
                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                User Details
                            </div>
                            <div class="order-box-content">
                                <div class="address">
                                    <p><strong> Name : </strong> <?php echo $order_status_address['order_customer_name']; ?> </p>
                                    <p><strong> Email : </strong> <?php echo $order_status_address['order_shipping_email']; ?> </p>
                                    <p><strong> Mobile : </strong> <?php echo $order_status_address['order_shipping_mobile']; ?> </p>
                                    <div class="adr">
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="order-box">
                            <div class="order-box-header">
                                Shipping Details
                            </div>
                            <div class="order-box-content">
                                <div class="address">
                                    <p><strong> State : </strong> <?php echo $order_status_address['state_name']; ?> </p>
                                    <p><strong> City : </strong> <?php echo $order_status_address['city_name']; ?> </p>
                                    <p><strong> Area : </strong> <?php echo $order_status_address['area_name']; ?> </p>
                                    <div class="adr">
                                        <?php echo $order_status_address['order_shipping_line1']; ?> <br><?php echo $order_status_address['order_shipping_line2']; ?>, <?php echo $order_status_address['order_zipcode']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endif;
                    ?> 


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th >Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(!empty($order_status)) :
                        $total = 0;
                        foreach ($order_status as $basket_det): 
                        ?>
                            <tr class="amount_structure order_status_img">
                                <td>
                                    <img src="<?php echo base_url().$basket_det['product_upload_image']; ?>" alt="White Blouse Armani">
                                </td>
                                <td>  
                                    <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $basket_det['product_id']; ?>"> <?php echo $basket_det['product_title']; ?> </a>
                                </td>
                                <td>
                                    <?php echo $basket_det['orderitem_quantity']; ?>
                                </td>
                                <td> 
                                    &#8377; <span class="orderitem_price"> <?php echo number_format($basket_det['orderitem_price'],2); ?>
                                </td>
                                <td>
                                    &#8377; 0.00
                                </td>
                                <td>
                                    <?php 
                                    $product_total = number_format($basket_det['orderitem_quantity']*$basket_det['orderitem_price'],2); 
                                    ?>
                                    &#8377; <span class="product_total"> <?php echo $product_total; ?>  </span>
                                </td>
                                <?php 
                                    $total +=  $basket_det['orderitem_quantity']*$basket_det['orderitem_price']; 
                                ?> 
                            </tr>
                        <?php 
                        endforeach;
                        endif;
                        ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="order_status_total">Total</th>
                                <th colspan="2">&#8377; 
                                    <span class="product_overall_total" data-value="<?php echo $total; ?>">  <?php echo number_format(ceil($total),2); ?> </span>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
</div>
<!-- /#all -->
<?php include "templates/footer.php"; 
else :
    redirect('index');
endif;
?>