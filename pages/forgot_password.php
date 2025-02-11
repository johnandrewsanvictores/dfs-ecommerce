<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .forgot-password-page {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            min-height: 100vh;
            padding: 1rem;
        }

        .forgot-password-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            padding: 3rem;
            text-align: center;
            margin: 0 auto;
        }

        .forgot-password-form h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .forgot-password-form .subtitle {
            font-size: 1rem;
            color: #757575;
            margin-bottom: 2rem;
            line-height: 1.5;
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
            padding: 0.9rem;
            border: 1.5px solid #E0E0E0;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 1rem;
            background: #FAFAFA;
        }

        .form-group input:focus {
            border-color: #E91E63;
            background: white;
            box-shadow: 0 0 0 4px rgba(233, 30, 99, 0.1);
        }

        .reset-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(to right, #E91E63, #F06292);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .reset-btn:hover {
            background: linear-gradient(to right, #D81B60, #E91E63);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }

        .back-to-login {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #666;
        }

        .back-to-login a {
            color: #E91E63;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-to-login a:hover {
            color: #D81B60;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .forgot-password-container {
                padding: 2rem;
            }

            .forgot-password-form h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .forgot-password-container {
                padding: 1.5rem;
            }

            .forgot-password-form h2 {
                font-size: 1.5rem;
            }
        }

        .error-message,
        .success-dialog,
        .loading-message {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            padding: 1rem 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            z-index: 1000;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        .error-message {
            background-color: #FFF3F3;
            color: #E91E63;
            border: 1px solid rgba(233, 30, 99, 0.2);
        }

        .success-dialog {
            background-color: #E8F5E9;
            color: #388E3C;
            border: 1px solid rgba(56, 142, 60, 0.2);
        }

        .loading-message {
            margin-top: 1rem;
            color: #1976D2;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .loading-message i {
            margin-right: 0.5rem;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .countdown {
            margin-top: 1rem;
            color: #E91E63;
            font-size: 0.9rem;
            display: none;
        }
    </style>
</head>

<body>
    <div class="forgot-password-page">
        <div class="forgot-password-container">
            <div class="forgot-password-form">
                <h2>Reset Your Password</h2>
                <p class="subtitle">Enter your email address below and we'll send you a link to reset your password.</p>
                <div id="error-message" class="error-message" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="error-text"></span>
                </div>
                <form id="forgotPasswordForm" action="javascript:void(0);" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <button type="submit" class="reset-btn" id="sendButton">Send Reset Link</button>
                    <div id="loading-message" class="loading-message" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i> Sending email...
                    </div>
                    <div id="countdown" class="countdown"></div>
                </form>
                <div id="success-dialog" class="success-dialog" style="display: none;">
                    <i class="fas fa-check-circle"></i>
                    <p>Password reset link sent successfully! Please check your email.</p>
                </div>
                <div class="back-to-login">
                    <p>Remembered your password? <a href="login.php">Back to Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', function() {
            const email = document.getElementById('email').value;
            const errorMessage = document.getElementById('error-message');
            const successDialog = document.getElementById('success-dialog');
            const loadingMessage = document.getElementById('loading-message');
            const countdownDisplay = document.getElementById('countdown');
            const sendButton = document.getElementById('sendButton');
            const errorText = document.getElementById('error-text');

            errorMessage.style.display = 'none';
            successDialog.style.display = 'none';
            loadingMessage.style.display = 'flex';
            sendButton.disabled = true;
            let countdown = 30;

            fetch('../api/send_password_reset.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `email=${encodeURIComponent(email)}`,
                })
                .then(response => response.text())
                .then(data => {
                    loadingMessage.style.display = 'none';
                    if (data.includes('Message sent')) {
                        successDialog.style.display = 'block';
                        startCountdown();
                        autoHide(successDialog);
                    } else {
                        errorText.textContent = data;
                        errorMessage.style.display = 'block';
                        sendButton.disabled = false;
                        autoHide(errorMessage);
                    }
                })
                .catch(error => {
                    loadingMessage.style.display = 'none';
                    errorText.textContent = 'An error occurred. Please try again later.';
                    errorMessage.style.display = 'block';
                    sendButton.disabled = false;
                    autoHide(errorMessage);
                });

            function startCountdown() {
                countdownDisplay.style.display = 'block';
                countdownDisplay.textContent = `You can request another link in ${countdown} seconds.`;
                const interval = setInterval(() => {
                    countdown--;
                    countdownDisplay.textContent = `You can request another link in ${countdown} seconds.`;
                    if (countdown <= 0) {
                        clearInterval(interval);
                        countdownDisplay.style.display = 'none';
                        sendButton.disabled = false;
                    }
                }, 1000);
            }

            function autoHide(element) {
                setTimeout(() => {
                    element.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>