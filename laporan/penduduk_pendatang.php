<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
$pdf->Image('../gambar/download.png',11,5,-250);
// mencetak string 
$pdf->Cell(250,7,'PEMERINTAHAN KECAMATAN LENGKONG',0,1,'C');
$pdf->Cell(250,7,'DESA CILANGKAP',0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(250,7,'LAPORAN PENDUDUK PENDATANG',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,6,'NIK',1,0);
$pdf->Cell(60,6,'NAMA',1,0);
$pdf->Cell(20,6,'TANGGAL',1,0);
$pdf->Cell(40,6,'DESA ASAL',1,0);
$pdf->Cell(50,6,'KECAMATAN ASAL',1,0);
$pdf->Cell(70,6,'ALAMAT ASAL',1,1);



$pdf->SetFont('Arial','',10);
include '../koneksi.php';
$mahasiswa = mysqli_query($konek, "select * from v_datang");
while ($row = mysqli_fetch_array($mahasiswa)){
	
	$pdf->Cell(40,6,$row['nik'],1,0);  
    $pdf->Cell(60,6,$row['nama'],1,0);
    $pdf->Cell(20,6,$row['tgl_datang'],1,0);
    $pdf->Cell(40,6,$row['desa_asal'],1,0);
     $pdf->Cell(50,6,$row['kecamatan_asal'],1,0);
    $pdf->Cell(70,6,$row['alamat_asal'],1,1); 

}

$pdf->Output();
?>
