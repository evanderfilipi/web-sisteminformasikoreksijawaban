<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Guru/Wali Kelas') {
	
	$jml_soal = $_GET['jml_soal'];
	$kd_jawaban = 0;
	$no_1 = $_POST['n1'];
	$no_2 = $_POST['n2'];
	$no_3 = $_POST['n3'];
	$no_4 = $_POST['n4'];
	$no_5 = $_POST['n5'];
	$no_6 = $_POST['n6'];
	$no_7 = $_POST['n7'];
	$no_8 = $_POST['n8'];
	$no_9 = $_POST['n9'];
	$no_10 = $_POST['n10'];
	$no_11 = $_POST['n11'];
	$no_12 = $_POST['n12'];
	$no_13 = $_POST['n13'];
	$no_14 = $_POST['n14'];
	$no_15 = $_POST['n15'];
	$no_16 = $_POST['n16'];
	$no_17 = $_POST['n17'];
	$no_18 = $_POST['n18'];
	$no_19 = $_POST['n19'];
	$no_20 = $_POST['n20'];
	$no_21 = $_POST['n21'];
	$no_22 = $_POST['n22'];
	$no_23 = $_POST['n23'];
	$no_24 = $_POST['n24'];
	$no_25 = $_POST['n25'];
	$no_26 = $_POST['n26'];
	$no_27 = $_POST['n27'];
	$no_28 = $_POST['n28'];
	$no_29 = $_POST['n29'];
	$no_30 = $_POST['n30'];
	$no_31 = $_POST['n31'];
	$no_32 = $_POST['n32'];
	$no_33 = $_POST['n33'];
	$no_34 = $_POST['n34'];
	$no_35 = $_POST['n35'];
	$no_36 = $_POST['n36'];
	$no_37 = $_POST['n37'];
	$no_38 = $_POST['n38'];
	$no_39 = $_POST['n39'];
	$no_40 = $_POST['n40'];
	$no_41 = $_POST['n41'];
	$no_42 = $_POST['n42'];
	$no_43 = $_POST['n43'];
	$no_44 = $_POST['n44'];
	$no_45 = $_POST['n45'];
	$no_46 = $_POST['n46'];
	$no_47 = $_POST['n47'];
	$no_48 = $_POST['n48'];
	$no_49 = $_POST['n49'];
	$no_50 = $_POST['n50'];
	$mapel = $_POST['mapel'];
	$jns_soal = $_POST['jns_soal'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$semester = $_POST['semester'];
	$thn_ajaran = $_POST['thn_ajaran'];

	if($mapel == "" || $jns_soal == "" || $kelas == "" || $jurusan == "" || $semester == "" || $thn_ajaran == ""){
		header("location:inputjawaban.php?pesan=input_kosong");}
	else {
		$cekdata = mysql_query("select * from tb_kunci_jawaban where kd_mapel='$mapel' and jns_soal='$jns_soal' and kelas='$kelas' and jurusan='$jurusan' and semester='$semester' and tahun_ajaran='$thn_ajaran'")or die(mysql_error());
		while($data = mysql_fetch_array($cekdata)){
		$mapellama = $data['kd_mapel'];
		$jns_soallama = $data['jns_soal'];
		$kelaslama = $data['kelas'];
		$jurusanlama = $data['jurusan'];
		$semesterlama = $data['semester'];
		$thn_ajaranlama = $data['tahun_ajaran'];
		}

		if($mapel == $mapellama && $jns_soal == $jns_soallama && $kelas == $kelaslama && $jurusan == $jurusanlama && $semester == $semesterlama && $thn_ajaran == $thn_ajaranlama){
			header("location:inputjawaban.php?pesan=sudahada");
		}
		else {
			$querysimpan = mysql_query("insert into tb_kunci_jawaban values('$kd_jawaban','$no_1','$no_2','$no_3','$no_4','$no_5','$no_6','$no_7','$no_8','$no_9','$no_10','$no_11','$no_12','$no_13','$no_14','$no_15','$no_16','$no_17','$no_18','$no_19','$no_20','$no_21','$no_22','$no_23','$no_24','$no_25','$no_26','$no_27','$no_28','$no_29','$no_30','$no_31','$no_32','$no_33','$no_34','$no_35','$no_36','$no_37','$no_38','$no_39','$no_40','$no_41','$no_42','$no_43','$no_44','$no_45','$no_46','$no_47','$no_48','$no_49','$no_50','$jml_soal','$mapel','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran')");
			if($querysimpan){
				header("location:inputjawaban.php?pesan=input");}
			else{
				header("location:inputjawaban.php?pesan_error=input");}
		}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>