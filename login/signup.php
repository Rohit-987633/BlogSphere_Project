<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // form submission 
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // validation 
    if ($password == $confirmPassword) {
        echo "Signup Successful!";
        
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
            <label for="firt_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>

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

    // Reset error message
    const existingError = formCard.querySelector('p');
    if (existingError) {
        existingError.remove();
    }

    // Validate first name
    if (firstName === '') {
        errorMessage.textContent = 'First name is required.';
        formCard.appendChild(errorMessage);
        return false;
    }

    // Validate last name
    if (lastName === '') {
        errorMessage.textContent = 'Last name is required.';
        formCard.appendChild(errorMessage);
        return false;
    }

    // Validate email format
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

    // Validate password
    if (password === '') {
        errorMessage.textContent = 'Password is required.';
        formCard.appendChild(errorMessage);
        return false;
    }

    // Check password length
    if (password.length < 6) {
        errorMessage.textContent = 'Password must be at least 6 characters long.';
        formCard.appendChild(errorMessage);
        return false;
    }

    // Validate confirm password
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

</body>
</html>
