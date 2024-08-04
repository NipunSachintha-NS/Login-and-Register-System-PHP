<?php
    session_start();
    if(isset($_SESSION["user_email"])){
        header("location: ./profile.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register System</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<!--Messages-->
     <?php
        if(isset($_GET["err"])){
            if($_GET["err"] === "empty_inputs"){
                echo "<P class='msg' style='background-color:#ee2222;'>All the input fields must be filled!</p>";
            }
            else if($_GET["err"] === "Invalid_name"){
                echo "<P class='msg' style='background-color:#ee2222;'>Both names must be written in only letters!</p>";
            }
            else if($_GET["err"] === "Invalid_email"){
                echo "<P class='msg' style='background-color:#ee2222;'>A proper email must be entered !</p>";
            }
            else if($_GET["err"] === "Invalid_mobile"){
                echo "<P class='msg' style='background-color:#ee2222;'>Mobile number must be 10 digit long & start with 0!</p>";
            }
            else if($_GET["err"] === "Invalid_password"){
                echo "<P class='msg' style='background-color:#ee2222;'>Password must be least 5 characters long!</p>";
            }
            if($_GET["err"] === "different_pass"){
                echo "<P class='msg' style='background-color:#ee2222;'>Both password must be matched!</p>";
            }
            else if($_GET["err"] === "available_emailormobile"){
                echo "<P class='msg' style='background-color:#ee2222;'>Email @ Mobile number must be brand new!</p>";
            }
            else if($_GET["err"] === "failedstmt"){
                echo "<P class='msg' style='background-color:#ee2222;'>Failed to execute the query!</p>";
            }

            //Register form relate message
            else if($_GET["err"] === "noerrors"){
                echo "<P class='msg' style='background-color:#ee2222;'>Successfully Registered!</p>";
            }

            //login form related message
            else if($_GET["err"] === "loginfailedemail"){
                echo "<P class='msg' style='background-color: #ee2222;'>Wrong email, please enter the correct email !</p>";
            }
            else if($_GET["err"] === "loginfailedpass"){
                echo "<P class='msg' style='background-color: #ee2222;'>Wrong password, please enter the correct password!</p>";
            }


        }

    ?>

    
<!--Login Form-->
    <div class="forms">
        <form action= "./Includes/login.php" method="post" class="login">
            <h2>Login</h2>
            <input type = "text" name="email" placeholder="Enter Your Email" value = "<?php if(isset($_COOKIE["emailcookie"])){echo $_COOKIE["emailcookie"]; } ?>">
            <input type = "password" name="pass" placeholder="Enter Your Password" value = "<?php if(isset($_COOKIE["passwordcookie"])){echo $_COOKIE["passwordcookie"]; } ?>">

            <div class="rem">
                <input type="checkbox" name="re-check" id="re-check"<?php if(isset($_COOKIE["emailcookie"])){ ?> checked <?php } ?> >
                <label for = "re-check">Remember Me</label>
            </div>

            <button type="submit" name="login-btn">Login</button>
        </form>


<!--Register Form-->
        <form action= "./Includes/register.php" method="post" class="register">
            <h2>Register</h2>
            <input type = "text" name="fname" placeholder="Enter Your First Name">
            <input type = "text" name="lname" placeholder="Enter Your Last Name">
            <input type = "text" name="email" placeholder="Enter Your First Email">
            <input type = "text" name="mobile" placeholder="Enter Your Mobile Number">
            <input type = "password" name="pass" placeholder="Enter Your Password">
            <input type = "password" name="re_pass" placeholder="Enter Your Password Again">
            <button type="submit" name="register-btn">Register</button>
        </form>


    </div>
</body>
</html>