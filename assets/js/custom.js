$(document).ready(function() {
    required_login=["email-modal","password-modal"];
    required_login_reg=["email-log","password-log"];
    required_signup=["name","password-reg","email-reg"];
    login_email=jQuery("#email-modal");
    reg_login_email=jQuery("#email-log");
    reg_email=jQuery("#email-reg");
    // email=jQuery("#email");
    errornotice = jQuery("#error");

jQuery("#login").submit(function(){ 
        for (i=0;i<required_login.length;i++) {
            var input = jQuery('#'+required_login[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_msg').css('display','block');
                } else {
                    input.removeClass("error_input_field");
                    $('.error_msg').css('display','none');
                }
            }

            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(login_email.val())) {
                login_email.addClass("error_input_field_email");
                }
            else{
                login_email.removeClass("error_input_field_email");                
            }
        
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_msg').css('display','block');  
                $('.error_email').css('display','none'); 
                return false;
            } 
            else {
            if(jQuery(":input").hasClass("error_input_field_email"))  {
                $('.error_msg').css('display','none');
                $('.error_email').css('display','block');                
                return false;
            }
            else {
                errornotice.hide();
                $('.error_msg').css('display','none');
                $('.error_email').css('display','none');
                return true;
            }
        }  
    });
jQuery("#login_reg").submit(function(){ 
        for (i=0;i<required_login_reg.length;i++) {
            var input = jQuery('#'+required_login_reg[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_msg_log').css('display','block');
                } else {
                    input.removeClass("error_input_field");
                    $('.error_msg_log').css('display','none');
                }
            }
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_login_email.val())) {
                reg_login_email.addClass("error_input_field_email");
                }
            else{
                reg_login_email.removeClass("error_input_field_email");                
            }
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_msg_log').css('display','block');
                $('.error_log_email').css('display','none'); 
                return false;
            } 
            else {
            if(jQuery(":input").hasClass("error_input_field_email"))  {
                $('.error_msg').css('display','none');
                $('.error_log_email').css('display','block');                
                return false;
            } else {
                errornotice.hide();
                $('.error_msg_log').css('display','none');
                $('.error_log_email').css('display','none');
                return true;
            }
        }
    });
jQuery("#signup").submit(function(){ 
        for (i=0;i<required_signup.length;i++) {
            var input = jQuery('#'+required_signup[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_msg_reg').css('display','block');
                } else {
                    input.removeClass("error_input_field");
                    $('.error_msg_reg').css('display','none');
                }
            }
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
                reg_email.addClass("error_input_field_email");
                }
            else{
                reg_email.removeClass("error_input_field_email");                
            }
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_msg_reg').css('display','block');
                $('.error_reg_email').css('display','none'); 
                return false;
            } 
            else {
            if(jQuery(":input").hasClass("error_input_field_email"))  {
                $('.error_msg_reg').css('display','none');
                $('.error_reg_email').css('display','block');                
                return false;
            }
    
             else {
                errornotice.hide();
                $('.error_msg_reg').css('display','none');
                $('.error_reg_email').css('display','none'); 
                return true;
            }
        } 
    });
});