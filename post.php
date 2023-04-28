<div id="posts">
    <div>
        <?php
            $image ="images/user_male.jpg";
            if ($row_user['gender'] == "female"){
                $image ="images/user_female.jpg";
            }
        ?>

        <img src="<?php echo $image;?>" style="width: 75px; margin-right: 4px;">
    </div>
    <div>
        <p class="userName-InPost"><?php echo $row_user['first_name']." ".$row_user['last_name'];?></p>
        <?php echo $ROW['post'];?>

        <br><br>
        <ul class="post-choices">
            <li><a href="">Like</a></li>
            <li><a href="">comment</a></li>
            <li><span class="date-of-post">
                <?php echo $ROW['date'];?>
            </span></li>
        </ul>
    </div>
</div>