<?php

    session_start();

    include("classes/connect.php");
    include("classes/login.php");

    $email ="";
    $password ="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $login = new Login();
        $result =$login->evaluate($_POST);

        if ($result != "")
        {
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>Following errors occured<br>";
            echo $result;
            echo "<br></div>";
        }
        else 
        {
            header("Location:profile.php");
            die;
        }

        $email =$_POST['email'];
        $password =$_POST['password'];
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NetworkZoneF | Login</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <!-- Main bar -->
        <section class="header-signup">
            <div id="title">NetworkZoneF</div>
            <div id="signup_button"> Signup</div>
        </section>
        <!-- Form  -->
        <form method="post" action="login.php" id="signup-Form">
            Login in to NetworkZoneF<br><br>
            <input value ="<?php echo $email?>" name="email"type="text" class="text_input" id="email" placeholder="Enter Email"><br><br>
            <input value ="<?php echo $password?>"name="password" type="password" class="text_input"id="password" placeholder="Password"><br><br>
            <input type="submit" id="button" value="Login"><br><br>
        </form>
    </body>
<html>