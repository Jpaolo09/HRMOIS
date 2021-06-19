<?php
    //ABOUT: get all off the payroll records from the database then show it in the table

    $sql = "SELECT * FROM payroll";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>".htmlspecialchars(getEmployeeName($row['EMP_ID']))."</td>
                    <td>".htmlspecialchars(getEmployeeDesignation($row['EMP_ID']))."</td>
                    <td>".htmlspecialchars($row['DATE'])."</td>
                    <td>".htmlspecialchars($row['WORKING_HOURS'])."</td>
                    <td>".htmlspecialchars($row['BASIC_PAY'])."</td>
                    <td>".htmlspecialchars($row['GROSS_PAY'])."</td>
                    <td>".htmlspecialchars($row['CASH_ADVANCE'])."</td>
                    <td>".htmlspecialchars($row['SSS'])."</td>
                    <td>".htmlspecialchars($row['PHILHEALTH'])."</td>
                    <td>".htmlspecialchars($row['PAGIBIG'])."</td>
                    <td>".htmlspecialchars($row['OTHERS'])."</td>
                    <td>".htmlspecialchars($row['DEDUCTION'])."</td>
                    <td>".htmlspecialchars($row['NET_PAY'])."</td>
                    <td>
                        <button type='button' class='btn' data-toggle='modal' data-target='#employee1-payslip-edit'>Edit</button>
                        <button type='button' class='btn' data-toggle='modal' data-target='#employee1-payslip-print'>Print Payslip</button>
                    </td>
                </tr>";
        }
    }
?>