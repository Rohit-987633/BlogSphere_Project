
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo":::::::";
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "admin@example.com" && $password == "password123") {
        header("Location: ../Home/index.php");  
        $_SESSION['user'] = $email;  
    } else {
        $error_message = "Invalid Credentials!";
    }
}
?>

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
    <nav style="color: white;">
        <img src="../assets/logo.png" alt="">
        <a> <button class="nav_btn"><b>Login</b></button></a>
        <a class="nav_link">Contact</a>
        <a class="nav_link">Article</a>
        <a class="nav_link">About</a>
        <a class="nav_link">Home</a>
    </nav>
</div>
<div class="login-container">
    <div class="login-card">
        <!-- Logo Section -->
        <img src="../assets/logo.png" alt="Logo" class="logo"> 

        <h2>Login</h2>

        <!-- Login Form -->
        <form method="POST" action="login.php">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <!-- Error Message -->
        <?php if (isset($error_message)): ?>
            <p><?php echo $error_message; ?></p>
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

    
    if (email === '') {
        errorMessage.textContent = 'Email is required.';
        document.querySelector('.login-card').appendChild(errorMessage);
        return false;
    }

   
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorMessage.textContent = 'Please enter a valid email address.';
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
