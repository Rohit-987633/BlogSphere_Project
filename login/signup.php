<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you want to process form submission here
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Sample validation (Replace with actual logic like saving to a database)
    if ($password == $confirmPassword) {
        echo "Signup Successful!";
        // Here, you can save user data to the database
    } else {
        echo "Passwords do not match!";
    }
}
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
        <img src="../assets/logo.png" alt="Logo" class="logo">

        <h2>Sign Up</h2>

        <form method="POST">
            <label for="name">Name</label>
            <input type="name" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

            <button type="submit" class="signup-btn">Sign Up</button>
        </form>

        <p class="signup-link">
            Already have an account? <a href="index.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>
