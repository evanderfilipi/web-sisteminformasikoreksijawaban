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
   
	<link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="../assets/js/jquery-1.8.0.min.js"></script>
	
	<script type="text/javascript">
        $(document).ready(function () {
        $('#datatable').dataTable();
        });
    </script>
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
                     <h3>Hasil Penilaian Siswa</h3>   
                    </div>
                </div>
				<p></p>
                 <!-- /. ROW  -->
                
				<?php
				$hasil = "";
				if(isset($_GET['hasil'])){
					$hasil = $_GET['hasil'];
					}
				switch($hasil){
				case 1: 
					$kd_mapel = $_GET['kd_mapel'];
					$namamapel = $_GET['namamapel'];
					$jns_soal = $_GET['jns_soal'];
					$kelas = $_GET['kelas'];
					$jurusan = $_GET['jurusan'];
					$semester = $_GET['semester'];
					$thn_ajaran = $_GET['thn_ajaran'];
				?>
				<p>Pilih data hasil penilaian yang ingin ditampilkan</p>
				<div class="well" style="background:#FFFFFF;">
					<form method="POST" action="act_tampildatapenilaian.php">
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
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Tampilkan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					</div>
					<p></p>
					<p>Menampilkan data hasil nilai <b><?php echo $jns_soal; ?> <?php echo $namamapel; ?></b> kelas <b><?php echo $kelas; ?></b> jurusan <b><?php echo $jurusan; ?></b> semester <b><?php echo $semester; ?></b> tahun ajaran <b><?php echo $thn_ajaran; ?></b>.</p>
					<a class="btn btn-info" style="margin: 12px" href="../cetakpdf.php?kd_mapel=<?php echo $kd_mapel;?>&namamapel=<?php echo $namamapel;?>&jns_soal=<?php echo $jns_soal;?>&kelas=<?php echo $kelas;?>&jurusan=<?php echo $jurusan;?>&semester=<?php echo $semester;?>&thn_ajaran=<?php echo $thn_ajaran;?>"><span class ="glyphicon glyphicon-print"></span> Cetak</a>
					<div class="well" style="background:#FFFAFA;">
					<div class="table-responsive">
					<table id="datatable" class="display stripe">
					<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIS</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nilai Siswa</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nilai KKM</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Keterangan</font></div></th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_hasilkoreksi WHERE kd_mapel='$kd_mapel' AND jns_soal='$jns_soal' AND kelas='$kelas' AND jurusan='$jurusan' AND semester='$semester' AND tahun_ajaran='$thn_ajaran' ORDER BY Nama ASC")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					?>
					<tr>
						<td><font size="2"><?php echo $data['NIS']; ?></font></td>
						<td><font size="2"><?php echo $data['Nama']; ?></font></td>
						<td><font size="2"><?php echo $data['nilai_akhir']; ?></font></td>
						<td><font size="2"><?php echo $data['nilaikkm']; ?></font></td>
						<td><center><font size="3">
						<?php
						if ($data['keterangan'] == "Tidak Tuntas") {
							echo "<span class='label label-danger'>Tidak Tuntas</span>";
						} else {
							echo "<span class='label label-success'>Tuntas</span>";
						};
						?>
						</font></center></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
				</div>
					
				<?php
				break;
				
				case 2: ?>
				<p>Pilih data hasil penilaian yang ingin ditampilkan</p>
				<div class="well" style="background:#FFFFFF;">
					<form method="POST" action="act_tampildatapenilaian.php">
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
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Tampilkan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					<p></p>
					</div>
					<p>Data hasil penilaian tidak ditemukan!</p>
				<?php
				break;
				
				default: ?>
				<p>Pilih data hasil penilaian yang ingin ditampilkan.</p>
				<div class="well" style="background:#FFFFFF;">
					<form method="POST" action="act_tampildatapenilaian.php">
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
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-eye-open"></span> Tampilkan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					</div>
				<?php
				}
				
				if(isset($_GET['pilihdata'])){
					echo "<script language='javascript'>window.alert('Pilih mata pelajaran, jenis soal, semester serta isi kolom kelas, jurusan, tahun ajaran terlebih dahulu!');</script>";
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
	
	<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    
   
</body>
</html>

<?php
} else {
echo "<script>
	location.href='../index.php';
	</script>";
exit(); }
?>
