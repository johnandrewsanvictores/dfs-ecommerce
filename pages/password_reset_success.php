<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Successful</title>
    <link rel="stylesheet" href="../global.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Libre Baskerville", sans-serif;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            max-width: 600px;
            text-align: center;
            z-index: 1;
            animation: fadeIn 1.5s cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        .form-section {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 450px;
            width: 100%;
        }

        h4 {
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-size: var(--h4);
            animation: slideIn 1s cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        p {
            color: var(--font-dark);
            font-size: var(--body);
            margin-bottom: 2rem;
            animation: slideIn 1s cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--primary-hover-color);
        }

        .artistic-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('../assets/images/main/bgbg.jpg') no-repeat center center;
            background-size: cover;
            z-index: 0;
            opacity: 0.3;
            animation: backgroundMove 15s linear infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 100% 100%;
            }
        }
    </style>
</head>

<body>
    <div class="artistic-background"></div>
    <div class="container">
        <div class="form-section">
            <h4>Password Reset Successful</h4>
            <p>Your password has been successfully changed. <a href="login.php">Go back to login</a>.</p>
        </div>
    </div>
</body>

</html>