//Log In form validation using JQuery
$(document).ready(function (){

//check if email is storefront with regex
  $.validator.addMethod('storefrontmail',function(value){
    return /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(storefront)\.com$/g.test(value);
},"Storefront Email not Valid"
);

    //Validation for login page
    $("form[id='adminlogin-form'").validate({
        errorElement: 'div',
        rules: {
            adminlog_email:{
                required: true,
                email: true,
                storefrontmail: true,
                minlength: 5
            },
            adminlog_psswd:{
                required: true,
                minlength: 4
            }
        },
        messages: {
            adminlog_email: {
                required:"Username is required",
                email: "Email empty",
                storefrontmail: "A recognized storefront email is required",
                minlength: "Full name should be at least 5 characters long"
            },
            adminlog_psswd: {
                required: "Password is required",
                minlength: "Password must be at least 8 characters long"                
            }
        },
  
        //submit handler
        submitHandler: function(form) {
            form.submit();
        }
    });
  
  });
  
  
  
  (function ($)
  { "use strict"
    /* 3. slick Nav */
    // mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
    menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
    });
    };
  })(jQuery);