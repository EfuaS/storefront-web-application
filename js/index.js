//Sign up form validation using JQuery
$(document).ready(function (){
  //prevent jquery from accepting other emails
  $.validator.addMethod('ashesimail',function(value){
      return /^([\w-.]+@(?!gmail\.com)(?!yahoo\.com)(?!hotmail\.com)([\w-]+.)+[\w-]{2,4})?$/.test(value);
  },"Only Ashesi mails allowed"
  );

  $('form[id="register-form').validate({
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
          digadd:{
            required: true,
            minlength: 5
          },
          psswd1:{
              required: true,
              minlength: 8
          },
          psswd2: {
              required: true,
              minlength: 8,
              equalTo: "#pass"
          },
          email: { 
              required: true,
              email: true, 
              ashesimail: true
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
              ashesimail: "Please use your Mail"
          },
          pass: {
              required: "Pssword is required",
              minlength: "Password must be at least 8 characters long"                
          },
          re_pass:{
              required: "Please password is required",
              minlength:"Password must be at least 8 characters long",
              equalTo: "Password mismatch"
          }
      },

      //submit handler
      submitHandler: function(form) {
          form.submit();
      }
  });

});