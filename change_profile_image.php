<?php
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/image.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['NetworkZoneF_userid']);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
        if ($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/jpg") {
            $filename = "uploads/" . $_FILES['file']['name']; // original file name
            move_uploaded_file($_FILES['file']['tmp_name'], $filename);

            $image_c = new Image();
            $image_c->crop_image($filename,$filename,800,800);
            if (file_exists($filename)) {
                $userid = $user_data['userid'];
                $query = "update users set profile_image = '$filename' where userid ='$userid' limit 1";
                $conn = new Database();
                $conn->save($query);
                header("Location: profile.php");
                die;
            }
        } else {
            echo "</pre>";
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>Following errors occured<br>";
            echo "Please upload an image!";
            echo "<br></div>";
        }

    } else {
        echo "</pre>";
        echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>Following errors occured<br>";
        echo "Please enter a Valid image!";
        echo "<br></div>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Change profile Image | NetworkZoneF</title>
    <link rel="stylesheet" href="profile.css">
    <style>
        #friends-bar2 {
            background-color: none;
            min-height: 400px;
            margin-top: 20px;
            color: #aaa;
            padding: 8px;
            text-align: center;
            font-size: 20px;
        }

        #main-content-div {
            margin: auto;
        }

        #post_button {
            width: auto;
        }
    </style>
</head>

<body>
    <br>
    <!-- Top bar -->
    <?php include("header.php"); ?>
    <!-- Below cover area (Content) -->
    <section id="main-content-div">

        <!-- posts area -->
        <section id="posts-area">
            <form method="post" enctype="multipart/form-data">
                <div id="whats-on-your-Mind">
                    <input type="file" name="file">
                    <input type="submit" id="post_button" value="upload">
                    <br>
                </div>
            </form>
        </section>
    </section>
    </section>
</body>

</html>