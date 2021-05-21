<?php
    //ABOUT: manages what navlinks to show depending on the user type

    if(!isset($_SESSION["EMPID"]))
    {
        //if the user is not logged in, show hompage and login links only
        echo"<li class='nav-item px-3'>".
                 setActiveLink("/HRMOIS/index.php")."href='index.php'>Home</a>
            </li>
            <li class='nav-item px-3'>
                <a class='nav-link text-light' href='login.php'>Log In</a>
            </li>";
    }
    else
    {
        if($_SESSION["DESIGNATION"] == "Human Resource")
        {
            //links to be shown if the user is an hr staff
            echo "<li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/index.php")."href='index.php'>Home</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/employee.php")."href='employee.php'>Employees</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/payroll.php")."href='payroll.php'>Payroll</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/timein.php")."href='timein.php'>Time In</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/attendance.php")."href='attendance.php'>Attendance</a>
                </li>
                <li class='nav-item px-3'>
                    <a class='nav-link text-light' href='src/php/include/logout.php'>Log Out</a>
                </li>";
        }
        else
        {
            //links to be shown if the user is a regular employee
            echo "<li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/index.php")."href='index.php'>Home</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("/HRMOIS/timein.php")."href='timein.php'>Time In</a>
                </li>
                <li class='nav-item px-3'>
                    <a class='nav-link text-light' href='src/php/include/logout.php'>Log Out</a>
                </li>";
        }
    }

    
    //function to set link into an active link if it is currently selected
    function setActiveLink($str)
    {
        if($_SERVER["PHP_SELF"] == $str)
        {
            return "<a class='nav-link text-light active'";
        }
        else
        {
            return "<a class='nav-link text-light'";
        }
    }
?>