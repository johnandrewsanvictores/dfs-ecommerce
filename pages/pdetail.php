<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/pdetail.css">
    <link rel="stylesheet" href="../global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Product Detail</title>
</head>

<body>

<header>
    <?php require("../includes/navbar.php") ?>
</header>

<section id="product-detail">
    <a href="javascript:history.back()" class="back-arrow"><i class="fa fa-arrow-left"></i></a>
    <?php
    $productId = $_GET['id'];

    $product = [
        'title' => 'Product ' . $productId,
        'image' => 'path/to/image' . $productId . '.jpg',
        'description' => 'Description of Product ' . $productId,
        'price' => '$' . (10 * $productId) . '.00'
    ];
    ?>
    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
        </div>
        <div class="product-details">
            <h1><?php echo $product['title']; ?></h1>
            <div class="ratings">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <i class="fa fa-star"></i>
                <?php endfor; ?>
            </div>
            <div class="reviews">
                <p>4.5 out of 5 stars (20 reviews)</p>
            </div>
            <p><?php echo $product['description']; ?></p>
            <p class="product-price"><?php echo $product['price']; ?></p>
            <button class="add-to-cart">Add to Cart</button>
        </div>
    </div>
</section>

<section class="comments">
    <h2>Comments</h2>
    <div class="comment-list">
        <div class="card comment-card">
            <div class="card-body">
                <p><strong>User 1:</strong> Great product!</p>
            </div>
        </div>
        <div class="card comment-card">
            <div class="card-body">
                <p><strong>User 2:</strong> I love it!</p>
            </div>
        </div>
    </div>
    <form class="comment-form">
        <textarea placeholder="Add a comment..." required></textarea>
        <button type="submit">Submit</button>
    </form>
</section>

<section class="related-products">
    <h2>Related Products</h2>
    <div class="product-list">
        <div class="card">
            <a href="pdetail.php?id=1">
                <div class="card-body">
                    <h5 class="card-title">Related Product 1</h5>
                    <img src="path/to/related1.jpg" alt="Related Product 1" class="card-img-top">
                    <p class="card-text">Short description of related product 1.</p>
                    <p class="card-price">$20.00</p>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="pdetail.php?id=2">
                <div class="card-body">
                    <h5 class="card-title">Related Product 2</h5>
                    <img src="path/to/related2.jpg" alt="Related Product 2" class="card-img-top">
                    <p class="card-text">Short description of related product 2.</p>
                    <p class="card-price">$25.00</p>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="pdetail.php?id=3">
                <div class="card-body">
                    <h5 class="card-title">Related Product 3</h5>
                    <img src="path/to/related3.jpg" alt="Related Product 3" class="card-img-top">
                    <p class="card-text">Short description of related product 3.</p>
                    <p class="card-price">$30.00</p>
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
