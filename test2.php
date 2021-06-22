<?php
    require_once('src/php/include/config.php');
    require_once(INCLUDE_PATH.DS.'functions.php');
    require_once(LIB_PATH.'fpdf183'.DS.'makefont'.DS.'makefont.php');

    //MakeFont('C:\Users\jpcor\Downloads\Open_Sans\OpenSans-Regular.ttf','cp1252');
    $hash = '$2y$10$P7gMAW1DjRF5PgmB./UvSuN6F66HMEmHpVcPRgpEtM/E2ErifO3my';
    //echo password_verify("paoAb1", $hash);
    echo password_hash("paoAb1", PASSWORD_DEFAULT);
?>