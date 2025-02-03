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
    <?php
    $productId = $_GET['id'];
    // Fetch product details from the database using $productId
    // For demonstration, using static data
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
            <p><?php echo $product['description']; ?></p>
            <p class="product-price"><?php echo $product['price']; ?></p>
            <button class="add-to-cart">Add to Cart</button>
        </div>
    </div>
</section>

<footer>
    <?php require("../includes/footer.php") ?>
</footer>
</body>

</html>
