<?php
    //ABOUT: record the time in and time out

    session_start();
    require_once('../../include/database.php');
    require_once('../../include/functions.php');
    //set default timezone to Asia/Manila to get our current time
    date_default_timezone_set("Asia/Manila");
    //echo date("h:i:s");

    //ID of the logged in user
    $id = $_SESSION["EMPID"];
    //name of the logged in user
    $name = $_SESSION["FNAME"].' '.$_SESSION["MNAME"].' '.$_SESSION["LNAME"];
    $op = $_POST["op"];
    $date = validateDate($_POST["date"]);
    $time = date("H:i:s");

    if($op == "timein")
    {
        //check if there is already a record/time in for today, if none, create new, if there is, notify the user that he/she already timed in
        $stmt = $conn->prepare("SELECT * FROM attendance WHERE EMP_ID = ? AND DATE = ?");
        $stmt->bind_param("is", $id, $date);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            echo "You've already timed in on ".$date." at ".$row['TIME_IN'];
        }
        else
        {
            $stmt = $conn->prepare("INSERT INTO attendance (EMP_ID, TIME_IN, DATE) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id, $time, $date);
            $stmt->execute();
            $stmt->close();
            echo "TIME IN";
            echo "\n\n";
            echo "Name: ".' '.$name;
            echo "\n";
            echo "Time: ".' '.$time;
            echo "\n";
            echo "Date: ".' '.$date;
        }
    }
    else if($op = "timeout")
    {
        $stmt = $conn->prepare("SELECT * FROM attendance WHERE EMP_ID = ? AND DATE = ?");
        $stmt->bind_param("is", $id, $date);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        //check if there is already a time in record for the selected date, if none, notify the user to time in first
        if(!$result->num_rows > 0)
        {
            echo "You did not time in yet on ".$date.", please time in first before you can time out. If you think there is a problem with the attendance record, please contact the UITC immediately.";
        }
        else
        {
            //if there is a time in record check if the user did not time out yet and record his/her time out
            if($row['TIME_OUT'] == "00:00:00")
            {
                $stmt = $conn->prepare("UPDATE attendance SET TIME_OUT = ? WHERE ATTENDANCE_ID = $row[ATTENDANCE_ID]");
                $stmt->bind_param("s", $time);
                $stmt->execute();
                $stmt->close();
                echo "TIME OUT";
                echo "\n\n";
                echo "Name: ".' '.$name;
                echo "\n";
                echo "Time: ".' '.$time;
                echo "\n";
                echo "Date: ".' '.$date;
            }
            else
            {
                //if the user already timed out on the selected date, notify the user
                echo "You've already timed out on ".$date." at ".$row['TIME_OUT'];
            }
        }
    }
?>