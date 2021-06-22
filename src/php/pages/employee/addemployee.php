<?php
    //ABOUT: used to add a new employee record

    require_once('../../include/database.php');
    require_once('../../include/functions.php');
    require_once('../../include/config.php');
    require_once('../payroll/addpayroll.php');

    //sanitize and validate data to be saved
    $firstname = sanitizeString($_POST['create-fname']);
    $middle_name = sanitizeString($_POST['create-mname']);
    $lastname = sanitizeString($_POST['create-lname']);
    $address = sanitizeString($_POST['create-address']);
    $sex = $_POST['create-optradio'];
    $dob = validateDate($_POST['create-dob']);
    $pob = sanitizeString($_POST['create-pob']);
    $telephone = sanitizeString($_POST['create-telephone']);
    $email = validateEmail($_POST['create-email']);
    $civil_status = sanitizeString($_POST['create-civil-status']);
    $designation = sanitizeString($_POST['create-designation']);
    $branch = getCampusID(sanitizeString($_POST['create-branch']));
    $office = getOfficeID(sanitizeString($_POST['create-office']));
    $college = getCollegeID(sanitizeString($_POST['create-college']));
    $work_status = sanitizeString($_POST['create-workstatus']);
    $hired_date = validateDate($_POST['create-hireddate']);
    $password = password_hash($_POST['create-pass'], PASSWORD_DEFAULT);

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

    //save the employee record to the employee table
    $stmt = $conn->prepare("INSERT INTO employees (FNAME, MNAME, LNAME, OFFICE_ID, ADDRESS, SEX, DOB, PLACE_OF_BIRTH, TEL_NO, EMAIL, CIVIL_STATUS, DESIGNATION, COLLEGE_ID, CAMPUS_ID, WORK_STATUS, HIRED_DATE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssssssiiss", $firstname, $middle_name, $lastname, $office, $address, $sex, $dob, $pob, $telephone, $email, $civil_status, $designation, $college, $branch, $work_status, $hired_date);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    //create payroll record for the newly created employee
    createPayroll($last_id);

    //add the user account to the user table
    $stmt = $conn->prepare("INSERT INTO users (USERNAME, PASSWORD, EMP_ID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $email, $password, $last_id);
    $stmt->execute();
    $stmt->close();

    //redirect to employees page again
    header('location: ../../../../employee');
    die();
        
?>