<?php include '../../php/signup_process.php'; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BlogSphere</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <nav>
            <img src="../../assets/logo.png" alt="logos">
            <a href="../../src/login/index.php"> <button class="nav_btn"><b>Login</b></button></a>
            <a href="../../src/contact/index.php" class="nav_link">Contact</a>
            <a href="../../src/service/index.php" class="nav_link">Article</a>
            <a href="../../src/about_us/index.php" class="nav_link">About</a>
            <a href="../../src/Home/index.php" class="nav_link">Home</a>
        </nav>
    </div>
    <div class="login-container">
        <div class="login-card">
            <img src="../../assets/logo.png" alt="Logo" class="logo">

            <h2>Sign Up</h2>

            <form method="POST" onsubmit="return validateForm();">
                <label for="firt_name">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"
                    required>

                <button type="submit" class="signup-btn">Sign Up</button>
            </form>

            <?php if (!empty($message)):                header("refresh:3;url=index.php"); ?>


            <?php endif; ?>

            <p class="signup-link">
                Already have an account? <a href="index.php">Login</a>
            </p>
        </div>
       

    </div>

    <script>
        function validateForm() {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const confirmPassword = document.getElementById('confirm_password').value.trim();
            const errorMessage = document.createElement('p');
            errorMessage.style.color = 'red';
            const formCard = document.querySelector('.login-card');


            const existingError = formCard.querySelector('p');
            if (existingError) {
                existingError.remove();
            }


            if (firstName === '') {
                errorMessage.textContent = 'First name is required.';
                formCard.appendChild(errorMessage);
                return false;
            }


            if (lastName === '') {
                errorMessage.textContent = 'Last name is required.';
                formCard.appendChild(errorMessage);
                return false;
            }


            if (email === '') {
                errorMessage.textContent = 'Email is required.';
                formCard.appendChild(errorMessage);
                return false;
            }
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errorMessage.textContent = 'Please enter a valid email address.';
                formCard.appendChild(errorMessage);
                return false;
            }


            if (password === '') {
                errorMessage.textContent = 'Password is required.';
                formCard.appendChild(errorMessage);
                return false;
            }


            if (password.length < 6) {
                errorMessage.textContent = 'Password must be at least 6 characters long.';
                formCard.appendChild(errorMessage);
                return false;
            }


            if (confirmPassword === '') {
                errorMessage.textContent = 'Please confirm your password.';
                formCard.appendChild(errorMessage);
                return false;
            }

            if (password !== confirmPassword) {
                errorMessage.textContent = 'Passwords do not match.';
                formCard.appendChild(errorMessage);
                return false;
            }


            return true;
        }
    </script>

<?php
    session_start();
    if (isset($_SESSION['message'])) {
        $msg = addslashes($_SESSION['message']); // prevent JS break
        echo "<script>
            alert('$msg');
            window.location.href = '../login/index.php';
        </script>";
        unset($_SESSION['message']);
    }
?>

</body>

</html>

