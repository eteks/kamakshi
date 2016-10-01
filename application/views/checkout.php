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
                        <form method="post" action="<?php echo base_url(); ?>/payment_gateway">
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
                                    <div class="content">
                                        <p class="error_msg">  </p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="firstname">Firstname</label>
                                                    <input type="text" name="fname" class="form-control" id="firstname" maxlength="20">
                                                </div>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="lastname">Lastname</label>
                                                    <input type="text" name="lname" class="form-control" id="lastname" maxlength="20">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company">Company</label>
                                                    <input type="text" name="cname" class="form-control" id="company" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="street">Street</label>
                                                    <input type="text" name="street" class="form-control" id="street" maxlength="30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <select class="form-control" id="che_state" name="state">
                                                        <option value=""> Please select state </option>
                                                        <?php if(!empty($state)) : 
                                                            foreach($state as $state_row): ?>
                                                                <option value="<?php echo $state_row['state_id']; ?>"> <?php echo $state_row['state_name']; ?> </option>  
                                                        <?php endforeach; 
                                                                endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <select class="form-control" id="che_city" name="city">
                                                        <option value=""> </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="area">Area</label>
                                                    <select class="form-control" name="area" id="che_area">
                                                        <option value="">  </option>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="zip">ZIP</label>
                                                    <input type="text" name="zip" class="form-control" id="zip" maxlength="6">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone">Mobile number</label>
                                                    <input type="text" name="telephone" class="form-control" id="phone" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email" maxlength="30">
                                                </div>
                                            </div>
                                        </div>
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
                                                            <?php echo $basket_det['orderitem_quantity']; ?>
                                                        </td>
                                                        <td> 
                                                            &#8377; <span class="orderitem_price"> <?php echo $basket_det['orderitem_price']; ?>
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
                                                    <?php endforeach; ?> 
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5">Total</th>
                                                        <th colspan="2">&#8377; 
                                                            <span class="product_overall_total" data-value="<?php echo $total; ?>">  <?php echo number_format($total,2); ?> </span>
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
                        <?php 
                            $total = 0;
                            foreach ($basket_details as $basket_det): 
                                $total +=  $basket_det['orderitem_quantity']*$basket_det['orderitem_price'];
                            endforeach;
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>&#8377; <?php echo number_format($total,2); ?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th> &#8377; 
                                            <?php 
                                                $shipping_amount = 10 ;
                                                echo number_format($shipping_amount,2); 
                                            ?>
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
                                                <?php echo number_format($shipping_amount+$total,2); ?> 
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




<script>
// Ajax post
$(document).ready(function() {
    // AJAX for removing items in basket
    $("#che_state").on('change',function() {
        var state_id = $(this).val();
        if(state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ajax_controller/get_city",
            data: {state_id: state_id},
            dataType : 'json',
                success: function(res) {
                    if (res)
                    {

                        // var json_obj = $.parseJSON(res.city_data);//parse JSON
             // var JSONArray = $.parseJSON( res.city_data );
             var obj = jQuery.parseJSON( res.city_data );
// alert( obj.city_name );


                       // alert(JSON.stringify(json_obj));
                        // $('#che_city').html(res); 
                    }
                }
            });
        }
        else {
            alert("please choose state");
        }
    });


});

</script>