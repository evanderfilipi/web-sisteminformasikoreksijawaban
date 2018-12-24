<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['Status']) == null) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sistem Informasi Koreksi Jawaban</title>
	<link rel="icon" href="img/logo_smk.png" type="image/png" />
	
    <link href="assets/css/bootstrapold/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/font-awesome/css/font-awesome.css" rel="stylesheet">

  </head>
  
  <body background="img/bg_web.png">
  <div align="center">
                <br>
                <h2>Selamat Datang di Website Koreksi Jawaban</h2>
				<h1><font face="Blenda Script" color="#0000CD">SMK Wiradikarya</font></h1>
                <div align="center" style="width:350px;margin-top:5%;">
                    <form name="login" method="post" class="well well-lg" action="login.php" style="-webkit-box-shadow: 0px 0px 20px #B8860B; background:#F0E68C;">
                        <img src="img/logo_smk.png" width="90" height="90"></img>
                        <br>
                        <br>
                        <?php 
                        if(isset($_GET['salah'])){
                            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							             <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
							             <span class="sr-only">Close</span></button>
							             Email atau Password salah! Silahkan coba lagi.
							             </div>';
                        } else if (isset($_GET['kosong'])){
                            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							             <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
							             <span class="sr-only">Close</span></button>
							             Input Email dan Password terlebih dahulu!.
							             </div>';
                        }
                        ?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                            <input name="email" id="email" class="form-control" type="text" placeholder="Email" autocomplete="off" autofocus="" />
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                        </div>
                        <br/>
                        <input name="submit" type="submit" value="Login" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
		
	<br/>
	<footer>
	<h5 align="center"><font color="#b8860b">Copyright &#169; EVANDER FILIPI</font></h5>
	</footer>
	
    <script src="assets/js/jqueryold/jquery.min.js"></script>
    <script src="assets/js/bootstrapold/bootstrap.min.js"></script>
  </body>
</html>


<?php
} else {
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
        echo 'Tidak dapat login! Silahkan coba beberapa saat lagi.';
        session_destroy();
    }
}
?>