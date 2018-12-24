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
                     <h3>Koreksi Jawaban Siswa</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <p></p>
				<?php
				$inputulangnis = "javascript:history.go(-1)";
				$nis = "";
				$nama = "";
				$kd_mapel = "";
				$namamapel = "";
				$jns_soal = "";
				$jml_soal = "";
				$kelas = "";
				$jurusan = "";
				$semester = "";
				$thn_ajaran = "";
				$alur = "";
				if(isset($_GET['alur'])){
					$alur = $_GET['alur'];
					}
				switch ($alur) {
				
				case 1:
					$kd_mapel = $_GET['kd_mapel'];
					$namamapel = $_GET['namamapel'];
					$jml_soal = $_GET['jml_soal'];
					$jns_soal = $_GET['jns_soal'];
					$kelas = $_GET['kelas'];
					$jurusan = $_GET['jurusan'];
					$semester = $_GET['semester'];
					$thn_ajaran = $_GET['thn_ajaran'];
					?>
					<form method="POST" action="act_cek2.php?jml_soal=<?php echo $jml_soal; ?>&kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<p>Kunci jawaban ditemukan! Silahkan input Nomor Induk Siswa (NIS).</p>
					<p></p>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td>
					<b>Input NIS Siswa</b>
					<p></p>
					<input type="text" maxlength="11" class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="Nomor Induk Siswa">
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Cek</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
				<?php 
				break;
				
				case 2:
					$kd_mapel = $_GET['kd_mapel'];
					$namamapel = $_GET['namamapel'];
					$jns_soal = $_GET['jns_soal'];
					$kelas = $_GET['kelas'];
					$jurusan = $_GET['jurusan'];
					$semester = $_GET['semester'];
					$thn_ajaran = $_GET['thn_ajaran'];
					$jml_soal = $_GET['jml_soal'];
					$nis = $_GET['nis'];
					$nama = $_GET['nama'];
					
					if ($jml_soal == 5) { ?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 10) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 15) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 20) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 25) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 30) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 35) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 40) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 45) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 50) {?>
					<form method="POST" action="act_simpan_jawaban_siswa.php?kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td><input type="text" readonly class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="-"></td>
					</tr>
					</table>
					<p>NIS ditemukan (dengan nama <?php echo $nama; ?>). Silahkan input jawaban Pilihan Ganda (PG) siswa hanya dengan huruf A, B, C, D atau E.</p>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-warning" href="<?= $inputulangnis ?>"><span class ="glyphicon glyphicon-pencil"></span> Input Ulang NIS</a>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang Semua</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<div class="well">
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
				</div>
					<table class="table">
					<tr>
					<td>
					<input type="checkbox" name="essay" value="Ada"> <b>Ada Soal Essay</b>
					</td>
					</tr>
					<tr>
					<td>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:120px;">Nilai Essay</span>
						<input type="text" style="width:400px;" name="nilaiessay" maxlength="6" class="form-control" placeholder="ex: 70 atau 70.5 (gunakan titik jika bilangan koma)">
					</div>
					<p>Note: Jika ada soal essay, silahkan klik checkbox diatas lalu input nilai essay, jika tidak ada, abaikan saja.</p>
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					<?php }
					
				break;
				
				case 3:
				?>
					<p>Cek Kunci Jawaban Terlebih Dahulu.</p>
					<div class="well" style="background:#FFFFFF;">
					<form method="POST" action="act_cek.php">
					<div class="form-group has-success">
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
					<td>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Cek</button>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					</div>
					</form>
					</div>
					<p>Kunci jawaban tidak ditemukan!</p>
					<?php
				break;
				
				case 4:
				$kd_mapel = $_GET['kd_mapel'];
					$namamapel = $_GET['namamapel'];
					$jml_soal = $_GET['jml_soal'];
					$jns_soal = $_GET['jns_soal'];
					$kelas = $_GET['kelas'];
					$jurusan = $_GET['jurusan'];
					$semester = $_GET['semester'];
					$thn_ajaran = $_GET['thn_ajaran'];
					?>
					<form method="POST" action="act_cek2.php?jml_soal=<?php echo $jml_soal; ?>&kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<p>Kunci jawaban ditemukan! Silahkan input Nomor Induk Siswa (NIS).</p>
					<p></p>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td>
					<b>Input NIS Siswa</b>
					<p></p>
					<input type="text" maxlength="11" class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="Nomor Induk Siswa">
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Cek</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					<p>Nomor Induk Siswa (NIS) tidak ditemukan!</p>
				<?php
				break;
				
				case 5:
				$kd_mapel = $_GET['kd_mapel'];
					$namamapel = $_GET['namamapel'];
					$jml_soal = $_GET['jml_soal'];
					$jns_soal = $_GET['jns_soal'];
					$kelas = $_GET['kelas'];
					$jurusan = $_GET['jurusan'];
					$semester = $_GET['semester'];
					$thn_ajaran = $_GET['thn_ajaran'];
				?>
					<form method="POST" action="act_cek2.php?jml_soal=<?php echo $jml_soal; ?>&kd_mapel=<?php echo $kd_mapel; ?>">
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="namamapel" value="<?php echo $namamapel ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jns_soal" value="<?php echo $jns_soal ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="kelas" value="<?php echo $kelas ?>" placeholder="-"></td>
					</tr>
					<tr>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="jurusan" value="<?php echo $jurusan ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="semester" value="<?php echo $semester ?>" placeholder="-"></td>
					<td style="padding-right: 10px"><input type="text" readonly class="form-control" name="thn_ajaran" value="<?php echo $thn_ajaran ?>" placeholder="-"></td>
					</tr>
					</table>
					</div>
					<table class="table">
					<tr>
					<td>
					<a class="btn btn-primary" href="koreksijawaban.php"><span class ="glyphicon glyphicon-edit"></span> Input Ulang</a>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					<p></p>
					<div class="form-group has-success">
					<table class="table">
					<tr>
					<td>
					<b>Input NIS Siswa</b>
					<p></p>
					<input type="text" maxlength="11" class="form-control" name="nis" value="<?php echo $nis ?>" placeholder="Nomor Induk Siswa">
					<p></p>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Cek</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
				<?php
				break;
				
				default: ?>
					<p>Cek Kunci Jawaban Terlebih Dahulu.</p>
					<div class="well" style="background:#FFFFFF;">
					<form method="POST" action="act_cek.php">
					<div class="form-group has-success">
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
					<td>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Cek</button>
					<a class="btn btn-info" href="datajawabansiswa.php"><span class ="glyphicon glyphicon-list-alt"></span> Lihat Data Jawaban Siswa</a>
					</td>
					</tr>
					</table>
					</div>
					</form>
					</div>
				<?php
				}
				
				if(isset($_GET['inputnis'])){
					echo "<script language='javascript'>window.alert('Isi kolom NIS terlebih dahulu!');</script>";
				} else if(isset($_GET['inputdatajawaban'])){ 
					echo "<script language='javascript'>window.alert('Pilih mata pelajaran, jenis soal, semester serta isi kolom kelas, jurusan, tahun ajaran terlebih dahulu!');</script>";
				} else if(isset($_GET['jumlahsoal'])){ 
					echo "<script language='javascript'>window.alert('Pilih jumlah soal Pilihan Ganda (PG) terlebih dahulu!');</script>";
				} else if(isset($_GET['jawabansiswa'])){ 
					echo "<script language='javascript'>window.alert('Data jawaban siswa sudah ada! Tidak dapat melakukan duplikasi atau me-replace data!');</script>";
				} else if(isset($_GET['berhasil'])){ 
					echo "<script language='javascript'>window.alert('Data jawaban siswa berhasil disimpan!');</script>";
				} else if(isset($_GET['gagal'])){ 
					echo "<script language='javascript'>window.alert('Data jawaban siswa gagal disimpan!');</script>";
				} ?>
              
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


<!-- Created and Modified by EVANDER -->