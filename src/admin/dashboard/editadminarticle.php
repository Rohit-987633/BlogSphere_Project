<?php
session_start();

$conn = new mysqli("localhost", "root", "", "Blogsphere");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        if (!localStorage.getItem('user_id') && !localStorage.getItem('super_user_id')) {
            window.location.href = '../../login/index.php';
        }
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="editstyle.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
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
            </a>
            <a class="side_items_anchor" href="../post_blog/index.php">
                <img src="../../../assets/upload.png" alt="">
                <p class="side_items">Post</p>
            </a>
            <a class="side_items_anchor user_grid" href="../user_grid/index.php">
                <img src="../../../assets/user.png" alt="">
                <p class="side_items">User Grid</p>
            </a>
            <a class="side_items_anchor custom_tag" href="../../superuser/user_management/index.php">
                <img src="../../../assets/user.png" alt="">
                <p class="side_items">User Manage</p>
            </a>
            <a class="side_items_anchor" href="../construction/index.php">
                <img src="../../../assets/tablelist.png" alt="">
                <p class="side_items">Table List</p>
            </a>

            <a class="side_items_anchor" href="../construction/index.php">
                <img src="../../../assets/document.png" alt="">
                <p class="side_items">Document</p>
            </a>
            <a class="side_items_anchor" href="../construction/index.php">
                <img src="../../../assets/support.png" alt="">
                <p class="side_items">Support</p>
            </a>




        </div>

        <div class="center_content">

            <div class="topbar">

            <h3 id="dashboardTitle"></h3>

<script>
    document.getElementById("dashboardTitle").textContent =
        localStorage.getItem("super_user_id") ? "Super Admin Dashboard" :
        localStorage.getItem("user_id") ? "Admin Dashboard" : "Dashboard";
</script>
<div class="topbar_info">
    <img class="user_logo" src="../../../assets//adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
    <p id="firstname" style="font-size:larger !important;"></p>

<script>
document.getElementById("firstname").textContent =
localStorage.getItem("super_user_id") ? "Super" :
localStorage.getItem("user_id") ? "<?php echo $firstname ?>" : "Dashboard";
</script>
<!-- 



                <h3>Super User Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../../../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p> -->
                    <a href="../Home/index.php"><img src="../../../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">



                <div class="submission_form2">
                    <h2 style="text-align: center;background-image:url('../assets/purple.png');padding:10px">
                        Update Profile
                    </h2>
                    <form action="../../../php/updateArticle.php" method="POST" class="mod_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
<input type="hidden" name="current_image" value="<?= $row['image2'] ?>">


                        <table class="post_table edit_table">
                            <tr>

                                <td>Main Title</td>
                                <td> <input type="text" name="maintitle" id="" value="<?= $row['mainTitle'] ?>" required></td>
                                <td>Sub Title</td>
                                <td> <input required type="text" name="subtitle" id="" value="<?= $row['subTitle'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td colspan="40">
                                    <textarea name="description" rows="12" cols="85" required><?= $row['description'] ?></textarea>

                                    </textarea>
                                </td>

                               
                            </tr>

                            <tr>
                                
                                <td>Image</td>
                                <td>
                                    <input type="file" id="imageUpload" name="image" accept="image/jpg, image/png, image/gif, image/jpeg">
                                    <br>
                                    <img src="<?= $row['image2'] ?>" alt="Current Image" width="150">

                                    <!-- <img src="../../assets/<?= $row['image2'] ?>" alt="Current Image" width="100"> -->
                                </td>

                                <!-- <td>
                                    <input type="file" id="imageUpload" name="image" accept="image/jpg, image/png, image/gif, image/jpeg" value="<?= $row['image2 '] ?>" required>
                                </td> -->

                                <td>Category</td>
                                <td>

                                    <select name="categories" style="padding: 10px;width:100%;cursor:pointer" required>
                                        <option value="" disabled>Select a category</option>
                                        <option value="technology" <?= $row['categories'] == 'technology' ? 'selected' : '' ?>>Technology</option>
                                        <option value="business" <?= $row['categories'] == 'business' ? 'selected' : '' ?>>Business</option>
                                        <option value="law" <?= $row['categories'] == 'law' ? 'selected' : '' ?>>Law</option>
                                        <option value="sport" <?= $row['categories'] == 'sport' ? 'selected' : '' ?>>Sports</option>
                                        <option value="game" <?= $row['categories'] == 'game' ? 'selected' : '' ?>>Game</option>
                                    </select>


                                </td>

                            </tr>


                            <td>

                                <?php
                                if (isset($_SESSION['message'])) {
                                    $msg =  $_SESSION['message'];
                                    echo "<script type='text/javascript'>alert('$msg');</script>";
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </td>
                            <tr>
                                <td><button type="submit">Submit</button></td>
                                <td> <a href="./index.php"> <button type="button">Back</button></a></td>

                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
   <script>
    const superUserId = localStorage.getItem("super_user_id");
        const element = document.getElementsByClassName("custom_tag")[0];
        const element2 = document.getElementsByClassName("user_grid")[0];
        if (superUserId) {
            element.style.display = "flex";
            element2.style.display = "none";
        } else {
            element.style.display = "none";
            element2.style.display = "flex";
        }
   </script>
</body>

</html>