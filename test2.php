<?php
    require_once('src/php/include/config.php');
    require_once(INCLUDE_PATH.DS.'functions.php');
    require_once(LIB_PATH.'fpdf183'.DS.'makefont'.DS.'makefont.php');
    require_once(LIB_PATH.'phpqrcode'.DS.'qrlib.php');

    //MakeFont('C:\Users\jpcor\Downloads\Open_Sans\OpenSans-Regular.ttf','cp1252');
    //$hash = '$2y$10$P7gMAW1DjRF5PgmB./UvSuN6F66HMEmHpVcPRgpEtM/E2ErifO3my';
    //echo password_verify("paoAb1", $hash);
    //echo password_hash("paoAb1", PASSWORD_DEFAULT);
    //QRcode::png('PHP QR Code :)');

    //google qr code API link: https://developers.google.com/chart/infographics/docs/qr_codes?csw=1
    //$message = "tupm-18-0102";
    //$url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&choe=UTF-8&chl='.$message;
    //$img = './qr.png';
    //file_put_contents($img, file_get_contents($url));
    echo $password = password_hash("hr1234", PASSWORD_DEFAULT);
    echo "<br>";
    echo password_verify('hr1234', '$2y$10$Bi8p/jrEODoxIVD5MLqYgewqY5GCroO1RHI2OHdpr3fRdBbJ.vEIq')
?>