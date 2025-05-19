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
    define('ENCRYPTION_KEY', 'A9d7k3L1p0s8Q2v5W6x3Yz1F4h9M7rTc');
define('ENCRYPTION_IV', substr(hash('sha256', 'your-iv-seed'), 0, 16));
define('CIPHER_METHOD', 'AES-256-CBC');

function decrypt_id($encrypted) {
    return openssl_decrypt(base64_decode($encrypted), CIPHER_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

    $encrypted_id =   $_POST["user_id"];    ;
    $decrypted_id = decrypt_id($encrypted_id);



$userId=htmlspecialchars($decrypted_id) + 1;
    
$hashedPassword = hash("sha256", $password);

    $sts = $conn->prepare("UPDATE sign_up SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?");
    

    $sts->bind_param("ssssi",$firstname, $lastname, $email, $hashedPassword, $userId);
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

    header("Location: ../src/admin/user_grid/index.php");
    exit();
}


?>