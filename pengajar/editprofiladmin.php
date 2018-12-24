<?php
include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Guru/Wali Kelas') {

$admin = $_SESSION['kd_admin'];
$cekfoto = mysql_query("SELECT * FROM tb_admin WHERE kd_admin='$admin'")or die(mysql_error());
while($data = mysql_fetch_array($cekfoto)){
	$foto = $data['Foto_Profil'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Koreksi Jawaban</title>
	<link rel="icon" href="../img/logo_smk.png" type="image/png" />
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
</head>
<body>
     
<style>

.zoom {
    width: 120px;
    height: 150px;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
}
 
.transition {
    -webkit-transform: scale(1.5); 
    -moz-transform: scale(1.5);
    -o-transform: scale(1.5);
    transform: scale(1.5);
	box-shadow: 0 0 7px 5px rgba(0, 140, 186, 0.5);
}
</style>    
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php"><i class="fa fa-home "></i><font face="Bernard MT Condensed" size="4">&nbsp;SMK WIRADIKARYA</font></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
						<a href="logout.php">Logout <span class ="glyphicon glyphicon-log-out"></span></a>
						</li>
                    </ul>
					<ul class="nav navbar-nav navbar-right">
                        <li>
						<p></p>
						<?php
						if($foto == ""){
							echo "<img src='../assets/img/admin/User.jpg' style='border-radius: 50%; margin-right: 5px' width='30' height='30'>";
						}
						else{  
							echo "<img src='../assets/img/admin/".$foto."' style='border-radius: 50%; margin-right: 5px' width='30' height='30' >";
						}
						?>
						</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    

                    <li>
                        <a href="inputjawaban.php"><i class="fa fa-edit "></i>Input Kunci Jawaban</a>
                    </li>
					<li>
                        <a href="koreksijawaban.php"><i class="fa fa-table "></i>Koreksi Jawaban</a>
                    </li>
					<li>
                        <a href="hasilpenilaian.php"><i class="fa fa-book "></i>Hasil Penilaian</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>Option<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="editprofiladmin.php">Edit Profil Admin</a>
                            </li>
                            <li>
                                <a href="logout.php">(<?php echo $_SESSION['Email']; ?>) Logout</a></li>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h3>Edit Profil Admin</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<?php
				$kd_admin = $_SESSION['kd_admin'];
				$query_mysql = mysql_query("SELECT * FROM tb_admin WHERE kd_admin='$kd_admin'")or die(mysql_error());
				while($data = mysql_fetch_array($query_mysql)){
				$gambarasal = $data['Foto_Profil'];
				$passasal = $data['Password'];
				$emaillama = $data['Email'];
				$niplama = $data['NIP'];
				$namaadminlama = $data['Nama'];
				$statuslama = $data['Status'];
				}
				
			if(isset($_POST['simpan'])){
			
			if(isset($_POST['hapus'])) {
				$remove = "Ya";
			} else {
				$remove = "Tidak";
			}

			$nip = $_POST['nip'];
			$nama = $_POST['namaad'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$status = $_POST['status'];

			if($nip == "" || $nama == "" || $email == "" || $status == ""){
				echo "<script language='javascript'>window.alert('Kolom profil admin tidak boleh ada yang kosong!');</script>";
			} else {
				if($password == ""){
					echo "<script language='javascript'>window.alert('Kolom password harus diisi!');</script>";
				} else {
					if($passasal == $password) {
						$cekemail = mysql_query("SELECT Email FROM tb_admin WHERE Email='$email'")or die(mysql_error());
						while($data = mysql_fetch_array($cekemail)){
						$semuaemail = $data['Email'];
						}
						if(($email != $emaillama) && ($email == $semuaemail)){
							echo "<script language='javascript'>window.alert('Email yang anda input sudah terdaftar!');</script>";
						} else {
							if($remove == "Tidak"){
								$targetimage="../assets/img/admin/".basename($_FILES['gambar']['name']);
								@copy($_FILES["gambar"]["tmp_name"],$targetimage);
								$gambar = $_FILES["gambar"]["name"];
								if($gambar != "") {
									$queryupdate = mysql_query("UPDATE tb_admin SET NIP='$nip', Nama='$nama', Email='$email', Foto_Profil='$gambar' WHERE kd_admin='$kd_admin'");
									move_uploaded_file($_FILES['gambar']['tmp_name'], $targetimage);
								} 
								else if($gambar == ""){
								$gambar = $gambarasal;
									$queryupdate = mysql_query("UPDATE tb_admin SET NIP='$nip', Nama='$nama', Email='$email', Foto_Profil='$gambarasal' WHERE kd_admin='$kd_admin'"); 
								}
							} else if ($remove == "Ya") {
								$gambar = "";
								$queryupdate = mysql_query("UPDATE tb_admin SET NIP='$nip', Nama='$nama', Email='$email', Foto_Profil='$gambar' WHERE kd_admin='$kd_admin'"); 
							}
							if($queryupdate){
								echo "<script language='javascript'>
								window.alert('Profil anda berhasil diubah!');
								window.location.href='editprofiladmin.php';
								</script>";
							}
							else {
								echo "<script language='javascript'>window.alert('Profil anda gagal diubah!');</script>";}
						}
					} else {
						echo "<script language='javascript'>window.alert('Password yang anda input salah!');</script>";
					}
				}	
			}
			}
				?>
				<p></p>
				<div class="well">
				<form method="POST" action="" enctype="multipart/form-data">
				<div class="form-group has-success">
				<?php
				if($gambarasal == ""){
					echo "<img src='../assets/img/admin/User.jpg' class='zoom' width='120' height='150'>";
				}
				else{  
					echo "<img src='../assets/img/admin/".$gambarasal."' class='zoom' width='120' height='150' >";
				}
				?>
				<p></p>
				<input class="btn btn-primary" name="gambar" type="file" id="exampleInputFile">
				<p class="help-block text-danger">Unggah Foto dengan ukuran 3x4.</p>
				<input type="checkbox" name="hapus" value="remove"> Remove Foto Profil
				<p></p>
				<table class="table">
				<tr>
				<td ><b>NIP (Nomor Induk Pegawai)</b>
				<p></p>
				<input type="text" maxlength="20" class="form-control" name="nip" placeholder="Nomor Induk Pegawai" value="<?php echo $niplama ?>"></td>
				</tr>
				<tr>
				<td ><b>Nama Admin</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="namaad" placeholder="Nama Lengkap Admin" value="<?php echo $namaadminlama ?>"></td>
				</tr>
				<tr>
				<td><b>Email</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $emaillama ?>"></td>
				</tr>
				<tr>
				<td><b>Status/Hak Akses</b>
				<p></p>
				<input type="text" readonly maxlength="20" class="form-control" name="status" value="<?php echo $statuslama ?>"></td>
				</tr>
				<tr>
				<td><b>Input Password (Untuk Menyimpan Perubahan Profil Admin)</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="password" id="password" placeholder="Password (Min. 6 Karakter)"></td>
				</tr>
				<tr>
				<td>
				<p></p>
				<button type="submit" name="simpan" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a class="btn btn-primary" href="editpassword.php">Edit Password <span class ="glyphicon glyphicon-hand-right"></span></a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				
				
                 <!-- /. ROW  -->           
			</div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
	
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
	
<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });
});
</script>
   
</body>
</html>

<?php
} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }
?>


<!-- Created and Modified by EVANDER -->