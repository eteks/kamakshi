
$(document).ready(function() {

    /* -----------    Added by siva - Ajax call  ---------- */
    
   
    /* -----------    Ajax for checkout page start  ---------- */

$(document).ajaxComplete(function() {
    $('.listing_product img').css('display','none');
    $('.listing_product').addClass('product_loader');
    centerContent();
});


    // Load city based on state
    $(document).on('change','#che_state',function() {
        var state_id = $(this).val();
        var state_name = $('option:selected',$(this)).text();
        if(state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"index.php/ajax_controller/get_city",
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
    $(document).on('change','#che_city',function() {
        var city_id = $(this).val();
        var city_name = $('option:selected',$(this)).text();
        var state_id = $("#che_state").val();
        if(city_id!='' && state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"index.php/ajax_controller/get_area",
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
    $(document).on('change','#che_area',function() {
        var area_id = $(this).val();
        if($('.ordinary_total_amount').length > 0) {
            var sub_total = parseFloat($('.ordinary_total_amount').val().replace(',',''));
        }

        if(area_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"index.php/ajax_controller/get_area_shipping",
            data: {area_id: area_id},
                success: function(res) {
                    if (res)
                    {   
                        if(sub_total >= 2000)
                            res = Math.ceil(0).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var shipping_amount = parseFloat(res.replace(',',''));
                        var total_amount = sub_total + shipping_amount;
                        var total_amount_final = Math.ceil(total_amount).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var total_paymnet =  total_amount_final.replace(',','');
                        $('.ordinary_shipping_amount').html(res);
                        $('.product_final_amount').html(total_amount_final);  
                        $('.total_amount_hidden').val(total_paymnet);       
                        $('.ship_amt').val(res);
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
            url: baseurl+"index.php/ajax_controller/update_baseket_product",
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

    // Order status verification
    $('#checkout_profile_details').on('click',function() {
         if($('.ordinary_total_amount').length > 0) {
            var sub_total = parseFloat($('.ordinary_total_amount').val().replace(',',''));
        }
        if($(this).is(':checked')) {
            var user_value = 1;     
            jQuery.ajax({
                type: "POST",
                url: baseurl+"index.php/ajax_controller/checkout_profile_detail",
                data: {user_value : user_value},
                success: function(res) {
                    if(res) {
                        $('.checkout_content').html(res);
                        var shipping_amt = $('.shipping_checkout_area').val();
                        var shipping_amount = parseFloat(shipping_amt.replace(',',''));
                        var total_amount = sub_total + shipping_amount;
                        var total_amount_final = Math.ceil(total_amount).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var total_paymnet =  total_amount_final.replace(',','');
                        $('.ordinary_shipping_amount').html(shipping_amt);
                        $('.product_final_amount').html(total_amount_final);  
                        $('.total_amount_hidden').val(total_paymnet);
                    }
                }
            });
        }

    });

    /* -----------    Ajax for checkout page end  ---------- */

    /* -----------    Ajax for listing page start  ---------- */


//  Price range filter start
var down = 0;
var up = 0;
$('.select-label').on('mousedown', function(){ 
    down = 1;      
});
$('.select-label').on('mouseup', function(){ 
    up = 1;  
    var select_value_filter = [];
    $('.select-label').each(function() {
        select_value_filter.push($(this).text());
    });
    var price_range = [];
    price_range[0] =  Math.min.apply(Math, select_value_filter);
    price_range[1] =  Math.max.apply(Math, select_value_filter);
    $('#price_range_filter_value').val(price_range[0]+','+price_range[1]);

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
        url: baseurl+"index.php/ajax_controller/filtering_product",
        data: datavalues,
        success: function(res) {
            if (res)
            {
                $('.all_products_section_ajax').html(res);
            }
        }
    });
    down = 0 ;
    up = 0 ; 
});
$('.select-label').on('mouseout', function(){ 

    if(up!=1 && down==1) {
        var select_value_filter = [];
        $('.select-label').each(function() {
            select_value_filter.push($(this).text());
        });
        var price_range = [];
        price_range[0] =  Math.min.apply(Math, select_value_filter);
        price_range[1] =  Math.max.apply(Math, select_value_filter);
        $('#price_range_filter_value').val(price_range[0]+','+price_range[1]);

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
            url: baseurl+"index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('.all_products_section_ajax').html(res);
                }
            }
        });
        down = 0 ;
        up = 0 ;
    }
});

//  Price range filter end

    // Sort filtering
    $('.sort_products').on('change',function() {
        var price_range =  $('#price_range_filter_value').val().split(',');
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
            url: baseurl+"index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('.all_products_section_ajax').html(res);
                }
            }
        });
    });

    //  Subcategories filtering
    $(".subcategories").on('click',function() {
        var price_range =  $('#price_range_filter_value').val().split(',');  
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
            url: baseurl+"index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('.all_products_section_ajax').html(res);
                }
            }
        });
    });

    //  Reipients fitering
    $(".recipients").on('click',function() {
        var price_range =  $('#price_range_filter_value').val().split(',');  
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
            url: baseurl+"index.php/ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('.all_products_section_ajax').html(res);
                }
            }
        });
    });
    
    //  Remove option filtering
    $(document).on('click','.filtering_link',function() {  
        $(this).closest('span').remove();
        var price_range =  $('#price_range_filter_value').val().split(',');  
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
        url: baseurl+"index.php/ajax_controller/filtering_product",
        data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('.all_products_section_ajax').html(res);
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
                      window.location.href = baseurl;
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
        url: baseurl+"index.php/ajax_controller/remove_baseket_product",
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
        url: baseurl+"index.php/ajax_controller/update_baseket_product",
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
            url: baseurl+"index.php/ajax_controller/attribute_price",
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
    $("#add_to_cart_details").on('click',function() {
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
        url: baseurl+"index.php/ajax_controller/add_to_cart_details",
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

    /* -----------    Ajax for myorders page start  ---------- */

    //  Myorders list
    $(".myorders_id").on('click',function() {
        var order_id = $(this).data('order');
        var this_order = $(this);
        if($('.order'+order_id).hasClass('order_active')) {
            $('.order'+order_id).removeClass('order_active');
            $('.order'+order_id).slideUp(250);
            this_order.html('View');
        }
        else {
            jQuery.ajax({
            type: "POST",
            url: baseurl+"index.php/ajax_controller/myorders_list",
            data: {order_id : order_id},
                success: function(res) {
                    if (res)
                    {
                        var obj = JSON.parse(res);
                        var data = ''; 
                        data += '<p> <strong> Total items : </strong> <span> '+obj.order_total_items+' </span> </p>';
                        data += '<p> <strong> Total amount : </strong> <span> '+obj.order_total_amount+' </span> </p>';
                        data += '<p> <strong> Order date : </strong> <span> '+obj.order_createddate.split(' ')[0]+' </span> </p>';
                        data += '<p> <a href="'+baseurl+'index.php/order_status/'+order_id+'" class="btn btn-primary btn-sm">  View  Status </a> </p>';
                        $('.orders_list').css('display','none');
                        $('.orders_list').removeClass('order_active');
                        $('.myorders_id').html('View');
                        $('.order'+order_id).find('div').html(data); 
                        $('.order'+order_id).addClass('order_active'); 
                        $('.order'+order_id).slideDown(250);
                        this_order.html('Hide'); 
                    }   
                }
            });
        }
    });

    /* -----------    Ajax for myorders page end  ---------- */

    /* -----------    Ended by siva - Ajax call  ---------- */


}); // end document


