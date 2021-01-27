(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else if($(input).attr('type') == 'text' && $(input).attr('name') == 'no_hp') {
            if($(input).val().length < 10 || $(input).val().length > 15) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });


    /*==================================================================
    [ Select Departement Prio ]*/
    $('select[name="dept_prio"]').focus(function() {
        if ($('select[name="rute"]').val() == "1") {
            $('.rute-1-option').each(function(){
                $(this).show();
            });
            $('.rute-2-option').each(function(){
                $(this).hide();
            });
        } else if ($('select[name="rute"]').val() == "2") {
            $('.rute-1-option').each(function(){
                $(this).hide();
            });
            $('.rute-2-option').each(function(){
                $(this).show();
            });
        } else {
            $('.rute-1-option').each(function(){
                $(this).hide();
            });
            $('.rute-2-option').each(function(){
                $(this).hide();
            });
        }
    });

    $('.form-link').click(function() {
        $('.hide-and-seek:eq(0)').hide(1000);
        $('.hide-and-seek:eq(1)').show(1000);
        $('.back-icon-wrapper').fadeIn(1000);
    });
    $('.back-icon-wrapper').click(function() {
        $('.hide-and-seek:eq(0)').show(1000);
        $('.hide-and-seek:eq(1)').hide(1000);
        $('.back-icon-wrapper').fadeOut(1000);
    })
})(jQuery);

function checkbox_cek() {
  var checkBox = document.getElementById("lain");
  var form = document.getElementById("lain-lain");
  if (checkBox.checked == true){
    form.style.display = "block";
  } else {
     form.style.display = "none";
  }
}

$(function () {
  $("#oprec").keypress(function (e) {
    var keyCode = e.keyCode || e.which;

            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9 @.-_ \n\r]+$/;
            
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
              alert("Only Alphabets and Numbers allowed.");
            }
            
            return isValid;
          });
});