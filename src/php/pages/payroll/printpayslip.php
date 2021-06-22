<?php
    require_once('../../include/config.php');
    require_once('../../include/database.php');
    require_once(LIB_PATH.'fpdf183'.DS.'fpdf.php');

    $emp_id = $_GET['id'];

    //employee data
    $stmt = $conn->prepare("SELECT * FROM employees WHERE EMP_ID = ?");
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $emp_data = $result->fetch_assoc();

    //payroll data
    $stmt = $conn->prepare("SELECT * FROM payroll WHERE EMP_ID = ?");
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $payroll_data = $result->fetch_assoc();

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../../../../images/logo.png',45,10,23);
            // Arial bold 15
            $this->SetFont('Times','B',13);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(35,10,'',0 , 0, 'C');
            $this->Cell(30,10,'Republic of the Philippines',0 , 1, 'C');
            $this->Cell(35,10,'',0 , 0, 'C');
            $this->Cell(190,1,'TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES', 0, 1, 'C');
            $this->SetFont('Times', '', 11);
            $this->Cell(35,10,'',0 , 0, 'C');
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
    $border = 0;
    $pdf = new PDF('L', 'mm', 'Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->AddFont('OpenSans-Regular','','OpenSans-Regular.php');
    $pdf->SetFont('OpenSans-Regular','',28);
    //$pdf->Line(12, 40, 284-20, 40);
    $pdf->Cell(255,10,'PAYSLIP', $border, 1, 'C');
    $pdf->Cell(255,10,'', $border, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,5,'Employer\'s Name: ', $border, 0, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(160,5,'Technological University of the Philippines', $border, 0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,5,'Date of payment:', $border, 0, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,$payroll_data['DATE'], $border, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,5,'Employee\'s Name:  ', $border, 0, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(160,5,getEmployeeName($emp_id), $border, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,5,'Employment Status:  ', $border, 0, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(160,5,$emp_data['WORK_STATUS'], $border, 1, 'L');
    $pdf->Cell(255,8,'', $border, 1, 'L');
    $pdf->Cell(150,5,'', $border, 0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,5,'Unit', $border, 0, 'C');
    $pdf->Cell(35,5,'Rate', $border, 0, 'C');
    $pdf->Cell(35,5,'Total', $border, 1, 'R');
    $pdf->SetLineWidth(0.5);
    $pdf->Line(11, 99, 284-20, 99);
    $pdf->SetLineWidth(0.2);
    //earnings
    $pdf->Cell(35,7,'  EARNINGS', $border, 1, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(228,228,228);
    $pdf->SetDrawColor(212, 212, 212);
    $pdf->Cell(150,7,'  Salary or wages for ordinary hours worked', 1, 0, 'L', true);
    $pdf->Cell(35,7,$payroll_data['WORKING_HOURS'].' hour(s)', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['BASIC_PAY'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format(($payroll_data['WORKING_HOURS'] * $payroll_data['BASIC_PAY']), 2, ".", ","), 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Overtime', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0 hour(s)', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Paid leave', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0 hour(s)', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Paid sick leave', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0 hour(s)', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 0, 'L', true);
    $pdf->Cell(35,7,'0.00', 1, 1, 'L', true);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Cell(185,7,'', $border, 0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,7,'GROSS PAYMENT', $border, 0, 'L');
    $pdf->Cell(35,7,number_format($payroll_data['GROSS_PAY'], 2, ".", ","), $border, 1, 'L');
    $pdf->SetLineWidth(0.5);
    $pdf->Line(11, 141, 284-20, 141);
    $pdf->SetLineWidth(0.2);
    $pdf->SetFont('Arial','B',10);
    //deductions
    $pdf->Cell(35,7,'  DEDUCTIONS', $border, 1, 'L');
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(228,228,228);
    $pdf->SetDrawColor(212, 212, 212);
    $pdf->Cell(150,7,'  SSS', 1, 0, 'L', true);
    $pdf->Cell(35,7,'', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['SSS'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['SSS'], 2, ".", ","), 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Philhealth', 1, 0, 'L', true);
    $pdf->Cell(35,7,'', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['PHILHEALTH'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['PHILHEALTH'], 2, ".", ","), 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Pagibig', 1, 0, 'L', true);
    $pdf->Cell(35,7,'', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['PAGIBIG'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['PAGIBIG'], 2, ".", ","), 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Cash Advance', 1, 0, 'L', true);
    $pdf->Cell(35,7,'', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['CASH_ADVANCE'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['CASH_ADVANCE'], 2, ".", ","), 1, 1, 'L', true);
    $pdf->Cell(150,7,'  Others', 1, 0, 'L', true);
    $pdf->Cell(35,7,'', 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['OTHERS'], 2, ".", ","), 1, 0, 'L', true);
    $pdf->Cell(35,7,number_format($payroll_data['OTHERS'], 2, ".", ","), 1, 1, 'L', true);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Cell(185,7,'', $border, 0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,7,'NET PAYMENT', $border, 0, 'L');
    $pdf->Cell(35,7,number_format($payroll_data['NET_PAY'], 2, ".", ","), $border, 1, 'L');
    
    $pdf->Output();
?>