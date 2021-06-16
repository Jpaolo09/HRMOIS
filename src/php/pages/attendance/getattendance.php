<?php
    //ABOUT: get all attendance record then return it to the attendance table
    //NOTE: database is not included because it is already included in the page where this script will be used

    $sql = "SELECT * FROM attendance";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>".sanitizeString(getEmployeeName(($row['EMP_ID'])))."</td>
                    <td>".$row['DATE']."</td>
                    <td>".$row['TIME_IN']."</td>
                    <td>".$row['TIME_OUT']."</td>
                </tr>";
        }
    }
?>