<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Blogsphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        
        
        $_SESSION['message'] = "Message send Successfully!";
        header("Location: ../contact/index.php");
        exit();
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
