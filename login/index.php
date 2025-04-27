
<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sample credentials (replace with database check in production)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simple validation (Replace this with actual database validation)
    if ($email == "admin@example.com" && $password == "password123") {
        $_SESSION['user'] = $email;  // Store user session
        header('Location: dashboard.php');  // Redirect to dashboard or home page
        exit;
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
    <link rel="stylesheet" href="style.css"> <!-- Ensure this is linked correctly -->
</head>
<body>
<div class="container">
    <nav>
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
        <img src="../assets/logo.png" alt="Logo" class="logo"> <!-- Ensure the logo image path is correct -->

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

</body>
</html>
