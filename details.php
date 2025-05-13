<?php
$conn = new mysqli("localhost", "root", "", "blogsphere");
if ($conn->connect_error) die("Connection failed");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['mainTitle']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            max-width: 800px;
            margin: auto;
        }
        img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
        h1 {
            margin-top: 20px;
        }
        .subtitle {
            color: #777;
            margin-bottom: 10px;
        }
        .category {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 15px;
            display: inline-block;
        }
        p {
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['mainTitle']) ?>">
    <h1><?= htmlspecialchars($article['mainTitle']) ?></h1>
    <p class="subtitle"><?= htmlspecialchars($article['subTitle']) ?></p>
    <p class="category"><?= strtoupper($article['categories']) ?></p>
    <p><?= nl2br(htmlspecialchars($article['description'])) ?></p>
</body>
</html>
