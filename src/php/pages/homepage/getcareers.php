<?php
    //ABOUT: get all off the careers from the database then show it in the table

    $sql = "SELECT * FROM position";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>".htmlspecialchars($row['POSITION'])."</td>
                    <td>".htmlspecialchars($row['SALARY_GRADE'])."</td>
                    <td>".htmlspecialchars($row['NUM_OF_VACANCIES'])."</td>
                    <td>".htmlspecialchars(getOfficeName($row['OFFICE_ID']))."/".htmlspecialchars(getCampusName($row['CAMPUS_ID']))."</td>
                    <td><button type='button' class='btn' data-toggle='modal' data-target='#career1' onclick='getCareerInfo(".$row['POS_ID'].")'>
                        View Details
                    </button></td>
                </tr>";
        }
    }
?>