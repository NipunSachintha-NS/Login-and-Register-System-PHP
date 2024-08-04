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
        if(inputsEmptyLogin($email, $pass)){
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
       // Save result if available
        $data = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($data)){
            //Get encrypted password
            $passHashed = $row["password"];
            // verify password
            $isPassOk = password_verify($pass, $passHashed);
            if($isPassOk){
                // setup session variables
                session_start();
                $_SESSION["user_email"] = $row["email"];
                $_SESSION["user_fname"] = $row["fname"];
                $_SESSION["user_lname"] = $row["lname"];
                $_SESSION["user_mobile"] = $row["mobile"];

                //if remember me checked
                if(isset($remember)){
                    // create cookies for email and password
                    setcookie("emailcookie",$email, time() + (3600*24*7), "/");
                    setcookie("passwordcookie",$pass, time() + (3600*24*7), "/");
                }
                else{
                    //destroy cookies value
                    if(isset($_COOKIE["emailcookie"])){
                        setcookie("emailcookie","", time() - (3600*24*7), "/");
                    }
                    if(isset($_COOKIE["passwordcookie"])){
                        setcookie("passwordcookie","", time() - (3600*24*7), "/");
                    }
                }
                header("location: ../profile.php"); 

            }
            else{
                header("location: ../index.php?err=loginfailedpass");
                exit();
            }
        }
        else{
            header("location: ../index.php?err=loginfailedemail");
            exit();
        }
    }
       //close the statement
        mysqli_stmt_close($stmt);   
    }


?>