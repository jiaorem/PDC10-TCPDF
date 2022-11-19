<?php
require "vendor/autoload.php";

$csv_file = 'population.csv';
$handle = fopen($csv_file, 'r');
$row_index = 1; // initialize
$headers = [];
$data = [];
$barcode = [];

while (($row_data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
	if ($row_index++ < 2)
	{
		foreach ($row_data as $col)
		{
			array_push($headers, $col);
		}
		continue;
	}
    
	$tmp = [];
    //var_dump($row_data[$index]);
	for ($index = 0; $index < count($headers); $index++)
	{
		$tmp[$headers[$index]] = $row_data[$index];
	}
	array_push($data, $tmp);

    
}
// var_dump($headers);
// print_r('<br>');
// print_r('<br>');
// var_dump($data);
fclose($handle);

class MC_TCPDF extends TCPDF {

// //// define barcode style
// $style = array(
//     'position' => '',
//     'align' => 'C',
//     'stretch' => false,
//     'fitwidth' => true,
//     'cellfitalign' => '',
//     'border' => true,
//     'hpadding' => 'auto',
//     'vpadding' => 'auto',
//     'fgcolor' => array(0,0,0),
//     'bgcolor' => false, //array(255,255,255),
//     'text' => true,
//     'font' => 'helvetica',
//     'fontsize' => 8,
//     'stretchtext' => 4
// );

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(60,5,$col,1,0,'C');
        $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(60,5,$col,1,0,'C');
            $this->Ln();
            
    }
}
}

$pdf = new MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$header = array('ID', 'Country', 'Population (2020)');
//$header = $pdf->LoadHeader('population.csv');




$header = $headers;
$table_data = $data;
$pdf->SetFont('Times','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();