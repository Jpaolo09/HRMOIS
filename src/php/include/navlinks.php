<?php
    //ABOUT: manages what navlinks to show depending on the user type

    require_once('functions.php');

    if(!isset($_SESSION["EMPID"]))
    {
        //if the user is not logged in, show hompage and login links only
        echo"<li class='nav-item px-3'>".
                 setActiveLink("index.php")."href='index'>Home</a>
            </li>
            <li class='nav-item px-3'>
                <a class='nav-link text-light' href='login'>Log In</a>
            </li>";
    }
    else
    {
        if($_SESSION["DESIGNATION"] == "Human Resource")
        {
            //links to be shown if the user is an hr staff
            echo "<li class='nav-item px-3'>".
                    setActiveLink("index.php")."href='index'>Home</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("employee.php")."href='employee'>Employees</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("payroll.php")."href='payroll'>Payroll</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("timein.php")."href='timein'>Time In</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("attendance.php")."href='attendance'>Attendance</a>
                </li>
                <li class='nav-item px-3'>
                    <a class='nav-link text-light' href='src/php/include/logout.php'>Log Out</a>
                </li>";
        }
        else
        {
            //links to be shown if the user is a regular employee
            echo "<li class='nav-item px-3'>".
                    setActiveLink("index.php")."href='index'>Home</a>
                </li>
                <li class='nav-item px-3'>".
                    setActiveLink("timein.php")."href='timein'>Time In</a>
                </li>
                <li class='nav-item px-3'>
                    <a class='nav-link text-light' href='src/php/include/logout.php'>Log Out</a>
                </li>";
        }
    }

    
    //function to set link into an active link if it is currently selected
    function setActiveLink($str)
    {
        if(curr_page() == $str)
        {
            return "<a class='nav-link text-light active'";
        }
        else
        {
            return "<a class='nav-link text-light'";
        }
    }
?>