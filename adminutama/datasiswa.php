<?php
include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {

$admin = $_SESSION['kd_admin'];
$cekfoto = mysql_query("SELECT * FROM tb_admin WHERE kd_admin='$admin'")or die(mysql_error());
while($data = mysql_fetch_array($cekfoto)){
	$gambar = $data['Foto_Profil'];
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
   
   <link rel="stylesheet" type="text/css" media="all" href="../jsdatepick-calendar/jsDatePick_ltr.min.css" />
   <script type="text/javascript" src="../jsdatepick-calendar/jsDatePick.jquery.min.1.3.js"></script>

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
						if($gambar == ""){
							echo "<img src='../assets/img/admin/User.jpg' class='zoom' style='border-radius: 50%; margin-right: 5px' width='30' height='30'>";
						}
						else{  
							echo "<img src='../assets/img/admin/".$gambar."' class='zoom' style='border-radius: 50%; margin-right: 5px' width='30' height='30' >";
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
                     <h3>Kelola Data Siswa</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<hr/>
				<center>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				<span class ="glyphicon glyphicon-plus"></span> Tambah Data Baru
				</button>
				</center>
				<p></p>
				<div class="collapse" id="collapseExample">
				<div class="well">
				<form method="POST" action="act_simpan_siswa.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td ><b>NIS</b>
				<p></p>
				<input type="text" maxlength="11" class="form-control" name="nis" placeholder="Nomor Induk Siswa"></td>
				</tr>
				<tr>
				<td ><b>Nama</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="nama" placeholder="Nama Lengkap Siswa"></td>
				</tr>
				<tr>
				<td ><b>Tanggal Lahir</b>
				<p></p>
				<input type="text" maxlength="12" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="yyyy-mm-dd"></td>
				</tr>
				<tr>
				<td ><b>Jenis Kelamin</b>
				<p></p>
				<input type="radio" name="jns_kelamin" value="Laki-Laki" id="laki_laki" /><label class="radio-inline" for="laki_laki"><b>Laki-Laki</b></label>
				<input style ="margin-left: 50px" type="radio" name="jns_kelamin" value="Perempuan" id="perempuan" /><label class="radio-inline" for="perempuan"><b>Perempuan</b></label>
				</td>
				</tr>
				<tr>
				<td >
				<b>Agama</b>
				<p></p>
				<select name="agama" class="btn btn-primary dropdown-toggle">
				<option value="">--Pilih--</option>
				<option value="Islam">Islam</option>
				<option value="Kristen">Kristen</option>
				<option value="Katholik">Katholik</option>
				<option value="Hindu">Hindu</option>
				<option value="Buddha">Buddha</option>
				</select>
				</td>
				</tr>
				<tr>
				<td ><b>Alamat</b>
				<p></p>
				<textarea maxlength="300" class="form-control" name="alamat" placeholder="Alamat Siswa"></textarea></td>
				</tr>
				<tr>
				<td>
				<p></p>
				<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-warning"><span class ="glyphicon glyphicon-refresh"></span> Reset</button>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				</div>
				
				<hr />
				<div class="well" style="background:#e6e6fa;">
				<div class="table-responsive">
				<table id="datatable" class="display stripe">
				<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIS</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Tanggal Lahir</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Jenis Kelamin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Agama</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Alamat</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Pilihan</font></div></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_siswa")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					?>
					<tr>
						<td><font size="2"><?php echo $data['NIS']; ?></font></td>
						<td><font size="2"><?php echo $data['Nama']; ?></font></td>
						<td><font size="2"><?php echo $data['Tgl_lahir']; ?></font></td>
						<td><font size="2"><?php echo $data['Jns_Kelamin']; ?></font></td>
						<td><font size="2"><?php echo $data['Agama']; ?></font></td>
						<td><font size="2"><?php echo $data['Alamat']; ?></font></td>
						<td><center>
							<a class="btn btn-primary btn-xs" href="datasiswa_edit.php?nis=<?php echo $data['NIS']; ?>"><span class ="glyphicon glyphicon-pencil"></span> Edit</a>
							<a class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data siswa <?php echo $data['Nama']; ?>?')" href="act_hapus_siswa.php?nis=<?php echo $data['NIS']; ?>"><span class ="glyphicon glyphicon-trash"></span> Hapus</a>					
						</center></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
				</div>
				</div>
				
				<?php
				if(isset($_GET['nis'])){
					$nis = $_GET['nis'];
					$ceknis = mysql_query("select * from tb_siswa where NIS='$nis'")or die(mysql_error());
					while($data = mysql_fetch_array($ceknis)){
						$nama = $data['Nama'];
					}
				}
				if(isset($_GET['pesan'])){
					$pesan = $_GET['pesan'];
					if($pesan == "input"){
						echo "<script language='javascript'>window.alert('Data siswa berhasil disimpan!');</script>";
					}
					else if($pesan == "update"){
						echo "<script language='javascript'>window.alert('Data siswa berhasil diubah!');</script>";
					}
					else if($pesan == "hapus"){
						echo "<script language='javascript'>window.alert('Data siswa berhasil dihapus!');</script>";
					}
					else if($pesan == "sudahada"){
						echo "<script language='javascript'>window.alert('Data siswa dengan NIS $nis sudah ada! Dengan nama siswa $nama.');</script>";
					}
					else if($pesan == "input_kosong"){
						echo "<script language='javascript'>window.alert('Data siswa tidak lengkap. Mohon dilengkapi!');</script>";
					}
				}
				else if(isset($_GET['pesan_error'])){
					$pesan_error = $_GET['pesan_error'];
					if($pesan_error == "input"){
						echo "<script language='javascript'>window.alert('Data siswa gagal disimpan!');</script>";
					}
					else if($pesan_error == "update"){
						echo "<script language='javascript'>window.alert('Data siswa gagal diubah!');</script>";
					}
					else if($pesan_error == "hapus"){
						echo "<script language='javascript'>window.alert('Data siswa gagal dihapus!');</script>";;
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


<!-- Created and Modified by EVANDER -->