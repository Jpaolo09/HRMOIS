<?php
    //ABOUT: used to add career in homepage

    require_once('../../include/database.php');
    require_once('../../include/functions.php');


    //sanitize and validate data to be saved
    $position = sanitizeString($_POST['position']);
    $office = getOfficeID(sanitizeString($_POST['office']));
    $campus = getCampusID(sanitizeString($_POST['campus']));
    $vacancies = validateInt($_POST['vacancies']);
    $salary_grade = validateInt($_POST['salarygrade']);
    $item_number = sanitizeString($_POST['itemnumber']);
    $qualification = sanitizeString($_POST['qualification']);
    $experience = sanitizeString($_POST['experience']);
    $training = sanitizeString($_POST['training']);
    $eligibility = sanitizeString($_POST['eligibility']);
    $deadline = validateDate($_POST['deadline']);
    $requirements = sanitizeString($_POST['requirements']);

    //query to save the data into the database
    $stmt = $conn->prepare("INSERT INTO position (POSITION, OFFICE_ID, CAMPUS_ID, NUM_OF_VACANCIES, SALARY_GRADE, ITEM_NUM, QUALIFICATION, EXPERIENCE, TRAINING, ELIGIBILITY, DEADLINE, REQ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiisssssss", $position, $office, $campus, $vacancies, $salary_grade, $item_number, $qualification, $experience, $training, $eligibility, $deadline, $requirements);
    $stmt->execute();
    $stmt->close();
    header('location: ../../../../index.php');
    die();
?>