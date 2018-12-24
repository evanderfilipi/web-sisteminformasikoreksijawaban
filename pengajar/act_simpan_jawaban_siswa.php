<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Guru/Wali Kelas') {
	
	$kd_jawaban_siswa = 0;
	$nis = $_POST['nis'];
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
	$namamapel = $_POST['namamapel'];
	$jns_soal = $_POST['jns_soal'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$semester = $_POST['semester'];
	$thn_ajaran = $_POST['thn_ajaran'];
	$nilaiessay = $_POST['nilaiessay'];
	$kd_mapel = $_GET['kd_mapel'];
	$kd_koreksi = 0;
	$essay = "";
	if(isset($_POST['essay'])) {
		$essay = "Ada";
	} else {
		$essay = "Tidak Ada";
	}
	

		$cekdata = mysql_query("select * from tb_jawaban_siswa where NIS='$nis' and kd_mapel='$kd_mapel' and jns_soal='$jns_soal' and kelas='$kelas' and jurusan='$jurusan' and semester='$semester' and tahun_ajaran='$thn_ajaran'")or die(mysql_error());
		while($data = mysql_fetch_array($cekdata)){
		$nislama = $data['NIS'];
		$kd_mapellama = $data['kd_mapel'];
		$jns_soallama = $data['jns_soal'];
		$kelaslama = $data['kelas'];
		$jurusanlama = $data['jurusan'];
		$semesterlama = $data['semester'];
		$thn_ajaranlama = $data['tahun_ajaran'];
		}

		if($nis == $nislama && $kd_mapel == $kd_mapellama && $jns_soal == $jns_soallama && $kelas == $kelaslama && $jurusan == $jurusanlama && $semester == $semesterlama && $thn_ajaran == $thn_ajaranlama){
			header("location:koreksijawaban.php?jawabansiswa");
		}
		else {
			$querysimpan = mysql_query("insert into tb_jawaban_siswa values('$kd_jawaban_siswa','$nis','$no_1','$no_2','$no_3','$no_4','$no_5','$no_6','$no_7','$no_8','$no_9','$no_10','$no_11','$no_12','$no_13','$no_14','$no_15','$no_16','$no_17','$no_18','$no_19','$no_20','$no_21','$no_22','$no_23','$no_24','$no_25','$no_26','$no_27','$no_28','$no_29','$no_30','$no_31','$no_32','$no_33','$no_34','$no_35','$no_36','$no_37','$no_38','$no_39','$no_40','$no_41','$no_42','$no_43','$no_44','$no_45','$no_46','$no_47','$no_48','$no_49','$no_50','$kd_mapel','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran')");
			if($querysimpan){
				$jml_soal = "";
				$benar = "";
				$salah = "";
				$cekkunci = mysql_query("select * from tb_kunci_jawaban where kd_mapel='$kd_mapel' and jns_soal='$jns_soal' and kelas='$kelas' and jurusan='$jurusan' and semester='$semester' and tahun_ajaran='$thn_ajaran'")or die(mysql_error());
				while($data = mysql_fetch_array($cekkunci)){
				$jml_soal = $data['jml_soal'];
				$no_1k = $data['no_1'];
				$no_2k = $data['no_2'];
				$no_3k = $data['no_3'];
				$no_4k = $data['no_4'];
				$no_5k = $data['no_5'];
				$no_6k = $data['no_6'];
				$no_7k = $data['no_7'];
				$no_8k = $data['no_8'];
				$no_9k = $data['no_9'];
				$no_10k = $data['no_10'];
				$no_11k = $data['no_11'];
				$no_12k = $data['no_12'];
				$no_13k = $data['no_13'];
				$no_14k = $data['no_14'];
				$no_15k = $data['no_15'];
				$no_16k = $data['no_16'];
				$no_17k = $data['no_17'];
				$no_18k = $data['no_18'];
				$no_19k = $data['no_19'];
				$no_20k = $data['no_20'];
				$no_21k = $data['no_21'];
				$no_22k = $data['no_22'];
				$no_23k = $data['no_23'];
				$no_24k = $data['no_24'];
				$no_25k = $data['no_25'];
				$no_26k = $data['no_26'];
				$no_27k = $data['no_27'];
				$no_28k = $data['no_28'];
				$no_29k = $data['no_29'];
				$no_30k = $data['no_30'];
				$no_31k = $data['no_31'];
				$no_32k = $data['no_32'];
				$no_33k = $data['no_33'];
				$no_34k = $data['no_34'];
				$no_35k = $data['no_35'];
				$no_36k = $data['no_36'];
				$no_37k = $data['no_37'];
				$no_38k = $data['no_38'];
				$no_39k = $data['no_39'];
				$no_40k = $data['no_40'];
				$no_41k = $data['no_41'];
				$no_42k = $data['no_42'];
				$no_43k = $data['no_43'];
				$no_44k = $data['no_44'];
				$no_45k = $data['no_45'];
				$no_46k = $data['no_46'];
				$no_47k = $data['no_47'];
				$no_48k = $data['no_48'];
				$no_49k = $data['no_49'];
				$no_50k = $data['no_50'];
				}
				$ceknamasiswa = mysql_query("select * from tb_siswa where NIS='$nis'")or die(mysql_error());
				while($data = mysql_fetch_array($ceknamasiswa)){
					$nama_siswa = $data['Nama'];
				}
				
				$cek_kkm_mapel = mysql_query("select * from tb_mapel where kd_mapel='$kd_mapel'")or die(mysql_error());
				while($row = mysql_fetch_array($cek_kkm_mapel)){
					$nilai_kkm = $row['nilaikkm'];
				}
				if($jml_soal == 5){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 20;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 10){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 10;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 15){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 6.666;
					$hasil = $benar * $point;
					$nilai = round($hasil,1);
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 20){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 5;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 25){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 4;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 30){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					if($no_26k == $no_26){
						$benar++;
					} else {}
					if($no_27k == $no_27){
						$benar++;
					} else {}
					if($no_28k == $no_28){
						$benar++;
					} else {}
					if($no_29k == $no_29){
						$benar++;
					} else {}
					if($no_30k == $no_30){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 3.333;
					$hasil = $benar * $point;
					$nilai = round($hasil,1);
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 35){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					if($no_26k == $no_26){
						$benar++;
					} else {}
					if($no_27k == $no_27){
						$benar++;
					} else {}
					if($no_28k == $no_28){
						$benar++;
					} else {}
					if($no_29k == $no_29){
						$benar++;
					} else {}
					if($no_30k == $no_30){
						$benar++;
					} else {}
					if($no_31k == $no_31){
						$benar++;
					} else {}
					if($no_32k == $no_32){
						$benar++;
					} else {}
					if($no_33k == $no_33){
						$benar++;
					} else {}
					if($no_34k == $no_34){
						$benar++;
					} else {}
					if($no_35k == $no_35){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 2.857;
					$hasil = $benar * $point;
					$nilai = round($hasil,1);
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 40){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					if($no_26k == $no_26){
						$benar++;
					} else {}
					if($no_27k == $no_27){
						$benar++;
					} else {}
					if($no_28k == $no_28){
						$benar++;
					} else {}
					if($no_29k == $no_29){
						$benar++;
					} else {}
					if($no_30k == $no_30){
						$benar++;
					} else {}
					if($no_31k == $no_31){
						$benar++;
					} else {}
					if($no_32k == $no_32){
						$benar++;
					} else {}
					if($no_33k == $no_33){
						$benar++;
					} else {}
					if($no_34k == $no_34){
						$benar++;
					} else {}
					if($no_35k == $no_35){
						$benar++;
					} else {}
					if($no_36k == $no_36){
						$benar++;
					} else {}
					if($no_37k == $no_37){
						$benar++;
					} else {}
					if($no_38k == $no_38){
						$benar++;
					} else {}
					if($no_39k == $no_39){
						$benar++;
					} else {}
					if($no_40k == $no_40){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 2.5;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 45){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					if($no_26k == $no_26){
						$benar++;
					} else {}
					if($no_27k == $no_27){
						$benar++;
					} else {}
					if($no_28k == $no_28){
						$benar++;
					} else {}
					if($no_29k == $no_29){
						$benar++;
					} else {}
					if($no_30k == $no_30){
						$benar++;
					} else {}
					if($no_31k == $no_31){
						$benar++;
					} else {}
					if($no_32k == $no_32){
						$benar++;
					} else {}
					if($no_33k == $no_33){
						$benar++;
					} else {}
					if($no_34k == $no_34){
						$benar++;
					} else {}
					if($no_35k == $no_35){
						$benar++;
					} else {}
					if($no_36k == $no_36){
						$benar++;
					} else {}
					if($no_37k == $no_37){
						$benar++;
					} else {}
					if($no_38k == $no_38){
						$benar++;
					} else {}
					if($no_39k == $no_39){
						$benar++;
					} else {}
					if($no_40k == $no_40){
						$benar++;
					} else {}
					if($no_41k == $no_41){
						$benar++;
					} else {}
					if($no_42k == $no_42){
						$benar++;
					} else {}
					if($no_43k == $no_43){
						$benar++;
					} else {}
					if($no_44k == $no_44){
						$benar++;
					} else {}
					if($no_45k == $no_45){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 2.222;
					$hasil = $benar * $point;
					$nilai = round($hasil,1);
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
				else if($jml_soal == 50){
					$benar = 0;
					if($no_1k == $no_1){
						$benar++;
					} else {}
					if($no_2k == $no_2){
						$benar++;
					} else {}
					if($no_3k == $no_3){
						$benar++;
					} else {}
					if($no_4k == $no_4){
						$benar++;
					} else {}
					if($no_5k == $no_5){
						$benar++;
					} else {}
					if($no_6k == $no_6){
						$benar++;
					} else {}
					if($no_7k == $no_7){
						$benar++;
					} else {}
					if($no_8k == $no_8){
						$benar++;
					} else {}
					if($no_9k == $no_9){
						$benar++;
					} else {}
					if($no_10k == $no_10){
						$benar++;
					} else {}
					if($no_11k == $no_11){
						$benar++;
					} else {}
					if($no_12k == $no_12){
						$benar++;
					} else {}
					if($no_13k == $no_13){
						$benar++;
					} else {}
					if($no_14k == $no_14){
						$benar++;
					} else {}
					if($no_15k == $no_15){
						$benar++;
					} else {}
					if($no_16k == $no_16){
						$benar++;
					} else {}
					if($no_17k == $no_17){
						$benar++;
					} else {}
					if($no_18k == $no_18){
						$benar++;
					} else {}
					if($no_19k == $no_19){
						$benar++;
					} else {}
					if($no_20k == $no_20){
						$benar++;
					} else {}
					if($no_21k == $no_21){
						$benar++;
					} else {}
					if($no_22k == $no_22){
						$benar++;
					} else {}
					if($no_23k == $no_23){
						$benar++;
					} else {}
					if($no_24k == $no_24){
						$benar++;
					} else {}
					if($no_25k == $no_25){
						$benar++;
					} else {}
					if($no_26k == $no_26){
						$benar++;
					} else {}
					if($no_27k == $no_27){
						$benar++;
					} else {}
					if($no_28k == $no_28){
						$benar++;
					} else {}
					if($no_29k == $no_29){
						$benar++;
					} else {}
					if($no_30k == $no_30){
						$benar++;
					} else {}
					if($no_31k == $no_31){
						$benar++;
					} else {}
					if($no_32k == $no_32){
						$benar++;
					} else {}
					if($no_33k == $no_33){
						$benar++;
					} else {}
					if($no_34k == $no_34){
						$benar++;
					} else {}
					if($no_35k == $no_35){
						$benar++;
					} else {}
					if($no_36k == $no_36){
						$benar++;
					} else {}
					if($no_37k == $no_37){
						$benar++;
					} else {}
					if($no_38k == $no_38){
						$benar++;
					} else {}
					if($no_39k == $no_39){
						$benar++;
					} else {}
					if($no_40k == $no_40){
						$benar++;
					} else {}
					if($no_41k == $no_41){
						$benar++;
					} else {}
					if($no_42k == $no_42){
						$benar++;
					} else {}
					if($no_43k == $no_43){
						$benar++;
					} else {}
					if($no_44k == $no_44){
						$benar++;
					} else {}
					if($no_45k == $no_45){
						$benar++;
					} else {}
					if($no_46k == $no_46){
						$benar++;
					} else {}
					if($no_47k == $no_47){
						$benar++;
					} else {}
					if($no_48k == $no_48){
						$benar++;
					} else {}
					if($no_49k == $no_49){
						$benar++;
					} else {}
					if($no_50k == $no_50){
						$benar++;
					} else {}
					$salah = $jml_soal - $benar;
					$point = 2;
					$nilai = $benar * $point;
					$alur = 5;
					$nilaiakhir = 0;
					$keterangan = "";
					if($essay == "Ada"){
						$hasilakhir = ($nilai + $nilaiessay)/2;
						$nilaiakhir = round($hasilakhir,1);
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					} else {
						$nilaiakhir = $nilai;
						if($nilaiakhir >= $nilai_kkm){
							$keterangan = "Tuntas";
						} else {
							$keterangan = "Tidak Tuntas";
						}
					}
					$savekoreksi = mysql_query("insert into tb_hasilkoreksi values('$kd_koreksi','$nis','$nama_siswa','$benar','$salah','$jml_soal','$nilai','$essay','$nilaiessay','$nilaiakhir','$kd_mapel','$namamapel','$nilai_kkm','$jns_soal','$kelas','$jurusan','$semester','$thn_ajaran','$keterangan')");
					if($savekoreksi) {
						header("location:koreksijawaban.php?berhasil&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					} else {
						header("location:koreksijawaban.php?gagal&alur=$alur&kd_mapel=$kd_mapel&namamapel=$namamapel&jns_soal=$jns_soal&kelas=$kelas&jurusan=$jurusan&semester=$semester&thn_ajaran=$thn_ajaran&jml_soal=$jml_soal");
					}
				}
			} else {} 
		}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>


<!-- Created and Modified by EVANDER -->