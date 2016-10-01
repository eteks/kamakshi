    <div class="content">
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
                            <?php echo $basket_det['product_title']; ?>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $basket_det['orderitem_quantity']; ?>" class="form-control product_quantity" maxlength="3" required />
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
                        <td>
                            <a class="basket_product_items" data-id="<?php echo $basket_det['product_id']; ?>"><i class="fa fa-trash-o"></i></a>
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
            <a class="btn btn-default checkout_button" data-type="address"><i class="fa fa-chevron-left"></i>Back to Address </a>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>