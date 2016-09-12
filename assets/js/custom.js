$(document).ready(function() {

    required_login=["email-modal","password-modal"];
    required_signup=["name","password","email"];

jQuery("#login").submit(function(){ 
        for (i=0;i<required_login.length;i++) {
            var input = jQuery('#'+required_login[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                } else {
                    input.removeClass("error_input_field");
                }
            }
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                return false;
            } else {
                errornotice.hide();
                return true;
            }
    
 });
jQuery("#signup").submit(function(){ 
        for (i=0;i<required_signup.length;i++) {
            var input = jQuery('#'+required_signup[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                } else {
                    input.removeClass("error_input_field");
                }
            }
    
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                return false;
            } else {
                errornotice.hide();
                return true;
            }
    
 });
});