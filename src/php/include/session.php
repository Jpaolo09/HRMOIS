<?php
    //ABOUT: handles session and manages page access restrictions

    require_once('functions.php');
    
    session_start();

    //if the user is not logged in restrict access to webpages other than homepage and login
    if(!isset($_SESSION["EMPID"]) && (curr_page() != "index.php" && curr_page() != "login.php"))
    {
        header('location: login');
        die();
    }
    elseif(isset($_SESSION["EMPID"]) && $_SESSION["DESIGNATION"] != "Human Resource")
    {
        //if logged in user is not an hr staff, restrict the pages he/she can access to only hompage and time in
        if(curr_page() != "index.php" && curr_page() != "timein.php")
        {
            header('location: index');
            die();
        }
    }
?>