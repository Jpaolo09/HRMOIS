<?php
    //ABOUT: wala lang testingan lng ahahahahahaha
    require_once('src/php/include/config.php');
    //require_once(INCLUDE_PATH.DS.'navlinks.php');
    require_once(INCLUDE_PATH.DS.'functions.php');
    require_once(LIB_PATH.'fpdf183'.DS.'fpdf.php');

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('images/logo.png',15,10,23);
            // Arial bold 15
            $this->SetFont('Times','B',13);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(30,10,'Republic of the Philippines',0 , 1, 'C');
            $this->Cell(190,1,'TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES', 0, 1, 'C');
            $this->SetFont('Times', '', 11);
            $this->Cell(190, 10, 'Ayala Blvd, Ermita, Manila, 1000 Metro Manila', 0, 1, 'C');
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    // Instanciation of inherited class
    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->Line(20, 40, 210-20, 40);
    $pdf->Image('images/blank_profile.png', 20, 50, 60);
    $pdf->Cell(90, 70, '', 0, 0, 'C');
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(120, 5, 'Jan Paolo S. Cortez', 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 7, 'University President', 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(7, 10, '', 0, 0, 'L');
    $pdf->SetFont('Arial','',9);
    $pdf->SetTextColor(76, 0, 153);
    $pdf->Cell(113, 10, 'juan@tup.edu.ph', 0, 1, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Image('images/email.png', 101, 66, 5);
    $pdf->Cell(90, 70, '', 0, 0, 'L');
    $pdf->Cell(120, 10, '', 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 5, 'Basic Information', 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(120, 7, 'Sex: Male', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Birthday: 1999-11-15', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Place of Birth: Bulacan', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Address: Bulacan', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Telephone/Mobile: 0975625302', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Civil Status: Single', 0, 2, 'L');
    $pdf->Cell(120, 10, '', 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 5, 'Work Information', 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(120, 7, 'Status: Regular', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Office: University Library', 0, 2, 'L');
    $pdf->Cell(120, 7, 'College: College of Science', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Branch: Manila', 0, 2, 'L');
    $pdf->Cell(120, 7, 'Hired Date: 2021-02-14', 0, 2, 'L');

    $pdf->Output();
?>