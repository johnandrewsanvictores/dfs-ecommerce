<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/banner.js"></script>
    <title>Dreams Shop Bags - Home</title>
</head>

<body>
<header>
<div class="navbar">
        <div class="logo">
            <img src="../styles/logo.png" alt="Business Logo">
            <span>Dreams Shop Bags</span>
        </div>

        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <a href="#">My Account</a>
        </div>

        <div class="icons">
            <i class="cart-icon"><img src="../styles/shopping-cart.png"></i>
            <i class="search-icon"><img src="../styles/magnifying-glass.png"></i>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <select>
                <option value="all">All</option>
                <option value="bags">Bags</option>
                <option value="accessories">Accessories</option>
            </select>
        </div>
    </div>
</header>

<section class="hero">
    <div class="HeroDescript">
        <h1>DREAMS SHOP BAGS</h1>
        <p>Luxury bags at great prices. Exclusive offers available.</p>
        <ul>
            <li>High-quality materials</li>
            <li>Exclusive designs</li>
            <li>Affordable prices</li>
            <li>Fast shipping</li>
        </ul>
        <a href="#products" class="shopbtn">Shop Now!</a>
    </div>
    <div class="HeroImg">
        <div class="img-container">
            <img src="../styles/img1.jpg" alt="Image 1" class="img1">
            <div class="img-overlay">
                <p>New Collection</p>
            </div>
        </div>
        <div class="img-container">
            <img src="../styles/img2.jpg" alt="Image 2" class="img2">
            <div class="img-overlay">
                <p>Best Sellers</p>
            </div>
        </div>
    </div>
</section>

<section id="banner">
        <div class="slider-wrappers">
            <button id="prevBtns">&#8249;</button>
            <div class="slider-containers">
                <div class="sliders">
                    <div class="slides">
                        <img src="../styles/b1.jpg" alt="Image 1">
                    </div>
                    <div class="slides">
                        <img src="../styles/b2.jpg" alt="Image 2">
                    </div>
                    <div class="slides">
                        <img src="../styles/b3.jpg" alt="Image 3">
                    </div>
                    <div class="slides">
                        <img src="../styles/b4.jpg" alt="Image 4">
                    </div>
                </div>
            </div>
            <button id="nextBtns">&#8250;</button>
        </div>
</section>


<section id="brands">
    <h2 class="section-title">Brands</h2>
    <div class="brand-list">
        <!-- Brand Card 1 -->
        <div class="card">
            <img src="path/to/brand1.jpg" alt="Brand 1" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 1</h5>
            </div>
        </div>
        <!-- Brand Card 2 -->
        <div class="card">
            <img src="path/to/brand2.jpg" alt="Brand 2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 2</h5>
            </div>
        </div>
        <!-- Brand Card 3 -->
        <div class="card">
            <img src="path/to/brand3.jpg" alt="Brand 3" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 3</h5>
            </div>
        </div>
        <!-- Brand Card 4 -->
        <div class="card">
            <img src="path/to/brand4.jpg" alt="Brand 4" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 4</h5>
            </div>
        </div>
        <!-- Brand Card 5 -->
        <div class="card">
            <img src="path/to/brand5.jpg" alt="Brand 5" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 5</h5>
            </div>
        </div>
    </div>
</section>

<section id="categories">
    <h2 class="section-title">Categories</h2>
    <div class="category-list" style="display: flex; flex-wrap: wrap;">
        <!-- Category Card 1 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 1</h5>
            </div>
        </div>
        <!-- Category Card 2 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 2</h5>
            </div>
        </div>
        <!-- Category Card 3 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 3</h5>
            </div>
        </div>
        <!-- Category Card 4 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 4</h5>
            </div>
        </div>
        <!-- Category Card 5 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 5</h5>
            </div>
        </div>
    </div>
</section>

<section id="products">
    <h2 class="section-title">Products</h2>
    <div class="product-list">
        <!-- Product Card 1 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product 1</h5>
                <img src="path/to/image1.jpg" alt="Product 1" class="card-img-top">
                <p class="card-text">Description of Product 1</p>
                <p class="card-price">$10.00</p>
            </div>
        </div>
        <!-- Product Card 2 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product 2</h5>
                <img src="path/to/image2.jpg" alt="Product 2" class="card-img-top">
                <p class="card-text">Description of Product 2</p>
                <p class="card-price">$20.00</p>
            </div>
        </div>
        <!-- Product Card 3 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product 3</h5>
                <img src="path/to/image3.jpg" alt="Product 3" class="card-img-top">
                <p class="card-text">Description of Product 3</p>
                <p class="card-price">$30.00</p>
            </div>
        </div>
        <!-- Product Card 4 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product 4</h5>
                <img src="path/to/image4.jpg" alt="Product 4" class="card-img-top">
                <p class="card-text">Description of Product 4</p>
                <p class="card-price">$40.00</p>
            </div>
        </div>
        <!-- Product Card 5 -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product 5</h5>
                <img src="path/to/image5.jpg" alt="Product 5" class="card-img-top">
                <p class="card-text">Description of Product 5</p>
                <p class="card-price">$50.00</p>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2025 Dreams Shop Bags. All rights reserved.</p>
    <div class="links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Contact Us</a>
    </div>
</footer>
</body>

</html>





