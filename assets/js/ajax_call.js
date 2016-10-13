
$(document).ready(function() {

    /* -----------    Added by siva - Ajax call  ---------- */
    
   
    /* -----------    Ajax for checkout page start  ---------- */

$(document ).ajaxComplete(function() {
    $('.listing_product img').css('display','none');
    $('.listing_product').addClass('product_loader');
    centerContent();
});


    // Load city based on state
    $("#che_state").on('change',function() {
        var state_id = $(this).val();
        var state_name = $('option:selected',$(this)).text();
        if(state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/get_city",
            data: {state_id: state_id},
                success: function(res) {
                    if (res)
                    {
                        var obj = JSON.parse(res);
                        var options = '<option value="">Please select city</option>';   
                        if(obj.length!=0){               
                            $.each(obj, function(i){
                                options += '<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>';
                          });  
                        }   
                        else{
                            alert('No City added for '+state_name);    
                        }  
                        $('#che_city').html(options); 
                    }
                }
            });
        }
    });

    // Load area based on city
    $("#che_city").on('change',function() {
        var city_id = $(this).val();
        var city_name = $('option:selected',$(this)).text();
        var state_id = $("#che_state").val();
        if(city_id!='' && state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/get_area",
            data: {city_id: city_id , state_id: state_id},
                success: function(res) {
                    if (res)
                    {
                        var obj = JSON.parse(res);
                        var options = '<option value="">Please select area</option>';   
                        if(obj.length!=0){               
                            $.each(obj, function(i){
                                options += '<option value="'+obj[i].area_id+'">'+obj[i].area_name+'</option>';
                          });  
                        }   
                        else{
                            alert('No Area added for '+city_name);    
                        }  
                        $('#che_area').html(options); 
                    }
                }
            });
        }
    });

    // Load shipping amount based on area
    $("#che_area").on('change',function() {
        var area_id = $(this).val();
        var sub_total = parseFloat($('.ordinary_total_amount').val().replace(',',''));
        if(area_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/get_area_shipping",
            data: {area_id: area_id},
                success: function(res) {
                    if (res)
                    {   
                        var shipping_amount = parseFloat(res.replace(',',''));
                        var total_amount = sub_total + shipping_amount;
                        var total_amount_final = Math.ceil(total_amount).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var total_paymnet =  total_amount_final.replace(',','');
                        $('.ordinary_shipping_amount').html(res);
                        $('.product_final_amount').html(total_amount_final);  
                        $('.total_amount_hidden').val(total_paymnet);             
                    }
                }
            });
        }
    });

    // Order status verification
    $('#checkout_form').on('submit',function(e) {
        e.preventDefault();
        var order_status={};
        $('.amount_structure').each(function() {
            var product_id = $(this).find('.basket_product_items').val();
            var product_quantity = $(this).find('.product_quantity').val();
            order_status[product_id] = product_quantity;
        });

        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/update_baseket_product",
            data: {updation_det : order_status},
            success: function(res) {
                if (res)
                {                      
                    if(res=="success") {
                        $('#checkout_form').unbind();    
                        $('#checkout_form').submit();
                    }  
                    else {
                        $('.oreder_status_error').html(res);
                        $('.oreder_status').slideDown();
                    }           
                }
            }
        });
    });

    /* -----------    Ajax for checkout page end  ---------- */

    /* -----------    Ajax for listing page start  ---------- */

    // Price filtering
    $(document).on('mouseup','.addui-slider-handle',function() {
        var price_range =  $('.addui-slider-input').val().split(',');
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var cat_id = $('#category_id').val();
        var sort_val = $('.sort_products').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0 && recipients_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort : sort_val};
        }
        else {
            var datavalues = { cat_id: cat_id , s_val : start_value, e_val : end_value, sort : sort_val};
        }   
        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    // Sort filtering
    $('.sort_products').on('change',function() {
        var price_range =  $('.addui-slider-input').val().split(',');
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var cat_id = $('#category_id').val();
        var sort_val = $(this).val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0 && recipients_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort : sort_val};
        }
        else {
            var datavalues = { cat_id: cat_id , s_val : start_value, e_val : end_value, sort : sort_val};
        }   
        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    //  Subcategories filtering
    $(".subcategories").click(function() {
        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var this_text = $(this).text();
        var sub_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0) {
            $('.sub_categories_filter').html(this_text+'<a data-id='+sub_id+' class="filtering_link" data-key="sub_cat"><i class="fa fa-times" aria-hidden="true"></i></a>');
        }
        else {
            $('.filtering_sections').append('<span class="sub_categories_filter">'+this_text+'<a data-id='+sub_id+' class="filtering_link" data-key="sub_cat"><i class="fa fa-times" aria-hidden="true"></i></a></span>');
        }
        if(recipients_filter_length > 0) {
            var rec_id = $('.recipients_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};    
        }
        else {
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    //  Reipients fitering
    $(".recipients").click(function() {
        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var rec_id = $(this).data('id');
        var cat_id = $('#category_id').val();
        var this_text = $(this).text();    
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(recipients_filter_length > 0) {
            $('.recipients_filter').html(this_text+'<a data-id='+rec_id+' class="filtering_link" data-key="rec"><i class="fa fa-times" aria-hidden="true"></i></a>');
        }
        else {
            $('.filtering_sections').append('<span class="recipients_filter">'+this_text+'<a data-id='+rec_id+' class="filtering_link" data-key="rec"><i class="fa fa-times" aria-hidden="true"></i></a></span>');
        }
        if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else {
            var datavalues = {cat_id: cat_id , rec_id : rec_id, s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });
    
    //  Remove option filtering
    $(document).on('click','.filtering_link',function() {  
        $(this).closest('span').remove();
        var price_range =  $('.addui-slider-input').val().split(',');  
        var start_value = parseFloat(price_range[0]).toFixed(2);
        var end_value = parseFloat(price_range[1]).toFixed(2);
        var sort_val = $('.sort_products').val();
        var cat_id = $('#category_id').val();
        var sub_categories_filter_length = $('.sub_categories_filter').length;
        var recipients_filter_length = $('.recipients_filter').length;
        if(sub_categories_filter_length > 0) {
            var sub_id = $('.sub_categories_filter').find('a').data('id');
            var datavalues = {sub_id: sub_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else if(recipients_filter_length > 0) {
           var rec_id = $('.recipients_filter').find('a').data('id');
           var datavalues = {rec_id : rec_id ,cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        else {
            var datavalues = {cat_id: cat_id , s_val : start_value, e_val : end_value, sort:sort_val};
        }
        jQuery.ajax({
        type: "POST",
        url: "../ajax_controller/filtering_product",
        data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                }
            }
        });
    });

    /* -----------    Ajax for listing page end  ---------- */
    
    /* -----------    Ajax for register page end  ---------- */ 

    //  Registration
    $('.front-end_form').on('submit',function(e) {  
        e.preventDefault();
        var form_data =  $(this).serializeArray();
        
        var this_status = $(this).find('.registeration_status');
        jQuery.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: form_data,
            success: function(res) {
                if (res)
                {   
                    if(res=="success") {
                      location.reload();
                    }
                    else {
                        this_status.html(res);
                        this_status.slideDown();
                    }   
                }
            }
        });
    });

    /* -----------    Ajax for register page end  ---------- */    
   
    /* -----------    Ajax for basket page start  ---------- */   

    // Removing items in basket
    $(".basket_product_items").click(function() {
        var bas_pro_id = $(this).data('id');
        jQuery.ajax({
        type: "POST",
        url: "../ajax_controller/remove_baseket_product",
        data: {bas_pro_id: bas_pro_id},
        success: function(res) {
            if (res)
            {   
                location.reload();
            }
        }
        });
    });

    // Updating items in basket
    $("#updation_button").on('click',function() {
        var updation={};
        $('.amount_structure').each(function() {
            var product_id = $(this).find('.basket_product_items').data('id');
            var product_quantity = $(this).find('.product_quantity').val();
            updation[product_id] = product_quantity;
        });
        jQuery.ajax({
        type: "POST",
        url: "../ajax_controller/update_baseket_product",
        data: {updation_det : updation},
        success: function(res) {
            if (res)
            {   
                if(res=="success") {
                    $('#checkout_button').attr('disabled',false);
                    $('#checkout_button').prop('title',"Proceed to checkout");
                }  
                $('.updations_status').html(res);
                $('.updations_status').slideDown(350);

            }
        }
        });
    });

    /* -----------    Ajax for basket page end  ---------- */

    /* -----------    Ajax for detail page start  ---------- */

    $(".attributes").on('change',function() {
        var attribute_value_id = [];
        $('.attributes').each(function() {
            attribute_value_id.push($(this).val());
        });
        $('.attribute_combination').val(attribute_value_id);
        var ordinary_price =  $('.ordinary_price').val();
        var atribute_combination = $('.attribute_combination').val();
        var product_id = $('.product_id_detail').val();
        var ordinary_group_id = $('.ordinary_product_arrtibute_group').val();
        jQuery.ajax({
            type: "POST",
            url: "../ajax_controller/attribute_price",
            dataType: "json",
            data: {atribute_combination : atribute_combination, product_id : product_id},
            success: function(res) {
                if (res)
                {   
                    if(res!=0) {
                        $('.product_detail_attribute_price').html(res.product_attribute_group_price);
                        $('.update_product_arrtibute_group').val(res.product_attribute_group_id); 
                    }
                    else {
                        $('.attribute_status').html("Not available");
                        $('.attribute_status').fadeIn(350);
                        $('.attribute_status').fadeOut(1000); 
                        $('.attributes').prop("selectedIndex", 0);
                        $('.product_detail_attribute_price').html(ordinary_price);
                        $('.update_product_arrtibute_group').val(ordinary_group_id);

                    }
                }
            }
        });
    });

    //  Add to cart in detail page
    $("#add_to_cart_details").click(function() {
        var pro_id = $('#product_id').val();
        var group_id_length = $('.update_product_arrtibute_group').length;
        if(group_id_length > 0) {
            var group_id = $('.update_product_arrtibute_group').val();
            var datavalues = {pro_id: pro_id , grp_id : group_id};
        }
        else {
            var datavalues = {pro_id: pro_id};
        }
        jQuery.ajax({
        type: "POST",
        dataType: "json",
        url: "../ajax_controller/add_to_cart_details",
        data: datavalues,
        success: function(res) {
            if (res)
            {
               var order_count = res.order_count;
               var add_to_cart_status = res.add_to_cart_status;
               $('.add_to_cart').html(order_count);
               $('.add_to_cart_section').html(add_to_cart_status);
               $('.add_to_cart_section').slideDown(350);
               $('.add_to_cart_section').slideUp(2000);
            }
        }
        });
    });

    /* -----------    Ajax for detail page end  ---------- */


    /* -----------    Ended by siva - Ajax call  ---------- */


}); // end document