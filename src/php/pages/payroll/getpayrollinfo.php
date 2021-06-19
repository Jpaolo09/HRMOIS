<?php
    //ABOUT: get all of the information of an employee then return it in a JSON file

    session_start();
    require_once('../../include/database.php');
    require_once('../../include/functions.php');

    $id = intval( $_GET["id"]);
    $_SESSION['SELECTED_EMPLOYEE'] = $id;

    //payroll class to create an object instance that will be encoded in JSON file
    class Payroll{
        public $date;
        public $working_hours;
        public $basic_pay;
        public $gross_pay;
        public $cash_advance;
        public $sss;
        public $philhealth;
        public $pagibig;
        public $others;
        public $deduction;
        public $net_pay;
    }

    //query to get the info of a payroll based on its id
    $stmt = $conn->prepare("SELECT * FROM payroll WHERE EMP_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $result_assoc = $result->fetch_assoc();

    $payroll = new Payroll();
    $payroll->date = $result_assoc['DATE'];
    $payroll->working_hours = $result_assoc['WORKING_HOURS'];
    $payroll->basic_pay = $result_assoc['BASIC_PAY'];
    $payroll->gross_pay = $result_assoc['GROSS_PAY'];
    $payroll->cash_advance = $result_assoc['CASH_ADVANCE'];
    $payroll->sss = $result_assoc['SSS'];
    $payroll->philhealth = $result_assoc['PHILHEALTH'];
    $payroll->pagibig = $result_assoc['PAGIBIG'];
    $payroll->others = $result_assoc['OTHERS'];
    $payroll->deduction = $result_assoc['DEDUCTION'];
    $payroll->net_pay = $result_assoc['NET_PAY'];

    //encode the object into a JSON file
    $myJSON = json_encode($payroll);

    //return the JSON file containing the information of the payroll to the javascript
    echo $myJSON;
?>