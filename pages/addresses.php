<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Dreams Shop Bags - Addresses</title>
    <link rel="stylesheet" href="../styles/myaccount.css">
</head>
<body>
    <header>
        <?php require("../includes/navbar.php") ?>
    </header>

    <div class="container">
        <div class="flex-container">
            <div class="side-nav">
                <h6>My Account</h6>
                <ul>
                    <li><a href="#">Orders</a></li>
                    <li class="active"><a href="#">Addresses</a></li>
                    <li><a href="#">Account Details</a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
            </div>

            <main class="main-content">
                <h3>Addresses</h3>
                <div id="btns-unauthenticated">
                        <a href="#">New</a>
                </div>
                <p>Your addresses will be displayed here.</p>
            </main>
        </div>
    </div>

    <footer>
        <?php require("../includes/footer.php") ?>
    </footer>
    
    <style>
        #btns-unauthenticated a {
        text-decoration: none;
        color: inherit;
        background-color: var(--primary);
        padding: 0.75em 1.5em;
        color: var(--font-white);
        border-radius: 10px;
        font-size: var(--small);
        display: flex;
        justify-content: center;
        align-items: center;
    }

</body>
</html>