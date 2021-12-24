
 //var $form = $("#reg_form");
$(document).ready(function () {

  // $.validator.addMethod("letters", function(value, element) {
  //   return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
  // });

  $.validator.addMethod("alphachars", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z0-9_]*$/);
  });

  $.validator.addMethod("haspchars", function(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
        //&& /[a-z]/.test(value) // has a lowercase letter
        //&& /\d/.test(value) // has a digit
        && /[=!\-@._*]/.test(value) // has a special character
  });

  jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space between username is allowed");





  $("#regist").validate({
      ignore: [],
            errorClass: "error",
            errorElement: "div",
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
            },
    rules: {
      company_name: {
       // letters: true,
        required: true,
        maxlength: 50,
      },
      phone1: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 12,
      },
      phone2: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 12,
      },
      title: {
        required: true,
        digits: false,

       // alphachars: true,
      },
      email: {
        required: true,
        email: true
      },
      website: {
       required: true,
       ulr : true,
                },
    
        media_type: {
       required:true,
       url: true,
        },

       address: {
         required: true,
         maxlength: 100,
         },
         company_profile: {
         required: true,
         maxlength: 100,
         },
         industry_type: {
          required:true,
          digits: false
          },
         media_house: {
         required: true,
         digits :true,
                },
        policies: {
            required: true,
             maxlength: 100,
        },
      file: {
       required: true,
      // number :true,
      // dateTime :true
                },
      name: {
       required: true,
       digits : false,
      },
      password:{
          required: true,

      },
      username:{
          required: true,
      }

    },
    messages: {
      company_name: {
       // letters: "Only letters and spaces are allowed",
        required: "Company name is required"
      },
     


    },




  });


});


