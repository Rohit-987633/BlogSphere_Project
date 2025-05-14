<?php
// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogsphere";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle GET Params
$category = $_GET['category'] ?? 'all';
$detailsId = isset($_GET['details']) ? (int)$_GET['details'] : null;

// Fetch articles
if ($detailsId) {
  $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
  $stmt->bind_param("i", $detailsId);
  $stmt->execute();
  $detailArticle = $stmt->get_result()->fetch_assoc();
} else {
  if ($category === 'all') {
    $stmt = $conn->prepare("SELECT * FROM articles");
  } else {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE categories = ?");
    $stmt->bind_param("s", $category);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $articles = [];
  while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BlogSphere</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f5f6fa;
    }
    .navbar {
      display: flex;
      justify-content: center;
      background: #6c5ce7;
      padding: 15px;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 20px;
      font-weight: bold;
      padding: 8px 12px;
      border-radius: 6px;
    }
    .navbar a:hover,
    .navbar a.active {
      background: #4834d4;
    }
    .grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 30px;
      gap: 20px;
    }
    .card {
      width: 280px;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-decoration: none;
      color: black;
      transition: 0.3s;
    }
    .card:hover {
      transform: scale(1.02);
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .card-body {
      padding: 15px;
    }
    .main-title {
      font-size: 20px;
      font-weight: bold;
      margin: 10px 0 5px;
    }
    .sub-title {
      font-size: 14px;
      color: gray;
    }
    .category {
      font-size: 12px;
      color: #e74c3c;
      text-transform: uppercase;
      margin-top: 10px;
    }
    .desc {
      font-size: 13px;
      margin-top: 10px;
      line-height: 1.4em;
      text-align: justify;
    }
    .read-more {
      color: #3498db;
      font-weight: bold;
    }
    .detail-container {
      max-width: 1000px;
      margin: 50px auto;
      display: flex;
      gap: 30px;
      padding: 30px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .detail-img {
      flex: 1;
    }
    .detail-img img {
      width: 100%;
      border-radius: 50%;
      object-fit: cover;
      height: 250px;
    }
    .detail-content {
      flex: 2;
    }
    .detail-content h2 {
      margin-top: 0;
    }
    .footer {
      text-align: center;
      padding: 20px;
      background: #6c5ce7;
      color: white;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<!-- Navigation -->
<div class="navbar">
  <?php
    $categories = ['all', 'inspiration', 'howto', 'giveaways', 'learning'];
    foreach ($categories as $cat) {
      $active = ($cat == $category) ? 'active' : '';
      echo "<a href='?category=$cat' class='$active'>" . ucfirst($cat) . "</a>";
    }
  ?>
</div>

<?php if ($detailsId && $detailArticle): ?>
  <!-- Detail Page -->
  <div class="detail-container">
    <div class="detail-img">
      <img src="<?= htmlspecialchars($detailArticle['image']) ?>" alt="Thumbnail">
    </div>
    <div class="detail-content">
      <h2><?= htmlspecialchars($detailArticle['mainTitle']) ?></h2>
      <h4 style="color:gray;"><?= htmlspecialchars($detailArticle['subTitle']) ?></h4>
      <p class="category"><?= strtoupper($detailArticle['categories']) ?></p>
      <p><?= nl2br(htmlspecialchars($detailArticle['description'])) ?></p>
    </div>
  </div>
<?php else: ?>
  <!-- Grid View -->
  <div class="grid">
    <?php foreach ($articles as $article): ?>
      <a class="card" href="?category=<?= urlencode($category) ?>&details=<?= $article['id'] ?>" target="_blank">
        <img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['mainTitle']) ?>">
        <div class="card-body">
          <div class="main-title"><?= htmlspecialchars($article['mainTitle']) ?></div>
          <div class="sub-title"><?= htmlspecialchars($article['subTitle']) ?></div>
          <div class="category"><?= strtoupper($article['categories']) ?></div>
          <div class="desc">
            <?= substr(strip_tags($article['description']), 0, 120) ?>...
            <span class="read-more">Read More</span>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<!-- Footer -->
<div class="footer">
  &copy; 2025 BlogSphere | Designed by Bhimsen & Team
</div>

</body>
</html>
