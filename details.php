<?php
// Sample blog data (ideally move to shared file or DB)
$articles = [
    [
        'id' => 1,
        'mainTitle' => 'How to do Blog Setup Guides',
        'subTitle' => '',
        'description' => 'Launching a blog can feel daunting...',
        'fullDescription' => 'Launching a blog can feel daunting, but our platform-agnostic setup guides simplify the entire process—from choosing a domain name to publishing your first post. We start by helping you evaluate hosting options (shared vs. managed vs. services)...',
        'category' => 'howto',
        'image' => 'images/blog1.png'
    ],
    // Add more articles as needed
];

// Get article by ID
$id = $_GET['id'] ?? 0;
$article = current(array_filter($articles, fn($a) => $a['id'] == $id));

if (!$article) {
    echo "<p>Article not found.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $article['mainTitle'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0ff;
            margin: 0;
            padding: 30px;
        }

        .container {
            display: flex;
            background: white;
            padding: 20px;
            border-radius: 20px;
            border: 5px solid #6200ea;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            max-width: 1000px;
            margin: auto;
            align-items: flex-start;
        }

        .image-wrapper {
            border-radius: 20px;
            overflow: hidden;
            flex-shrink: 0;
            width: 280px;
            height: 200px;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content {
            margin-left: 30px;
            flex: 1;
        }

        .content h2 {
            margin-top: 0;
            color: #333;
        }

        .content p {
            line-height: 1.6;
            color: #444;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="image-wrapper">
            <img src="<?= $article['image'] ?>" alt="Article Image">
        </div>
        <div class="content">
            <h2><?= $article['mainTitle'] ?></h2>
            <p><?= nl2br($article['fullDescription']) ?></p>
        </div>
    </div>

</body>
</html>
