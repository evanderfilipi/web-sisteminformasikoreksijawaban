<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

	$kd_admin = 0;
	$nip = $_POST['nip'];
	$nama = $_POST['namaad'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$gambar = "";

	if($nip == "" || $nama == "" || $email == "" || $password == "" || $status == ""){
		header("location:datauser.php?pesan=input_kosong");}
	else {
		if(strlen($password) < 6) {
			$pass = 1;
			header("location:datauser.php?pesan=password&pass=$pass&nip=$nip&nama=$nama&email=$email&status=$status");
		} else {
		
		$cekemail = mysql_query("select * from tb_admin where Email='$email'")or die(mysql_error());
		while($data = mysql_fetch_array($cekemail)){
		$emaillama = $data['Email'];
		}

		if($email == $emaillama){
			$pass = 2;
			header("location:datauser.php?pesan=email&pass=$pass&nip=$nip&nama=$nama&status=$status");
		}
		else {
			$querysimpan = mysql_query("insert into tb_admin values('$kd_admin','$nip','$nama','$email','$password','$status','$gambar')");
			if($querysimpan){
				header("location:datauser.php?pesan=input");}
			else{
				header("location:datauser.php?pesan_error=input");}
		}
		}
	}
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>