<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register System</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <p class="msg">Successfully Registered</p>
<!--Login Form-->
    <div class="forms">
        <form action= "" class="login">
            <h2>Login</h2>
            <input type = "text" name="email" placeholder="Enter Your Email">
            <input type = "password" name="pass" placeholder="Enter Your Password">

            <div class="rem">
                <input type="checkbox" name="re-check" id="re-check">
                <label for = "re-check">Remember Me</label>
            </div>

            <button type="submit">Login</button>
        </form>


<!--Register Form-->
        <form action= "" class="register">
            <h2>Register</h2>
            <input type = "text" name="fname" placeholder="Enter Your First Name">
            <input type = "text" name="lname" placeholder="Enter Your Last Name">
            <input type = "text" name="email" placeholder="Enter Your First Email">
            <input type = "text" name="mobile " placeholder="Enter Your Mobile Number">
            <input type = "password" name="pass" placeholder="Enter Your Password">
            <input type = "password" name="re-pass" placeholder="Enter Your Password Again">
            <button type="submit" name="register-btn">Register</button>
        </form>


    </div>
</body>
</html>