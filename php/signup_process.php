<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Blogsphere";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $message = "Passwords do not match!";
    } else {

        $check = $conn->prepare("SELECT id FROM sign_up WHERE email = ? UNION SELECT id FROM login WHERE username = ?");
        $check->bind_param("ss", $email, $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already registered!";
        } else {

            $hashedPassword = hash("sha256", $password);


            $stmt = $conn->prepare("INSERT INTO sign_up (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);
            if ($stmt->execute()) {

                $stmtLogin = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
                $stmtLogin->bind_param("ss", $email, $hashedPassword);
                if ($stmtLogin->execute()) {
                    $_SESSION['message'] = "Signup successful! You can now log in.";
                    header("Location: ../../src/login/signup.php");
                    exit;

                } else {
                    $message = "Error during login table insertion.";
                }
            } else {
                $message = "Error during signup!";
            }
        }
    }
}

?>