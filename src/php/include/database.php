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


    //receives office name then return office id
    function getOfficeID($office){
        global $conn;
        $stmt = $conn->prepare("SELECT OFFICE_ID FROM offices WHERE OFFICE_NAME = ?");
        $stmt->bind_param("s", $office);
        $stmt->execute();
        $result = $stmt->get_result();
        $result_assoc = $result->fetch_assoc();
        $officeID = $result_assoc['OFFICE_ID'];
        return $officeID;
    }


    //receives office id then return office name
    function getOfficeName($id){
        global $conn;
        $stmt = $conn->prepare("SELECT OFFICE_NAME FROM offices WHERE OFFICE_ID = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result_assoc = $result->fetch_assoc();
        $office_name = $result_assoc['OFFICE_NAME'];
        return $office_name;
    }


    //receives campus name then return campus id
    function getCampusID($campus){
        global $conn;
        $stmt = $conn->prepare("SELECT CAMPUS_ID FROM campus WHERE CAMPUS_NAME = ?");
        $stmt->bind_param("s", $campus);
        $stmt->execute();
        $result = $stmt->get_result();
        $result_assoc = $result->fetch_assoc();
        $campusID = $result_assoc['CAMPUS_ID'];
        return $campusID;
    }

    //receives office id then return office name
    function getCampusName($id){
        global $conn;
        $stmt = $conn->prepare("SELECT CAMPUS_NAME FROM campus WHERE CAMPUS_ID = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result_assoc = $result->fetch_assoc();
        $campus_name = $result_assoc['CAMPUS_NAME'];
        return $campus_name;
    }
?>