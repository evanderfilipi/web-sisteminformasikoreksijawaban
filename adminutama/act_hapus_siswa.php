<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
 
$nis = $_GET['nis'];
$query = mysql_query("DELETE FROM tb_siswa WHERE NIS='$nis'")or die(mysql_error());
 
if($query){
header("location:datasiswa.php?pesan=hapus");}
else{
header("location:datasiswa.php?pesan_error=hapus");}

} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }

?>