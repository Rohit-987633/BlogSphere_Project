<?php include '../../php/login_process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BlogSphere</title>
    <link rel="stylesheet" href="./style.css">
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
            <!-- Logo Section -->
            <img src="../../assets/logo.png" alt="Logo" class="logo">

            <h2>Login</h2>

            <!-- Login Form -->
            <form method="POST" onsubmit="return validateForm();">
                <label for=" email">Username</label>
                <input type="text" id="email" name="email" placeholder="Enter your username" required>

                <label for="password">Password</label>

                <div style="position: relative;">
  <input type="password" id="password" name="password" placeholder="Enter your password" required 
         style="padding-right: 30px;">

  <img src="../../assets/hide.png" id="togglePassword" alt="Toggle Password" 
       style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 28px; cursor: pointer;">
</div>




                <button type="submit" class="login-btn">Login</button>
            </form>
<br>
            <!-- Error Message -->
            <?php if (!empty($message)): ?>
                <p style="color:red;"><?php echo $message; ?></p>
            <?php endif; ?>
<p>Login as <a href="../superuser/superuser_login/index.php" style="text-decoration: none;">SuperAdmin </a> 🦸‍♂️ </p>
            <p class="signup-link">
                Don't have an account? <a href="./signup.php">Sign Up</a>
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

            
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("togglePassword");

  toggleIcon.addEventListener("click", () => {
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    toggleIcon.src = isPassword ? "../../assets/show.webp" : "../../assets/hide.png";
  });



    </script>
</body>

</html>