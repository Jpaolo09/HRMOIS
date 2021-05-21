<?php
    //ABOUT: contains configurations

    //DATABASE
    defined('SERVER_NAME') ? null : define("SERVER_NAME", "localhost");
    defined('USERNAME') ? null : define("USERNAME", "root");
    defined('PASSWORD') ? null : define("PASSWORD", "");
    defined('DATABASE') ? null : define("DATABASE", "hrmois_db");

    //PATHS
    //define directory separator (\ for windows, / for unix)
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'HRMOIS');
    defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH', SITE_ROOT.DS.'src'.DS.'php'.DS.'include' );
?>