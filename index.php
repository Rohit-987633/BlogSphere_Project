<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "blogsphere");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles
$result = $conn->query("SELECT * FROM articles");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Article Cards</title>
    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .service-card {
            width: 300px;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            text-decoration: none;
            color: #000;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.18);
        }
        .card-img img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #eee;
        }
        .card-content {
            padding: 15px;
        }
        .card-content h3 {
            margin: 0 0 5px;
            font-size: 20px;
            font-weight: 600;
        }
        .card-content .subtitle {
            font-size: 14px;
            color: #777;
            margin: 0 0 10px;
        }
        .card-content .category {
            font-size: 12px;
            color: #e74c3c;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 10px;
        }
        .card-content .description {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
        }
        .readmore {
            color: #2980b9;
            font-weight: 500;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <h1>All Articles</h1>
    <div class="grid">
        <?php while ($row = $result->fetch_assoc()): ?>
            <a class="service-card" href="details.php?id=<?= $row['id'] ?>" target="_blank">
                <div class="card-img">
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['mainTitle']) ?>">
                </div>
                <div class="card-content">
                    <h3><?= htmlspecialchars($row['mainTitle']) ?></h3>
                    <p class="subtitle"><?= htmlspecialchars($row['subTitle']) ?></p>
                    <span class="category"><?= strtoupper($row['categories']) ?></span>
                    <p class="description">
                        <?= htmlspecialchars(mb_strimwidth($row['description'], 0, 200, "...")) ?>
                        <span class="readmore">Read More</span>
                    </p>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
