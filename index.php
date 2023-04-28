<?php
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['NetworkZoneF_userid']);

?>
<!DOCTYPE html>
<html>

<head>
    <title>NetworkZoneF</title>
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
    </style>
</head>

<body>
    <br>
    <!-- Top bar -->
    <?php include("header.php"); ?>
    <!-- Below cover area (Content) -->
    <section id="main-content-div">
        <!-- friends area -->
        <div id="friendsArea">
            <div id="friends-bar2">
                <img src="personal-imgs/MyIMG.jpg" id="profile-picture2"><br>
                <div style="color:black;font-size:18px;">
                    <a href="profile.php" style="color:black;font-size:20px;text-decoration: none;">
                        <?php echo $user_data["first_name"] . " " . $user_data["last_name"]; ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- posts area -->
        <section id="posts-area">
            <div id="whats-on-your-Mind">
                <textarea placeholder="Whats on your mind? "></textarea>
                <input type="submit" id="post_button" value="post">
                <br>
            </div>
            <!-- posts-->
            <div id="post-bar">
                <!-- post 1-->
                <div id="posts">
                    <div>
                        <img src="personal-imgs/user1.jpg" style="width: 75px; margin-right: 4px;">
                    </div>
                    <div>
                        <p class="userName-InPost"> First Guy
                        <p>
                            sjadf;lkjsaklf;jsaklfjsaklfshgjkashjdkgfklsafj
                            <br><br>
                        <ul class="post-choices">
                            <li><a href="">Like</a></li>
                            <li><a href="">comment</a></li>
                            <li><span class="date-of-post">April 24 2023</span></li>
                        </ul>
                    </div>
                </div>
                <!-- post 2-->
                <div id="posts">
                    <div>
                        <img src="personal-imgs/user3.jpg" style="width: 75px; margin-right: 4px;">
                    </div>
                    <div>
                        <p class="userName-InPost"> First Guy
                        <p>
                            sjadf;lkjsaklf;jsaklfjsaklfshgjkashjdskdxcm,vnmz,xnvkdksjaklfjsdklajvkcxjzvklcx;z<br>salkdjfsklafjdlskajfioewjfiasjflksdafjklsdaj;fkladsjfioew;jokgfklsaf<br>jcm,xvznkdsjagjkjiowejfgklsadjfieiwjoqijfriowjhfeiwjfioewjfsakldfjdkl2222233333
                            <br><br>
                        <ul class="post-choices">
                            <li><a href="">Like</a></li>
                            <li><a href="">comment</a></li>
                            <li><span class="date-of-post">April 24 2023</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>
    </section>
</body>

</html>