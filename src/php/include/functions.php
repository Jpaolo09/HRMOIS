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
        
        if(checkdate($date_bits[1], $date_bits[2], $date_bits[0]))
        {
            return $date;
        }
        else
        {
            return date("Y-d-m");
        }
    }


    //sanitize a string
    function sanitizeString($str)
    {
        $sanitized_data = filter_var($str, FILTER_SANITIZE_STRING);
        return $sanitized_data;
    }


    //validate an integer
    function validateInt($int)
    {
        if(filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false)
        {
            return $int;
        }
        else
        {
            return 0;
        }
    }
?>