<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Guru/Wali Kelas') {
 
$kd_kunci = $_GET['id'];
$query = mysql_query("DELETE FROM tb_kunci_jawaban WHERE kd_jawaban='$kd_kunci'")or die(mysql_error());
 
if($query){
header("location:datakuncijawaban.php?pesan=hapus");}
else{
header("location:datakuncijawaban.php?pesan_error=hapus");}

} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }

?>