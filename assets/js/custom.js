
$(document).ready(function() {
// Added by siva - calculation process in basket page start
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




//     $('.product_quantity').on('keyup',function() {
//         var this_value = $(this).val();
//         var this_parent = $(this).parents('.amount_structure');
//         if(this_value > 0) {

//             var orderitem_price = this_parent.find('.ordinary_orderitem_price').val();
//             var product_overall_total = $('.ordinary_product_total').val();




//             var price1 = parseInt(product_overall_total.replace(',',''));


// alert(price1);

// //             var overall_total_product_amount = $('.overall_total_product_amount').val();
// //             var ordinary_shipping_amount = $('.ordinary_shipping_amount').val();
// //             var overall_updated_total = 0;


// //             this_parent.find('.product_total').html(parseFloat(Math.ceil(this_value*orderitem_price)).toFixed(2));
// //             this_parent.find('.updated_product_total').val(parseFloat(Math.ceil(this_value*orderitem_price)).toFixed(2));
            




// //             $('.updated_product_total').each(function(){
// //                 var this_amount = $(this).val().replace(',', '');;
// //                 overall_updated_total += parseInt(this_amount);
// //                 // alert($(this).val());
// //             });



// // var test = parseFloat(Math.ceil(overall_updated_total));

// // var test1 = test.toLocaleString();
// // var test2 = test1.toFixed(2);
// //             alert(test1);
// //             // alert().toLocaleString();

// //             $('.product_overall_total').html(parseFloat(Math.ceil(overall_updated_total)).toFixed(2));
// //             var final_amount = overall_updated_total + parseInt(ordinary_shipping_amount);
// //             $('.product_final_amount').html(parseFloat(Math.ceil(final_amount)).toFixed(2));    
// //         }

// //         else {
// //             alert("Enter product quantity correctly");
// //             $(this).val('1');
// //         }
// //         this_parent.find('.update_basket_details').attr('data-quantity',this_value);
// }
//     });

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