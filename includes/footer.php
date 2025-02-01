<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h6>Help Center</h6>
            <ul>
                <li><a href="#">Shipping Information</a></li>
                <li><a href="#">Returns & Exchange</a></li>
                <li><a href="#">Order Tracking</a></li>
                <li><a href="#">Size Guide</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h6>Shop</h6>
            <ul>
                <li><a href="#">Handbags</a></li>
                <li><a href="#">Backpacks</a></li>
                <li><a href="#">Shoulder Bags</a></li>
                <li><a href="#">Tote Bags</a></li>
                <li><a href="#">Travel Bags</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h6>About Us</h6>
            <ul>
                <li><a href="#">Our Story</a></li>
                <li><a href="#">Store Locations</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h6>Payment Methods</h6>
            <ul>
                <li><a href="#">GCash</a></li>
                <li><a href="#">Maya</a></li>
                <li><a href="#">Bank Transfer</a></li>
                <li><a href="#">Cash on Delivery</a></li>
            </ul>
            <h6>Connect With Us</h6>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Dreams Fashion Shop. All Rights Reserved.</p>
    </div>
</footer>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    footer {
        background-color: var(--dark-bg);
        color: var(--font-white);
    }

    .footer-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-section {
        margin: 10px;
        flex: 1;
        min-width: 200px;
        display: flex;
        flex-direction: column;
    }

    .footer-section h6 {
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
        padding-bottom: 5px;
    }

    .footer-section h6::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: var(--primary);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .footer-section h6:hover::after {
        transform: scaleX(1);
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 10px;
    }

    .footer-section ul li a {
        text-decoration: none;
        font-size: var(--small);
        color: inherit;
        position: relative;
        display: inline-block;
        padding: 2px 0;
        transition: all 0.3s ease;
    }

    .footer-section ul li a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 1px;
        bottom: 0;
        left: 0;
        background-color: var(--primary);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .footer-section ul li a:hover {
        color: var(--primary);
        transform: translateX(5px);
    }

    .footer-section ul li a:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .footer-section img {
        max-width: 100px;
        margin-top: 10px;
    }

    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: -5px;
    }

    .social-icons a {
        font-size: 18px;
        color: inherit;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .social-icons a:hover {
        color: var(--font-white);
        transform: translateY(-3px);
    }

    .social-icons a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: var(--primary);
        border-radius: 50%;
        transform: scale(0);
        transition: transform 0.3s ease;
        z-index: -1;
    }

    .social-icons a:hover::before {
        transform: scale(1);
    }

    .footer-bottom {
        text-align: center;
        padding: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 20px;
        background: rgba(0, 0, 0, 0.2);
    }

    .footer-bottom p {
        margin: 0;
        font-size: var(--small);
        color: inherit;
        transition: color 0.3s ease;
    }

    @media (max-width: 768px) {
        .footer-container {

            flex-direction: column;
            padding: 15px;
        }

        .footer-section {
            margin: 15px 0;
        }

        .footer-section h6::after {
            left: 50%;
            transform: translateX(-50%) scaleX(0);
        }

        .footer-section h6:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .footer-section ul li a:hover {
            transform: translateX(0) scale(1.05);
        }

    }
</style>
</style>