<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Customer Service</h3>
            <ul>
                <li><a href="#">Refund & Return</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <h3>Policy</h3>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Return & Refund Policy</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Payment</h3>
            <ul>
                <li><a href="#">E-wallet</a></li>
                <li><a href="#">GCash</a></li>
                <li><a href="#">Maya</a></li>
            </ul>
            <h3>Online Banking</h3>
            <ul>
                <li><a href="#">BDO</a></li>
                <li><a href="#">Metro Bank</a></li>
                <li><a href="#">Land Bank</a></li>
                <li><a href="#">BPI</a></li>
                <li><a href="#">UBP</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Logistics</h3>
            <img src="../assets/images/main/j&t.png" alt="J&T">
        </div>
        <div class="footer-section">
            <h3>Social Media</h3>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Dreams Fashion Shop. All Rights Reserved. Site created by Adormoo's Team</p>
    </div>
</footer>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        font-family: Arial, sans-serif;
        text-align: center;
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
        text-align: center;
    }

    .footer-section h3 {
        margin-bottom: 15px;
        font-size: 18px;
        color: #fff;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
    }

    .footer-section ul li {
        margin-bottom: 10px;
    }

    .footer-section ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
    }

    .footer-section ul li a:hover {
        text-decoration: underline;
    }

    .footer-section img {
        max-width: 100px;
        margin-top: 10px;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .social-icons a {
        color: #fff;
        font-size: 18px;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: var(--primary);
    }

    .footer-bottom {
        text-align: center;
        padding: 10px;
        border-top: 1px solid #444;
        margin-top: 20px;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 14px;
        color: #fff;
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-section {
            text-align: center;
        }
    }
</style>