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

                <img src="../assets///logo.png" alt="">
                <h2 style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
            <hr >
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
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/tablelist.png" alt="">
                <p class="side_items">Table List</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/user.png" alt="">
                <p class="side_items">User Grid</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/document.png" alt="">
                <p class="side_items">Document</p>
            </a><br>
            <a class="side_items_anchor" href="../construction/index.php">
            <img src="../assets/support.png" alt="">
                <p class="side_items">Support</p>
            </a><br>


        </div>

        <div class="center_content">

            <div class="topbar">
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p>
                    <a href="../Home/index.php"><img src="../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">
                <h2 style="padding: 15px;"> </h2>
                <div class="card">
                    <div class="card_header">
                        <img src="../assets/blog.png" alt="">
                    </div>
                    <div class="card_body">
                        <h1>4,000</h1>
                        <h2 style="color: gray;">Total Blogs</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                    <img src="../assets/likemain.png" alt="" style="width: 70px;height: 35%;">
                </div>
                <div class="card_body">
                <h1>200</h1>
                <h2 style="color: gray;">Total Likes</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                    <img src="../assets/share2.png" alt="" style="width: 70px;height: 30%;">
                    </div>
                    <div class="card_body">
                    <h1>78</h1>
                    <h2 style="color: gray;">Total Share</h2>
                    </div>
                </div>

                <div class="chart_content">
                    <div class="image_content_dashboard">
                        <img class="barchart" src="../assets/bar_new.png" alt="">
                        <img class="piechart" src="../assets/pie_new.png" alt="">
                    </div> 
                    <br><br>
                    <h2>Chart Content</h2>
                </div>


            </div>

        </div>
    </div>
</body>

</html>