<?php
require "vendor/autoload.php";
// use TCPDF;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Micoh Yabut');
$pdf->SetTitle('TCPDF Favorite Quotes');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'TCPDF Favorite Quotes', 'Micoh Yabut', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();

// set default font subsetting mode
$pdf->setFontSubsetting(false);

//new font
$pdf->SetFont('helvetica', '', 20);

$pdf->MultiCell(150, 0, "Never forget what you are. The rest of the world will not. Wear it like armor, and it can never be used to hurt you.", 0, 'J', 0, 1, 30, '', true, 0);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 15);
$pdf->Cell(165,0,'-Tyrion Lannister (Game of Thrones)', 0,0,'R', false,0,'',2);
$pdf->Ln(15);

//new font
$pdf->SetFont('times', '', 20);

$pdf->MultiCell(150, 0, "The powerful have always preyed on the powerless. That’s how they became powerful in the first place.", 0, 'J', 0, 1, 30, '', true, 0);
$pdf->Ln(5);
$pdf->SetFont('times', '', 15);
$pdf->Cell(165,0,'-Tyrion Lannister (Game of Thrones)', 0,0,'R', false,0,'',2);
$pdf->Ln(15);

//new font
$pdf->SetFont('dejavusans', '', 20);

$pdf->MultiCell(150, 0, "Chaos isn’t a pit. Chaos is a ladder. Many who try to climb it fail, and never get to try again.", 0, 'J', 0, 1, 30, '', true, 0);
$pdf->Ln(5);
$pdf->SetFont('dejavusans', '', 15);
$pdf->Cell(165,0,'-Petyr Baelish (Game of Thrones)', 0,0,'R', false,0,'',2);
$pdf->Ln(15);

//new font
$pdf->SetFont('symbol', '', 20);

$pdf->MultiCell(150, 0, "Leave one wolf alive and the sheep are never safe.", 0, 'J', 0, 1, 30, '', true, 0);
$pdf->Ln(5);
$pdf->SetFont('symbol', '', 15);
$pdf->Cell(165,0,'-Arya Stark (Game of Thrones)', 0,0,'R', false,0,'',2);
$pdf->Ln(15);

//new font
$pdf->SetFont('cid0jp', '', 20);

$pdf->MultiCell(150, 0, "Power resides where men believe it resides. It’s a trick. A shadow on the wall. And a very small man can cast a very large shadow.", 0, 'J', 0, 1, 30, '', true, 0);
$pdf->Ln(5);
$pdf->SetFont('cid0jp', '', 15);
$pdf->Cell(165,0,'-Lord Varys (Game of Thrones)', 0,0,'R', false,0,'',2);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_033.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+