<?php
    require_once "./dbh.php";

    require_once "./validation.php";

    // if user clicks the login button
    if(isset($_POST["login-btn"])){
        //Get from input data
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $remember = $_POST["re-check"];

        //Input validation
        if(inputsEmptyLogin($emai, $pass)){
            header("location: ../index.php?err=empty_inputs");
        }
        else if(emailInvalid($email)){
            header("location: ../index.php?err=Invalid_email");
        }
        else if(passwordInvalid($pass)){
            header("location: ../index.php?err=Invalid_password");
        }
        else{
            loginUser($conn, $email, $pass, $remember);
        }
    }
    else{
        header("location: ../index.php");
        exit();
    }

    //function for login
    function loginUser($conn, $email, $pass, $remember){
        //Query
        $sql = "SELECT * FROM users WHERE email = ?;";
         // Initialize the prepared statement
        $stmt = mysqli_stmt_init($conn);
        //bind the statement with the query and check errors
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?err=failedstmt");
   
    }
    else{
        //bind daata with the statement
        mysqli_stmt_bind_param($stmt, "s", $email);
       //Execute the statement
        mysqli_stmt_execute($stmt);
        
       //close the statement
        mysqli_stmt_close($stmt);
 
        header("location: ../index.php?err=noerrors");
          
    }

?>