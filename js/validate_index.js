//Sign up form validation using JQuery
$(document).ready(function (){
  //check email with regex
  $.validator.addMethod('mail',function(value){
      return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
  },"Email not Valid"
  );

  $("form[id='register-form'").validate({
      errorElement: 'div',
      rules: {
          name:{
              required: true,
              minlength: 5
          },
          bname:{
            required: true,
            minlength: 2
          },
          breg:{
            required: true,
            minlength: 5
          },
          btax:{
            required: true,
            minlength: 5
          },
          tel:{
            required: true,
            minlength: 10
          },
          digadd:{
            required: true,
            minlength: 5
          },
          psswd1:{
              required: true,
              minlength: 4
          },
          psswd2: {
              required: true,
              minlength: 4,
              equalTo: "#psswd1"
          },
          email: { 
              required: true,
              email: true, 
              mail: true
          }
      },
      messages: {
          name: {
              required:"Full Name is required",
              minlength: "Full name should be at least 5 characters long"
          },
          bname: {
            required:"Business Name is required",
            minlength: "Business Name should be at least 2 characters long"
          },
          breg: {
            required:"Business Registration Number is required",
            minlength: "Registration Number should be at least 5 characters long"
          },
          tel:{
            required:"Telephone Number is required",
            minlength: "Telephone Number should be at least 10 characters long"
          },
          btax: {
            required:"Business Tax Number is required",
            minlength: "Tax Number  should be at least 5 characters long"
          },
          digadd: {
            required:"Your Digital Adress Code is required",
            minlength: "Digital Address should be at least 5 characters long"
          },
          email:{
              required: "Email is required",
              email: "Please use your Mail",
              mail: "Please use your Mail"
          },
          psswd1: {
              required: "Pssword is required",
              minlength: "Password must be at least 4 characters long"                
          },
          psswd2:{
              required: "Please password is required",
              minlength:"Password must be at least 4 characters long",
              equalTo: "Password mismatch"
          }
      },

      //submit handler
      submitHandler: function(form) {
          form.submit();
      }
  });

});