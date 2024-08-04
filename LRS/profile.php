<?php
     session_start();
     //If not logged in
     if(!isset($_SESSION["user_email"])){
        header("location:./index.php");
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome - <?php if(isset($_SESSION["user_email"])){echo $_SESSION["user_fname"]; } ?> </title>
    <link rel="Stylesheet" href="./Style.css">
</head>
<body>
    <div class="profile">
        <h2>Welcome - <span><?php if(isset($_SESSION["user_email"])){echo $_SESSION["user_fname"]; } ?></span></h2>
        <div class="data"><?php if(isset($_SESSION["user_email"])){echo $_SESSION["user_fname"]; } ?></div>
        <div class="data"><?php if(isset($_SESSION["user_email"])){echo $_SESSION["user_email"]; } ?></div>
        <div class="data"><?php if(isset($_SESSION["user_email"])){echo $_SESSION["user_mobile"]; } ?></div>
        <a href="./Includes/logout.php">Logout</a>
    </div>
</body>
</html>