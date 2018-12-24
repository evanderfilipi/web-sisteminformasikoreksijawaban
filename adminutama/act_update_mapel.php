<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

	$kd_mapel = $_POST['kodemapel'];
	$namamapel = $_POST['namamapel'];
	$nilaikkm = $_POST['nilaikkm'];
	$keterangan = $_POST['keterangan'];

	if($namamapel == "" || $nilaikkm == ""){
		header("location:matapelajaran.php?pesan=input_kosong");}
	else {
		$queryupdate = mysql_query("UPDATE tb_mapel SET nama_mapel='$namamapel', nilaikkm='$nilaikkm', keterangan='$keterangan' WHERE kd_mapel='$kd_mapel'"); 
			if($queryupdate){
				header("location:matapelajaran.php?pesan=update");}
			else{
				header("location:matapelajaran.php?pesan_error=update");}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>