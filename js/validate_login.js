//Log In form validation using JQuery
$(document).ready(function (){
  //Validation for login page
  $("form[id='login-form'").validate({
      errorElement: 'div',
      rules: {
          log_email:{
              required: true,
              minlength: 5
          },
          log_psswd:{
              required: true,
              minlength: 4
          }
      },
      messages: {
          log_email: {
              required:"Please your name is required",
              minlength: "Full name should be at least 5 characters long"
          },
          log_psswd: {
              required: "Please password is required",
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