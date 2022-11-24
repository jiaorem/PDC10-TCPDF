<?php
require "vendor/autoload.php";
// use TCPDF;

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Micoh Yabut');
$pdf->SetTitle('TCPDF Calendar of January 2023');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'TCPDF Calendar of January 2023', 'Micoh Yabut', array(0,64,255), array(0,64,128));
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

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->SetFillColor(143, 18, 14);
$pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'DF', "");



// set colors for gradients (r,g,b) or (grey 0-255)
$green = array(13,166,76);
$red = array(236,33,36);
$yellow = array(241,224,14);
$orange = array(241,92,34);

// paint a linear gradient
$pdf->CoonsPatchMesh(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), $yellow, $green, $red, $orange);

// 
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 234, 0));
//$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(255, 234, 0));

$pdf->StarPolygon(100, 25, 15, 12, 5, 30, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(30, 20, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(10, 60, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(175, 30, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(15, 105, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(195, 75, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(15, 165, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(190, 140, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(25, 230, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(200, 200, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(60, 280, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));
$pdf->StarPolygon(150, 260, 15, 15, 6, 35, 0, 'DF', array('all' => $style5), array(255, 255, 20), 'F', array(255, 200, 200));

// $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 90, 0)));
// $pdf->RoundedRect(30, 40, 150, 200, 3.50, '1111', 'DF', '', array(0, 90, 0));

$pdf->SetFont('times', 'B', 70);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(150, 0, "Happy Holidays!!", 0, 'C', 0, 1, 30, 60, true, 0);
$pdf->Ln(5);
$pdf->SetFont('times', '', 16);
$pdf->MultiCell(120, 0, "Our best wishes and warmest thoughts during this special festive season. May you have A Merry Christmas and A Happy New Year.", 0, 'J', 0, 1, 45, 150, true, 0);
$pdf->Ln(5);
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+