<?php
    include("classes/connect.php");
    include("classes/signup.php");
    $first_name ="";
    $last_name ="";
    $gender ="";
    $email ="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $signup = new Signup();
        $result =$signup->evaluate($_POST);
        if ($result != "")
        {
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey;'>";
            echo "<br>Following errors occured<br>";
            echo $result;
            echo "<br></div>";
        }
        else 
        {
            header("Location:login.php");
            die;
        }
        $first_name =$_POST['first_name'];
        $last_name =$_POST['last_name'];
        $gender =$_POST['gender'];
        $email =$_POST['email'];
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>NetworkZoneF | Signup</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <!-- Main bar -->
        <section class="header-signup">
            <div id="title">NetworkZoneF</div>
            <div id="signup_button"> Login</div>
        </section>
        
        <!-- Form  -->
        <form method="post" action="signup.php" id="signup-Form" style="margin-top:10px;">
            
            Signup to NetworkZoneF<br><br>
            <!-- name is used by post method -->
            <input value="<?php echo $first_name ?>" type="text" name="first_name" class="text_input" id="f-name" placeholder="First name"><br><br>
            <input value="<?php echo $last_name ?>" type="text" name="last_name" class="text_input" id="l-name" placeholder="Last name"><br><br>
            <label for="chooseGender" style="font-weight: normal;">Gender:</label><br>
            <select name="gender" class="text_input">
                <option value="male"><?php echo $gender ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br><br>
            <input value="<?php echo $email ?>"type="email" name="email" class="text_input" id="email" placeholder="Enter Email"><br><br>
            <input type="password" name="password"class="text_input"id="password" placeholder="Password"><br><br>
            <input type="password"name="password2" class="text_input"id="password" placeholder="Retype Password"><br><br>
            <input type="submit" id="button" value="Sign up"><br><br>
        </form>
    </body>
<html>