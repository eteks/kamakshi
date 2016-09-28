$(document).ready(function() {
    $("#add_area").validate({
        showErrors: function(errorMap, errorList) {
            $(".form-errors").html("All fields must be completed before you submit the form.");
        }
    });

    jQuery(".attribute_status").on('change',function () {
    	if($(this).is(":checked"))
    		$('.attribute_main_block').show();
    	else
    		$('.attribute_main_block').hide();
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
    var cloneCount = 1;
    $(document).delegate('.attibute_add_btn','click',function () {
    	cloneCount = cloneCount +1;
    	$(this).parents('.clone_attribute_group').find('.clone_attribute:last').clone().attr('id', 'clone_attribute'+cloneCount).appendTo($(this).parents('.clone_attribute_group'));
    	
     //    //Functionality used to increment the value of attribute group by attribute value add when add button click
    	// attribute_group_id = $(this).parents('.attribute_group').attr('id');
    	// group_value_element = $('.group_values').filter("[data-value="+attribute_group_id+"]");
    	// increment_val = parseInt(group_value_element.val()) + 1;
   		// group_value_element.val(increment_val);
    });
    var cloneCount_att = 1;
    $(document).delegate('.attibute_add','click',function () {
    	cloneCount_att = cloneCount_att +1;
    	$(this).parents('.attribute_main_block').find('.attribute_group:last').clone().attr('id', 'attribute_group'+cloneCount_att).appendTo('.attribute_main_block');
    	id= $(this).parents('.attribute_main_block').find('.attribute_group:last').attr('id');
    	
        //Functionality used to create new attribute group elements status whether it is added or not
    	// if($('.group_values').filter("[data-value~="+id+"]").length ==0){
    	// 	newelement = "<input type='hidden' class='group_values' name='group_values"+cloneCount_att+"' value='1' data-value='"+id+"'>";
    	// 	$('.group_values_block').append(newelement);
    	// }

        //Functionality used to increment the value of attribute group by attribute value add when add button click      
        increment_val = parseInt($('.group_values').val()) + 1;
        $('.group_values').val(increment_val);
    });    
});