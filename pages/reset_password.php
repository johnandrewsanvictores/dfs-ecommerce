<?php

require __DIR__ . '/../includes/connection.php';

$token = $_GET["token"] ?? '';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $password_confirmation = $_POST['password_confirmation'] ?? '';

    if ($password !== $password_confirmation) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {
        $token_hash = hash("sha256", $_POST['token']);
        $sql = "SELECT * FROM customer WHERE reset_token_hash = :token_hash";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['token_hash' => $token_hash]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && strtotime($user["reset_token_expires_at"]) > time()) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $update_sql = "UPDATE customer SET password = :password, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = :id";
            $update_stmt = $connection->prepare($update_sql);
            $update_stmt->execute(['password' => $hashed_password, 'id' => $user['id']]);
            $success = "Your password has been reset successfully.";
        } else {
            $error = "Invalid or expired token.";
        }
    }
} else {
    if (empty($token)) {
        $error = "Invalid token.";
    } else {
        $token_hash = hash("sha256", $token);
        $sql = "SELECT * FROM customer WHERE reset_token_hash = :token_hash";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['token_hash' => $token_hash]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $error = "Token not found.";
        } elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
            $error = "Token has expired.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../global.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background: var(--white-bg);
        }

        .container {
            display: flex;
            width: 100%;
        }

        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background: var(--white-bg);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--primary);
        }

        .image-section img {
            max-width: 80%;
            height: auto;
        }

        .error-message,
        .success-message {
            width: 100%;
            max-width: 300px;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            text-align: center;
            font-size: 1rem;
        }

        .error-message {
            background-color: rgba(187, 83, 83, 0.1);
            color: var(--red);
            border: 1px solid var(--red);
        }

        .success-message {
            background-color: rgba(94, 218, 110, 0.1);
            color: var(--green);
            border: 1px solid var(--green);
        }

        h1 {
            font-size: 1.8rem;
            color: var(--font-dark);
            margin-bottom: 1rem;
        }

        p {
            color: var(--font-dark);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 300px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--font-dark);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease;
            font-size: 1rem;
            background: #f9f9f9;
        }

        .form-group input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(223, 14, 142, 0.1);
        }

        .reset-btn {
            width: 100%;
            max-width: 300px;
            padding: 0.8rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.3s ease;
            margin-top: 1rem;
        }

        .reset-btn:hover {
            background: var(--primary-hover-color);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <?php if ($error): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php elseif ($success): ?>
                <div class="success-message"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <h1>Reset Password</h1>
            <p>Please choose your new password</p>
            <form method="post" action="">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="reset-btn">Save New Password</button>
            </form>
        </div>
        <div class="image-section">
            <img src="../assets/images/main/reset-pass.svg" alt="Reset Password Image">
        </div>
    </div>
</body>

</html>