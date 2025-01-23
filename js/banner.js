$(document).ready(function() {
    let slideIndex = 0;
    const slides = $('.sliders .slides');
    let slideTimeout;

    function showSlides() {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        const slideWidth = slides.eq(0).width();
        $('.sliders').css({
            'transform': `translateX(-${slideIndex * slideWidth}px)`
        });
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 6000); 
    }

    $('#prevBtns').click(function() {
        slideIndex--;
        if (slideIndex < 0) {
            slideIndex = slides.length - 1;
        }
        const slideWidth = slides.eq(0).width();
        $('.sliders').css({
            'transform': `translateX(-${slideIndex * slideWidth}px)`
        });
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 5000); 
    });

    $('#nextBtns').click(function() {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        const slideWidth = slides.eq(0).width();
        $('.sliders').css({
            'transform': `translateX(-${slideIndex * slideWidth}px)`
        });
        clearTimeout(slideTimeout);
        slideTimeout = setTimeout(showSlides, 5000); 
    });

    showSlides(); 
});