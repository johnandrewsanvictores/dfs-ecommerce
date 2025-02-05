<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/Contact-us.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>

<body>
    <?php require("../includes/navbar.php") ?>
    <div class="contact-container">
        <h1>GET IN TOUCH</h1>
        <div class="contact-info">

            <div class="info-box">
                <i class="fas fa-phone"></i>
                <h3>Phone</h3>
                <p>0906 403 0712</p>
            </div>
            <div class="info-box">
                <i class="far fa-envelope"></i>
                <h3>Email</h3>
                <p>dreamshop052523@gmail.com</p>
            </div>
            <div class="info-box">
                <i class="fas fa-location-dot"></i>
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
            <form id="contactForm">
                <div>
                    <label for="name">Name <span> *</span> </label>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                    <span class="error-message" id="nameError"></span>
                </div>
                <div>
                    <label for="tel">Phone Number <span> *</span> </label>
                    <input type="tel" id="tel" name="phone" placeholder="Phone Number" maxlength="11" required>
                    <span class="error-message" id="phoneError"></span>
                </div>
                <div> <label for="email">Email <span> *</span> </label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <span class="error-message" id="emailError"></span>
                </div>
                <div> <label for="subject">Subject <span> *</span> </label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a reason</option>
                        <option value="Product Inquiry">Product Inquiry</option>
                        <option value="Shipping">Shipping</option>
                        <option value="Returns">Returns</option>
                        <option value="Technical Support">Technical Support</option>
                        <option value="Damaged Product">Damaged Product</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="error-message" id="subjectError"></span>
                </div>
                <div> <label for="message">Message <span> *</span> </label>
                    <textarea id="message" name="message" placeholder="Message" required></textarea>
                    <span class="error-message" id="messageError"></span>
                </div>
                <button type="submit">Send</button>

            </form>
        </div>

    </div>

    <?php require("../includes/footer.php") ?>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let isValid = true;

            const name = document.getElementById('name');
            const phone = document.getElementById('tel');
            const email = document.getElementById('email');
            const subject = document.getElementById('subject');
            const message = document.getElementById('message');

            const nameError = document.getElementById('nameError');
            const phoneError = document.getElementById('phoneError');
            const emailError = document.getElementById('emailError');
            const subjectError = document.getElementById('subjectError');
            const messageError = document.getElementById('messageError');

            nameError.textContent = '';
            phoneError.textContent = '';
            emailError.textContent = '';
            subjectError.textContent = '';
            messageError.textContent = '';

            if (!name.value.trim()) {
                isValid = false;
                nameError.textContent = 'Name is required.';
            }

            const phonePattern = /^[0-9]{11}$/;
            if (!phonePattern.test(phone.value)) {
                isValid = false;
                phoneError.textContent = 'Enter a proper phone number.';
            }

            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email.value)) {
                isValid = false;
                emailError.textContent = 'Please enter a proper email.';
            }

            if (!subject.value.trim()) {
                isValid = false;
                subjectError.textContent = 'Subject is required.';
            }

            if (!message.value.trim()) {
                isValid = false;
                messageError.textContent = 'Message is required.';
            }

            if (isValid) {
                alert('Form submitted successfully!');
                // You can submit the form here if needed
                // this.submit();
            }
        });

        // Limit phone number input to 11 digits
        document.getElementById('tel').addEventListener('input', function() {
            if (this.value.length > 11) {
                this.value = this.value.slice(0, 11);
            }
        });
    </script>
</body>

</html>