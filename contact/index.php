<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us - BlogSphere</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        nav img {
            width: 80px;
            height: 80px;
        }

        .nav_link {
            text-decoration: none;
            float: right;
            margin: 22px;
            padding: 10px;
            cursor: pointer;
            border-radius: 20px;
            font-weight: 700;
        }

        .nav_btn {
            text-decoration: none;
            float: right;
            padding: 10px;
            width: 100px;
            margin-top: 22px;
            cursor: pointer;
            border: 1px solid black;
            border-radius: 5px;
        }

        .nav_btn:hover {
            background-color: rgb(2, 30, 122);
            transition: 0.3s ease-in-out;
            border: 2px solid white;
            color: white;
        }

        .act_nav_link:hover {
            color: white !important;
        }

        .nav_link:hover {
            background-color: rgb(2, 30, 122);
            color: white;
            transition: 0.3s ease-in-out;
            padding: 13px;
            border-radius: 20px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            height: 100vh;

        }

        .container {
            margin-top: 10% !important;
            margin: auto;
            justify-content: center;
            align-items: center;
            background: white;
            width: 800px;
            border-radius: 20px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .inner_container {
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

        .form-section input,
        .form-section textarea {
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

        .container_inside {
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>
</head>

<body>

    <div class="container_inside">

        <nav>
            <img src="../assets/logo.png" alt="">
            <a href="../login/index.php"> <button class="nav_btn"><b>Login</b></button></a>
            <a href="../contact/index.php" class="nav_link">Contact</a>
            <a href="../service/index.php" class="nav_link">Article</a>
            <a href="../about_us/index.php" class="nav_link act_nav_link" style="color:black">About</a>
            <a href="../Home/index.php" class="nav_link">Home</a>
        </nav>

    </div>

    <div class="container">

        <div class="inner_container">


            <div class="form-section">
                <h2>Let's Talk</h2>
                <p>To request a quote or meet up for coffee, fill out the form and we'll get back to you promptly.</p>

                <form action="../php/contact.php" method="post">
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
            <?php
                                if (isset($_SESSION['message'])) {
                                    $msg =  $_SESSION['message'];
                                    echo "<script type='text/javascript'>alert('$msg');</script>";
                                    unset($_SESSION['message']);
                                }
                                ?>
        </div>
    </div>

    <!-- Ionicons link for social media icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>