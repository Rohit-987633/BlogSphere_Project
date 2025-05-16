<?php
session_start();

// Assuming session variables have been set already after login
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];

    // If you want to retrieve additional user information (like encrypted ID)
    if (isset($_COOKIE['user_id'])) {
        $encrypted_id = $_COOKIE['user_id'];
        // Decode or decrypt the ID as needed (here, assuming base64 encoding)
        $user_id = base64_decode($encrypted_id);
    }

    echo "Welcome, $firstname $lastname!";
} else {
    echo "Please log in to view your profile.";
}
?>
