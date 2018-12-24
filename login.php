<?php
session_start();
extract($_POST);
include 'koneksi.php';
if ($email == "" || $password == ""){
	echo "<script>
	location.href='index.php?kosong';
	</script>";
} else {
$query = "select * from tb_admin where Email = '$email' and Password = '$password'";
$result = mysql_query($query);
if (mysql_num_rows($result)) {
    while ($row = mysql_fetch_array($result)) {
        $_SESSION['kd_admin'] = $row['kd_admin'];
        $_SESSION['NIP'] = $row['NIP'];
		$_SESSION['Nama'] = $row['Nama'];
		$_SESSION['Email'] = $row['Email'];
        $_SESSION['Status'] = $row['Status'];
        
        if ($_SESSION['Status'] == "Admin Utama") {
			header("location:adminutama/home.php");
		}
		else if ($_SESSION['Status'] == "Guru/Wali Kelas") {
			header("location:pengajar/home.php");
		}
		else if ($_SESSION['Status'] == "Kepala Sekolah") {
			header("location:kepsek/home.php");
		}
		else {
            echo '<script>href.location</script>';
            session_destroy();
        }
    }
} else {
    echo "<script>
	location.href='index.php?salah';
	</script>";
}
}
?>