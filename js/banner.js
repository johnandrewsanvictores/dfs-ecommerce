$(document).ready(function() {
    let slideIndex = 0;
    const slides = $('.sliders .slides');
    const dots = $('.dot');
    let slideTimeout;

    function showSlides() {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        updateSlides();
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 6000);
    }

    function updateSlides() {
        const slideWidth = slides.eq(0).width(); 
        $('.sliders').css({
            'transform': `translateX(-${slideIndex * slideWidth}px)`
        });
        dots.removeClass('active');
        dots.eq(slideIndex).addClass('active');
    }

    $('#prevBtns').click(function() {
        slideIndex--;
        if (slideIndex < 0) {
            slideIndex = slides.length - 1;
        }
        updateSlides();
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 5000);
    });

    $('#nextBtns').click(function() {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        updateSlides();
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 5000);
    });

    dots.click(function() {
        slideIndex = $(this).data('slide');
        updateSlides();
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 5000);
    });

    showSlides();
});