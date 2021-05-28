<?php
    //ABOUT: contains all common functions

    //returns the current page (e.g. index.php)
    function curr_page()
    {
        $this_page = $_SERVER['SCRIPT_NAME'];
        $bits = explode('/', $this_page);
        $this_page = $bits[count($bits)-1];
        return $this_page;
    }


    //validate if a given date is in gregorian calendar
    function validateDate($date)
    {
        $date_bits = explode('-', $date);
        return checkdate($date_bits[1], $date_bits[2], $date_bits[0]);
    }
?>