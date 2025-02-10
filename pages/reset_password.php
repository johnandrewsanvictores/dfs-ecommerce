<?php

require __DIR__ . '/../includes/connection.php';

$token = $_GET["token"] ?? '';

if (empty($token)) {
    die("Invalid token.");
}

$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM customer WHERE reset_token_hash = :token_hash";
$stmt = $connection->prepare($sql);
$stmt->execute(['token_hash' => $token_hash]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Token not found.");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../global.css">
    <style>
        body {
            background: linear-gradient(to right, rgb(192, 208, 224), #e9ecef);
        }

        .reset-password-page {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .reset-password-container {
            background: linear-gradient(to bottom right, #ffffff, #f0f4f8);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .reset-password-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(233, 30, 99, 0.1);
            border-radius: 12px;
            z-index: 0;
            transition: transform 0.5s ease;
            transform: scale(1.1);
        }

        .reset-password-container:hover::before {
            transform: scale(1.2);
        }

        h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1.5px solid #E0E0E0;
            border-radius: 6px;
            outline: none;
            transition: border-color 0.3s ease;
            font-size: 1rem;
            background: #FAFAFA;
            position: relative;
            z-index: 1;
        }

        .form-group input:focus {
            border-color: #E91E63;
            background: white;
            box-shadow: 0 0 0 4px rgba(233, 30, 99, 0.1);
        }

        .reset-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(to right, #E91E63, #F06292);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 1rem;
            position: relative;
            z-index: 1;
        }

        .reset-btn:hover {
            background: linear-gradient(to right, #D81B60, #E91E63);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }
    </style>
</head>

<body>
    <div class="reset-password-page">
        <div class="reset-password-container">
            <h1>Reset Your Password</h1>
            <form method="post" action="../api/process-reset-password.php">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Repeat Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="reset-btn">Send</button>
            </form>
        </div>
    </div>
</body>

</html>