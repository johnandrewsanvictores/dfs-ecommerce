<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Fashion Shop - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
    <?php require("../includes/navbar.php") ?>

    <div class="login-page">
        <div class="login-container">
            <div class="login-left">
                <div class="text-content">
                    <h1>Welcome Back!</h1>
                    <p>Sign in to continue your fashion journey</p>
                </div>
                <div class="illustration">
                    <img src="../assets/images/main/login.svg" alt="Login Illustration">
                </div>
            </div>
            <div class="login-right">
                <div class="login-form-container">
                    <h2>Sign In</h2>
                    <form action="login_process.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-input">
                                <input type="password" id="password" name="password">
                                <i class="fas fa-eye-slash toggle-password"></i>
                            </div>
                        </div>
                        <div class="form-options">
                            <div class="remember-me">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                        </div>
                        <button type="submit" class="login-btn">Sign In</button>
                    </form>
                    <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>