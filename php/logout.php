<?php

session_start();
unset($_SESSION['is_valid_user']);
header("Location: ../src/Home/index.php")
?>

