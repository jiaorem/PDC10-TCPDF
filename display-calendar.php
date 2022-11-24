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
$pdf->AddPage('L');

// -----------------------------------------------------------------------------

// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'twice2.png';
$pdf->Image($img_file, 15, 27, 271, 155, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" color="#C8FCEA">
<thead>
 <tr>
  <th width="955" align="center" style="font-size:28; color:#00ffbb;" ><b>JANUARY</b></th>
 </tr>
 <tr color="#65FBD2">
  <td width="135" align="center"><b>SUN</b></td>
  <td width="135" align="center"><b>MON</b></td>
  <td width="135" align="center"><b>TUES</b></td>
  <td width="135" align="center"> <b>WED</b></td>
  <td width="135" align="center"><b>THURS</b></td>
  <td width="135" align="center"><b>FRI</b></td>
  <td width="135" align="center"><b>SAT</b></td>
 </tr>
</thead>
 <tr align="right" style="font-weight:400;">
 <td width="135"><b>1</b><br /><br /><br /></td>
 <td width="135"><b>2</b></td>
 <td width="135"><b>3</b></td>
 <td width="135"><b>4</b></td>
 <td width="135"><b>5</b></td>
 <td width="135"><b>6</b></td>
 <td width="135"><b>7</b></td>
 </tr>
 <tr align="right">
 <td width="135"><b>8</b><br /><br /><br /></td>
 <td width="135"><b>9</b></td>
 <td width="135"><b>10</b></td>
 <td width="135"><b>11</b></td>
 <td width="135"><b>12</b></td>
 <td width="135"><b>13</b></td>
 <td width="135"><b>14</b></td>
 </tr>
 <tr align="right">
 <td width="135"><b>15</b><br /><br /><br /></td>
 <td width="135"><b>16</b></td>
 <td width="135"><b>17</b></td>
 <td width="135"><b>18</b></td>
 <td width="135"><b>19</b></td>
 <td width="135"><b>20</b></td>
 <td width="135"><b>21</b></td>
 </tr>
 <tr align="right">
 <td width="135"><b>22</b><br /><br /><br /></td>
 <td width="135"><b>23</b></td>
 <td width="135"><b>24</b></td>
 <td width="135"><b>25</b></td>
 <td width="135"><b>26</b></td>
 <td width="135"><b>27</b></td>
 <td width="135"><b>28</b></td>
 </tr>
 <tr align="right">
 <td width="135"><b>29</b><br /><br /><br /></td>
 <td width="135"><b>30</b></td>
 <td width="135"><b>31</b></td>
 <td width="135" style="color:#808080;"><b>1</b></td>
 <td width="135" style="color:#808080;"><b>2</b></td>
 <td width="135" style="color:#808080;"><b>3</b></td>
 <td width="135" style="color:#808080;"><b>4</b></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+