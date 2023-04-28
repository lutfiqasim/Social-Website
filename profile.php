<?php
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['NetworkZoneF_userid']);

// For posting
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $post = new Post();
    $result = $post->create_post($_SESSION['NetworkZoneF_userid'], $_POST);

    if ($result == "") //error returned if it =="" then posted successfully
    {
        header("Location: profile.php");
        die;
    } else {
        echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo "<br>Following errors occured<br>";
        echo $result;
        echo "<br></div>";
    }

}
// collect posts
$post = new Post();
$posts = $post->get_posts($_SESSION['NetworkZoneF_userid']);

// collect friends
$user = new User();
$friends = $user->get_friends($_SESSION['NetworkZoneF_userid']);


?>
<!DOCTYPE html>
<html>

<head>
    <title>NetworkZoneF</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <?php include("header.php"); ?>
    <!-- Cover area -->
    <section id="content-area">
        <div id="cover-img">
            <img style="width:100%;margin-bottom:-16pt;" src="mountain.jpg">

            <!-- Personal Image -->
            <span style="font-size: 11px;">
                <?php
                $image = "";
                if (file_exists($user_data['profile_image'])) {
                    $image = $user_data['profile_image'];
                } else {
                    $image = "images/user_male.jpg";
                    if ($user_data['gender'] == "female") {
                        $image = "images/user_female.jpg";
                    }
                }
                ?>
                <img width="400px" id="profile-picture" src="<?php echo $image ?>" alt="personal img">
                <br><a href="change_profile_image.php" style="text-decoration:none;">Change Profile Image</a>&nbsp;|&nbsp;
                <a href="change_profile_image.php" style="text-decoration:none;">Change Cover Image</a>
            </span>

            <br>
            <div id="personal-name">
                <?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?>
                <div>
                    <!-- <br> -->
                    <ul id="profile-main-nav">
                        <li><a href="index.php">Time line</a></li>
                        <li>About</li>
                        <li>Friends</li>
                        <li>Photos</li>
                        <li>Settings</li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- Below cover area (Content) -->
        <section id="main-content-div">
            <!-- friends area -->
            <div id="friendsArea">
                <div id="friends-bar">
                    Friends<br>
                    <?php
                    if ($friends) {
                        foreach ($friends as $FRIEND_ROW) {
                            //post.php will have these data now
                            include("user.php");

                        }
                    }
                    ?>
                </div>
            </div>

            <!-- posts area -->
            <section id="posts-area">
                <div id="whats-on-your-Mind">
                    <form method="post">
                        <textarea name="post" placeholder="Whats on your mind? "></textarea>
                        <input type="submit" id="post_button" value="post">
                        <br>
                    </form>
                </div>
                <!-- posts-->
                <div id="post-bar">
                    <!-- post 1-->
                    <?php
                    if ($posts) {
                        foreach ($posts as $ROW) {
                            $user = new User();
                            $row_user = $user->get_user($ROW['userid']);
                            //post.php will have these data now
                            include("post.php");

                        }
                    }
                    ?>
                </div>
            </section>
        </section>
    </section>
</body>

</html>