<?php
session_start();
$conn= new mysqli("localhost","root","","Blogsphere");

if ($conn -> connect_error){
    die("connection failed". $conn -> connect_error);
};

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM sign_up WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location:../superuser/index.php"); // redirect back to the table page
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


?>