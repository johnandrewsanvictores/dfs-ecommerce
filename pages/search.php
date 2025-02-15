<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../global.css">
    <title>Search Results</title>
</head>

<body>

<header>
    <?php require("../includes/navbar.php") ?>
</header>

<section id="products">
    <?php
    $keyword = strtolower($_GET['keyword']);
    $count = 0;
    for ($i = 1; $i <= 54; $i++):
        $productName = strtolower("Product $i");
        $productDescription = strtolower("Description of Product $i");
        if (strpos($productName, $keyword) !== false || strpos($productDescription, $keyword) !== false) {
            $count++;
        }
    endfor;
    ?>
    <h2 class="section-title">Search Results (<?= $count ?>)</h2>
    <div class="product-list">
        <?php
        for ($i = 1; $i <= 54; $i++):
            $productName = strtolower("Product $i");
            $productDescription = strtolower("Description of Product $i");
            if (strpos($productName, $keyword) !== false || strpos($productDescription, $keyword) !== false):
        ?>
        <div class="card" data-keyword="<?= $keyword ?>">
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
