<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Blogsphere");
$_SESSION['is_valid_user'] = true;
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
      if (!localStorage.getItem('user_id')) {
        window.location.href = '../../src/login/index.php';
      }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Construction</title>
</head>

<body >
    <div class="dashboard" style="overflow: hidden;"> 


        <div class="dashboard_sidebar">

        <div class="top_item" style="display: flex;padding:10px">

        <img src=" ../../../assets/logo.png" alt="" class="logo_img">
                <h2 class="brand_name" style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
            <!-- <div class="side_item_list"> <img src="../assets//adminlogo.png" alt="">
                <p class="side_items">Rohit Singh</p>
            </div><br> -->
            <a class="side_items_anchor" href="../dashboard/index.php">
                <img src="../../../assets/home_icon.png" alt="">
                <p class="side_items">Dashboard</p>
            </a><br>
            <a class="side_items_anchor" href="../post_blog/index.php">
            <img src="../../../assets/upload.png" alt="">
                <p class="side_items">Post</p>
            </a> <br>
            <a class="side_items_anchor" href="../user_grid/index.php">
            <img src="../../../assets/user.png" alt="">
                <p class="side_items">User Grid</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../../../assets/tablelist.png" alt="">
                <p class="side_items">Table List</p>
            </a><br>
            
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../../../assets/document.png" alt="">
                <p class="side_items">Document</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../../../assets/support.png" alt="">
                <p class="side_items">Support</p>
            </a><br>


        </div>

        <div class="center_content" >

        <div class="topbar">
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../../../assets//adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p style="font-size:larger !important;"><?php echo $firstname ?></p>
                    <a href="../../../php/logout.php" id="logoutLink" >
                        <img src="../../../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content" style="overflow:hidden" >
                
            <!-- <img style="background-size: contain;" src="../../../assets//construction1.jpg" alt=""> -->
            </div>
        </div>
    </div>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const logoutLink = document.getElementById('logoutLink');

    if (logoutLink) {
      logoutLink.addEventListener('click', function (event) {
        event.preventDefault(); // Stop the default navigation
        if (confirm('Are you sure you want to logout?')) {
          localStorage.clear(); // Clear all localStorage
          window.location.href = this.href; // Then redirect
        }
      });
    }
  });
</script>
</body>

</html>