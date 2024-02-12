<?php
require_once 'koneksi.php';
include "library/fpdf.php";

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B', 13);
$pdf->Cell(290, 10, 'REPORT DATA',0,0,'C');

$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B', '9');

$pdf->Cell(10,7,'No.',1,0,'C');
$pdf->Cell(50,7,'Item Code',1,0,'C');
$pdf->Cell(100,7,'Item Name',1,0,'C');
$pdf->Cell(30,7,'Option',1,0,'C');
$pdf->Cell(20,7,'Quantity',1,0,'C');
$pdf->Cell(20,7,'Unit',1,0,'C');
$pdf->Cell(50,7,'Date Received',1,0,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','', 10);

$no = 1;
$koneksi;
$data = mysqli_query($koneksi, "SELECT * FROM tbarang");
while($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10,6,$no++,1,0,'C');
    $pdf->Cell(50,6,$d['kode'],1,0,'C');
    $pdf->Cell(100,6,$d['nama'],1,0,'C');
    $pdf->Cell(30,6,$d['asal'],1,0,'C');
    $pdf->Cell(20,6,$d['jumlah'],1,0,'C');
    $pdf->Cell(20,6,$d['satuan'],1,0,'C');
    $pdf->Cell(50,6,$d['tanggal_diterima'],1,1,'C');
}

$pdf->Output();