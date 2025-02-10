<?php

require __DIR__ . '/../includes/connection.php';

$email = $_POST["email"] ?? '';

if (empty($email)) {
    echo "Please provide an email address.";
    exit;
}

// Generate a token
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

try {
    // Prepare the SQL statement
    $sql = "UPDATE customer
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE email = ?";

    $stmt = $connection->prepare($sql);
    $stmt->execute([$token_hash, $expiry, $email]);

    if ($stmt->rowCount()) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom("noreply@dream-shop-bags.com", "Dream Shop Bags");
        $mail->addReplyTo("noreply@dream-shop-bags.com", "No Reply"); // Prevent replies
        $mail->clearReplyTos();
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";

        // Styled email body
        $mail->Body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }
                .header {
                    background-color: #E91E63;
                    padding: 20px;
                    text-align: center;
                }
                .header img {
                    max-width: 150px;
                }
                .content {
                    padding: 20px;
                }
                .content h1 {
                    color: #333;
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                .content p {
                    color: #555;
                    font-size: 16px;
                    line-height: 1.5;
                }
                .button {
                    text-decoration: none;
                    display: inline-block;
                    padding: 10px 20px;
                    margin-top: 20px;
                    background-color: #E91E63;
                    color: #ffffff;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }
                .footer {
                    text-align: center;
                    padding: 20px;
                    font-size: 12px;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <img src="https://scontent.fpag2-1.fna.fbcdn.net/v/t39.30808-6/441745939_345696605195797_6265669132903729945_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFUwvOYKpo-qtf0BwgERDGktcFdTxcv-Ku1wV1PFy_4q0KmdPvQSJmjD9wb5EfEsL1mCpDzpToZ2gpuYhUhEgQ7&_nc_ohc=PE553aYyMC4Q7kNvgGikU-u&_nc_oc=AdiXl2FnjO47MSCw7s1nHVWCbPY8VwrzEkuL8bxjDzb49eTZ47fExFr_YMC6h31Uf6Y&_nc_zt=23&_nc_ht=scontent.fpag2-1.fna&_nc_gid=APTUz16oENtL__0GziAklpj&oh=00_AYCl9x7USRcUKPZGnhCOC9Mxf-88d_EaIb3uziLaXSg_sg&oe=67B07F24" style="width: 150px; height: 150px; border-radius: 50%;" alt="Logo">
                </div>

                <div class="content">
                    <h1>Password Reset Request</h1>
                    <p>We received a request to reset your password. Click the button below to reset it:</p>
                    <a href="http://localhost/dfs-ecommerce/pages/reset_password.php?token=' . $token . '" class="button" style="color:#ffffff;">Reset Password</a>
                    <p style="color: #bfbfbf; font-style: italic;">If you did not request a password reset, please ignore this email.</p>
                </div>
                <div class="footer">

                    <p>&copy; ' . date("Y") . ' Dream Shop Bags. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ';

        try {
            $mail->isHTML(true); // Set email format to HTML
            $mail->send();
            echo "Message sent";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with that email address.";
    }
} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}
