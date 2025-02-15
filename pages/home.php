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
    <script src="../js/totop.js"></script>
    <script src="../js/pagination.js"></script>
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
        <a href="#filter" class="shopbtn">Shop Now!</a>
    </div>
    <div class="HeroImg">
        <div class="img-container">
            <img src="../assets/images/main/temp/img1.jpg" alt="Image 1" class="img1">
            <div class="img-overlay">
                <p>New Arrival</p>
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
    <div class="banner-container" >
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
            <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7" alt="Louis Vuitton" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Louis Vuitton</h5>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7" alt="Gucci" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Gucci</h5>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7" alt="Chanel" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Chanel</h5>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7" alt="Hermès" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Hermès</h5>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7" alt="Prada" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Prada</h5>
            </div>
        </div>
    </div>
</section>

<section id="categories">
    <h2 class="section-title">Categories</h2>
    <div class="category-list">
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
            <option value="best-seller">Best Seller</option>
        </select>

        <div id="price-range-section" class="hidden">
            <label for="price-min">Price range:</label>
            <input type="number" id="price-min" name="price-min" placeholder="Min" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <input type="number" id="price-max" name="price-max" placeholder="Max" min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div>
        <button type="button" id="show-price-range">Price Range</button>
        <button type="button" id="apply-filters">Apply</button>
    </form>
</section>

<section id="products">
    <h2 class="section-title">Products</h2>
    <div class="product-list">
        <?php for ($i = 1; $i <= 54; $i++): ?>
        <div class="card" data-category="category<?= $i % 5 + 1 ?>" data-price="<?= $i * 10 ?>" data-sort="<?= ($i % 4 == 0) ? 'discounted' : (($i % 4 == 1) ? 'new-arrival' : (($i % 4 == 2) ? 'best-seller' : 'default')) ?>">
            <a href="pdetail.php?id=<?= $i ?>">
                <div class="card-body">
                    <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7<?= $i ?>" alt="Product <?= $i ?>" class="card-img-top">
                    <h5 class="card-title">Product <?= $i ?></h5>
                    <p class="card-text">Description of Product <?= $i ?></p>
                    <p class="card-price">$<?= $i * 10 ?>.00</p>
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>
    
    <div class="pagination-container">
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
</section>

<footer>
<?php require("../includes/footer.php") ?>
</footer>

<button id="scrollToTopBtn" title="Go to top">&#8679;</button>

</body>
</html>





