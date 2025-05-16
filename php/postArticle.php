<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "Blogsphere");

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mainTitle = $_POST["title"];
    $subTitle = $_POST["subtitle"];
    $description = $_POST["description"];
    $categories = $_POST["categories"];

    // Check if file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Set correct absolute path for the target directory
        $targetDir = "/opt/lampp/htdocs/blogsphere_project/assets/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;

        // Set correct public URL for the image
        $imageUrl = "http://localhost/blogsphere_project/assets/" . $fileName;

        // Create folder if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert blog data into the database
            $stmt = $conn->prepare("INSERT INTO articles (mainTitle, subTitle, description, categories, image2) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $mainTitle, $subTitle, $description, $categories, $imageUrl);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Data saved successfully!";
                header("Location: ../post_blog/index.php");
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
