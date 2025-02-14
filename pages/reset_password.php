<?php

require __DIR__ . '/../includes/connection.php';

$token = $_GET["token"] ?? '';
$error_message = '';

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and process the form submission
    if (strlen($_POST["password"]) < 8) {
        $error_message = "Password must be at least 8 characters.";
    } elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
        $error_message = "Password must contain at least one letter.";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $error_message = "Password must contain at least one number.";
    } elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $error_message = "Passwords must match.";
    } else {
        // Update password in the database
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "UPDATE customer
                SET password = :password_hash,
                    reset_token_hash = NULL,
                    reset_token_expires_at = NULL
                WHERE id = :user_id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user["id"], PDO::PARAM_INT);
        $stmt->execute();

        // Redirect to success page
        header("Location: password_reset_success.php");
        exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        .container {
            display: flex;
            width: 100%;
            height: 100vh;
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

        h4 {
            margin-bottom: 1rem;
        }

        p {
            color: var(--font-dark);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .error-message {
            background-color: #FFF3F3;
            color: #E91E63;
            padding: 1rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            border: 1px solid rgba(233, 30, 99, 0.1);
            box-shadow: 0 2px 8px rgba(233, 30, 99, 0.08);
            animation: fadeIn 0.5s ease-in-out;
        }

        .error-message i {
            margin-right: 0.75rem;
            font-size: 1rem;
            color: #D81B60;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 1.5rem;
            width: 100%;
            text-align: left;
            position: relative;
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

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9E9E9E;
            transition: color 0.3s ease;
            padding: 4px;
        }

        .toggle-password:hover {
            color: #E91E63;
        }

        .password-input {
            position: relative;
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

        form {
            width: 100%;
            max-width: 30em;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .image-section {
                flex: 1;
                height: 150px;
            }

            .form-section {
                flex: 2;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <h4>Reset Password</h4>
            <p>Please choose your new password</p>
            <?php if ($error_message): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" required autocomplete="new-password">
                        <i class="fas fa-eye-slash toggle-password"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="password-input">
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                        <i class="fas fa-eye-slash toggle-password"></i>
                    </div>
                </div>

                <button type="submit" class="reset-btn">Save New Password</button>
            </form>
        </div>
        <div class="image-section">
            <img src="../assets/images/main/reset-pass.svg" alt="Reset Password Image">
        </div>
    </div>

    <script>
        // Add password toggle functionality
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
</body>

</html>