<?php
    //ABOUT: Get all of the campuses from the database then return it as dropdown options
    //NOTE: database is not included because it is already included in the page where this script will be used
    
    $sql = "SELECT * FROM campus ORDER BY CAMPUS_NAME";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($rows = $result->fetch_assoc())
        {
            echo "<option>$rows[CAMPUS_NAME]</option>";
        }
    }
?>