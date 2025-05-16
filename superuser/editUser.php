<?php
session_start();

$conn = new mysqli("localhost", "root", "", "Blogsphere");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM sign_up WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with ID $id.";
    }
} else {
    echo "No ID provided in the URL.";
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
      if (!localStorage.getItem('user_id')) {
        window.location.href = '../login/index.php';
      }
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
</head>

<body>
    <div class="dashboard">


        <div class="dashboard_sidebar">

            <div class="top_item" style="display: flex;padding:10px">

                <img src="../assets///logo.png" alt="" class="logo_img">
                <h2 class="brand_name" style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
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
        </div>

        <div class="center_content">

            <div class="topbar">
                <h3>Super User Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p>
                    <a href="../Home/index.php"><img src="../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">



                <div class="submission_form2">
                    <h2 style="text-align: center;background-image:url('../assets/purple.png');padding:10px">
                        Update Profile
                    </h2>
                    <form action="../php/updateUser.php" , method="POST" class="mod_form">
                        <table class="post_table edit_table">
                            <tr>

                                <td>First Name</td>
                                <td> <input type="text" name="firstname" id="" value="<?= $row['firstname'] ?>" required></td>
                                <td>Last Name</td>
                                <td> <input required type="text" name="lastname" id="" value="<?= $row['lastname'] ?>"></td>
                            </tr>
                            <tr>

                                <td>Email</td>
                                <td> <input type="text" name="email" id="" value="<?= $row['email'] ?>" required></td>
                                <td>Confirm Email</td>
                                <td> <input type="text" name="title" id="" required></td>
                            </tr>

                            <tr>
                                <td>Password</td>
                                <td> <input type="password" name="password" value="<?=$row['password']?>" id="" required></td>
                                <td>Confirm Password</td>
                                <td> <input type="text" name="title" id="" required></td>
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
                                <td><button type="submit" >Submit</button></td>
                                <td> <a href="./index.php"> <button type="button">Back</button></a></td>

                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>