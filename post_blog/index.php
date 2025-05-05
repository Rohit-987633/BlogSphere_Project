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
            <hr>
            <!-- <div class="side_item_list"> <img src="../assets//adminlogo.png" alt="">
                <p class="side_items">Rohit Singh</p>
            </div><br> -->

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


            <!-- <a class="side_items_anchor" href="../dashboard/index.php"><p class="side_items">Dashboard</p> </a><br>
            <a class="side_items_anchor" href="../post_blog/index.php"><p class="side_items">Post</p></a> <br>
            <a class="side_items_anchor" href="../construction/index.php"><p class="side_items">Table List</p> </a><br>
            <a class="side_items_anchor" href="../construction/index.php"><p class="side_items">User Grid</p> </a><br>
            <a class="side_items_anchor" href="../construction/index.php"><p class="side_items">Document</p> </a><br>
            <a class="side_items_anchor" href="../construction/index.php"><p class="side_items">Support</p> </a><br> -->


        </div>

        <div class="center_content">

        <div class="topbar">
                <h3>Admin Dashboard</h3>
                <div class="topbar_info">
                    <img src="../assets///adminlogo.png" alt="" style="border-radius: 50%;background-color:gray !important">
                    <p>Rohit Singh</p>
                    <img src="../assets///back.png" alt="" class="logout_btn">
                </div>
            </div>

            <div class="content">
                <div class="submission_form">
                <h1>
                    Post A Blog
                </h1> <br>
                <table class="post_table">
                    <tr>
                        <td>Title</td    >
                        <td> <input type="text" name="" id=""></td>
                        <td>Sub-Title</td    >
                        <td> <input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>Description</td    >
                        <td> <textarea name="" rows="3" cols="21" id=""></textarea></td>
                        <td >Category</td>
                        <td> 
                            <select name="" id="" style="padding: 10px;width:100%;cursor:pointer">
                                <option value="technology">Technology</option>
                                <option value="business">Business</option>
                                <option value="law">Law</option>
                                <option value="sport">Sports</option>
                                <option value="game">Game</option>


                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                        <input type="file" id="imageUpload" name="imageUpload" accept="image/png, image/jpeg"></td>
                    </tr>
                    <tr>
                      <td><button>Submit</button></td>  
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>







</body>

</html>