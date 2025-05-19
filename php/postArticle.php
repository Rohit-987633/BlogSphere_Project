<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "Blogsphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mainTitle = $_POST["title"];
    $subTitle = $_POST["subtitle"];
    $description = $_POST["description"];
    $categories = $_POST["categories"];
    $userIdEncoded = $_POST["user_id"];
    $userId = hash("sha256", $userIdEncoded); 

    




define('ENCRYPTION_KEY', 'A9d7k3L1p0s8Q2v5W6x3Yz1F4h9M7rTc');
define('ENCRYPTION_IV', substr(hash('sha256', 'your-iv-seed'), 0, 16));
define('CIPHER_METHOD', 'AES-256-CBC');

function decrypt_id($encrypted) {
    return openssl_decrypt(base64_decode($encrypted), CIPHER_METHOD, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

    $encrypted_id =   $_POST["user_id"];    ;
    $decrypted_id = decrypt_id($encrypted_id);



$userId=htmlspecialchars($decrypted_id) + 1;


    // Check if file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Set correct absolute path for the target directory
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/blogsphere_project/assets/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;
        
        $imageUrl = "/blogsphere_project/assets/" . $fileName;
        
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        

        // Move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert blog data into the database
            $stmt = $conn->prepare("INSERT INTO articles (mainTitle, subTitle, description, categories, image2, user_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $mainTitle, $subTitle, $description, $categories, $imageUrl, $userId);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Data saved successfully!";
                header("Location: ../src/admin/post_blog/index.php");
                exit();
            } else {
                echo "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Upload failed. Unable to move file to target folder.";
        }
    } else {
        echo "No file uploaded or error during upload. Error code: " . $_FILES['image']['error'];
    }

    $conn->close();
}
?>
