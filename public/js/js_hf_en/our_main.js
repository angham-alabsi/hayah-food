/*START SCROLL SMOOTH*/
$(document).ready(function () {
    // Add smooth scrolling to all links
    $("a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});
/*END SCROLL SMOOTH*/

/*START SCROLL NICE*/

/*END SCROLL NICE*/
/*START NAV*/
function move() {
    var a = document.getElementById('nav-move');
    

    if (a.style.left == '0px') {
        a.style.left = '-250px';
        
    } else {
        a.style.left = '0px';
        
    }
}
/*END NAV*/

/*START COMPANIES SLIDE*/
$(document).ready(function () {
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});
/*END COMPANIES SLIDE*/
/* START CONTACT VALIDATION */
$(function () {
    'use strict';
    
    var nameEr = true , emailEr = true, subEr = true , msgEr = true;
    $('.f-name').blur(function(){
        
        if ($(this).val().length < 4 ) {
            
            $(this).css('border','1px solid #f00').parent().find('.alert-edit').fadeIn(200);
            nameEr = true;
        } else {
            $(this).css('border','1px solid #080').parent().find('.alert-edit').fadeOut(200);
            nameEr = false;
        }
    });
    $('.f-email').blur(function(){
        
        if ($(this).val().length < 5 ) {
            
            $(this).css('border','1px solid #f00').parent().find('.alert-edit').fadeIn(200);
            emailEr = true;
        } else {
            $(this).css('border','1px solid #080').parent().find('.alert-edit').fadeOut(200);
            emailEr = false;
        }
    });
    $('.f-sub').blur(function(){
        
        if ($(this).val().length < 4 ) {
            
            $(this).css('border','1px solid #f00').parent().find('.alert-edit').fadeIn(200);
            subEr = true;
        } else {
            $(this).css('border','1px solid #080').parent().find('.alert-edit').fadeOut(200);
            subEr = false;
        }
    });
    $('.f-msg').blur(function(){
        
        if ($(this).val().length < 11 ) {
            
            $(this).css('border','1px solid #f00').parent().find('.alert-edit').fadeIn(200);
            
            msgEr = true;  
            
        } else {
            $(this).css('border','1px solid #080').parent().find('.alert-edit').fadeOut(200);
            
            msgEr = false;
        }
    });
    $('.contact-form').submit(function (e) {
        if (nameEr == true || emailEr == true || subEr == true || msgEr == true) {
            e.preventDefault(); 
            $('.f-name, .f-email, .f-sub, .f-msg').blur();
        }
        
    });
});


/* END CONTACT VALIDATION */
/*START TEST CODE*/

/*END TEST CODE*/