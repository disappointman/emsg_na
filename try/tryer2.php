<?php
require("fpdf17/fpdf.php");
$pdf=new FPDF();
//var_dump(get_class_methods($pdf));
$pdf->AddPage();
//------------------------
$pdf->Image("/xampp/htdocs/EMSG_NA2/images/registration_form.jpg", 0, 0, 210);


//FIRST COPY

//date line
$pdf->SetFont("arial","","8");
$pdf->SetX(180);
$pdf->Cell(0,23,'12/19/2017', 0,0);

//FIRST LINE
$pdf->SetFont("arial","","8");
$pdf->SetX(16);
$pdf->Cell(0,45,'LAG-0000001', 0,0);

$pdf->SetX(42.5);
$pdf->Cell(0,45,'CUEVAS, MARK DHERRICK PIAMONTE',0,0);

$pdf->SetX(120);
$pdf->Cell(0,45,'000001', 0, 0);

$pdf->SetX(141);
$pdf->Cell(0,45,'STEM',0,0);

//second line
$pdf->SetFont("arial","","8");
$pdf->SetX(16);
$pdf->Cell(0,72,'PHILIPPINE CHRISTIAN UNIVERSITY', 0,0);

$pdf->SetX(137);
$pdf->Cell(0,72,'OJT',0,0);


//SECOND COPY

//date line
$pdf->SetFont("arial","","8");
$pdf->SetX(175);
$pdf->Cell(0,217,'12/19/2017', 0,0);

//FIRST LINE
$pdf->SetFont("arial","","8");
$pdf->SetX(16);
$pdf->Cell(0,237,'LAG-0000001', 0,0);

$pdf->SetX(42.5);
$pdf->Cell(0,237,'CUEVAS, MARK DHERRICK PIAMONTE',0,0);

$pdf->SetX(120);
$pdf->Cell(0,237,'000001', 0, 0);

$pdf->SetX(141);
$pdf->Cell(0,237,'STEM',0,0);

//second line
$pdf->SetFont("arial","","8");
$pdf->SetX(16);
$pdf->Cell(0,264,'PHILIPPINE CHRISTIAN UNIVERSITY', 0,0);

$pdf->SetX(137);
$pdf->Cell(0,264,'OJT',0,0);

//REMINDERS
$pdf->SetX(50);
$pdf->SetY(155);
$pdf->SetLeftMargin(15);
$pdf->Write(0, 'PAOTSINPAOTSINPAOTSIN');

//third copy
$pdf->SetX(100);
$pdf->SetY(196.5);
$pdf->Cell(177,0, '12/19/2017',0,0, 'R');

$pdf->SetY(200);
$pdf->Cell(0,0,'',0,0);

$pdf->SetX(50);
$pdf->SetY(206.5);
$pdf->SetLeftMargin(16);
$pdf->Cell(0,28, 'CUEVAS, MARK DHERRICK PIAMONTE',0,0);
$pdf->SetX(138);
$pdf->Cell(0,28, 'OJT',0,0);

$pdf->SetX(75);
$pdf->SetY(206.5);
$pdf->SetLeftMargin(16);
$pdf->Cell(0,0, 'LAG-0000001',0,0);
$pdf->SetX(43);
$pdf->Cell(0,0, 'CUEVAS, MARK DHERRICK PIAMONTE',0,0);
$pdf->SetX(120);
$pdf->Cell(0,0, '000001',0,0);
$pdf->SetX(142);
$pdf->Cell(0,0, 'STEM',0,0);

//REMINDERS
$pdf->SetX(50);
$pdf->SetY(233);
$pdf->SetLeftMargin(15);
$pdf->Write(0, 'PAOTSINPAOTSINPAOTSIN');

$pdf->Output();
?>