<?php
session_start();

$conn= new mysqli("localhost","root","","Blogsphere");

if($conn -> connect_error){
    die("error. $conn -> connect_error");
}


if( $_SERVER["REQUEST_METHOD"]== "POST") {
    $firstname = $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $email= $_POST["email"];
    $id=1;
    
    $sts = $conn->prepare("UPDATE sign_up SET firstname = ?, lastname = ?, email = ? WHERE id = ?");
    

    $sts->bind_param("sssi",$firstname, $lastname, $email, $id);
    if ($sts -> execute()){
        
        header("Location: ../superuser/index.php");
    }
    else{
        echo "Error, Failed to store data";
        $_SESSION['message'] = "Failed!";
    }

    $sts->close();
    $conn->close();

    
    exit();

}
?>