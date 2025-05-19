<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Blogsphere");
$_SESSION['is_valid_user'] = true;
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
}