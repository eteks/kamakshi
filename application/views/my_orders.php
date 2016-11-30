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
                        <li><a href="<?php echo base_url(); ?>">Home</a>
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
                                <!--  <li>
                                    <a href="<?php echo base_url(); ?>index.php/customer_wishlist/"><i class="fa fa-heart"></i> My wishlist</a>
                                </li> -->
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Delivery Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($my_orders)) :
                                    foreach($my_orders as $myorder_value) :
                                    ?>
                                        <tr>
                                            <th> <?php echo $myorder_value['order_id']; ?> </th>
                                            <td> <?php echo $myorder_value['order_delivery_date']; ?> </td>
                                            <td> &#8377; <?php echo $myorder_value['order_total_amount']; ?> </td>
                                            <td>
                                                <span class="label label-info"> <?php echo $myorder_value['order_delivery_status']; ?> </span>
                                            </td>
                                            <td>
                                                <span data-order="<?php echo $myorder_value['order_id']; ?>" class="btn btn-primary btn-sm myorders_id">View
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="orders_list order<?php echo $myorder_value['order_id']; ?>">
                                            <td> 
                                                <div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    endif;
                                    ?>
                                </tbody>
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