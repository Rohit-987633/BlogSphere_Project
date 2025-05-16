<?php include '../php/login_process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BlogSphere</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav>
            <img src="../assets/logo.png" alt="">
            <a href="../login/index.php"> <button class="nav_btn"><b>Login</b></button></a>
            <a href="../contact/index.php" class="nav_link">Contact</a>
            <a href="../service/index.php" class="nav_link">Article</a>
            <a href="../about_us/index.php" class="nav_link">About</a>
            <a href="../home/index.php" class="nav_link">Home</a>
        </nav>
    </div>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo Section -->
            <img src="../assets/logo.png" alt="Logo" class="logo">

            <h2>Login</h2>

            <!-- Login Form -->
            <form method="POST" onsubmit="return validateForm();">
                <label for=" email">Username</label>
                <input type="text" id="email" name="email" placeholder="Enter your username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit" class="login-btn">Login</button>
            </form>
<br>
            <!-- Error Message -->
            <?php if (!empty($message)): ?>
                <p style="color:red;"><?php echo $message; ?></p>
            <?php endif; ?>

            <p class="signup-link">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </p>
        </div>
    </div>
    <script>
        function validateForm() {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const errorMessage = document.createElement('p');
            errorMessage.style.color = 'red';

            const existingError = formCard.querySelector('p');
            if (existingError) {
                existingError.remove();
            }

            if (email === '') {
                errorMessage.textContent = 'Username is required.';
                document.querySelector('.login-card').appendChild(errorMessage);
                return false;
            }


            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(username)) {
                errorMessage.textContent = 'Please enter a valid username.';
                document.querySelector('.login-card').appendChild(errorMessage);
                return false;
            }


            if (password === '') {
                errorMessage.textContent = 'Password is required.';
                document.querySelector('.login-card').appendChild(errorMessage);
                return false;
            }


            if (password.length < 6) {
                errorMessage.textContent = 'Password must be at least 6 characters long.';
                document.querySelector('.login-card').appendChild(errorMessage);
                return false;
            }


            return true;
        }
    </script>
</body>

</html>