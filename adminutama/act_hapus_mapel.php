<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
 
$kd_mapel = $_GET['kd_mapel'];
$query = mysql_query("DELETE FROM tb_mapel WHERE kd_mapel='$kd_mapel'")or die(mysql_error());
 
if($query){
header("location:matapelajaran.php?pesan=hapus");}
else{
header("location:matapelajaran.php?pesan_error=hapus");}

} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }

?>