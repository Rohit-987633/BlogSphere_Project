<?php
session_start();
$_SESSION['is_valid_user'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard">


        <div class="dashboard_sidebar">

            <div class="top_item" style="display: flex;padding:10px">

                <img src="../assets///logo.png" alt="" class="logo_img">
                <h2 class="brand_name" style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
            <!-- <div class="side_item_list"> <img src="../assets//adminlogo.png" alt="">
                <p class="side_items">Rohit Singh</p>   
            </div> -->
            <a class="side_items_anchor" href="../dashboard/index.php">
                <img src="../assets/home_icon.png" alt="">
                <p class="side_items">Dashboard</p>
            </a><br>
            <a class="side_items_anchor" href="../post_blog/index.php">
            <img src="../assets/upload.png" alt="">
                <p class="side_items">Post</p>
            </a> <br>
            <a class="side_items_anchor" href="../user_grid/index.php">
            <img src="../assets/user.png" alt="">
                <p class="side_items">User Grid</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/tablelist.png" alt="">
                <p class="side_items">Table List</p>
            </a><br>
            
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/document.png" alt="">
                <p class="side_items">Document</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/support.png" alt="">
                <p class="side_items">Support</p>
            </a><br>    
            <hr style="position: absolute; bottom: 75px; width: 100%; left: 0; border: none; border-top: 1px solid white;">
            <a class="side_items_anchor no_hover" href="../construction/index.php" style="position: absolute;bottom:10px;color:white">
            <img src="../assets/logoutwhite.png" alt="">
                <p class="side_items">Logout</p>
            </a><br>
            

        </div>

        <div class="center_content">

            <div class="topbar">
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p>
                    <a href="../php/logout.php" onclick="return confirm('Are you sure you want to logout?');">
                        <img src="../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">
                <h2 style="padding: 15px;"> </h2>
                <div class="card">
                    <div class="card_header">
                        <img src="../assets/blog.png" alt="">
                    </div>
                    <div class="card_body">
                        <h2 class="header_card">4,000</h2>
                        <h2 style="color: gray;">Blogs</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <img src="../assets/cmt.png" alt="" class="dashboard_card_img">
                    </div>
                    <div class="card_body">
                        <h2 class="header_card">800</h2>
                        <h2 style="color: gray;">Comment</h2>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card_header">
                    <img src="../assets/likemain.png" alt="" style="width: 70px;height: 35%;">
                </div>
                <div class="card_body">
                <h2 class="header_card">200</h2>
                <h2 style="color: gray;">Likes</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                    <img src="../assets/share2.png" alt="" style="width: 70px;height: 30%;">
                    </div>
                    <div class="card_body">
                    <h2 class="header_card">78</h2>
                    <h2 style="color: gray;">Share</h2>
                    </div>
                </div>

                <div class="chart_content">
                    <div class="image_content_dashboard">
      <div class="test" style="background-color: white;padding:15px;border-radius:20px">                  
                            <h2 style="text-align: center;">Barchart</h2>
                            <img class="barchart" src="../assets/bar_new.png" alt="" >
</div>
<div class="test" style="background-color: white;padding:15px;margin-left:45px;border-radius:20px">                  
                            <h2 style="text-align: center;">Piechart</h2>
                            <img class="piechart" src="../assets/pie_new.png" alt="">
</div>
      
                    </div> 

                    
                    <br><br>
                    <h2>Diagrams</h2>
                </div>
                <footer>
            <p style="text-align: center;color:#6d6969;background-color:white;padding:20px ">Copyright © 2025 Nepal Tech. All Rights Reserved.
            </footer>    
            </div>
            

            

        </div>
    </div>
</body>

</html>