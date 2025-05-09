<?php
session_start();
// Connect to the database
$host = "localhost";
$username = "root";  // Database username
$db_password = "";   // Database password
$dbname = "Blogsphere";  // Database name

$conn = new mysqli($host, $username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from DB
    $stmt = $conn->prepare("SELECT id, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        $hashed_input = hash("sha256", $password);

        if ($hashed_input === $hashed_password) {
            $_SESSION['user'] = $username;
            header("Location:../dashboard/index.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
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

            <!-- Error Message -->
            <?php if (!empty($error_message)): ?>
                <p style="color:red;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <p class="signup-link">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </p>
        </div>
    </div>
    <script>
        function validateForm() {
            const username = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const errorMessage = document.createElement('p');
            errorMessage.style.color = 'red';


            if (username === '') {
                errorMessage.textContent = 'Username is required.';
                document.querySelector('.login-card').appendChild(errorMessage);
                return false;
            }


            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(username)) {
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