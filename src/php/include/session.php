<?php
    //ABOUT: handles session and manages page access restrictions
    session_start();

    //if the user is not logged in restrict access to webpages other than homepage and login
    if(!isset($_SESSION["EMPID"]) && ($_SERVER["PHP_SELF"] != "/HRMOIS/index.php" && $_SERVER["PHP_SELF"] != "/HRMOIS/login.php"))
    {
        header('location: login.php');
        die();
    }
    elseif(isset($_SESSION["EMPID"]) && $_SESSION["DESIGNATION"] != "Human Resource")
    {
        //if logged in user is not an hr staff, restrict the pages he/she can access to only hompage and time in
        if($_SERVER["PHP_SELF"] != "/HRMOIS/index.php" && $_SERVER["PHP_SELF"] != "/HRMOIS/timein.php")
        {
            header('location: index.php');
            die();
        }
    }
?>