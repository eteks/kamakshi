<?php if(!$this->input->is_ajax_request()){ ?>
<?php include "templates/header.php"; ?>
 
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li> <a href="#">Home</a> </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>
                <div class="col-md-9" id="checkout">
                    <div class="box">
                        <form method="post" id="checkout_form" action="<?php echo base_url(); ?>/index.php/payumoney">
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active address_label"><a><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                </li>
                                <li class="disabled order_label"><a><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>
                            <div class="checkout_section">
                                <div id="checkout_address">
                                <?php
                                if(!empty($this->session->userdata("login_status"))): 
                                ?>
                                <p> <input type="checkbox" id="checkout_profile_details"> Use my profile details </p>
                                <?php
                                endif;
                                ?>
                                <div class="checkout_content">
                                <?php 

                                } 
                                ?>
                                    <div class="content">
                                        <p class="error_msg">  </p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstname">Firstname</label>
                                                    <input type="text" name="firstname" class="form-control" id="firstname" maxlength="20" value="<?php if(!empty($profile_details)) : echo $profile_details['first_name']; endif;?>">
                                                </div>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="lastname">Lastname</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastname" maxlength="20" value="<?php if(!empty($profile_details)) : echo $profile_details['last_name']; endif;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company">Address Line1</label>
                                                    <input type="text" name="address1" class="form-control" id="company" maxlength="20" value="<?php if(!empty($profile_details)) : echo $profile_details['shipping_default_addr1']; endif;?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="street">Address Line2</label>
                                                    <input type="text" name="address2" class="form-control" id="street" maxlength="30" value="<?php if(!empty($profile_details)) : echo $profile_details['shipping_default_addr2']; endif;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select class="form-control" id="che_state" name="udf2">
                                                        <option value=""> Please select state </option>
                                                        <?php 
                                                        if(!empty($state)) : 
                                                        foreach($state as $state_row): 
                                                        if(!empty($profile_details)) { 
                                                            if($state_row['state_id'] == $profile_details['user_state_id']) {
                                                        ?>  
                                                                <option selected value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                        <?php
                                                                }
                                                            else 
                                                                {
                                                        ?>
                                                                <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                        <?php
                                                                }
                                                            }
                                                        else 
                                                            {
                                                        ?>
                                                            <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>
                                                        <?php 
                                                            }
                                                        endforeach; 
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                        <select class="form-control" id="che_city" name="city">
                                                        <?php 
                                                        if(!empty($profile_get_city) && !empty($profile_details)) : 
                                                        foreach($profile_get_city as $city_row): 
                                                            if($city_row['city_id'] == $profile_details['user_city_id']) {
                                                        ?>  
                                                                <option selected value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                        <?php
                                                            }
                                                            else {
                                                        ?>
                                                                <option value="<?php echo $city_row['city_id']; ?>"> <?php echo $city_row['city_name']; ?> </option>
                                                        <?php
                                                            }
                                                        endforeach; 
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="area">Area</label>
                                                    <select class="form-control" name="country" id="che_area">
                                                        <?php 
                                                        if(!empty($profile_get_area) && !empty($profile_details)) : 
                                                        foreach($profile_get_area as $area_row): 
                                                            if($area_row['area_id'] == $profile_details['user_area_id']) :
                                                        ?>  
                                                                <option selected value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
                                                        <?php
                                                            else :
                                                        ?>
                                                                <option value="<?php echo $area_row['area_id']; ?>"> <?php echo $area_row['area_name']; ?> </option>
                                                        <?php
                                                        endif;
                                                        endforeach; 
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="zip">ZIP</label>
                                                    <input type="text" name="zipcode" class="form-control" id="zip" maxlength="6" value="<?php if(!empty($profile_details)) : echo $profile_details['user_zip']; endif;?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone">Mobile number</label>
                                                    <input type="text" name="phone" class="form-control" id="phone" maxlength="10" value="<?php if(!empty($profile_details)) : echo $profile_details['user_mobile']; endif;?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email" maxlength="30" value="<?php if(!empty($profile_details)) : echo $profile_details['user_email']; endif;?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php if(!empty($shipping_amount)) : echo $shipping_amount['area_delivery_charge']; endif;?>" class="shipping_checkout_area" />
                                    <?php if(!$this->input->is_ajax_request()){ ?>
                                    </div>
                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>index.php/basket/" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                        </div>
                                        <div class="pull-right">
                                            <button id="checkout_address_submit" class="btn btn-primary checkout_button" data-type="order"> Continue <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="checkout_order">
                                    <div class="content">
                                        <p class="oreder_status"> <span class="oreder_status_error"> </span> . Back to <a href="<?php echo base_url(); ?>index.php/basket/"> Basket </a> </p>
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
                                                    $total = 0;
                                                    foreach ($basket_details as $basket_det): 
                                                    ?>
                                                    <tr class="amount_structure">
                                                        <td>
                                                           <img src="<?php echo base_url().$basket_det['product_upload_image']; ?>" alt="White Blouse Armani">
                                                        </td>
                                                        <td>  
                                                            <?php echo $basket_det['product_title']; ?>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" value="<?php echo $basket_det['orderitem_quantity']; ?>" class="product_quantity" />

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
                                                            <input type="hidden" class="basket_product_items" value="<?php echo $basket_det['product_id']; ?>" />
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
                                    </div>
                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a class="btn btn-default checkout_button" id="checkout_order_submit" data-type="address"><i class="fa fa-chevron-left"></i>Back to Address </a>
                                        </div>
                                        <div class="pull-right">
                                            <input type="hidden" name="udf1" class="order_session_id_checkout"  value="<?php echo $orderitem_session_id_checkout; ?>">
                                            <input type="hidden" name="amount" class="total_amount_hidden" id="total_amount_hidden" value="">
                                            <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->
                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                        <!-- <?php 
                            $total = 0;
                            foreach ($basket_details as $basket_det): 
                                $total +=  $basket_det['orderitem_quantity']*$basket_det['orderitem_price'];
                            endforeach;
                        ?> -->
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>&#8377; <?php echo number_format(ceil($total),2); ?></th>
                                        <input type="hidden" value="<?php echo number_format($total,2); ?>" class="ordinary_total_amount" />
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th> &#8377; 
                                            <span class="ordinary_shipping_amount">
                                                <?php 
                                                    $shipping_amount = 0.00 ;
                                                    echo number_format($shipping_amount,2); 
                                                ?>
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>  &#8377; 0.00 </th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>&#8377; 
                                            <span class="product_final_amount"> 
                                                <?php echo number_format(ceil($shipping_amount+$total),2); ?> 
                                            </span>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
<?php include "templates/footer.php"; ?>
<?php } ?>
