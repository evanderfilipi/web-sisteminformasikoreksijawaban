<?php
include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Kepala Sekolah') {

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
							echo "<img src='../assets/img/admin/User.jpg' class='zoom' style='border-radius: 50%; margin-right: 5px' width='30' height='30'>";
						}
						else{  
							echo "<img src='../assets/img/admin/".$foto."' class='zoom' style='border-radius: 50%; margin-right: 5px' width='30' height='30' >";
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
                        <a href="datajawabansiswa.php"><i class="fa fa-table "></i>Hasil Koreksi Jawaban</a>
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
                     <h3>Edit Password Admin</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<?php
				$kd_admin = $_SESSION['kd_admin'];
				$query_mysql = mysql_query("SELECT * FROM tb_admin WHERE kd_admin='$kd_admin'")or die(mysql_error());
				while($data = mysql_fetch_array($query_mysql)){
				$passasli = $data['Password'];
				}
				
				if(isset($_POST['simpan'])){
				
				$passlama = $_POST['passlama'];
				$passbaru = $_POST['passbaru'];
				$konfirpass = $_POST['konfirpass'];
				
				if($passlama == "" || $passbaru == "" || $konfirpass == ""){
					echo "<script language='javascript'>window.alert('Kolom password tidak boleh ada yang kosong!');</script>";
				} else {
					if($passlama == $passasli){
						if(strlen($passbaru) < 6){
							echo "<script language='javascript'>window.alert('Input password baru min. 6 karakter!');</script>";
						} else {
							if($passbaru == $konfirpass){
								$queryupdate = mysql_query("UPDATE tb_admin SET Password='$konfirpass' WHERE kd_admin='$kd_admin'");
								if($queryupdate){
									echo "<script language='javascript'>
									window.alert('Password anda berhasil diubah!');
									window.location.href='editprofiladmin.php';
									</script>";
								}
							} else {
								echo "<script language='javascript'>window.alert('Password baru dengan konfirmasi password harus sama!');</script>";
							}
						}
					} else {
						echo "<script language='javascript'>window.alert('Password lama yang anda input salah!');</script>";
					}
				}
				}
				?>
				 
				<p></p>
				<div class="well">
				<form method="POST" action="" enctype="multipart/form-data">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td><b>Input Password Lama</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="passlama" id="passlama" placeholder="Password Lama">
				</td>
				</tr>
				<tr>
				<td><b>Input Password Baru</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="passbaru" id="passbaru" placeholder="Password Baru (Min. 6 Karakter)">
				</td>
				</tr>
				<tr>
				<td><b>Konfirmasi Password Baru</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="konfirpass" id="konfirpass" placeholder="Konfirmasi Password Baru">
				</td>
				</tr>
				<tr>
				<td>
				<p></p>
				<a class="btn btn-primary" href="editprofiladmin.php"><span class ="glyphicon glyphicon-hand-left"></span> Edit Profil</a>
				<button type="submit" name="simpan" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
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
    
   
</body>
</html>

<?php
} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }
?>
