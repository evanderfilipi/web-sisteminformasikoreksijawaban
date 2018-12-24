<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Guru/Wali Kelas') {
 
$kd_jawaban_siswa = $_GET['id1'];
$kd_koreksi = $_GET['id2'];
$query = mysql_query("DELETE FROM tb_jawaban_siswa WHERE kd_jawaban_siswa='$kd_jawaban_siswa'")or die(mysql_error()); 
if($query){
	$query2 = mysql_query("DELETE FROM tb_hasilkoreksi WHERE kd_koreksi='$kd_koreksi'")or die(mysql_error());
	if($query2)
	{
		header("location:datajawabansiswa.php?pesan=hapus");}
	else {
		header("location:datajawabansiswa.php?pesan_error=hapus");}
} else {
	header("location:datajawabansiswa.php?pesan_error=hapus");}

} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }

?>