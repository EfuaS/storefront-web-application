//Sign up form validation using JQuery
$(document).ready(function (){
  //Validation for login page
  $('form[id=login-form]').validate({
      errorElement: 'div',
      rules: {
          your_name:{
              required: true,
              minlength: 5
          },
          your_pass:{
              required: true,
              minlength: 8
          }
      },
      messages: {
          your_name: {
              required:"Please your name is required",
              minlength: "Full name should be at least 5 characters long"
          },
          your_pass: {
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