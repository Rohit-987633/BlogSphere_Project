<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogsphere";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get selected category and article ID from GET request
$selectedCategory = $_GET['category'] ?? 'inspiration';
$detailId = isset($_GET['details']) ? (int)$_GET['details'] : null;

// Fetch articles based on selected category
if ($selectedCategory === 'all') {
  $stmt = $conn->prepare("SELECT * FROM articles");
} else {
  $stmt = $conn->prepare("SELECT * FROM articles WHERE categories = ?");
  $stmt->bind_param("s", $selectedCategory);
}
$stmt->execute();
$result = $stmt->get_result();

$articles = [];
while ($row = $result->fetch_assoc()) {
  $articles[] = $row;
}

// Fetch details article if ID is set
$detailArticle = null;
if ($detailId) {
  $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
  $stmt->bind_param("i", $detailId);
  $stmt->execute();
  $detailResult = $stmt->get_result();
  $detailArticle = $detailResult->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BlogSphere Services</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg,rgb(104, 46, 167) 0%, #2575fc 100%);
      color: #333;
    }

    .filter-bar {
      display: flex;
      justify-content: center;
      background-color: #2f3542;
      padding: 15px 0;
    }

    .filter-bar button {
      background: none;
      border: none;
      color: white;
      margin: 0 20px;
      font-size: 16px;
      cursor: pointer;
      padding: 8px 15px;
      transition: 0.3s;
    }

    .filter-bar button.active,
    .filter-bar button:hover {
      background-color: #1e90ff;
      color: #fff;
      border-radius: 5px;
    }

    .service-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 40px 20px;
      gap: 30px;
    }

    .service-card {
      width: 250px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      background: #fff;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
    }

    .service-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 50% 50% 0 0;
    }

    .service-card .category {
      font-size: 12px;
      color: #e74c3c;
      margin: 10px;
      text-transform: uppercase;
    }

    .service-card .title {
      font-size: 16px;
      margin: 0 10px 15px;
      color: #333;
    }

    .details-section {
      display: block;
      padding: 30px;
      background: #fff;
      margin: 20px auto;
      max-width: 800px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .details-section img {
      float: left;
      width: 250px;
      height: 200px;
      object-fit: cover;
      margin-right: 20px;
      border-radius: 8px;
    }

    .details-section h2 {
      margin-top: 0;
    }

    .footer {
      background: #2f3542;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- Filter Bar -->
  <div class="filter-bar">
    <form method="get" action="">
      <button type="submit" name="category" value="all" class="<?= $selectedCategory == 'all' ? 'active' : '' ?>">All</button>
      <button type="submit" name="category" value="inspiration" class="<?= $selectedCategory == 'inspiration' ? 'active' : '' ?>">Inspiration</button>
      <button type="submit" name="category" value="howto" class="<?= $selectedCategory == 'howto' ? 'active' : '' ?>">How-To</button>
      <button type="submit" name="category" value="giveaways" class="<?= $selectedCategory == 'giveaways' ? 'active' : '' ?>">Giveaways</button>
      <button type="submit" name="category" value="learning" class="<?= $selectedCategory == 'learning' ? 'active' : '' ?>">Learning & Resources</button>
    </form>
  </div>

  <!-- Services Grid -->
  <div class="service-grid">
    <h2 style="width: 100%; text-align:center; color:#2f3542;">
      <?= ucfirst($selectedCategory) ?> Services
    </h2>
    <?php foreach ($articles as $article): ?>
      <a class="service-card" href="?category=<?= urlencode($selectedCategory) ?>&details=<?= $article['id'] ?>">
        <img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['mainTitle']) ?>">
        <p class="category"><?= strtoupper($article['categories']) ?></p>
        <p class="title"><?= htmlspecialchars($article['mainTitle']) ?></p>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Detail View (PHP-only, no JavaScript) -->
  <?php if ($detailArticle): ?>
    <div class="details-section" id="detailsSection">
      <img src="<?= htmlspecialchars($detailArticle['image']) ?>" alt="<?= htmlspecialchars($detailArticle['mainTitle']) ?>">
      <div>
        <h2><?= htmlspecialchars($detailArticle['mainTitle']) ?></h2>
        <p><strong><?= htmlspecialchars($detailArticle['subTitle']) ?></strong></p>
        <p><?= nl2br(htmlspecialchars($detailArticle['description'])) ?></p>
      </div>
    </div>
  <?php endif; ?>

  <!-- Footer -->
  <div class="footer">
    &copy; 2025 BlogSphere | Designed by Bhimsen & Team
  </div>

</body>
</html>
