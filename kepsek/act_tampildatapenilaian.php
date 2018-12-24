<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Kepala Sekolah') {
	
	$mapel = $_POST['mapel'];
	$jns_soal = $_POST['jns_soal'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$semester = $_POST['semester'];
	$thn_ajaran = $_POST['thn_ajaran'];

	if($mapel == "" || $jns_soal == "" || $kelas == "" || $jurusan == "" || $semester == "" || $thn_ajaran == ""){
		header("location:hasilpenilaian.php?pilihdata");}
	else {
		$cekdata = mysql_query("select * from tb_hasilkoreksi where kd_mapel='$mapel' and jns_soal='$jns_soal' and kelas='$kelas' and jurusan='$jurusan' and semester='$semester' and tahun_ajaran='$thn_ajaran'")or die(mysql_error());
		while($data = mysql_fetch_array($cekdata)){
		$hasilmapel = $data['kd_mapel'];
		$hasiljns_soal = $data['jns_soal'];
		$hasilkelas = $data['kelas'];
		$hasiljurusan = $data['jurusan'];
		$hasilsemester = $data['semester'];
		$hasilthn_ajaran = $data['tahun_ajaran'];
		}
		$cekmapel = mysql_query("select * from tb_mapel where kd_mapel='$mapel'")or die(mysql_error());
		while($data = mysql_fetch_array($cekmapel)){
		$namamapel = $data['nama_mapel'];
		}
		if($mapel == $hasilmapel && $jns_soal == $hasiljns_soal && $kelas == $hasilkelas && $jurusan == $hasiljurusan && $semester == $hasilsemester && $thn_ajaran == $hasilthn_ajaran){
			$hasil = 1;
			header("location:hasilpenilaian.php?hasil=$hasil&kd_mapel=$hasilmapel&namamapel=$namamapel&jns_soal=$hasiljns_soal&kelas=$hasilkelas&jurusan=$hasiljurusan&semester=$hasilsemester&thn_ajaran=$hasilthn_ajaran");
		}
		else{
			$hasil = 2;
			header("location:hasilpenilaian.php?hasil=$hasil");
		}
	}
		
		
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>