<?php
session_start();
    
$conn= new mysqli("localhost","root","","Blogsphere");

if($conn -> connect_error){
    die("Connection failed". $conn -> connect_error);
}

if( $_SERVER["REQUEST_METHOD"]== "POST") {
    $firstname = $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $id=1;
    
    $sts = $conn->prepare("UPDATE sign_up SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?");
    

    $sts->bind_param("ssssi",$firstname, $lastname, $email, $password, $id);
//     s = String i= Integer d = Double (float) b = Blob (binary data)
    

    if ($sts -> execute()){
        echo " Data stored successfully";
        $_SESSION['message'] = "Data saved successfully!";
    }
    else{
        echo "Error, Failed to store data";
        $_SESSION['message'] = "Failed!";
    }

    $sts->close();
    $conn->close();

    header("Location: ../user_grid/index.php");
    exit();
}


?>