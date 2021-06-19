<?php
    //ABOUT: used to edit a payroll record

    session_start();
    require_once('../../include/database.php');
    require_once('../../include/functions.php');
    require_once('../../include/config.php');

    $id = $_SESSION['SELECTED_EMPLOYEE'];

    //sanitize and validate data to be saved
    $date = validateDate($_POST['date']);
    $working_hours = validateInt($_POST['working-hours']);
    $basic_pay = validateInt($_POST['basic']);
    $gross_pay = validateInt($_POST['grosspay']);
    $cash_advance = validateInt($_POST['advance']);
    $sss = validateInt($_POST['sss']);
    $philhealth = validateInt($_POST['philhealth']);
    $pagibig = validateInt($_POST['pagibig']);
    $others = validateInt($_POST['others']);
    $deductions = validateInt($_POST['deductions']);
    $net_pay = validateInt($_POST['netpay']);

    /*echo $date."<br>";
    echo $working_hours."<br>";
    echo $basic_pay."<br>";
    echo $gross_pay."<br>";
    echo $cash_advance."<br>";
    echo $sss."<br>";
    echo $philhealth."<br>";
    echo $pagibig."<br>";
    echo $others."<br>";
    echo $deductions."<br>";
    echo $net_pay."<br>";*/

    //update the payroll record
    $stmt = $conn->prepare("UPDATE payroll SET DATE=?, WORKING_HOURS=?, BASIC_PAY=?, GROSS_PAY=?, CASH_ADVANCE=?, SSS=?, PHILHEALTH=?, PAGIBIG=?, OTHERS=?, DEDUCTION=?, NET_PAY=? WHERE EMP_ID=?");  
    $stmt->bind_param("siiiiiiiiiii", $date, $working_hours, $basic_pay, $gross_pay, $cash_advance, $sss, $philhealth, $pagibig, $others, $deductions, $net_pay, $id);
    $stmt->execute();
    echo $stmt->error;
    $stmt->close();

    //redirect to payroll page again
    header('location: ../../../../payroll');
    die();
?>