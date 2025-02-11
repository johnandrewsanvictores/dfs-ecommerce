$(document).ready(function() {
    var mybutton = document.getElementById("scrollToTopBtn");

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    mybutton.onclick = function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.querySelector('.shopbtn').addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector('#filter').scrollIntoView({ behavior: 'smooth' });
    });
}
);