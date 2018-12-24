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

		if($nis == $nislama){
			header("location:datasiswa.php?pesan=sudahada&nis=$nislama");
		}
		else {
			$querysimpan = mysql_query("insert into tb_siswa values('$nis','$nama','$tgl_lahir','$jns_kelamin','$agama','$alamat')");
			if($querysimpan){
				header("location:datasiswa.php?pesan=input");}
			else{
				header("location:datasiswa.php?pesan_error=input");}
		}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>