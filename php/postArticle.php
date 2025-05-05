<?php
session_start();
$conn= new mysqli("localhost","root","","Blogsphere");

if($conn -> connect_error){
    die("Connection failed". $conn -> connect_error);
}

if( $_SERVER["REQUEST_METHOD"]== "POST") {
    $mainTitle = $_POST["title"];
    $subTitle= $_POST["subtitle"];
    $description= $_POST["description"];
    $categories= $_POST["categories"];
    
    $target_dir = "uploads/";
    $target_file= $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $sts = $conn->prepare("INSERT INTO articles (mainTitle, subTitle, description, categories, image) VALUES (?, ?, ?, ?, ?)");

    $sts->bind_param("sssss",$mainTitle, $subTitle, $description, $categories, $target_file);
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

    header("Location: ../post_blog/index.php");
    exit();
}

?>   