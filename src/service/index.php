<?php
// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "Blogsphere";
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
      height: 100%;
    }

    .main-container {
      background-image: url(../../assets//test.webp);
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100vh;
    }

    .navbar {
      display: flex;
      margin-top: 20px;
      justify-content: center;
      /* background: #6c5ce7; */
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
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .detail-img {
      flex: 1;
    }

    .container {
      margin-left: 100px;
      margin-right: 100px;
    }

    .detail-img img {
      width: 100%;
      /* border-radius: 50%; */
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

    nav img {
      width: 80px;
      height: 80px;
    }

    .nav_link {
      text-decoration: none;
      float: right;
      margin: 22px;
      padding: 10px;
      cursor: pointer;
      border-radius: 20px;
      font-weight: 700;
      color: white;
    }

    .nav_btn {
      text-decoration: none;
      float: right;
      padding: 10px;
      width: 100px;
      margin-top: 22px;
      cursor: pointer;
      border: 1px solid black;
      border-radius: 5px;
    }

    .nav_btn:hover {
      background-color: rgb(2, 30, 122);
      transition: 0.3s ease-in-out;
      border: 2px solid white;
      color: white;
    }

    .nav_link:hover {
      background-color: rgb(2, 30, 122);
      color: white;
      transition: 0.3s ease-in-out;
      padding: 13px;
      border-radius: 20px;
    }

    .detail-btn-back {
      padding: 15px;
      font-weight: bolder;
      background-color: #f5f6fa;
      color: black;
      border-radius: 20px;
      cursor: pointer;
    }

    .detail-btn-back:hover {
      background-color: #4834d4;
      color: white;
      transition: 0/3s ease-in;
    }




    .subscribe_part {
      display: flex;
      justify-content: center;

    }

    .subscribe_part input {
      padding: 10px;
      width: 20%;
      margin: 10px;
      margin-top: 30px;
      border-radius: 10px;
    }

    .subscribe_part_btn {
      padding: 10px;
      width: 9%;
      margin: 10px;
      margin-top: 30px;
      border-radius: 10px;
      cursor: pointer;
      background-color: rgb(94, 149, 250);
      border: none;
      font-weight: 500;
      font-size: 20px;
    }

    .subscribe_part_btn:hover {
      background-color: rgb(2, 30, 122);
      transition: 0.4s ease-out;
      color: white;
    }

    .foot_home {
      background-color: rgb(238, 232, 232);
      padding-top: 20px;
    }

    .social_media {
      display: flex;
      justify-content: center;
    }

    .social_media_link {
      margin: 20px;
      margin-top: 2%;
    }

    .social_media_img {
      /* margin: 20px;
       margin-top: 2%; */
      display: flex;
      justify-content: center;
      justify-items: center;
      width: 80px;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <div class="main-container">
    <div class="container">
      <!-- Navigation -->
      <nav>
        <img src="../../assets/logo.png" alt="logos">
        <a href="../../src/login/index.php"> <button class="nav_btn"><b>Login</b></button></a>
        <a href="../../src/contact/index.php" class="nav_link">Contact</a>
        <a href="../../src/service/index.php" class="nav_link">Article</a>
        <a href="../../src/about_us/index.php" class="nav_link">About</a>
        <a href="../../src/Home/index.php" class="nav_link">Home</a>
      </nav>


      <div class="navbar">
        <?php
        $categoryImages = [
          'all' => '../../assets/all.png',
          'law' => '../../assets/law2.png',
          'business' => '../../assets/business.png',
          'sport' => '../../assets/sports.png',
          'game' => '../../assets/game.webp',
          'technology' => '../../assets/computer2.png'
        ];

        $categories = array_keys($categoryImages);
        foreach ($categories as $cat) {
          $active = ($cat == $category) ? 'active' : '';
          $imgSrc = $categoryImages[$cat];
          echo "<a href='?category=$cat' class='$active'>
            <img src='$imgSrc' alt='$cat' style='width:20px;height:20px;margin-right:5px;vertical-align:middle;'>
            " . ucfirst($cat) . "
          </a>";
        }
        ?>
      </div>


      <?php if ($detailsId && $detailArticle): ?>
        <!-- Detail Page -->
        <div class="detail-container">
          <div class="detail-img">
            <img src="<?= htmlspecialchars($detailArticle['image2']) ?>" alt="Thumbnail">
          </div>
          <div class="detail-content">
            <h2><?= htmlspecialchars($detailArticle['mainTitle']) ?></h2>
            <h4 style="color:gray;"><?= htmlspecialchars($detailArticle['subTitle']) ?></h4>
            <p class="category"><?= strtoupper($detailArticle['categories']) ?></p>
            <p><?= nl2br(htmlspecialchars($detailArticle['description'])) ?></p>
            <a href="?category=<?= urlencode($category) ?>"><button class="detail-btn-back">Go Back</button></a>
          </div>
        </div>
      <?php else: ?>
        <!-- Grid View -->
        <div class="grid">
          <?php foreach ($articles as $article): ?>
            <a class="card" href="?category=<?= urlencode($category) ?>&details=<?= $article['id'] ?>">
              <img src="<?= htmlspecialchars($article['image2']) ?>" alt="<?= htmlspecialchars($article['mainTitle']) ?>">
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

    </div>
  </div>
  <footer class="foot_home">
    <div class="container">
      <!-- <div class="subscribe_part">
                <input type="email" name="" id="" placeholder="Enter E-mail">
                <button class="subscribe_part_btn" type="submit" onclick="alert('Sent successfully!')">Submit</button>
            </div> -->
      <form method="POST">
        <div class="subscribe_part">
          <input type="email" name="email" placeholder="Enter E-mail">
          <button class="subscribe_part_btn" type="submit" name="submit">Submit</button>
        </div>
      </form>
      <div class="social_media">
        <a class="social_media_link" href="https://www.facebook.com"> <img class="social_media_img" src="../../assets//fb.webp" alt=""></a>
        <a class="social_media_link" href="https://www.instagram.com"> <img class="social_media_img" src="../../assets//insta.png" alt=""></a>
        <a class="social_media_link" href="https://www.whatsapp.com"> <img class="social_media_img" src="../../assets//whats1.png" alt=""></a>
        <a class="social_media_link" href="https://www.linkedin.com"> <img class="social_media_img" src="../../assets//link.webp" alt=""></a>
      </div>
      <p style="text-align: center;color:#6d6969;padding:20px ">Copyright © 2025 Nepal Tech. All Rights Reserved.</p>
    </div>
  </footer>
</body>

</html>