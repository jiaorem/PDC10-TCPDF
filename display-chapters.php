<?php
require "vendor/autoload.php";
/**
 * Extend TCPDF to work with multiple columns
 */
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

class MC_TCPDF extends TCPDF {
    function Header()
    {
        global $title;
    
        // times bold 15
        $this->SetFont('times','B',15);
        // Calculate width of title and position
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colors of frame, background and text
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(0,0,0);
        $this->SetTextColor(255,255,6);
        // Thickness of frame (1 mm)
        $this->SetLineWidth(1);
        // Title
        $this->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $this->Ln(10);
    }
    
    function ChapterTitle($num, $label)
    {
        // times 12
        $this->SetFont('times','',12);
        // Background color
        $this->SetFillColor(0,0,0);
        $this->SetTextColor(255,255,6);
        // Title
        $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
        // Line break
        $this->Ln(4);
    }
    
    function ChapterBody($file)
    {
        // Read text file
        $txt = file_get_contents($file);
        // times 12
        $this->SetFont('times','',12);
        $this->SetTextColor(0,0,0);
        // Output justified text
        $this->MultiCell(0,5,$txt);
        // Line break
        $this->Ln();
        // Mention in italics
        $this->SetFont('','I');
        $this->Cell(0,5,'(end of excerpt)');
    }
    
    function PrintChapter($num, $title, $file)
    {
        // $this->SetFillColor(212,55,55);
        $this->AddPage();
        $this->ChapterTitle($num,$title);
        $this->ChapterBody($file);
    }
    }
    
    $pdf = new MC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $title = 'Star Wars';
    $pdf->SetTitle($title);
    $pdf->SetAuthor('Jules Verne');
    $pdf->PrintChapter(1,' Heir to the Empire','starwars-chapt1.txt');
    $pdf->PrintChapter(2,' Dark Force Rising','starwars-chapt2.txt');
    $pdf->PrintChapter(3,' The Last Command','starwars-chapt3.txt');
    $pdf->Output('example_001.pdf', 'I');
    ?>