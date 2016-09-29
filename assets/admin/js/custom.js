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
    //Functionality code for product attribute group in add product form
    var cloneCount = 1;
    $(document).delegate('.attibute_add_btn','click',function (e) {
    	// cloneCount = cloneCount +1;
    	// cloneelement = $(this).parents('.clone_attribute_group').find('.clone_attribute:last').clone();
     //    //After clone the element, assign one unique id and append to particular parent class
     //    cloneelement.attr('id', 'clone_attribute'+cloneCount).appendTo($(this).parents('.clone_attribute_group'));
    	// //To clear the label of attribute after cloned
     //    cloneelement.find('.attribute_label').text('');
     //    // cloneelement.find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
     //    //To remove add button from previous clone attribute
     //    cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_add_btn').remove();
     //    cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
    
        cloneelement = $(this).parents('.clone_attribute_group').find('.clone_attribute:last').clone();
        $(this).parents('.clone_attribute_group').find('input[type="text"]').each(function(){
            if($(this).val() == '')
            {            
                $(this).addClass('attribute_error');
                e.preventDefault();             
            }
            else{
                $(this).removeClass('attribute_error');
            }
        // else if($('.range_holder').find('.hided').hasClass('custom_error')){
        //     e.preventDefault();
        // }
        // else{
        //     $('.clone_content:last').children().find('input[type="text"]').next().removeClass('custom_error');
        //     var id = current_id+1;
        //     nextrangeElement($('.clone_content:last'));
        //     $('.clone_content:last').attr('id','range_counter'+id);
        // }
        });
    });
    var cloneCount_att = 1;
    $(document).delegate('.attibute_add','click',function () {
    	cloneCount_att = cloneCount_att +1;
    	attclone = $(this).parents('.attribute_main_block').find('.attribute_group:last').clone();
        attclone.attr('id', 'attribute_group'+cloneCount_att).appendTo('.attribute_main_block');
        
        attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_add').remove();
        attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_remove').removeClass('attribute_btn_disabled');

        //Functionality used to increment the value of attribute group by attribute value add when add button click      
        increment_val = parseInt($('.group_values').val()) + 1;
        $('.group_values').val(increment_val);
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
});