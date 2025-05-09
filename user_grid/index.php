<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
</head>

<body>





    <div class="dashboard">


        <div class="dashboard_sidebar">

            <div class="top_item" style="display: flex;padding:10px">

                <img src="../assets///logo.png" alt="">
                <h2 style="margin-top:10px;">BlogSphere</h2>
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
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p>
                    <a href="../Home/index.php"><img src="../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">

                <div class="submission_form">
                    <h2 style="text-align: center;background-image:url('../assets/purple.png');padding:10px">
                        Update Profile
                    </h2> 
                    <form action="../php/updateUser.php" , method="POST" class="mod_form">
                        <table class="post_table">
                            <tr>
                                <td>First Name</td>
                                <td> <input type="text" name="firstname" id="" required></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td> <input required type="text" name="lastname" id=""></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> <input type="email" name="email" id="" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td> <input required type="password" name="password" id=""></td>
                            </tr>

                            <tr>
                                <td>Confirm Password</td>
                                <td> <input required type="password" name="" id=""></td>
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
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

        </div>
    </div>







</body>

</html>