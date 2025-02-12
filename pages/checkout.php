<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnectionect" href="https://fonts.googleapis.com">
    <link rel="preconnectionect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../styles/checkout.css">
    <link rel="stylesheet" href="../global.css">
    <title>DFS - Checkout</title>
</head>

<body>
    <?php include '../includes/navbar.php'; ?>

    <form class="checkout-page" id="checkout-form">
        <div class="left-side">
            <h4>Checkout</h4>
            <div class="address-container">
                <h6><span class="name">Rhesty Adormeo</span> | <span class="phone">09123456789</span></h6>
                <div>
                    <p id="address-type">Home</p>
                    <p id="address-details">123 Pearl Drive, Unit 4A, Barangay San Antonio, Pasig City, National Capital Region</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </div>

            <div class="main-content">
                <h6>Item/s</h6>
                <div class="items-container">
                    <div class="item-container">
                        <div class="item-image">
                            <img src="https://m.media-amazon.com/images/I/61RSyB+kbzL._AC_SL1200_.jpg" alt="Product 1">
                        </div>
                        <div class="item-details">
                            <h6>Leather Handbag</h6>
                            <p>₱400.00</p>
                        </div>
                        <p>Quantity: 1</p>
                    </div>
                    <div class="item-container">
                        <div class="item-image">
                            <img src="https://transferit.com.ph/pcimages/5997622/152927057/12/1/EFEFEF/prod.jpg?b=11429348&v=1720481852" alt="Product 1">
                        </div>
                        <div class="item-details">
                            <h6>Canvas Tote Bag</h6>
                            <p>₱399.99</p>
                        </div>
                        <p>Quantity: 1</p>
                    </div>

                    <div class="item-container">
                        <div class="item-image">
                            <img src="https://colehaan.com.ph/cdn/shop/files/BaseTransform1_e0459d22-cc37-4870-a765-598ab27df01d.jpg?v=1722935327&width=1946" alt="Product 1">
                        </div>
                        <div class="item-details">
                            <h6>Nylon Backpack</h6>
                            <p>₱599.99</p>
                        </div>
                        <p>Quantity: 1</p>
                    </div>
                </div>
            </div>

            <div class="payment-container">
                <h6>Select Payment Method</h6>
                <div>
                    <input type="radio" name="payment-method" value="cod" id="cod">
                    <label for="cod">Cash on Delivery</label>
                </div>
                <div>
                    <input type="radio" name="payment-method" value="online-payment" id="online-payment">
                    <label for="online-payment">Online Payment</label>
                </div>
            </div>
        </div>
        </div>

        <div class="right-side">
            <h6>Summary</h6>
            <hr>
            <div>
                <p>Do you have a voucher code?</p>
                <div class="voucher">
                    <input type="text" name="voucher-code" id="voucher-code">
                    <button type="button" id="apply-voucher">Apply</button>
                </div>
            </div>
            <hr>
            <div class="price-summary">
                <div class="subtotal">
                    <p>Subtotal</p>
                    <p id="subtotal-price">₱399.99</p>
                </div>
                <div>
                    <p>Shipping Fee</p>
                    <p id="shipping-fee">₱99.99</p>
                </div>
                <div>
                    <p>Discount</p>
                    <p id="discount">₱-50.00</p>
                </div>
            </div>
            <div class="total-price-container">
                <p>Total</p>
                <p id="total-price">₱50</p>
            </div>
            <hr>
            <div class="checkout-btn-div">
                <button type="submit" class="checkout-btn">Checkout</button>
            </div>
        </div>
    </form>



    <script src="../js/checkout.js"></script>
    <?php include '../includes/footer.php'; ?>
</body>

</html>