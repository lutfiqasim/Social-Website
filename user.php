<div class="friends">
    <?php
    $image = "images/user_male.jpg";
    if ($FRIEND_ROW['gender'] == "female") {
        $image = "images/user_female.jpg";
    }
    ?>
    <img class="firends-Img" src="<?php echo $image?>" alt="user1Img">
    <br>
    <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name']; ?>
</div>