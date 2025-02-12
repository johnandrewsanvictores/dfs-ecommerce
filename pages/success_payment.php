<?php
$payment_method = $_GET['payment'] ?? 'unknown';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Successful!</h2>
    <p>Payment Method: <?= strtoupper($payment_method) ?></p>
    <p>Thank you for your order.</p>
</body>
</html>

