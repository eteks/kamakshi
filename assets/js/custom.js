;(function() {
    "use strict";
    if($('#price_range_filter_value').length > 0) {
        var price_value = $('#price_range_filter_value').val().split(',');
        $("#double_number_range").rangepicker({
        type: "double",
        startValue: 0,
        endValue: price_value[1],
        translateSelectLabel: function(currentPosition, totalPosition) {
            return parseInt(price_value[1] * (currentPosition / totalPosition));
        }
        });
    }
  

}()); // Added by siva for price filter


$(document).ready(function() {  

    /* ----- Added by siva - calculation process in basket page start -- */

    $('body').bind("cut copy paste",function(e) {
          e.preventDefault();
    });

    if($('#total_amount').val() == 0 ) {
        $('.basket_section_button').css('pointer-events','none');
        $('.basket_section_button').attr('disabled',true);
    }
    else {
        $('.basket_section_button').css('pointer-events','auto');
        $('.basket_section_button').attr('disabled',false);
    }   

    //if the letter is not digit then display error and don't type anything
    $('.product_quantity').on('keypress',function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('.product_quantity').on('change',function(){
        $('#checkout_button').attr('disabled',true);
        $('#checkout_button').prop('title',"To update the basket");
    });

    $('.product_quantity').on('keyup',function() {
        var this_value = $(this).val();
        var this_parent = $(this).parents('.amount_structure');
        var overall_updated_total = 0;

        if(this_value <= 0) {
            this_value = 1;
        }
        var orderitem_price = this_parent.find('.ordinary_orderitem_price').val();
        var product_overall_total = $('.ordinary_product_total').val();
        var unit_price = parseFloat(orderitem_price.replace(',',''));
        var quantity_total = parseFloat(this_value);
        var single_product_total = unit_price * quantity_total;
        var shipping_amount = parseFloat($('.ordinary_shipping_amount').val().replace(',',''));

        this_parent.find('.product_total').html(single_product_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
        this_parent.find('.updated_product_total').val(single_product_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
   
        $('.updated_product_total').each(function(){
            var this_amount = parseFloat($(this).val().replace(',', ''));
            overall_updated_total += this_amount;
        });

        $('.product_overall_total').html(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.overall_total_product_amount').val(overall_updated_total.toLocaleString('en-US', {minimumFractionDigits: 2}));

        var total_final_amount = overall_updated_total + shipping_amount;

        $('.product_final_amount').html(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.ordinary_final_amount').val(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
       
        this_parent.find('.update_basket_details').attr('data-quantity',this_value);
    });

    // Blur function fo quantity
    $('.product_quantity').on('blur',function() {
        var this_value = $(this).val();
        if(this_value <= 0) {
            $(this).val('1');
            $(this).focus();
        }
    });




//  Get checkout details from session
// var temp = sessionStorage.getItem('checkout_details');
// var viewName = $.parseJSON(temp);
// var div = viewName.fname;
// alert(div);
// alert(JSON.stringify(viewName));

//  Store user details of checkout form in json data
(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);

//  To store checkout form values in json variable
$('#checkout_form').submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeFormJSON();
    // alert(JSON.stringify(data));
    sessionStorage.setItem('checkout_details', JSON.stringify(data));
    /* Object
        email: "value"
        name: "value"
        password: "value"
     */
});


//  Moibile number validation
$("#phone,#zip").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
// Forgot Password-Added by thangam
  	$(".forgot_pwd").show();
 $('.forgot_pwd').click(function(){
 	$('#forget_password').show();
 	$('#login').hide();
 $(".forgot_pwd-modal").show();
 	});
 	$('.cancel').click(function(){
 	$('#forget_password').hide();
 	$('#login').show();
 $(".forgot_pwd-modal").show();
 	});

// Checkout address button
$('#checkout_address_submit').on('click',function() {

    var text_field = ["firstname","lastname","company","street","email","phone","zip","che_state","che_city","che_area"];
    var email_val = $('#email');
    var phone_val = $('#phone');
    var zip_val = $('#zip');

    // Empty validation
    for(var i=0;i<text_field.length;i++) {
        var current_field = $('#'+text_field[i]);
        if(current_field.val() != '') {
           current_field.removeClass('error_field');
        }
        else {
            current_field.addClass('error_field');
        }
    }

    // Email validation
    if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email_val.val())) {
        email_val.addClass("error_mail_field");
    }
    else {
        email_val.removeClass("error_mail_field");
    }

    //  Number validation
    if(phone_val.val().length < 10) {
        phone_val.addClass("error_mobile_field");
    }
    else {
        phone_val.removeClass("error_mobile_field"); 
    }

    //  Zip validation
    if(zip_val.val().length < 4) {
        zip_val.addClass("error_zip_field");
    }
    else {
        zip_val.removeClass("error_zip_field"); 
    }

    //  Display error message
    if($('input').hasClass('error_field') || $('select').hasClass('error_field')) {
        $('.error_msg').html("Please fill out all fields");   
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_zip_field')){
        $('.error_msg').html("Please enter valid postal code");
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_mobile_field')){
        $('.error_msg').html("Please enter valid mobile number");
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_mail_field')){
        $('.error_msg').html("Please enter valid email address");
        $('.error_msg').slideDown();
    }
    else {
        var updation=[];
        $('.amount_structure').each(function() {
            var product_id = $(this).find('.basket_product_items').val();
            updation.push(product_id);
        });
        city_id = $( "#che_city option:selected" ).val();
        // alert(city_id);
        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl+"index.php/ajax_controller/check_city_applicable",
            data: {'product_id' : updation,'city_id':city_id},
            success: function(res) {
                // if (res)
                // {   
                //     if(res=="success") {
                //         $('#checkout_button').attr('disabled',false);
                //         $('#checkout_button').prop('title',"Proceed to checkout");
                //     }  
                //     $('.updations_status').html(res);
                //     $('.updations_status').slideDown(350);

                // }
                alert(res);
            }
        });
        $('.error_msg').slideUp();
        $('#checkout_address').hide();
        $('#checkout_order').slideDown(800);
        $('.address_label').removeClass('active');
        $('.address_label').addClass('disabled');
        $('.order_label').removeClass('disabled');
        $('.order_label').addClass('active');
    }
    return false;
});

// Checkout address button
$('#checkout_order_submit').on('click',function() {
    $('#checkout_order').hide();
    $('#checkout_address').slideDown(800);
    $('.order_label').removeClass('active');
    $('.order_label').addClass('disabled');
    $('.address_label').removeClass('disabled');
    $('.address_label').addClass('active');
});

//  Recipient list home
// $('.recipient_list_section').on('click',function() {
//     var this_val = $("a",$(this)).data('filter');
//     $('.recipient_home').hide();
//     $(this_val).fadeIn();
// });

// $('.recipient_all_section').on('click',function() {
//     $('.recipient_home').fadeIn();
//     $('.secondary_list').hide();
// });

//  Remove dummy dropdown in detail page
var dummy_dropdown_length = $('.dummy_dropdown').length;
if(dummy_dropdown_length > 0) {
    $('.dummy_dropdown').remove();
}

$('.change_password').on('click',function(){
    $('.change_password_form').slideToggle();
});

$('#profile_email').on('keyup',function() {
    var profile_email_val = $(this);
    // Email validation
    if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(profile_email_val.val()) || profile_email_val=='') {
        profile_email_val.addClass("error_mail_field");
        $('.profile_submit').prop('disabled',true);
        $('.profile_submit').css('pointer-events','none');
    }
    else {
        $('.profile_submit').prop('disabled',false);
        $('.profile_submit').css('pointer-events','auto');
    }
});

// Display search form for track order
$('.track_order_status_icon').on('click',function(){
    $('.track_order_form').fadeToggle();
});

if($('.full_site_url').length > 0) {
    var site_value = $('.full_site_url').val();
    var page_title = site_value.replace(baseurl,'');   
    if(page_title=="") {
        $('.kamakshi_header_menu').removeClass('active');
        $('#kamakshi_header_menu_home').addClass('active');
    }
    else {
        page_title = page_title.replace('index.php/','').split('/'); 
        if(page_title[0]=="") {
            $('.kamakshi_header_menu').removeClass('active');
            $('#kamakshi_header_menu_home').addClass('active');
        }
        else if(page_title[0]=="category") {
            $('.kamakshi_header_menu').removeClass('active');
            $('#kamakshi_header_menu_category').addClass('active');
        }
        else if(page_title[0]=="recipient_category") {
            $('.kamakshi_header_menu').removeClass('active');
            $('#kamakshi_header_menu_recipient').addClass('active');    
        }
        else if(page_title[0]=="about") {
            $('.kamakshi_header_menu').removeClass('active');
            $('#kamakshi_header_menu_about').addClass('active'); 
        }
        else if(page_title[0]=="contact") {
            $('.kamakshi_header_menu').removeClass('active');
            $('#kamakshi_header_menu_contact').addClass('active');
        }
        else {
            $('.kamakshi_header_menu').removeClass('active');
        }
    }
}


// Ended by siva - calculation process in basket page end
  
    var $container = $('#container'),
    $filterLinks = $('#filters a');
    $container.isotope({
    itemSelector: '.item-img',
    filter: '*'
    });
    $('.portfolio_menu ul li').click(function(){
      $('.portfolio_menu ul li').removeClass('active_prot_menu');
      $(this).addClass('active_prot_menu');
    });
    $filterLinks.click(function(){
        var $this = $(this);
          // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return;
        }
        $filterLinks.filter('.selected').removeClass('selected');
        $this.addClass('selected');
        // get selector from data-filter attribute
        selector = $this.data('filter');
          $container.isotope({
          filter: selector
        });
  });
});
$(window).load(function()
{
    $('.images_alignment,.position_images,.product_position').css('display','none');
    $('.product').addClass('product_loader');
	centerContent();
});
$(window).resize(function()
{
    $('.images_alignment,.position_images,.product_position').css('display','none');
    $('.product').addClass('product_loader');
	centerContent();
});
function centerContent()
{   
    setTimeout(function(){ 
        $('.product').removeClass('product_loader');
    	$('.images_alignment,.position_images,.product_position').each(function(){
    		$(this).css("margin-left", -($(this).width())/2);
    		$(this).css("margin-top", -($(this).height())/2);
            $(this).fadeIn(200);
    	});
    },1000);
}


$(document).ready(function () {
    var options = {
        navigation: true,
        pagination: true
    };
    $("#owl-demo").owlCarousel(options);

    function showProjectsbyCat(cat) {
        var owl = $("#owl-demo").data('owlCarousel');
        owl.addItem('<div/>', 0);
        var nb = owl.itemsAmount;
        for (var i = 0; i < (nb - 1); i++) {
            owl.removeItem(1);
        }
        if (cat == 'item_all') {
            $('#projects-copy .project.primary_list').each(function () {
                owl.addItem($(this).clone());
            });
        }
        else {
            $('#projects-copy .project.' + cat).each(function () {
                owl.addItem($(this).clone());
            });
        }
        owl.removeItem(0);
    }
    $('#owl-demo .project').clone().appendTo($('#projects-copy'));

    $('#product-terms a').click(function (e) {
        e.preventDefault();
        $('#product-terms a').removeClass('selected');
        cat = $(this).attr('ID');
        $(this).addClass('selected');
        showProjectsbyCat(cat);
        $('.recipient_based_categories img').css('display','none');
        $('.recipient_based_categories').addClass('product_loader');
        centerContent();
    });
    //  Added by siva - remove repeatation of category images
    $('.product_category_name a:first-child').addClass('selected');
    $('.product_category_name a:first-child').click();

//Added by velpandi - contact form validation
 
 	});
 	
   $(document).ready(function () {
	   	$('#firstname,#lastname').keydown(function (e) {
	          if (e.ctrlKey || e.altKey) {
	              e.preventDefault();
	          } else {
	              var key = e.keyCode;
	              if (!((key == 8) || (key == 32) || (key == 46) || (key == 9) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
	                  e.preventDefault();
	              }
	          }
	      });     
          var required_register = ["firstname","lastname","email","subject","message"];
               var reg_email=jQuery("#email");
               var test=jQuery("#test");
               var errornotice = jQuery("#error");
               
          $("#contactForm").on('submit',function(e){
              e.preventDefault();
                for (var i=0;i<required_register.length;i++) {
            var input = jQuery('#'+required_register[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_test').css('display','block'); 
                } else {
                    input.removeClass("error_input_field");
                    $('.error_test').css('display','none'); 
                }
            }
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
            reg_email.addClass("error_input_field");
                $('.error_email').css('display','block');
                }
                 else {
                    reg_email.removeClass("error_input_field");
                     $('.error_email').css('display','none');
            }
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
             if (jQuery(":input").hasClass("error_input_field")  ) {
                 $('.error_test').css('display','block'); 
                 $('.error_email').css('display','none'); 
                 return false;
             } 
             else {
                if(jQuery(":input").hasClass("error_input_field"))  {
                 $('.error_test').css('display','none');
                 $('.error_email').css('display','block');
                 return false;
                 }
             else {
                errornotice.hide();
                 $('.error_test').css('display','none'); 
                 $('.error_email').css('display','none');
                 $(this).unbind();
                 $(this).submit();
             }
         }
 	
 });
});
