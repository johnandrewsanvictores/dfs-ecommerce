<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../styles/filter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/banner.js"></script>
    <script src="../js/filter.js"></script>
    <title>Dreams Shop Bags - Home</title>
</head>

<body>

<header>

<?php require("../includes/navbar.php") ?>

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
            <img src="../assets/images/main/temp/img1.jpg" alt="Image 1" class="img1">
            <div class="img-overlay">
                <p>New Collection</p>
            </div>
        </div>
        <div class="img-container">
            <img src="../assets/images/main/temp/img2.jpg" alt="Image 2" class="img2">
            <div class="img-overlay">
                <p>Best Sellers</p>
            </div>
        </div>
    </div>
</section>

<section id="banner">
    <div class="banner-container">
        <div class="slider-wrappers">
            <button id="prevBtns" class="banner-btn">&#8249;</button>
            <div class="slider-containers">
                <div class="sliders">
                    <div class="slides">
                        <img src="../assets/images/main/temp/b1.jpg" alt="Image 1">
                        <div class="slide-caption">
                            <h3>Slide 1 Title</h3>
                            <p>Slide 1 Description</p>
                        </div>
                    </div>
                    <div class="slides">
                        <img src="../assets/images/main/temp/b2.jpg" alt="Image 2">
                        <div class="slide-caption">
                            <h3>Slide 2 Title</h3>
                            <p>Slide 2 Description</p>
                        </div>
                    </div>
                    <div class="slides">
                        <img src="../assets/images/main/temp/b3.jpg" alt="Image 3">
                        <div class="slide-caption">
                            <h3>Slide 3 Title</h3>
                            <p>Slide 3 Description</p>
                        </div>
                    </div>
                    <div class="slides">
                        <img src="../assets/images/main/temp/b4.jpg" alt="Image 4">
                        <div class="slide-caption">
                            <h3>Slide 4 Title</h3>
                            <p>Slide 4 Description</p>
                        </div>
                    </div>
                </div>
            </div>
            <button id="nextBtns" class="banner-btn">&#8250;</button>
        </div>
        <div class="dots-container">
            <span class="dot" data-slide="0"></span>
            <span class="dot" data-slide="1"></span>
            <span class="dot" data-slide="2"></span>
            <span class="dot" data-slide="3"></span>
        </div>
    </div>
</section>

<section id="brands">
    <h2 class="section-title">Brands</h2>
    <div class="brand-list">
        <div class="card">
            <img src="path/to/brand1.jpg" alt="Brand 1" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 1</h5>
            </div>
        </div>
        <div class="card">
            <img src="path/to/brand2.jpg" alt="Brand 2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 2</h5>
            </div>
        </div>
        <div class="card">
            <img src="path/to/brand3.jpg" alt="Brand 3" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 3</h5>
            </div>
        </div>
        <div class="card">
            <img src="path/to/brand4.jpg" alt="Brand 4" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Brand 4</h5>
            </div>
        </div>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 1</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 2</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 3</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 4</h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category 5</h5>
            </div>
        </div>
    </div>
</section>

<section id="filter">
    <h2 class="section-title">Filter Products</h2>
    <form id="filter-form">
        <label for="sort-by">Sort by:</label>
        <select id="sort-by" name="sort-by">
            <option value="default">Default</option>
            <option value="discounted">Discounted</option>
            <option value="new-arrival">New Arrival</option>
            <option value="popular">Popular</option>
        </select>
        <label for="price-min">Price range:</label>
        <input type="number" id="price-min" name="price-min" placeholder="Min" min="0">
        <input type="number" id="price-max" name="price-max" placeholder="Max" min="0">
        <button type="button" id="apply-filters">Apply</button>
    </form>
</section>

<section id="products">
    <h2 class="section-title">Products</h2>
    <div class="product-list" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <div class="card" data-category="discounted" data-price="10" style="flex: 1 1 calc(20% - 20px); box-sizing: border-box;">
            <a href="pdetail.php?id=1">
                <div class="card-body">
                    <h5 class="card-title">Product 1</h5>
                    <img src="../assets/images/products/product1.jpg" alt="Product 1" class="card-img-top">
                    <p class="card-text">Description of Product 1</p>
                    <p class="card-price">$10.00</p>
                </div>
            </a>
        </div>
        <div class="card" data-category="new-arrival" data-price="20" style="flex: 1 1 calc(20% - 20px); box-sizing: border-box;">
            <a href="pdetail.php?id=2">
                <div class="card-body">
                    <h5 class="card-title">Product 2</h5>
                    <img src="../assets/images/products/product2.jpg" alt="Product 2" class="card-img-top">
                    <p class="card-text">Description of Product 2</p>
                    <p class="card-price">$20.00</p>
                </div>
            </a>
        </div>
        <div class="card" data-category="popular" data-price="30" style="flex: 1 1 calc(20% - 20px); box-sizing: border-box;">
            <a href="pdetail.php?id=3">
                <div class="card-body">
                    <h5 class="card-title">Product 3</h5>
                    <img src="../assets/images/products/product3.jpg" alt="Product 3" class="card-img-top">
                    <p class="card-text">Description of Product 3</p>
                    <p class="card-price">$30.00</p>
                </div>
            </a>
        </div>
        <div class="card" data-category="discounted" data-price="40" style="flex: 1 1 calc(20% - 20px); box-sizing: border-box;">
            <a href="pdetail.php?id=4">
                <div class="card-body">
                    <h5 class="card-title">Product 4</h5>
                    <img src="../assets/images/products/product4.jpg" alt="Product 4" class="card-img-top">
                    <p class="card-text">Description of Product 4</p>
                    <p class="card-price">$40.00</p>
                </div>
            </a>
        </div>
        <div class="card" data-category="new-arrival" data-price="50" style="flex: 1 1 calc(20% - 20px); box-sizing: border-box;">
            <a href="pdetail.php?id=5">
                <div class="card-body">
                    <h5 class="card-title">Product 5</h5>
                    <img src="../assets/images/products/product5.jpg" alt="Product 5" class="card-img-top">
                    <p class="card-text">Description of Product 5</p>
                    <p class="card-price">$50.00</p>
                </div>
            </a>
        </div>
    </div>
</section>

<footer>
<?php require("../includes/footer.php") ?>
</footer>
</body>
</html>





