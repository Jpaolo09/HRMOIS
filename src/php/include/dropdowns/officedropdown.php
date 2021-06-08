<?php
    //ABOUT: Get all of the offices from the database then return it as dropdown options
    //NOTE: database is not included because it is already included in the page where this script will be used
    
    $sql = "SELECT * FROM offices";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($rows = $result->fetch_assoc())
        {
            echo "<option>$rows[OFFICE_NAME]</option>";
        }
    }
?>