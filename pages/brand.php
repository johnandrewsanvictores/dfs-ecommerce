<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../global.css">
    <title>Brand Products</title>
</head>

<body>

<header>
    <?php require("../includes/navbar.php") ?>
</header>

<section id="products">
    <h2 class="section-title">Products</h2>
    <div class="product-list">
        <?php
        $brand = $_GET['brand'];
        for ($i = 1; $i <= 54; $i++):
            if ($i % 5 == $brand):
        ?>
        <div class="card" data-brand="brand<?= $brand ?>">
            <a href="pdetail.php?id=<?= $i ?>">
                <div class="card-body">
                    <img src="https://th.bing.com/th/id/OIP.hxBIBXxepLAqV6kXWeBisgHaHa?w=171&h=180&c=7&r=0&o=5&pid=1.7<?= $i ?>" alt="Product <?= $i ?>" class="card-img-top">
                    <h5 class="card-title">Product <?= $i ?></h5>
                    <p class="card-text">Description of Product <?= $i ?></p>
                    <p class="card-price">$<?= $i * 10 ?>.00</p>
                </div>
            </a>
        </div>
        <?php
            endif;
        endfor;
        ?>
    </div>
</section>

<footer>
    <?php require("../includes/footer.php") ?>
</footer>

</body>
</html>
