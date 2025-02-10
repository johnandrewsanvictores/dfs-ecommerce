<?php

$pdo = require __DIR__ . "/../includes/connection.php"; // Assuming this returns a PDO instance

if (!$pdo instanceof PDO) {
    die("Database connection failed.");
}

$token = $_POST["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM customer WHERE reset_token_hash = :token_hash";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':token_hash', $token_hash, PDO::PARAM_STR);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE customer
        SET password = :password_hash,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
            
        WHERE id = :user_id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $user["id"], PDO::PARAM_INT);
$stmt->execute();

echo "Password updated. You can now login.";
