<?php
    //ABOUT: used to add career in homepage

    require_once('../../include/database.php');
    require_once('../../include/functions.php');


    //sanitize and validate data to be saved
    $position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
    $office = filter_var($_POST['office'], FILTER_SANITIZE_STRING);
    $campus = filter_var($_POST['campus'], FILTER_SANITIZE_STRING);
    $vacancies = !filter_var($_POST['vacancies'], FILTER_VALIDATE_INT) ? $_POST['vacancies'] : 1;
    $salary_grade = !filter_var($_POST['salarygrade'], FILTER_VALIDATE_INT) ? $_POST['salarygrade'] : 1;
    $item_number = filter_var($_POST['itemnumber'], FILTER_SANITIZE_STRING);
    $qualification = filter_var($_POST['qualification'], FILTER_SANITIZE_STRING);
    $experience = filter_var($_POST['experience'], FILTER_SANITIZE_STRING);
    $training = filter_var($_POST['training'], FILTER_SANITIZE_STRING);
    $eligibility = filter_var($_POST['eligibility'], FILTER_SANITIZE_STRING);
    $deadline = validatedate($_POST['deadline']) ? $_POST['deadline'] : date("Y-d-m");

    echo $deadline;
    
?>