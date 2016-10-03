
$(document).ready(function() {

    /* -----------    Added by siva - Ajax call  ---------- */
    
    var base_url = 'http://localhost/kamakshi/index.php/';
   
    /* -----------    Ajax for checkout page start  ---------- */

    // Load city based on state
    $("#che_state").on('change',function() {
        var state_id = $(this).val();
        var state_name = $('option:selected',$(this)).text();
        if(state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: base_url + "ajax_controller/get_city",
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
            url: base_url + "ajax_controller/get_area",
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
        var sub_total = $('.ordinary_total_amount').val();
        if(area_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: base_url + "ajax_controller/get_area_shipping",
            data: {area_id: area_id},
                success: function(res) {
                    if (res)
                    {
                       var total_amount = sub_total + res;
                       $('.ordinary_shipping_amount').html(res);
                       $('.product_final_amount').html(total_amount);
                      
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
            url: base_url + "ajax_controller/update_baseket_product",
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
    $('.addui-slider-handle').mouseup(function() {
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
            url: base_url + "ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                    centerContent();
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
            url: base_url + "ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                    centerContent();
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
            url: base_url + "ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                    centerContent();
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
            url: base_url + "ajax_controller/filtering_product",
            data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                    centerContent();
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
        url: base_url + "ajax_controller/filtering_product",
        data: datavalues,
            success: function(res) {
                if (res)
                {
                    $('#all_products_section').html(res);
                    centerContent();
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
        url: base_url + "ajax_controller/"+$(this).attr('action'),
        data: form_data,
            success: function(res) {
                if (res)
                {
                    this_status.html(res);
                    this_status.slideDown();    
                }
            }
        });
    });

    /* -----------    Ajax for register page end  ---------- */    
   

    /* -----------    Ended by siva - Ajax call  ---------- */


}); // end document