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

?>