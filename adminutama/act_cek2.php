<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
	
	$nis = $_POST['nis'];
	$kd_mapel = $_GET['kd_mapel'];
	$namamapel = $_POST['namamapel'];
	$jml_soal = $_GET['jml_soal'];
	$jns_soal = $_POST['jns_soal'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$semester = $_POST['semester'];
	$thn_ajaran = $_POST['thn_ajaran'];
	
	if($nis == ""){
		$alur = 1;
		header("location:koreksijawaban.php?inputnis&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");}
	else {
		$ceknis = mysql_query("select * from tb_siswa where NIS='$nis'")or die(mysql_error());
		while($data = mysql_fetch_array($ceknis)){
		$hasilnis = $data['NIS'];
		$nama = $data['Nama'];
		}
		if($nis == $hasilnis){
			$alur = 2;
			header("location:koreksijawaban.php?alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal&nis=$nis&nama=$nama");
		}
		else{
			$alur = 4;
			header("location:koreksijawaban.php?alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
		}
	}
		
		
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>