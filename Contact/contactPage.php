<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - BlogSphere</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            width: 800px;
            border-radius: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }
        .form-section {
            flex: 1;
            padding: 40px;
        }
        .form-section h2 {
            color: #4b2aad;
            margin-bottom: 10px;
        }
        .form-section p {
            font-size: 14px;
            color: gray;
            margin-bottom: 20px;
        }
        .form-section input, .form-section textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            background: #f7f7f7;
        }
        .form-section button {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        .form-section button:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
        }
        .info-section {
            flex: 1;
            background: #f1f5f9;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .info-section img {
            width: 120px;
            margin-bottom: 20px;
        }
        .info-section p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }
        .social-icons a {
            margin: 10px;
            text-decoration: none;
            color: #6a11cb;
            font-size: 22px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-section">
        <h2>Let's Talk</h2>
        <p>To request a quote or meet up for coffee, fill out the form and we'll get back to you promptly.</p>

        <form action="contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="4" placeholder="Type your message here..." required></textarea>
            <button type="submit" name="submit">Send Message</button>
        </form>
    </div>

    <div class="info-section">
        <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Contact Icon">
        <p>Level 1/15 Moore St, Canberra ACT 2601</p>
        <p>+61 (02) 6112 8839</p>
        <p>contact@blogsphere.com</p>
        <div class="social-icons">
            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        </div>
    </div>
</div>

<!-- Ionicons link for social media icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php
// Backend PHP to capture form submission
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Example: Save to database or send email
    // For now, just show a simple alert
    echo "<script>alert('Thank you, $name! Your message has been sent.');</script>";
}
?>

</body>
</html>
