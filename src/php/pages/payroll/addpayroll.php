<?php
    //ABOUT: used to create new payroll record

    //define intials values
    $working_hours = 0;
    $basic_pay = 250;
    $gross_pay = 10000;
    $cash_advance = 0;
    $sss = 130;
    $philhealth = 160;
    $pagibig = 150;
    $others = 0;
    $deductions = 0;
    $net_pay = 8000;
    $curr_date = date("Y-m-d");

    function createPayroll($id){
        global $conn;
        global $working_hours;
        global $basic_pay;
        global $gross_pay;
        global $cash_advance;
        global $sss;
        global $philhealth;
        global $pagibig;
        global $others;
        global $deductions;
        global $net_pay;
        global $curr_date;

        //query to add the new payroll record to the database
        $stmt = $conn->prepare("INSERT INTO payroll (EMP_ID, DATE, WORKING_HOURS, BASIC_PAY, GROSS_PAY, CASH_ADVANCE, SSS, PHILHEALTH, PAGIBIG, OTHERS, DEDUCTION, NET_PAY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
        $stmt->bind_param("isiiiiiiiiii", $id, $curr_date, $working_hours, $basic_pay, $gross_pay, $cash_advance, $sss, $philhealth, $pagibig, $others, $deductions, $net_pay);
        $stmt->execute();
        echo $stmt->error;
        $stmt->close();
    }
?>