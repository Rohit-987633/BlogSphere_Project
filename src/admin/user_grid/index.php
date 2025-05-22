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
                    <a href="../../../php/logout.php" id="logoutLink" >
                    <img src="../../../assets///back.png" alt="" class="logout_btn"></a>
                </div>
            </div>

            <div class="content">

                <div class="submission_form">
                    <h2 style="text-align: center;background-image:url('../../../assets/purple.png');padding:10px">
                        Update Profile
                    </h2> 
                    <form action="../../../php/updateUser.php" , method="POST" class="mod_form">
                        <table class="post_table">
                        <input type="hidden" name="user_id" id="hiddenUserId">

                            <tr>
                                <td>First Name</td>
                                <td> <input type="text" name="firstname" id="" required class="custom_input"></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td> <input required class="custom_input" type="text" name="lastname" id=""></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> <input type="email" name="email" id="" class="custom_input" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td> 

<div style="position: relative;">
<input type="password" id="password" name="password" placeholder="Password" required 
style="padding-right: 30px;">

<img src="../../../assets/hide.png" id="togglePassword" alt="Toggle Password" 
style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 28px; cursor: pointer;">
</div>



                            </td>
                            </tr>

                            <tr>
                                <td>Confirm Password</td>
                                <td> 
                                
<div style="position: relative;">
<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required 
style="padding-right: 30px;">

<img src="../../../assets/hide.png" id="confirmtogglePassword" alt="Toggle confirm Password" 
style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 28px; cursor: pointer;">
</div>
    
                                <!-- <input required type="password" name="" id=""></td> -->
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
  document.addEventListener("DOMContentLoaded", function () {
    const userId = localStorage.getItem("user_id");
    if (userId) {
      document.getElementById("hiddenUserId").value = userId;
    }
  });

            
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("togglePassword");

  toggleIcon.addEventListener("click", () => {
    const isPassword = passwordInput.type === "password";
    passwordInput.type = isPassword ? "text" : "password";
    toggleIcon.src = isPassword ? "../../../assets/show.webp" : "../../../assets/hide.png";
  });



  const confirmpasswordInput = document.getElementById("confirm_password");
  const confirmtoggleIcon = document.getElementById("confirmtogglePassword");

  confirmtoggleIcon.addEventListener("click", () => {
    const isPassword = confirmpasswordInput.type === "password";
    confirmpasswordInput.type = isPassword ? "text" : "password";
    confirmtoggleIcon.src = isPassword ? "../../../assets/show.webp" : "../../../assets/hide.png";
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