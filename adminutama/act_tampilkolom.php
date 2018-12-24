<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
	
	$jml_soal = $_POST['jml_soal'];
	

	if($jml_soal == "5"){
		$tampil = 1;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "10"){
		$tampil = 2;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "15"){
		$tampil = 3;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "20"){
		$tampil = 4;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "25"){
		$tampil = 5;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "30"){
		$tampil = 6;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "35"){
		$tampil = 7;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "40"){
		$tampil = 8;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "45"){
		$tampil = 9;
		header("location:inputjawaban.php?tampil=$tampil");
	}
	else if ($jml_soal == "50"){
		$tampil = 10;
		header("location:inputjawaban.php?tampil=$tampil");
	} else {
		header("location:inputjawaban.php?pesan=tampil");
	}
		
		
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>