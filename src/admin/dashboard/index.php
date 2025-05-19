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
            window.location.href = '../../login/index.php';
        }
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="dashboard">


        <div class="dashboard_sidebar">

            <div class="top_item" style="display: flex;padding:10px">

                <img src="../../../assets//logo.png" alt="" class="logo_img">
                <h2 class="brand_name" style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
            <!-- <div class="side_item_list"> <img src="../assets//adminlogo.png" alt="">
                <p class="side_items">Rohit Singh</p>   
            </div> -->
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

        <div class="center_content">

            <div class="topbar">
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../../../assets//adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p style="font-size:larger !important;"><?php echo $firstname ?></p>

                    <a href="../../../php/logout.php" id="logoutLink">
                        <img src="../../../assets//back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">
                <h2 style="padding: 15px;"> </h2>
                <div class="card">
                    <div class="card_header">
                        <img src="../../../assets/blog.png" alt="">
                    </div>
                    <div class="card_body">
                        <h2 class="header_card">4,000</h2>
                        <h2 style="color: gray;">Blogs</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <img src="../../../assets/cmt.png" alt="" class="dashboard_card_img">
                    </div>
                    <div class="card_body">
                        <h2 class="header_card">800</h2>
                        <h2 style="color: gray;">Comment</h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card_header">
                        <img src="../../../assets/likemain.png" alt="" style="width: 70px;height: 35%;">
                    </div>
                    <div class="card_body">
                        <h2 class="header_card">200</h2>
                        <h2 style="color: gray;">Likes</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card_header">
                        <img src="../../../assets/share2.png" alt="" style="width: 70px;height: 30%;">
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
                            <img class="barchart" src="../../../assets/bar_new.png" alt="">
                        </div>
                        <div class="test" style="background-color: white;padding:15px;margin-left:45px;border-radius:20px">
                            <h2 style="text-align: center;">Piechart</h2>
                            <img class="piechart" src="../../../assets/pie_new.png" alt="">
                        </div>

                    </div>


                    <br><br>
                    <h2>Diagrams</h2>
                </div>





                <div class="chart_content">

                    <div class="image_content_dashboard">

                        <table style="width:100%" class="user_table">
                            <tr>
                                <th>Id</th>
                                <th>Main Title</th>
                                <th>Sub Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Image</th>
                            </tr>

                            <?php
                            // Pagination setup
                            $limit = 5;
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            if ($page < 1) $page = 1;
                            $start = ($page - 1) * $limit;

                            // Get total records
                            $countResult = $conn->query("SELECT COUNT(*) AS total FROM articles");
                            $totalRow = $countResult->fetch_assoc();
                            $total = $totalRow['total'];
                            $totalPages = ceil($total / $limit);

                            // Fetch records for this page
                            $sql = "SELECT id, mainTitle, subTitle, description, categories, image2 
                    FROM articles 
                    LIMIT $start, $limit";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . htmlspecialchars($row['mainTitle']) . "</td>
                        <td>" . htmlspecialchars($row['subTitle']) . "</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                        <td>" . htmlspecialchars($row['categories']) . "</td>
                        <td><img class='table_article_images' src='" . htmlspecialchars($row['image2']) . "' /></td>
                       
                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No records found.</td></tr>";
                            }
                            ?>
                        </table>
                        <div style="text-align:center; margin-top:20px !important; margin:auto;">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1 ?>" style="margin-right:10px;text-decoration:none">&laquo; Prev</a>
                            <?php endif; ?>

                            <?php
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a href='?page=$i' style='margin: 0 5px; text-decoration:none" . ($i == $page ? " color:black;" : "") . "'>$i</a>";
                            }
                            ?>

                            <?php if ($page < $totalPages): ?>
                                <a href="?page=<?= $page + 1 ?>" style="margin-left:10px; text-decoration:none">Next &raquo;</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br>
                    <br>
                    <h2>Articles</h2>
                </div>


                <!-- <div class="chart_content">
                    <div class="image_content_dashboard">
                        <table style="width:100%" class="user_table">
                            <tr>
                                <th>Id</th>
                                <th>Main Title</th>
                                <th>Sub Title</th>
                                <th>Description </th>
                                <th>Category </th>
                                <th>Image</th>
                                <th style="width: 7%;">Action</th>
                            </tr>
                            <?php
                            $user_sql = "SELECT id FROM sign_up WHERE firstname='$firstname' AND lastname='$lastname' AND email='$email'";
                            $user_result = $conn->query($user_sql);

                            if ($user_result && $user_result->num_rows > 0) {
                                $user_row = $user_result->fetch_assoc();
                                $user_id = $user_row['id'];

                                // Step 2: Get articles for this user ID
                                $article_sql = "SELECT id, mainTitle, subTitle, description, categories, image2 FROM articles WHERE user_id = $user_id";
                                $sql = "SELECT id, mainTitle, subTitle, description, categories, image2 FROM articles";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Debug: Output the image URL
                                        echo "<tr>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . htmlspecialchars($row['mainTitle']) . "</td>
                                                <td>" . htmlspecialchars($row['subTitle']) . "</td>
                                                <td>" . htmlspecialchars($row['description']) . "</td>
                                                <td>" . htmlspecialchars($row['categories']) . "</td>
                                                <td>
                                                    <img class='table_article_images' src='" . htmlspecialchars($row['image2']) . "' />
                                                </td>
                                                <td>
                                                    <a href='../../../php/deleteUser.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                                        <img src='../../../assets/del.png' alt='Delete' class='del'>
                                                    </a>
                                                    <a href='./../../../superuser/editUser.php?id=" . $row['id'] . "'>
                                                        <img src='../../../assets/edit.png' alt='Edit' class='del2'>
                                                    </a>
                                                </td>
                                                    </tr>";
                                                                }
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='7'>No records found.</td></tr>";
                                                        }
                                                        ?>



                                </table>
                    </div>
                    <br>
                    <h2>Articles</h2>

                </div> -->

                <br><br>

                <div class="chart_content">
                    <div class="image_content_dashboard">
                        <table style="width:100%" class="user_table">
                            <tr>
                                <th>Id</th>
                                <th>Main Title</th>
                                <th>Sub Title</th>
                                <th>Description </th>
                                <th>Category </th>
                                <th>Image</th>
                                <th style="width: 7%;">Action</th>
                            </tr>
                            <?php
                            $sql = "SELECT id, mainTitle, subTitle, description, categories, image2 FROM articles where user_id=$user_id";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Debug: Output the image URL
                                    echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . htmlspecialchars($row['mainTitle']) . "</td>
                                <td>" . htmlspecialchars($row['subTitle']) . "</td>
                                <td>" . htmlspecialchars($row['description']) . "</td>
                                <td>" . htmlspecialchars($row['categories']) . "</td>
                                <td>
                                    <img class='table_article_images' src='" . htmlspecialchars($row['image2']) . "' />
                                </td>
                                <td>
                                    <a href='../../../php/deleteArticle.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                        <img src='../../../assets/del.png' alt='Delete' class='del'>
                                    </a>
                                    <a href='../dashboard/editadminarticle.php?id=" . $row['id'] . "'>
                                        <img src='../../../assets/edit.png' alt='Edit' class='del2'>
                                    </a>
                                </td>
                            </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No records found.</td></tr>";
                            }
                            ?>



                        </table>
                    </div>
                    <br>
                    <h2>My Articles</h2>

                </div>

                <br><br>
                <footer style="display: block;">
                    <p style="text-align: center;color:#6d6969;background-color:white;padding:20px ">Copyright © 2025 Nepal Tech. All Rights Reserved.
                </footer>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutLink = document.getElementById('logoutLink');

            if (logoutLink) {
                logoutLink.addEventListener('click', function(event) {
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