<?php

// Add dbh file
require_once "./dbh.php";

//Add validation file
require_once "./validation.php";

// if user click register button
if(isset($_POST["register-btn"] )){
    //get form input data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pass = $_POST["pass"];
    $re_pass = $_POST["re_pass"];

    //input validation
    if(inputsEmptyRegister($fname, $lname, $email, $mobile, $pass, $re_pass)){
        header("location: ../index.php?err=empty_inputs");
    }
    else if(nameInvalid($fname,$lname)){
        header("location: ../index.php?err=Invalid_name");
    }
    else if(emailInvalid($email)){
        header("location: ../index.php?err=Invalid_email");
    }
    else if(mobileInvalid($mobile)){
        header("location: ../index.php?err=Invalid_mobile");
    }
    else if(passwordInvalid($pass)){
        header("location: ../index.php?err=Invalid_password");
    }
    else if(passNotMatch($pass, $re_pass)){
        header("location: ../index.php?err=different_pass");
    }
    else if(emailOrMobileAvailable($conn, $email,$mobile)){
        header("location: ../index.php?err=available_emailormobile");
    }
    else{
        //if all input are error free
        registerNewUser($conn,$fname,$lname,$email,$mobile,$pass,$re_pass);
       
    }
}
else{
    header("location: ../index.php ");
    exit();
}

//function for register a new user
function registerNewUser($conn,$fname,$lname,$email,$mobile,$pass,$re_pass){
    //password encryption
    $passHashed= password_hash($pass, PASSWORD_DEFAULT);
    //Query
    $sql = "INSERT INTO users (fname, lname, email, mobile, password) VALUES (?, ?, ?, ?, ?);";
   // Initialize the prepared statement
    $stmt = mysqli_stmt_init($conn);
   //bind the statement with the query and check errors
    if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ../index.php?err=failedstmt");
  
   }
   else{
       //bind daata with the statement
       mysqli_stmt_bind_param($stmt, "sssis", $fname, $lname, $email, $mobile, $pass);
      //Execute the statement
       mysqli_stmt_execute($stmt);
      //close the statement
       mysqli_stmt_close($stmt);

       header("location: ../index.php?err=noerrors");
          
   }
}
?>