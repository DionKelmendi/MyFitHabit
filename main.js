
 var x = 0;

  window.onscroll = function () { scrollFunction() };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.querySelector("header").style.opacity = 0;
    } else {
      document.querySelector("header").style.opacity = 70 + "%";
    }
  }

  function sliderLeft() {

    var slider = document.querySelector("#slider");
    var sliderCount = document.querySelector("#slider").children.length;
    var sliderItems = document.querySelectorAll("#sliderItem")

    if (x < 0) {

      x += 350;
    }

    sliderItems.forEach(si => {

      si.style.transform = "translateX(" + x + "px)";

    });

    // console.log("Going Left")
    // console.log(x)
    // console.log(sliderCount)
  }

  function sliderRight() {

    var slider = document.querySelector("#slider");
    var sliderCount = document.querySelector("#slider").children.length;
    var sliderItems = document.querySelectorAll("#sliderItem")

    // console.log(sliderItems);

    if (x > ((sliderCount - 3) * -350)) {

      x -= 350;
    }

    sliderItems.forEach(si => {

      si.style.transform = "translateX(" + x + "px)";

    });

    // console.log("Going Right")
    // console.log(x)
    // console.log(sliderCount)
  }

(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
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
    

})(jQuery);


