<?php
    //ABOUT: used to edit an employee record

    session_start();
    require_once('../../include/database.php');
    require_once('../../include/functions.php');
    require_once('../../include/config.php');
    require_once('../payroll/addpayroll.php');

    $id = $_SESSION['SELECTED_EMPLOYEE'];

    //sanitize and validate data to be saved
    $firstname = sanitizeString($_POST['edit-fname']);
    $middle_name = sanitizeString($_POST['edit-mname']);
    $lastname = sanitizeString($_POST['edit-lname']);
    $address = sanitizeString($_POST['edit-address']);
    $sex = $_POST['edit-optradio'];
    $dob = validateDate($_POST['edit-dob']);
    $pob = sanitizeString($_POST['edit-pob']);
    $telephone = sanitizeString($_POST['edit-telephone']);
    $email = validateEmail($_POST['edit-email']);
    $civil_status = sanitizeString($_POST['edit-civil-status']);
    $designation = sanitizeString($_POST['edit-designation']);
    $branch = getCampusID(sanitizeString($_POST['edit-branch']));
    $office = getOfficeID(sanitizeString($_POST['edit-office']));
    $college = getCollegeID(sanitizeString($_POST['edit-college']));
    $work_status = sanitizeString($_POST['edit-workstatus']);
    $hired_date = validateDate($_POST['edit-hireddate']);

    /*echo $firstname."<br>";
    echo $middle_name."<br>";
    echo $lastname."<br>";
    echo $address."<br>";
    echo $sex."<br>";
    echo $dob."<br>";
    echo $pob."<br>";
    echo $telephone."<br>";
    echo $civil_status."<br>";
    echo $designation."<br>";
    echo $branch."<br>";
    echo $office."<br>";
    echo $college."<br>";
    echo $work_status."<br>";
    echo $hired_date."<br>";*/

    //save the employee record to the database
    $stmt = $conn->prepare("UPDATE employees SET FNAME=?, MNAME=?, LNAME=?, OFFICE_ID=?, ADDRESS=?, SEX=?, DOB=?, PLACE_OF_BIRTH=?, TEL_NO=?, EMAIL=?, CIVIL_STATUS=?, DESIGNATION=?, COLLEGE_ID=?, CAMPUS_ID=?, WORK_STATUS=?, HIRED_DATE=? WHERE EMP_ID = ?");
    $stmt->bind_param("sssissssssssiissi", $firstname, $middle_name, $lastname, $office, $address, $sex, $dob, $pob, $telephone, $email, $civil_status, $designation, $college, $branch, $work_status, $hired_date, $id);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    //redirect to employees page again
    header('location: ../../../../employee');
    die();
?>