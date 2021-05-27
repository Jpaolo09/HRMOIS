<?php
    //ABOUT: manage database connectivity and common database functions
    
    require_once('config.php');

    //open database connection
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);

    //handle database connection error
    if($conn->connect_error)
    {
        die("Error connecting to the database, please contact the database administrator! Error: ".$conn->connect_error);
    }
?>