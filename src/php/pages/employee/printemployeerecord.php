<?php
    require_once('../../include/config.php');
    require_once('../../include/database.php');
    require_once(LIB_PATH.'fpdf183'.DS.'fpdf.php');

    $emp_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM employees WHERE EMP_ID = ?");
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $result_assoc = $result->fetch_assoc();
    $fullname = $result_assoc['FNAME'].' '.$result_assoc['MNAME'].' '.$result_assoc['LNAME'];
    $office = getOfficeName($result_assoc['OFFICE_ID']);
    $college = getCollegeName($result_assoc['COLLEGE_ID']);
    $branch = getCampusName($result_assoc['CAMPUS_ID']);

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../../../../images/logo.png',15,10,23);
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
    $pdf->Image('../../../../images/blank_profile.png', 20, 50, 60);
    $pdf->Cell(90, 70, '', 0, 0, 'C');
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(120, 5, $fullname, 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 7, $result_assoc['DESIGNATION'], 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(7, 10, '', 0, 0, 'L');
    $pdf->SetFont('Arial','',9);
    $pdf->SetTextColor(76, 0, 153);
    $pdf->Cell(113, 10, $result_assoc['EMAIL'], 0, 1, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Image('../../../../images/email.png', 101, 66, 5);
    $pdf->Cell(90, 70, '', 0, 0, 'L');
    $pdf->Cell(120, 10, '', 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 5, 'Basic Information', 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(120, 7, 'Sex: '.$result_assoc['SEX'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Birthday: '.$result_assoc['DOB'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Place of Birth: '.$result_assoc['PLACE_OF_BIRTH'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Address: '.$result_assoc['ADDRESS'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Telephone/Mobile: '.$result_assoc['TEL_NO'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Civil Status: '.$result_assoc['CIVIL_STATUS'], 0, 2, 'L');
    $pdf->Cell(120, 10, '', 0, 2, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->Cell(120, 5, 'Work Information', 0, 2, 'L');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(120, 7, 'Status: '.$result_assoc['WORK_STATUS'], 0, 2, 'L');
    $pdf->Cell(120, 7, 'Office: '.$office, 0, 2, 'L');
    $pdf->Cell(120, 7, 'College: '.$college, 0, 2, 'L');
    $pdf->Cell(120, 7, 'Branch: '.$branch, 0, 2, 'L');
    $pdf->Cell(120, 7, 'Hired Date: '.$result_assoc['HIRED_DATE'], 0, 2, 'L');

    $pdf->Output();
?>