<?php
include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

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
   
   <link rel="stylesheet" type="text/css" media="all" href="../jsdatepick-calendar/jsDatePick_ltr.min.css" />
   <script type="text/javascript" src="../jsdatepick-calendar/jsDatePick.jquery.min.1.3.js"></script>	
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
                        <a href="#"><i class="fa fa-bar-chart-o "></i>Kelola Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="datasiswa.php">Data Siswa</a>
                            </li>
                            <li>
                                <a href="datauser.php">Data User</a>
                            </li>
                            <li>
                                <a href="matapelajaran.php">Mata Pelajaran</a>
                            </li>
                        </ul>
                    </li>

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
                     <h3>Edit Mata Pelajaran</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <p></p>
				
				<?php
				$previous = "javascript:history.go(-1)";
				$kd_mapel = $_GET['kd_mapel'];
				$query_mysql = mysql_query("SELECT * FROM tb_mapel WHERE kd_mapel='$kd_mapel'")or die(mysql_error());
				while($data = mysql_fetch_array($query_mysql)){
				?>
				<div class="well">
				<form action="act_update_mapel.php" method="post">
		<div class="form-group has-warning">	
		<table class="table">
			<tr>
				<td ><b>Kode Mata Pelajaran</b>
				<p></p>
				<input type="text" maxlength="30" readonly class="form-control" name="kodemapel" placeholder="Nama Mata Pelajaran" value="<?php echo $data['kd_mapel'] ?>"></td>
			</tr>
			<tr>
				<td ><b>Nama Mata Pelajaran</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="namamapel" placeholder="Nama Mata Pelajaran" value="<?php echo $data['nama_mapel'] ?>"></td>
			</tr>
			<tr>
				<td ><b>Nilai Kriteria Ketuntasan Minimal (KKM)</b>
				<p></p>
				<input type="text" maxlength="6" class="form-control" name="nilaikkm" placeholder="Nilai KKM (ex: 70)" value="<?php echo $data['nilaikkm'] ?>"></td>
			</tr>
			<tr>
				<td ><b>Keterangan</b>
				<p></p>
				<input type="text" maxlength="200" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $data['keterangan'] ?>"></td>
			</tr>	
			<tr>
				<td>
				<p></p>
				<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a class="btn btn-danger" href="<?= $previous ?>"><span class ="glyphicon glyphicon-remove"></span> Batal</a>
				</td>					
			</tr>				
		</table>
		</div>
	</form>
	</div>
				<?php } ?>
				
				<hr />
				
                 <!-- /. ROW  -->           
			</div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
	<script type="text/javascript">
		window.onload = function () {
			new JsDatePick({
				useMode: 2,
				target: "tgl_lahir",
				dateFormat: "%Y-%m-%d",
				yearsRange: [1940, 2040]
			});
		};
	</script>
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
