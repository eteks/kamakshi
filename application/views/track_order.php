<?php include "templates/header.php"; ?>
<div id="all">
      <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php/">Home</a>
                        </li>
                        <li> Track Order
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            if(!empty($trackorder_details)) :
           	?>
          	<?php
            if(strcasecmp($trackorder_details['order_delivery_status'],"processing")==0) {
           	?>
	      	<section class="container track_order_details">
    	        <section class="container track_order_status_process active_status">
        		    <h1> Your order is in process </h1>
              		<div class="track_order_processing">
	                	<div class="col-md-3 col-xs-3 process">
		                	<div class="imgcircle track_active">
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
           		<table class="process_status_datails">
  					<tbody>
	  					<tr>
    						<td class="bucket">
      							<div class="content">
									<ul class="process_list">
										<li><b>Order id :</b> <?php echo $trackorder_details['order_id']; ?> </li>
										<hr/>
										<li><b>Customer name :</b> <?php echo $trackorder_details['order_customer_name']; ?> </li>
										<li><b>Total items :</b> <?php echo $trackorder_details['order_total_items']; ?> </li>
								    	<li><b>Total amount : </b> <?php echo $trackorder_details['order_total_amount']; ?> </li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
     		</section>
     		<?php
     		}
     		else if(strcasecmp($trackorder_details['order_delivery_status'],"completed")==0) {
     		?>
     		<section class="container track_order_details">
    	        <section class="container track_order_status_process active_status">
        		    <h1> Your order is in completed </h1>
              		<div class="track_order_processing">
	                	<div class="col-md-3 col-xs-3 process">
		                	<div class="imgcircle track_active">
		                    	<img src="<?php echo base_url(); ?>assets/img/trackorder/confirm.png" alt="confirm order">
		            		</div>	
							<span class="line line_active"></span>
							<p>Processing Order</p>
				    	</div>
				  		<div class="col-md-3 col-xs-3 complete">
		           	 		<div class="imgcircle track_active">
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
           		<table class="process_status_datails">
  					<tbody>
	  					<tr>
    						<td class="bucket">
      							<div class="content">
									<ul class="process_list">
										<li><b>Order id :</b> <?php echo $trackorder_details['order_id']; ?> 							
										</li>
										<b> Your order is ready for shipping </b>
										<hr/>
										<li><b>Customer name :</b> <?php echo $trackorder_details['order_customer_name']; ?> </li>
										<li><b>Total items :</b> <?php echo $trackorder_details['order_total_items']; ?> </li>
								    	<li><b>Total amount : </b> <?php echo $trackorder_details['order_total_amount']; ?> </li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
     		</section>
     		<?php
     		}
     		else if(strcasecmp($trackorder_details['order_delivery_status'],"shipped")==0) {
     		?>
     		<section class="container track_order_details">
    	        <section class="container track_order_status_process active_status">
        		    <h1> Your order is in shipped </h1>
              		<div class="track_order_processing">
	                	<div class="col-md-3 col-xs-3 process">
		                	<div class="imgcircle track_active">
		                    	<img src="<?php echo base_url(); ?>assets/img/trackorder/confirm.png" alt="confirm order">
		            		</div>	
							<span class="line line_active"></span>
							<p>Processing Order</p>
				    	</div>
				  		<div class="col-md-3 col-xs-3 complete">
		           	 		<div class="imgcircle track_active">
		                		<img src="<?php echo base_url(); ?>assets/img/trackorder/process.png" alt="process order">
		            		</div>
							<span class="line line_active"></span>
							<p>Completing Order</p>
				 		</div>
				 		<div class="col-md-3 col-xs-3 dispatch">
							<div class="imgcircle track_active">
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
           		<table class="process_status_datails">
  					<tbody>
	  					<tr>
    						<td class="bucket">
      							<div class="content">
									<ul class="process_list">
										<li><b>Order id :</b> <?php echo $trackorder_details['order_id']; ?> </li>
										<b> Your order is shipped </b>
										<hr/>
										<li><b>Customer name :</b> <?php echo $trackorder_details['order_customer_name']; ?> </li>
										<li><b>Total items :</b> <?php echo $trackorder_details['order_total_items']; ?> </li>
								    	<li><b>Total amount : </b> <?php echo $trackorder_details['order_total_amount']; ?> </li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
     		</section>
     		<?php
     		}
     		else if(strcasecmp($trackorder_details['order_delivery_status'],"delivered")==0) {
     		?>
     		<section class="container track_order_details">
    	        <section class="container track_order_status_process active_status">
        		    <h1> Your order is in delivered </h1>
              		<div class="track_order_processing">
	                	<div class="col-md-3 col-xs-3 process">
		                	<div class="imgcircle track_active">
		                    	<img src="<?php echo base_url(); ?>assets/img/trackorder/confirm.png" alt="confirm order">
		            		</div>	
							<span class="line line_active"></span>
							<p>Processing Order</p>
				    	</div>
				  		<div class="col-md-3 col-xs-3 complete">
		           	 		<div class="imgcircle track_active">
		                		<img src="<?php echo base_url(); ?>assets/img/trackorder/process.png" alt="process order">
		            		</div>
							<span class="line line_active"></span>
							<p>Completing Order</p>
				 		</div>
				 		<div class="col-md-3 col-xs-3 dispatch">
							<div class="imgcircle track_active">
			                	<img src="<?php echo base_url(); ?>assets/img/trackorder/dispatch.png" alt="Dispatch product">
		            		</div>
							<span class="line line_active"></span>
							<p>Dispatched Item</p>
				 		</div>
				 		<div class="col-md-3 col-xs-3 delivery">
							<div class="imgcircle track_active">
			                	<img src="<?php echo base_url(); ?>assets/img/trackorder/delivery.png" alt="Delivery">
							</div>
							<p>Product Delivered</p>
				 		</div>
			 		</div>
			 		<div class="cb"></div>
           		</section>
           		<table class="process_status_datails">
  					<tbody>
	  					<tr>
    						<td class="bucket">
      							<div class="content">
									<ul class="process_list">
										<li><b>Order id :</b> <?php echo $trackorder_details['order_id']; ?> 
										</li>
										<b> Your shipment is delivered successfully </b>
										<hr/>
										<li><b>Customer name :</b> <?php echo $trackorder_details['order_customer_name']; ?> </li>
										<li><b>Total items :</b> <?php echo $trackorder_details['order_total_items']; ?> </li>
								    	<li><b>Total amount : </b> <?php echo $trackorder_details['order_total_amount']; ?> </li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
     		</section>
     		<?php
     			}
     		?>
     		<?php
     		else :
     		?>
     		<section class="container track_order_details">
    	        <section class="container track_order_status_process active_status">
        		    <h1> Please check your order ID  </h1>
           		</section>
      		</section>
      		<?php
     		endif;
     		?>
     		<hr/>
     		<div class="container track_order_footer">	
				<div class="track_order_footer_content">
					<h1> <span class="icon fa fa-phone"> </span> Any Queries ?</h1>
	            	<p>For order enquiry please call below numbers</p>
	          		<div>
	           			<fieldset class="round-box" id="cart-contents">
	           				<h3 class="title">
	           					<i class="fa fa-mobile" aria-hidden="true"></i>
 								8682070004, 7448860003
	           				</h3>
	           			</fieldset> 
	         		</div>
				</div>
		    </div>
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>