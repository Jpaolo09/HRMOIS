<?php
    //ABOUT: user class and functions
    
    require_once('database.php');
    require_once('session.php');

    class User{

        //function for user authentication(logging in)
        static function AuthenticateUser($username = "", $password = ""){
            global $conn;
            $sql = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password' LIMIT 1";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION["EMPID"] = $row["EMP_ID"];
                $_SESSION["USERNAME"] = $row["USERNAME"];

                $sql = "SELECT * FROM employees WHERE EMP_ID = '$_SESSION[EMPID]'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $_SESSION["FNAME"] = $row["FNAME"];
                $_SESSION["MNAME"] = $row["MNAME"];
                $_SESSION["LNAME"] = $row["LNAME"];
                $_SESSION["DESIGNATION"] = $row["DESIGNATION"];

                return true;
            }
            else
            {
                return false;
            }
        }

        static function haha(){
            header('location: index.html');
        }
        

        //function to determine if the user is hr staff
        static function isHumanResource()
        {
            if(isset($_SESSION["EMPID"]))
            {
                return $_SESSION["DESIGNATION"] == "Human Resource";
            }
            else
            {
                return false;
            }
        }

    }
?>