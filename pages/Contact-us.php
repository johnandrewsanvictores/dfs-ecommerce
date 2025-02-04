<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../styles/Contact-us.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
</head>

<body>
    <?php require("../includes/navbar.php") ?>
    <div class="contact-container">
        <h1>GET IN TOUCH</h1>
        <div class="contact-info">
            
            <div class="info-box">
            <i class="fa-solid fa-phone"></i>
                <h3>Phone</h3>
                <p>0906 403 0712</p>
            </div>
            <div class="info-box">
            <i class="fa-regular fa-envelope"></i>  
                <h3>Email</h3>
                <p>dreamshop052523@gmail.com</p>
            </div>
            <div class="info-box">
            <i class="fa-solid fa-location-dot"></i>
                <h3>Address</h3>
                <p>Dinglasan Bldg, Quezon Avenue St.,<br> Lucena, Philippines</p>
            </div>
        </div>
    </div>

    <div class="contact-form">
        <div class="contact-form-text">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, we're here to help! Whether it's about product details, shipping, returns, or any other inquiries, our customer support team is ready to assist you. Simply reach out to us, and we'll do our best to respond promptly and provide the support you need. Your satisfaction is our priority!</p>
        </div>
        <div class="contact-form-info">    
            <form>
                <div> 
                <label for="name">Name <span> *</span> </label>
                    <input type="text" id = "name" name="name" placeholder="Name " required>
                </div>
                <div> 
                    <label for ="tel">Phone Number <span> *</span> </label>
                    <input type="tel" id = "tel" name="phone" placeholder="Phone Number " required>
                </div>
                <div> <label for ="email">Email <span> *</span> </label>
                    <input type="email" id = "email" name="email" placeholder="Email " required>
                </div>
                <div> <label for ="subject">Subject <span> *</span> </label>
                    <input type="text" id = "subject" name="subject" placeholder="Subject " required>
                </div>
                <div> <label for ="message">Message <span> *</span> </label>
                    <textarea id = "message" name="message" placeholder="Message " required></textarea>
                </div>
                <button type="submit">Send</button>
                
            </form>
        </div>
        
    </div> 

    <?php require("../includes/footer.php") ?>
</body>

</html>