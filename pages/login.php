<?php
session_start();
require_once('../includes/connection.php');

$error_message = '';
$username = '';

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        try {
            // Check if username is email or username
            $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            // First check staff_acc table
            $sql = "SELECT *, 'staff' as user_type FROM staff_acc WHERE $field = :username AND status = 'active'";
            $stmt = $connection->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // If not found in staff_acc, check customer table
            if (!$user) {
                $sql = "SELECT *, 'customer' as user_type FROM customer WHERE $field = :username";
                $stmt = $connection->prepare($sql);
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            if ($user) {
                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    if ($user['user_type'] === 'staff') {
                        $_SESSION['staff_id'] = $user['staff_id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['role'] = $user['role'];

                        // Update last login for staff
                        $update_sql = "UPDATE staff_acc SET last_login = CURRENT_TIMESTAMP WHERE staff_id = :staff_id";
                        $update_stmt = $connection->prepare($update_sql);
                        $update_stmt->execute(['staff_id' => $user['staff_id']]);

                        // Redirect staff based on environment
                        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
                            header('Location: ../../dfs-store-ms/');
                        } else {
                            header('Location: https://www.yourdomain.com/');
                        }
                    } else {
                        // Set customer session variables
                        $_SESSION['customer_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['user_type'] = 'customer';

                        // Redirect customer to home page
                        header('Location: ./home.php');
                    }
                    exit();
                } else {
                    $error_message = "Invalid password. Please try again.";
                }
            } else {
                $error_message = "Account not found.";
            }
        } catch (PDOException $e) {
            $error_message = "An error occurred. Please try again later.";
            // For debugging:
            // error_log("Login error: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Fashion Shop - Login</title>
    <link rel="preconnectionect" href="https://fonts.googleapis.com">
    <link rel="preconnectionect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
    <?php require("../includes/navbar.php") ?>

    <div class="login-page">
        <div class="login-left">
            <div class="login-text">
                <h1>Welcome to Dreams Fashion Bags!</h1>
                <p class="subtitle">Sign in to explore our exclusive collection of premium bags and enjoy personalized shopping experience</p>
            </div>
            <div class="illustration-container">
                <img src="../assets/images/main/signinn.svg" alt="Shopping Illustration">
            </div>
        </div>
        <div class="login-container">
            <div class="login-form">
                <h2>Sign In to Your Account</h2>
                <?php if ($error_message): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username or Email</label>
                        <input type="text" id="username" name="username" required
                            placeholder="Enter your username or email"
                            value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" required
                                placeholder="Enter your password">
                            <i class="fas fa-eye-slash toggle-password"></i>
                        </div>
                    </div>
                    <button type="submit" class="login-btn">Sign In</button>
                    <div class="form-footer">
                        <a href="forgot_password.php">Forgot Your Password?</a>
                        <p class="register-link">New to Dreams Fashion Bags? <a href="register.php">Create an account</a></p>
                    </div>
                </form>
                <div class="login-benefits">
                    <p>Sign in to:</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Access exclusive deals and offers</li>
                        <li><i class="fas fa-check"></i> Track your orders easily</li>
                        <li><i class="fas fa-check"></i> Save your favorite items</li>
                        <li><i class="fas fa-check"></i> Faster checkout experience</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
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