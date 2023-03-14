$(document).ready(function () {
          $("#StartDate").datepicker({ dateFormat: 'yy-mm-dd',
            showOn: "button",
          buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
          buttonImageOnly: true
           });
      
      $.validator.addMethod("alphabetsnspace", function(value, element) {
         return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
      });
      $("#myform").validate({
      rules: {
         id:{
          required: true,
            number:true,  
            minlength:3
        },
        FirstName: {
          required: true,
          minlength:3,
          alphabetsnspace: true
      
        },
        LastName: {
          required: true,
          minlength:3,
          alphabetsnspace: true
      
        },
        'skill[]':{
            required: true
        },
        StartDate:{
            required: true
        }
      },
      messages: {
        id:{
          required:  "This field is required",
          length:"plase enter ten digits"
          },
        FirstName:{
          required:"This field is required",
          alphabetsnspace:"plase enter only letters"
         },
        LastName:{required:"This field is required",
        alphabetsnspace:"plase enter only letters"
        },
       skill:{
            required: "This field is required",
        },
        StartDate:{ 
          reqired:"This field is required",
        }
      },
      submitHandler: function (form) { // for demo
        alert('valid form');
        // Route::redirect("/student");
        // var form = $(form);
        // $form.submit();
        return true;
      }
      });
      });