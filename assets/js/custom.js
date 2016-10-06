
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
            alert("Enter product quantity correctly");
            $(this).val('1');
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

$('#checkout_form').submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeFormJSON();
    alert(JSON.stringify(data));
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
 $(".forgot_pwd-modal").hide();
 	$(".forgot_pwd").show();
 $('.forgot_pwd').click(function(){
 	$('#login').hide();
 $(".forgot_pwd-modal").toggle();
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
$('.recipient_list_section').on('click',function() {
    var this_val = $("a",$(this)).data('filter');
    $('.recipient_home').hide();
    $(this_val).fadeIn();
});

$('.recipient_all_section').on('click',function() {
    $('.recipient_home').fadeIn();
    $('.secondary_list').hide();
});

//  Remove dummy dropdown in detail page
var dummy_dropdown_length = $('.dummy_dropdown').length;
if(dummy_dropdown_length > 0) {
    $('.dummy_dropdown').remove();
}


// Ended by siva - calculation process in basket page end


    required_login=["email-modal","password-modal"];
    required_login_reg=["email-log","password-log"];
    required_signup=["name","password-reg","email-reg"];
    login_email=jQuery("#email-modal");
    reg_login_email=jQuery("#email-log");
    reg_email=jQuery("#email-reg");
    // email=jQuery("#email");
    errornotice = jQuery("#error");

    // jQuery("#login").submit(function(){ 
    //     for (i=0;i<required_login.length;i++) {
    //         var input = jQuery('#'+required_login[i]);
    //         if ((input.val() == "")) 
    //             {
    //                 input.addClass("error_input_field");
    //                 $('.error_msg').css('display','block');
    //             } else {
    //                 input.removeClass("error_input_field");
    //                 $('.error_msg').css('display','none');
    //             }
    //         }

    //         if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(login_email.val())) {
    //             login_email.addClass("error_input_field_email");
    //             }
    //         else{
    //             login_email.removeClass("error_input_field_email");                
    //         }
    //         //if any inputs on the page have the class 'error_input_field' the form will not submit
    //         if (jQuery(":input").hasClass("error_input_field")  ) {
    //             $('.error_msg').css('display','block');  
    //             $('.error_email').css('display','none'); 
    //             return false;
    //         } 
    //         else {
    //         if(jQuery(":input").hasClass("error_input_field_email"))  {
    //             $('.error_msg').css('display','none');
    //             $('.error_email').css('display','block');                
    //             return false;
    //         }
    //         else {
    //             errornotice.hide();
    //             $('.error_msg').css('display','none');
    //             $('.error_email').css('display','none');
    //             return true;
    //         }
    //     }  
    // });
    // jQuery("#login_reg").submit(function(){ 
    //     for (i=0;i<required_login_reg.length;i++) {
    //         var input = jQuery('#'+required_login_reg[i]);
    //         if ((input.val() == "")) 
    //             {
    //                 input.addClass("error_input_field");
    //                 $('.error_msg_log').css('display','block');
    //             } else {
    //                 input.removeClass("error_input_field");
    //                 $('.error_msg_log').css('display','none');
    //             }
    //         }
    //         if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_login_email.val())) {
    //             reg_login_email.addClass("error_input_field_email");
    //             }
    //         else{
    //             reg_login_email.removeClass("error_input_field_email");                
    //         }
    
    //         //if any inputs on the page have the class 'error_input_field' the form will not submit
    //         if (jQuery(":input").hasClass("error_input_field")  ) {
    //             $('.error_msg_log').css('display','block');
    //             $('.error_log_email').css('display','none'); 
    //             return false;
    //         } 
    //         else {
    //         if(jQuery(":input").hasClass("error_input_field_email"))  {
    //             $('.error_msg').css('display','none');
    //             $('.error_log_email').css('display','block');                
    //             return false;
    //         } else {
    //             errornotice.hide();
    //             $('.error_msg_log').css('display','none');
    //             $('.error_log_email').css('display','none');
    //             return true;
    //         }
    //     }
    // });
    // jQuery("#signup").submit(function(){ 
    //     for (i=0;i<required_signup.length;i++) {
    //         var input = jQuery('#'+required_signup[i]);
    //         if ((input.val() == "")) 
    //             {
    //                 input.addClass("error_input_field");
    //                 // $('.error_msg_reg').css('display','block');
    //             } else {
    //                 input.removeClass("error_input_field");
    //                 // $('.error_msg_reg').css('display','none');
    //             }
    //         }
    //         if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
    //             reg_email.addClass("error_input_field_email");
    //             }
    //         else{
    //             reg_email.removeClass("error_input_field_email");                
    //         }
    //         //if any inputs on the page have the class 'error_input_field' the form will not submit
    //         if (jQuery(":input").hasClass("error_input_field")  ) {
    //             $('.error_msg_reg').css('display','block');
    //             $('.error_reg_email').css('display','none'); 
    //             return false;
    //         } 
    //         else {
    //         if(jQuery(":input").hasClass("error_input_field_email"))  {
    //             $('.error_msg_reg').css('display','none');
    //             $('.error_reg_email').css('display','block');                
    //             return false;
    //         }
    
    //          else {
    //             errornotice.hide();
    //             $('.error_msg_reg').css('display','none');
    //             $('.error_reg_email').css('display','none'); 
    //             return true;
    //         }
    //     }   
    // });    
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
	centerContent();
});
$(window).resize(function()
{
	centerContent();
});
function centerContent()
{
	$('.images_alignment,.position_images,.product_position').each(function(){
		$(this).css("margin-left", -($(this).width())/2);
		$(this).css("margin-top", -($(this).height())/2);
        $(this).fadeIn(200);
	});
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
         if (cat == 'all') {
            $('#projects-copy .project').each(function () {
                owl.addItem($(this).clone());
            });
        } else {
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
    });
});
