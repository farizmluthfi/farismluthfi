<?php
@session_start();
include "koneksi.php";
include "fpdf.php";

$pdf = new FPDF('L','mm','A4');
$pdf->SetMargins(15,20,15);
$pdf->AddPage();

$pdf->Image('logo2.png',15,18,16);
$pdf->SetTitle("Cetak Data");
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,5,'Dinas Kependudukan Kota Sukabumi','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jln. Siliwangi, No. xx, Sukabumi, Indonesia','0','1','C',false);
$pdf->Cell(0,2,'Telp : (0266) 6251827 - Email : farismluthfi28@ummi.sch.id','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(265,0.6,'','0','1','C',true);
$pdf->Ln(5);

if(@$_GET['id_penduduk']) {

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(50,5,'Laporan Data Penduduk','0','1','L',false);
	$pdf->Ln(16);

	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,6,'No.',1,0,'C');
	$pdf->Cell(25,6,'No. KK',1,0,'C');
	$pdf->Cell(25,6,'NIK',1,0,'C');
	$pdf->Cell(40,6,'Nama Lengkap',1,0,'C');
	$pdf->Cell(25,6,'Tanggal Lahir',1,0,'C');
	$pdf->Cell(10,6,'Umur',1,0,'C');
	$pdf->Cell(10,6,'Jenis Kelamin',1,0,'C');
	$pdf->Cell(20,6,'Hubungan dalam keluarga',1,0,'C');
	$pdf->Cell(10,6,'No. RT',1,0,'C');
	$pdf->Cell(22,6,'Tgl Dibuat',1,0,'C');
	$pdf->Cell(22,6,'Tgl Diupdate',1,0,'C');
	$pdf->Ln(16);
	$no = 1;
	$sql = mysqli_query($db, "SELECT * FROM data_penduduk ORDER BY id_penduduk ASC") or die ($db->error);
	while($data = mysqli_fetch_array($sql)) {
		$pdf->Ln(16);
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(10,4,$no++.".",1,0,'C');
		$pdf->Cell(25,4,$data['no_kk'],1,0,'L');
		$pdf->Cell(25,4,$data['nik'],1,0,'L');
		$pdf->Cell(40,4,$data['nama_lengkap'],1,0,'L');
		$pdf->Cell(25,4,$data['tanggal_lahir'],1,0,'L');
		$pdf->Cell(10,4,$data['umur'],1,0,'C');
		$pdf->Cell(10,4,$data['jenis_kelamin'],1,0,'C');
		$pdf->Cell(20,4,$data['id_stat_hbkel'],1,0,'C');
		$pdf->Cell(10,4,$data['no_rt'],1,0,'C');
		$pdf->Cell(22,4,$data['tanggal_create'],1,0,'L');
		$pdf->Cell(22,4,$data['tanggal_update'],1,0,'L');
		$pdf->Cell(22,4,ucfirst($data['status']),1,0,'C');
	}
}

$pdf->Ln(50);
$pdf->SetLeftMargin(230);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,"Sukabumi, ".(date('Y-m-d')),0,0,'L');
$pdf->Ln(20);
$pdf->SetLeftMargin(230);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,"Faris Muhammad Luthfi",0,0,'L');
$pdf->Output();
?>