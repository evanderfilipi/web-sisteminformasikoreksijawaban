<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

	$password = "administrator";
	$kd_admin = $_GET['id'];
	$queryupdate = mysql_query("UPDATE tb_admin SET Password='$password' WHERE kd_admin='$kd_admin'"); 
		if($queryupdate){
			header("location:datauser.php?pesan=resetpass");}
		else{
			header("location:datauser.php?pesan_error=resetpass");}

} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>