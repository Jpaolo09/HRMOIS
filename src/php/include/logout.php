<?php
    //ABOUT: handles logging out

    //initialize the session to be destroyed
    @session_start();

    //unset all session variables, destroy the session, then redirect to homepage
    session_unset();
    session_destroy();
    die(header('location: ../../../index.php'));
?>