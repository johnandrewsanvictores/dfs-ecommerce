document.addEventListener('DOMContentLoaded', function() {
    const body = document.querySelector("body");
    const nav = document.querySelector("nav");
    const searchToggle = document.querySelector(".searchToggle");
    const sidebarOpen = document.querySelector(".sidebarOpen");
    const siderbarClose = document.querySelector(".siderbarClose");

    // js code to toggle search box
    searchToggle.addEventListener("click", () => {
        searchToggle.classList.toggle("active");
    });

    // js code to toggle sidebar
    sidebarOpen.addEventListener("click", () => {
        nav.classList.add("active");
    });

    body.addEventListener("click", e => {
        let clickedElm = e.target;
        if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
            nav.classList.remove("active");
        }
    });

    // Navigation links
    const homeLink = document.querySelector('a[href="#"]');
    if (homeLink) {
        homeLink.href = "../index.php";
    }

    // Authentication buttons
    const loginBtn = document.querySelector('#btns-unauthenticated a:first-child');
    if (loginBtn) {
        loginBtn.href = "../pages/login.php";
    }

    const registerBtn = document.querySelector('#register-btn');
    if (registerBtn) {
        registerBtn.href = "../pages/register.php";
    }

    // Update active state for current page
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-links a');

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPage.includes(href.replace('../', ''))) {
            link.classList.add('active');
        }
    });
});

