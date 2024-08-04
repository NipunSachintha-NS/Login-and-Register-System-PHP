<?php
    // logout
    session_start();
    session_unset();
    session_destroy();

    // redirect to index page
    header("location: ../index.php");
?>