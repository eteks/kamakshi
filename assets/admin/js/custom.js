$(document).ready(function() {
    $("#add_area").validate({
        showErrors: function(errorMap, errorList) {
            $(".form-errors").html("All fields must be completed before you submit the form.");
        }
    });

    jQuery(".attribute_status").on('change',function () {
    	if($(this).is(":checked")){
    		$('.attribute_main_block').show();
            $('.price_group,.items_group').hide();
        }
    	else{
    		$('.attribute_main_block').hide();
            $('.price_group,.items_group').show();
        }
    });

    jQuery(".category_act").on('change',function () {
        selected_category = $.trim($('option:selected',this).text());
        selected_category_id = $('option:selected',this).val();
        form_data = {'category_name':selected_category,'category_id':selected_category_id};
        // alert(JSON.stringify(form_data));
        var subcategory_options = '<option value="">Select SubCategory</option>'; 
        var recipient_options = '<option value="">Select Recipient</option>';  
        if(selected_category != 'Select Category'){
	         $.ajax({
	               type: "POST",
	               url: "loadcategory_reference",
	               data: form_data,
	               dataType: 'json',  
	               cache: false,
	                success: function(data) {  
	                // alert(JSON.stringify(data)); 
	                data_subcategory = data['subcategory_category'];
	                data_recipient = data['recipient_category'];
	                if(data_subcategory!=0){ 
	                  $.each(data_subcategory, function(i){
	                    subcategory_options += '<option value="'+data_subcategory[i].subcategory_id+'">'+data_subcategory[i].subcategory_name+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No SubCategory added for '+selected_category);    
	                }  
	                if(data_recipient!=0){ 
	                  $.each(data_recipient, function(i){
	                    recipient_options += '<option value="'+data_recipient[i].recipient_id+'">'+data_recipient[i].recipient_type+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No Recipient added for '+selected_category);    
	                }    
	                $('.subcategory_act').html(subcategory_options); 
	    			$('.recipient_act').html(recipient_options);          
	               }
	        });
	    }     
    });
    // Functionality code for product attribute group in add product form
    // ********* Start *********
    var cloneCount = 1;
    $(document).delegate('.attibute_add_btn','click',function (e) {
        $error = false;
        $(this).parents('.clone_attribute_group').find('.attribute_option_validate').each(function(){
            if($(this).val() == '')
            {        
                $error = true;    
                $(this).addClass('attribute_error');           
            }
            else{
                $(this).removeClass('attribute_error');
            }
        });
        if(!$error){
            cloneCount = cloneCount +1;
            cloneelement = $(this).parents('.clone_attribute_group').find('.clone_attribute:last').clone();
            //After clone the element, assign one unique id and append to particular parent class
            cloneelement.attr('id', 'clone_attribute'+cloneCount).appendTo($(this).parents('.clone_attribute_group'));
            //To clear the label of attribute after cloned
            cloneelement.find('.attribute_label').text('');
            // cloneelement.find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
            //To remove add button from previous clone attribute
            cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_add_btn').remove();
            cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
        }
    });
    var cloneCount_att = 1;
    $(document).delegate('.attibute_add','click',function () {
    	$error = false;
        $(this).parents('.attribute_group').find('.attribute_validate').each(function(){
            if($(this).val() == '')
            {        
                $error = true;    
                $(this).addClass('attribute_error');
                // e.preventDefault();             
            }
            else{
                $(this).removeClass('attribute_error');
            }
        });
        if(!$error){
            var equal_check_array = [];
            $(this).parents('.attribute_group').find('.att_equal').each(function(){
                if($('option:selected',this).val() != ''){
                    equal_check_array.push($('option:selected',this).val());
                }
            });
            var hasDups = !equal_check_array.every(function(v,i) {
              return equal_check_array.indexOf(v) == i;
            });
            if (hasDups){
                $("html, body").animate({ scrollTop: 800 }, "slow");
                $('.attribute_group_message').hide();
                $('.attribute_duplicate_message').show();
            }
            else{
                $('.attribute_duplicate_message').hide();
                cloneCount_att = cloneCount_att +1;
                attclone = $(this).parents('.attribute_main_block').find('.attribute_group:last').clone();
                attclone.attr('id', 'attribute_group'+cloneCount_att).appendTo('.attribute_main_block');
                
                attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_add').remove();
                attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_remove').removeClass('attribute_btn_disabled');

                //Functionality used to increment the value of attribute group by attribute value add when add button click      
                increment_val = parseInt($('.group_values').val()) + 1;
                $('.group_values').val(increment_val);
            }
        }       
    });    
    $(document).delegate('.attibute_remove_btn','click',function () {
        if($(this).parents('.clone_attribute').index() == 0){
            $(this).parents('.clone_attribute').next().find('.attribute_label').text('Attribute Option');
        }
        $(this).parents('.clone_attribute').remove();
    });
    $(document).delegate('.attibute_remove','click',function () {
        $(this).parents('.attribute_group').remove();
    });
    $("#add_giftproduct").submit(function(){ 
        attribute_length = [];
        if($('.attribute_group').length > 1){
            $('.clone_attribute_group').each(function(){
                attribute_length.push($(this).find('.clone_attribute').length);
            });
            var hasDups = !attribute_length.every(function(v,i) {
              return attribute_length.indexOf(v) == i;
            });
            if (hasDups){
                $('.attribute_group_message').hide();
                return true;
            }
            else{
                $("html, body").animate({ scrollTop: 800 }, "slow");
                $('.attribute_duplicate_message').hide();
                $('.attribute_group_message').show();
                return false;
            }
        }  
        var sum = 0;
        if($('.attribute_status').is(":checked")){  
            $("#product_price_hidden").val($('#attribute_group1').find('#price').val());
            $("[name='product_attribute_totalitems[]']").each(function(){
                sum += parseFloat(this.value);
            });
            $("#product_totalitems_hidden").val(sum);
            return false;
        }   
        // return false;   
    });
    $(document).delegate("[name='select_attribute[]']",'change',function(){
        var new_selection = $(this).find('option:selected');
        $('option',this).not(new_selection).removeAttr('selected');
        new_selection.attr("selected",true);
    });
    $(document).delegate("#product_price",'change',function(){
        $('#product_price_hidden').val($(this).val());
    });
    $(document).delegate("#product_totalitems",'change',function(){
        $('#product_totalitems_hidden').val($(this).val());
    });
    // ********* End *********

    //**********add to muthukrishnan ***********
    $('#mobile,#userid,.totalitem,#orderid,#quantity,#size').keypress(function (e) {
     //if the letter is not digit then display error 
     if (e.which != 8 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
    }
   });
    $("#deliverycharge,#totalamount,.price,#wight").keypress(function (e) {
     //if the letter is not digit then display error 
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
    }
        });
    $(".description").text(function(index, currentText) {
        if (currentText.length>60) {
    return currentText.substr(0, 60)+'.....';
    }
});
    // var passVal = $('.password').val();
    // if(passVal!='') {
    //     var pass_restriction = new RegExp("^(?=.*[A-Za-z])(?=.*\\d)(?=.*[$@$!)=%*#(? &])[A-Za-z\\d$@)$!%(*#= ?&]{3,}$");
    //     if(!pass_restriction.test(passVal)) {
    //         $('#password').addClass("error_input_field");
    //         $('#error_pass_rest').slideDown();
    //     }
    //     else if(passVal != $('#repassword').val()) 
    //         {
    //             $('#error_pass_rest').slideUp();
    //             $('#password').removeClass("error_input_field");
    //             $('#repassword').addClass("error_input_field");
    //         }else {$('#error_pass_rest').slideUp();
    //         $('#password').removeClass("error_input_field");
    //         $('#repassword').removeClass("error_input_field");
    //     }}
    //************End *****************

    //************ Start ***********
    $(document).delegate('#edit_adminuser_form','submit',function(e){
        form_data = $(this).serializeArray();
        // alert(JSON.stringify(form_data));
        $.ajax({
           type: "POST",
           url: $(this).attr('action'),
           data: form_data,
           // dataType: 'json',  
           cache: false,
           success: function(data) {  
            $('.box-content').html(data);
           }
        });
        return false;
    });
    //************ End *************
});