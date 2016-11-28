<?php include "templates/header.php"; ?>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12 adjt_cmn_cls_width">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>index.php">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>
                <div class="col-md-9" id="basket">
                    <div class="box">
                        <form method="post" action="<?php echo base_url(); ?>index.php/checkout/">
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo $basket_count; ?> item(s) in your cart.</p>
                            <p class="updations_status"> </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $total = 0;
                                        foreach ($basket_details as $basket_det): 
                                    ?>
                                        <tr class="amount_structure">
                                            <td>
                                               <img src="<?php echo base_url().$basket_det['product_upload_image']; ?>" alt="White Blouse Armani">
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/detail/<?php echo $basket_det['product_id'] ?>" data="grp_id">    
                                                    <?php echo $basket_det['product_title']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <input type="text" value="<?php echo $basket_det['orderitem_quantity']; ?>" class="form-control product_quantity" maxlength="3" required />
                                                <input type="hidden" data-productid="<?php echo $basket_det['product_id']; ?>" data-quantity="<?php echo $basket_det['orderitem_quantity']; ?>" class="update_basket_details" />
                                            </td>
                                            <td> 
                                                &#8377; <span class="orderitem_price"> <?php echo number_format($basket_det['orderitem_price'],2); ?>
                                                <input type="hidden" value="<?php echo $basket_det['orderitem_price']; ?>" class="ordinary_orderitem_price" />
                                            </td>
                                            <td>
                                                &#8377; 0.00
                                            </td>
                                            <td>
                                                <?php 
                                                    $product_total = number_format($basket_det['orderitem_quantity']*$basket_det['orderitem_price'],2); 
                                                ?>
                                                &#8377; <span class="product_total"> <?php echo $product_total; ?>  </span>
                                                <input type="hidden" class="ordinary_product_total" value="<?php echo $product_total; ?>" />
                                                <input type="hidden" class="updated_product_total" value="<?php echo $product_total; ?>" />
                                            </td>
                                            <td>
                                                <a class="basket_product_items" data-id="<?php echo $basket_det['product_id']; ?>" title="Remove products"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <?php 
                                                $total +=  $basket_det['orderitem_quantity']*$basket_det['orderitem_price']; 
                                            ?> 
                                        </tr>
                                    <?php endforeach; ?> 

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">&#8377; 
                                                <span class="product_overall_total" data-value="<?php echo $total; ?>">  <?php echo number_format(ceil($total),2); ?> </span>
                                                <input type="hidden" value="<?php echo number_format($total,2); ?>" class="overall_total_product_amount">
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>index.php/" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default basket_section_button" id="updation_button"><i class="fa fa-refresh"></i> Update basket</a>
                                    <button type="submit" class="btn btn-primary basket_section_button" id="checkout_button">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                           </div>
                        </form>
                    </div>
                    <!-- /.box -->
                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                              <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product5.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product5_2.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product5.jpg" alt="" class="img-responsive">
                                </a>
                                </div>
                               </div>
                                <div class="text product_title">
                                    <h3>Fashion and Style</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                              <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product1_2.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product1.jpg" alt="" class="img-responsive position_images">
                                </a>
                                </div>
                               </div>
                                <div class="text product_title">
                                    <h3>Baby</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                            <div class="home_category_image">
                                <div class="flip-container home_product_images">
                                    <div class="flipper home_product_images">
                                        <div class="front home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product8.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                        <div class="back home_product_images">
                                            <a href="<?php echo base_url(); ?>index.php/detail/">
                                                <img src="<?php echo base_url(); ?>assets/img/product8_2.jpg" alt="" class="img-responsive position_images">
                                            </a>
                                        </div>
                                    </div>
                                  <a href="<?php echo base_url(); ?>index.php/detail/" class="invisible">
                                    <img src="<?php echo base_url(); ?>assets/img/product8.jpg" alt="" class="img-responsive position_images">
                                </a>
                                </div>
                              </div>
                                <div class="text product_title">
                                    <h3>T-Shirt</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                    </div>
               </div>
                <!-- /.col-md-9 -->
                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                        <div class="table-responsive">
                            <table class="table" id="basket_table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>&#8377; <span class="product_subtotal product_overall_total"> <?php echo number_format(ceil($total),2); ?></th> </span>
                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping and handling
                                        </td>
                                        <th>
                                            &#8377; <?php 
                                                $shipping_amount = 0.00 ;
                                                echo number_format($shipping_amount,2); 
                                            ?>
                                            <input type="hidden" value="<?php echo number_format($shipping_amount,2); ?>" class="ordinary_shipping_amount" />
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tax
                                        </td>
                                        <th>
                                            &#8377; 0.00
                                        </th>
                                    </tr>
                                    <tr class="total">
                                        <td>
                                            Total
                                        </td>
                                        <th>
                                            &#8377; <span class="product_final_amount"> <?php echo number_format(ceil(($shipping_amount+$total)),2); ?> </span>
                                            <input type="hidden" value="<?php echo number_format($shipping_amount+$total,2); ?>" class="ordinary_final_amount" />
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
					              <button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>
				                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                   </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      </div>
      <input type="hidden" id="total_amount" value="<?php echo $total; ?>">
<?php include "templates/footer.php"; ?>
