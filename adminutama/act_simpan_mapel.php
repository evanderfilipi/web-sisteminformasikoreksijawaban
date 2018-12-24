<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

	$kd_mapel = 0;
	$namamapel = $_POST['namamapel'];
	$nilaikkm = $_POST['nilaikkm'];
	$keterangan = $_POST['keterangan'];

	if($namamapel == "" || $nilaikkm == ""){
		header("location:matapelajaran.php?pesan=input_kosong");}
	else {
		$querysimpan = mysql_query("insert into tb_mapel values('$kd_mapel','$namamapel','$nilaikkm','$keterangan')");
			if($querysimpan){
				header("location:matapelajaran.php?pesan=input");}
			else{
				header("location:matapelajaran.php?pesan_error=input");}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>