<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Blogsphere");

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

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
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
</head>

<body>
    <div class="dashboard">
        <div class="dashboard_sidebar">
            <div class="top_item" style="display: flex;padding:10px">
            <img src="../../../assets///logo.png" alt="" class="logo_img">
                <h2 class="brand_name" style="margin-top:10px;">BlogSphere</h2>
                <br>
            </div>
            <a class="side_items_anchor" href="../../admin/dashboard/index.php">
                <img src="../../../assets/home_icon.png" alt="">
                <p class="side_items">Dashboard</p>
            </a>
            <a class="side_items_anchor" href="../../admin/post_blog/index.php">
                <img src="../../../assets/upload.png" alt="">
                <p class="side_items">Post</p>
            </a>
            <a class="side_items_anchor user_grid" href="../../admin/user_grid/index.php">
                <img src="../../../assets/user.png" alt="">
                <p class="side_items">User Grid</p>
            </a>
            <a class="side_items_anchor custom_tag" href="../user_management/index.php">
                <img src="../../../assets/user.png" alt="">
                <p class="side_items">User Manage</p>
            </a>
            <a class="side_items_anchor" href="../../admin/construction/index.php">
                <img src="../../../assets/tablelist.png" alt="">
                <p class="side_items">Table List</p>
            </a>

            <a class="side_items_anchor" href="../../admin/construction/index.php">
                <img src="../../../assets/document.png" alt="">
                <p class="side_items">Document</p>
            </a>
            <a class="side_items_anchor" href="../../admin/construction/index.php">
                <img src="../../../assets/support.png" alt="">
                <p class="side_items">Support</p>
            </a>
        </div>
        <div class="center_content">
            <div class="topbar">
                <h3>Super Admin Dashboard</h3>
                <div class="topbar_info">
                    <img class="user_logo" src="../../../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Super</p>
                    <a href="../../../php/logout.php" id="logoutLink" >
                        <img src="../../../assets///back.png" alt="" class="logout_btn"></a>
                    
                </div>
            </div>

            <div  class="content">

                <div class="submission_form">
                    <h1 style="text-align: center;">
                        Manage Record
                    </h1> <br> <br>
                    <table style="width:100%" class="user_table">
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th style="width: 7%;">Action</th>

                        </tr>

                        <?php
                        $sql = "SELECT id, firstname, lastname, email FROM sign_up";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . htmlspecialchars($row['firstname']) . "</td>
                <td>" . htmlspecialchars($row['lastname']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>
                <a href='../../../php/deleteUser.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">

                    <img src='../../../assets/del.png' alt='Delete' class='del'>
                    </a>
                    <a href='./editUser.php?id=" . $row['id'] ."'>
                    <img src='../../../assets/edit.png' alt='Edit' class='del2'>
                    </a>
                </td>
            </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>


                    </table>
                    <br><br>
                </div>
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