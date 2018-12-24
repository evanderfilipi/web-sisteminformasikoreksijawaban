<?php
include 'koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama' || $_SESSION['Status'] == 'Guru/Wali Kelas' || $_SESSION['Status'] == 'Kepala Sekolah') {
	
	$kd_mapel = $_GET['kd_mapel'];
	$namamapel = $_GET['namamapel'];
	$jns_soal = $_GET['jns_soal'];
	$kelas = $_GET['kelas'];
	$jurusan = $_GET['jurusan'];
	$semester = $_GET['semester'];
	$thn_ajaran = $_GET['thn_ajaran'];
	
	require('phpfpdf/fpdf.php');
	
	class PDF extends FPDF
	{
	
	
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','',9);
		$this->Cell(0,10,$this->PageNo(),0,0,'C');
	}
	
	}
	
	$tulisan = "Daftar Hasil Nilai $jns_soal $namamapel";
	$tkelas = "Kelas : $kelas ($jurusan)";
	$tsemester = "Semester : $semester";
	$tthn_ajaran = "Tahun Ajaran : $thn_ajaran";
	
	$pdf = new PDF('p','mm','A4');
	$pdf->AddPage();

	$pdf->Image('img/logo_smk.png',6,6,37);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(45);
	$pdf->Cell(140,0,'Y A Y A S A N  H U N A F A',0,1,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(45);
	$pdf->Cell(140,7,'Akta Notaris Nomor 30, Tanggal 28 Mei 2008',0,1,'C');
	$pdf->SetFont('Times','B',18);
	$pdf->Cell(45);
	$pdf->Cell(140,3,'SEKOLAH MENENGAH KEJURUAN WIRADIKARYA',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45);
	$pdf->Cell(140,7,'Ijin Operasional Nomor : 421/59-Disdik, Tanggal 13 Oktober 2008',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45);
	$pdf->Cell(140,1,'NSS : 402020233139          NPSN : 20253598',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45);
	$pdf->Cell(140,7,'Status Terakreditasi "A" Nomor SK : 02.00/350/BAP-SM/XII/2013',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45);
	$pdf->Cell(140,1,'Jalan H. Miing No. 239 Rt 04/01 Desa Karihkil Kecamatan Ciseeng Kabupaten Bogor, 16330',0,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45);
	$pdf->Cell(140,7,'HP : 087770403004          Email : smkwd@ymail.com',0,1,'C');
	$pdf->Ln(8);
	$pdf->SetLineWidth(0.2);
	$pdf->Line(6,44,204,44);
	$pdf->SetLineWidth(0.7);
	$pdf->Line(6,45,204,45);

	$pdf->SetMargins(15,15,15);
	$pdf->SetLineWidth(0.3);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(195,7,$tulisan,0,1,'C');
	$pdf->Cell(10,10,'',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(190,4,$tkelas,0,1);
	$pdf->Cell(2,2,'',0,1);
	$pdf->Cell(190,4,$tsemester,0,1);
	$pdf->Cell(2,2,'',0,1);
	$pdf->Cell(190,4,$tthn_ajaran,0,1);
	$pdf->Cell(3,3,'',0,1);
	
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(30,7,'NIS',1,0,'C');
	$pdf->Cell(75,7,'Nama Siswa',1,0,'C');
	$pdf->Cell(23,7,'Nilai Siswa',1,0,'C');
	$pdf->Cell(23,7,'Nilai KKM',1,0,'C');
	$pdf->Cell(28,7,'Keterangan',1,1,'C');
	
	$pdf->SetFont('Arial','',11);
	$penilaian = mysql_query("SELECT * FROM tb_hasilkoreksi WHERE kd_mapel='$kd_mapel' AND jns_soal='$jns_soal' AND kelas='$kelas' AND jurusan='$jurusan' AND semester='$semester' AND tahun_ajaran='$thn_ajaran' ORDER BY Nama ASC")or die(mysql_error());
	while($data = mysql_fetch_array($penilaian)){
		$pdf->Cell(30,7,$data['NIS'],1,0);
		$pdf->Cell(75,7,$data['Nama'],1,0);
		$pdf->Cell(23,7,$data['nilai_akhir'],1,0);
		$pdf->Cell(23,7,$data['nilaikkm'],1,0);
		$pdf->Cell(28,7,$data['keterangan'],1,1);
	}

	$pdf->SetAuthor('SMK WIRADIKARYA');
	ob_end_clean();
	$pdf->Output();
	
} else {
	echo "<script>
	location.href='index.php';
	</script>";
	exit();
}
?>


<!-- Created and Modified by EVANDER -->