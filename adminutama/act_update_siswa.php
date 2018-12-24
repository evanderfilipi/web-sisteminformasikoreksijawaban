<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jns_kelamin = $_POST['jns_kelamin'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];

	if($nis == "" || $nama == "" || $tgl_lahir == "" || $jns_kelamin == "" || $agama == "" || $alamat == ""){
		header("location:datasiswa.php?pesan=input_kosong");}
	else {
		$ceknis = mysql_query("select * from tb_siswa where NIS='$nis'")or die(mysql_error());
		while($data = mysql_fetch_array($ceknis)){
		$nislama = $data['NIS'];
		}

		$queryupdate = mysql_query("UPDATE tb_siswa SET Nama='$nama', Tgl_lahir='$tgl_lahir', Jns_kelamin='$jns_kelamin', Agama='$agama', Alamat='$alamat' WHERE NIS='$nis'"); 
			if($queryupdate){
				header("location:datasiswa.php?pesan=update");}
			else{
				header("location:datasiswa.php?pesan_error=update");}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>