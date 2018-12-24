<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
 
$kd_admin = $_GET['id'];
$query = mysql_query("DELETE FROM tb_admin WHERE kd_admin='$kd_admin'")or die(mysql_error());
 
if($query){
header("location:datauser.php?pesan=hapus");}
else{
header("location:datauser.php?pesan_error=hapus");}

} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }

?>