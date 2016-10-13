<?php include "templates/header.php"; ?>
<div id="all">
      <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php/">Home</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>index.php/customer_orders">Track Order</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.container -->
      <section class="container track_order_details">
            <section class="container track_order_status_process active_status">
              <h1> Your order is in process </h1>
              <div class="track_order_processing">
	                <div class="col-md-3 col-xs-3 process">
		                <div class="imgcircle">
		                    <img src="<?php echo base_url(); ?>assets/img/trackorder/confirm.png" alt="confirm order">
		            	</div>
						<span class="line"></span>
						<p>Processing Order</p>
				    </div>
				  <div class="col-md-3 col-xs-3 complete">
		           	 	<div class="imgcircle">
		                	<img src="<?php echo base_url(); ?>assets/img/trackorder/process.png" alt="process order">
		            	</div>
						<span class="line"></span>
						<p>Completing Order</p>
				 </div>
				 <div class="col-md-3 col-xs-3 dispatch">
						<div class="imgcircle">
		                	<img src="<?php echo base_url(); ?>assets/img/trackorder/dispatch.png" alt="Dispatch product">
		            	</div>
						<span class="line"></span>
						<p>Dispatched Item</p>
				 </div>
				 <div class="col-md-3 col-xs-3 delivery">
						<div class="imgcircle">
		                	<img src="<?php echo base_url(); ?>assets/img/trackorder/delivery.png" alt="Delivery">
						</div>
						<p>Product Delivered</p>
				 </div>
			 </div>
			 <div class="cb"></div>
           </section>
     </section>
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>