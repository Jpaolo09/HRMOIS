<?php
    //ABOUT: used to add career in homepage

    require_once('../../include/database.php');

    $position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
    $office = filter_var($_POST['office'], FILTER_SANITIZE_STRING);
    
    
?>