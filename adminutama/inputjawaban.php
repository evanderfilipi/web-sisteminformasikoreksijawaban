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
                     <h3>Input Kunci Jawaban Pilihan Ganda</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<p></p>
				<p>Pilih jumlah soal Pilihan Ganda (PG) yang diujiankan.</p>
				<?php
				$tampil = "";
				$jumlahsoal = "";
				if(isset($_GET['tampil'])){
					$tampil = $_GET['tampil'];
					}
				
				switch ($tampil){
				case 1:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 5; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 5 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 2:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 10; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 10 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 3:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 15; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 15 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 4:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 20; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 20 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 5:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 25; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 25 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 6:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 30; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 30 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 7:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 35; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 35 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 8:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 40; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 40 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 9:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 45; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 45 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" readonly maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				case 10:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php $jml_soal = 50; ?>
				<h4>Jumlah kunci jawaban PG yang ingin diinput : 50 soal.</h4>
				<p>Input jawaban pilihan ganda hanya dengan huruf A,B,C,D atau E saja, pada masing-masing kolom.</p>
				<div class="well">
				<form method="POST" action="act_simpan_kunci_jawaban.php?jml_soal=<?php echo $jml_soal; ?>">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
				<select name="mapel" class="btn btn-warning dropdown-toggle">
				<option value="">--Mata Pelajaran--</option>
				<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_mapel")or die(mysql_error());
					while($data = mysql_fetch_assoc($query_mysql)){
				?>
				<option value="<?php echo $data['kd_mapel']; ?>"><?php echo $data['nama_mapel']; ?></option>
				<?php } ?>
				</select>
				<select name="jns_soal" style ="margin-left: 10px" class="btn btn-success dropdown-toggle">
				<option value="">--Jenis Soal--</option>
				<option value="Ujian Harian 1">Ujian Harian 1</option>
				<option value="Ujian Harian 2">Ujian Harian 2</option>
				<option value="Ujian Harian 3">Ujian Harian 3</option>
				<option value="Ujian Harian 4">Ujian Harian 4</option>
				<option value="Try Out 1">Try Out 1</option>
				<option value="Try Out 2">Try Out 2</option>
				<option value="Try Out 3">Try Out 3</option>
				<option value="UTS">UTS</option>
				<option value="UAS">UAS</option>
				<option value="UN">UN</option>
				</select>
				<select name="semester" style ="margin-left: 10px" class="btn btn-danger dropdown-toggle">
				<option value="">--Semester--</option>
				<option value="Ganjil">Ganjil</option>
				<option value="Genap">Genap</option>
				</select>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Kelas</span>
						<input type="text" style="width:350px;" name="kelas" maxlength="10" class="form-control" placeholder="ex: 12-TKJ-1">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Jurusan</span>
						<input type="text" style="width:350px;" name="jurusan" maxlength="30" class="form-control" placeholder="ex: Teknik Komputer dan Jaringan">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Tahun Ajaran</span>
						<input type="text" style="width:350px;" maxlength="9" name="thn_ajaran" class="form-control" placeholder="ex: 2017/2018">
					</div>
				</td>
				</tr>
				</table>
				<table class="table">
				<tr>
				<td style="padding-left: 10px">
				<button type="submit" class="btn btn-primary"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-danger"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				<?php
				break;
				default:
				?>
				<form method="POST" action="act_tampilkolom.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td>
					<select name="jml_soal" class="btn btn-danger dropdown-toggle">
					<option value="">--Pilih--</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					</select>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-folder-close"></span> Tampilkan</button>
					<a class="btn btn-info" href="datakuncijawaban.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Kunci Jawaban</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				<?php
				}
				
				if(isset($_GET['pesan'])){
					$pesan = $_GET['pesan'];
					if($pesan == "input"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban berhasil disimpan!');</script>";
					}
					else if($pesan == "update"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban berhasil diubah!');</script>";
					}
					else if($pesan == "sudahada"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban sudah ada!');</script>";
					}
					else if($pesan == "hapus"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban berhasil dihapus!');</script>";
					}
					else if($pesan == "input_kosong"){
						echo "<script language='javascript'>window.alert('Mohon pilih mata pelajaran, jenis soal, semester serta isi kolom kelas, jurusan, tahun ajaran terlebih dahulu!');</script>";
					}
					else if($pesan == "tampil"){
						echo "<script language='javascript'>window.alert('Pilih jumlah soal Pilihan Ganda (PG) yang diujiankan terlebih dahulu!');</script>";
					}
				}
				else if(isset($_GET['pesan_error'])){
					$pesan_error = $_GET['pesan_error'];
					if($pesan_error == "input"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban gagal disimpan!');</script>";
					}
					else if($pesan_error == "update"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban gagal diubah!');</script>";
					}
					else if($pesan_error == "hapus"){
						echo "<script language='javascript'>window.alert('Data kunci jawaban gagal dihapus!');</script>";;
					}
				}
				?>
              
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
