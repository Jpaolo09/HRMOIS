<?php
    //ABOUT: get all off the employees records from the database then show it in the table

    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $fullname = $row['FNAME'].' '.$row['MNAME'].' '.$row['LNAME'];
            echo "<tr>
                    <td>".htmlspecialchars($fullname)."</td>
                    <td>".htmlspecialchars($row['DESIGNATION'])."</td>
                    <td>".htmlspecialchars($row['WORK_STATUS'])."</td>
                    <td>".htmlspecialchars($row['TEL_NO'])."</td>
                    <td>".htmlspecialchars($row['EMAIL'])."</td>
                    <td>
                        <button type='button' class='btn' data-toggle='modal' data-target='#employee1-edit' onclick='getEmployeeInfo(".$row['EMP_ID'].")'>Edit</button>
                        <button type='button' class='btn' data-toggle='modal' data-target='#employee1-print'>Print</button>
                        <button type='button' class='btn' data-toggle='modal' data-target='#employee1-pdf'>View Details</button>
                    </td>
                </tr>";
        }
    }
?>