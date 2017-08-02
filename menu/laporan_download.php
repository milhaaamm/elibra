<?php
include "../koneksi/checknlog.php";
//mengambil data dari tabel
$sql=mysqli_query($connection,"SELECT * FROM log ORDER BY _idl");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
}
 
//mengisi judul dan header tabel
$judul = "DATA LOGIN";
$header = array(
array("label"=>"no.", "length"=>10, "align"=>"C"),
array("label"=>"User ID", "length"=>40, "align"=>"C"),
array("label"=>"Tanggal Login", "length"=>50, "align"=>"C"),
array("label"=>"Tanggal Logout", "length"=>50, "align"=>"C"),
);
 
//memanggil fpdf
require_once ("../fpdf/fpdf.php");
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
 
//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}
 
//output file pdf
$pdf->Output('laporan.pdf','I');
?>