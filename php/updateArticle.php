<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Blogsphere");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $articleId = intval($_POST["id"]);
    $mainTitle = $_POST["maintitle"];
    $subTitle = $_POST["subtitle"];
    $description = $_POST["description"];
    $categories = $_POST["categories"];
    $currentImage = $_POST["current_image"]; // keep the old image if no new one

    $newImagePath = $currentImage;

    // Check if user uploaded a new image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES["image"]["name"]);
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/blogsphere_project/assets/";
        $targetFile = $targetDir . $fileName;
        $newImagePath = "/blogsphere_project/assets/" . $fileName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $_SESSION['message'] = "Image upload failed.";
            header("Location: ../src/admin/user_grid/index.php");
            exit();
        }
    }

    // Always update with $newImagePath, which is either old or new image path
    $stmt = $conn->prepare("UPDATE articles SET mainTitle = ?, subTitle = ?, description = ?, categories = ?, image2 = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $mainTitle, $subTitle, $description, $categories, $newImagePath, $articleId);

    if ($stmt->execute()) {
        header("Location: ../src/admin/dashboard/index.php");
        exit();
    } else {
        $_SESSION['message'] = "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();


    exit();
}
?>
