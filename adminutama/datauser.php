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
                     <h3>Kelola Data Akun Pengguna (User Account)</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<?php
				if(isset($_GET['pass'])){
					$pass = $_GET['pass'];
					}
				switch ($pass) {
				case 1:
				$nip = $_GET['nip'];
				$nama = $_GET['nama'];
				$email = $_GET['email'];
				$status = $_GET['status'];
				?>
				<hr/>
				<div class="well">
				<form method="POST" action="act_simpan_datauser.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td><b>NIP</b>
				<p></p>
				<input type="text" maxlength="20" class="form-control" name="nip" value="<?php echo $nip ?>" placeholder="Nomor Induk Pegawai"></td>
				</tr>
				<tr>
				<td ><b>Nama Admin</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="namaad" value="<?php echo $nama ?>" placeholder="Nama Lengkap Admin"></td>
				</tr>
				<tr>
				<td><b>Email</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="email" value="<?php echo $email ?>" id="email" placeholder="Alamat Email"></td>
				</tr>
				<tr>
				<td><b>Password<font color="red">* !</font></b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="password" id="password" placeholder="Password (Min. 6 Karakter)"></td>
				</tr>
				<tr>
				<td>
				<b>Status/Hak Akses</b>
				<p></p>
				<?php if ($status == "Guru/Wali Kelas") : ?>
				<select name="status" class="btn btn-primary dropdown-toggle">
				<option value="<?php echo $status ?>"><?php echo $status ?></option>
				<option value="Kepala Sekolah">Kepala Sekolah</option>
				</select>
				<?php elseif ($status == "Kepala Sekolah") : ?>
				<select name="status" class="btn btn-primary dropdown-toggle">
				<option value="<?php echo $status ?>"><?php echo $status ?></option>
				<option value="Guru/Wali Kelas">Guru/Wali Kelas</option>
				</select>
				<?php endif; ?>
				</td>
				</tr>
				<tr>
				<td>
				<p></p>
				<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a href="datauser.php" class="btn btn-warning"><span class ="glyphicon glyphicon-refresh"></span> Reload</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				
				<hr />
				<div class="well" style="background:#ADE8E6;">
				<div class="table-responsive">
				<table id="datatable" class="display stripe">
				<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Kode Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIP</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Email</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Status</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Pilihan</font></div></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$jumlahdata = 0;
					$query_mysql = mysql_query("SELECT * FROM tb_admin WHERE kd_admin NOT IN (1)")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					?>
					<tr><?php $jumlahdata++; ?>
						<td><font size="2"><?php echo $data['kd_admin']; ?></font></td>
						<td><font size="2"><?php echo $data['NIP']; ?></font></td>
						<td><font size="2"><?php echo $data['Nama']; ?></font></td>
						<td><font size="2"><?php echo $data['Email']; ?></font></td>
						<td><font size="2"><?php echo $data['Status']; ?></font></td>
						<td><center>
							<a class="btn btn-primary btn-xs" onClick="return confirm('Anda yakin ingin me-reset password user <?php echo $data['Nama']; ?>?')" href="act_resetpass.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-retweet"></span> Reset Password</a>
							<a class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data user <?php echo $data['Nama']; ?>?')" href="act_hapus_user.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-trash"></span> Hapus</a>					
						</center></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
				</div>
				</div>
				
				<?php
				break;
				case 2:
				$nip = $_GET['nip'];
				$nama = $_GET['nama'];
				$status = $_GET['status'];
				?>
				<hr/>
				<div class="well">
				<form method="POST" action="act_simpan_datauser.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td><b>NIP</b>
				<p></p>
				<input type="text" maxlength="20" class="form-control" name="nip" value="<?php echo $nip ?>" placeholder="Nomor Induk Pegawai"></td>
				</tr>
				<tr>
				<td ><b>Nama Admin</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="namaad" value="<?php echo $nama ?>" placeholder="Nama Lengkap Admin"></td>
				</tr>
				<tr>
				<td><b>Email<font color="red">* !</font></b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="email" id="email" placeholder="Alamat Email"></td>
				</tr>
				<tr>
				<td><b>Password</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="password" id="password" placeholder="Password (Min. 6 Karakter)"></td>
				</tr>
				<tr>
				<td>
				<b>Status/Hak Akses</b>
				<p></p>
				<?php if ($status == "Guru/Wali Kelas") : ?>
				<select name="status" class="btn btn-primary dropdown-toggle">
				<option value="<?php echo $status ?>"><?php echo $status ?></option>
				<option value="Kepala Sekolah">Kepala Sekolah</option>
				</select>
				<?php elseif ($status == "Kepala Sekolah") : ?>
				<select name="status" class="btn btn-primary dropdown-toggle">
				<option value="<?php echo $status ?>"><?php echo $status ?></option>
				<option value="Guru/Wali Kelas">Guru/Wali Kelas</option>
				</select>
				<?php endif; ?>
				</td>
				</tr>
				<tr>
				<td>
				<p></p>
				<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a href="datauser.php" class="btn btn-warning"><span class ="glyphicon glyphicon-refresh"></span> Reload</a>
				</td>
				</tr>
				</table>
				</div>
				</form>
				</div>
				
				<hr />
				<div class="well" style="background:#ADE8E6;">
				<div class="table-responsive">
				<table id="datatable" class="display stripe">
				<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Kode Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIP</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Email</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Status</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Pilihan</font></div></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_admin WHERE kd_admin NOT IN (1)")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					?>
					<tr>
						<td><font size="2"><?php echo $data['kd_admin']; ?></font></td>
						<td><font size="2"><?php echo $data['NIP']; ?></font></td>
						<td><font size="2"><?php echo $data['Nama']; ?></font></td>
						<td><font size="2"><?php echo $data['Email']; ?></font></td>
						<td><font size="2"><?php echo $data['Status']; ?></font></td>
						<td><center>
							<a class="btn btn-primary btn-xs" onClick="return confirm('Anda yakin ingin me-reset password user <?php echo $data['Nama']; ?>?')" href="act_resetpass.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-retweet"></span> Reset Password</a>
							<a class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data user <?php echo $data['Nama']; ?>?')" href="act_hapus_user.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-trash"></span> Hapus</a>					
						</center></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
				</div>
				</div>
				
				<?php
				break;
				default:
				?>
				<hr/>
				<center>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				<span class ="glyphicon glyphicon-plus"></span> Tambah Data Baru
				</button>
				</center>
				<p></p>
				<div class="collapse" id="collapseExample">
				<div class="well">
				<form method="POST" action="act_simpan_datauser.php">
				<div class="form-group has-success">
				<table class="table">
				<tr>
				<td><b>NIP</b>
				<p></p>
				<input type="text" maxlength="20" class="form-control" name="nip" placeholder="Nomor Induk Pegawai"></td>
				</tr>
				<tr>
				<td ><b>Nama Admin</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="namaad" placeholder="Nama Lengkap Admin"></td>
				</tr>
				<tr>
				<td><b>Email</b>
				<p></p>
				<input type="text" maxlength="30" class="form-control" name="email" id="email" placeholder="Alamat Email"></td>
				</tr>
				<tr>
				<td><b>Password</b>
				<p></p>
				<input type="password" maxlength="20" class="form-control" name="password" id="password" placeholder="Password (Min. 6 Karakter)"></td>
				</tr>
				<tr>
				<td>
				<b>Status/Hak Akses</b>
				<p></p>
				<select name="status" class="btn btn-primary dropdown-toggle">
				<option value="">--Pilih--</option>
				<option value="Guru/Wali Kelas">Guru/Wali Kelas</option>
				<option value="Kepala Sekolah">Kepala Sekolah</option>
				</select>
				</td>
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
				<div class="well" style="background:#ADE8E6;">
				<div class="table-responsive">
				<table id="datatable" class="display stripe">
				<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Kode Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIP</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama Admin</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Email</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Status</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Pilihan</font></div></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query_mysql = mysql_query("SELECT * FROM tb_admin WHERE kd_admin NOT IN (1)")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					?>
					<tr>
						<td><font size="2"><?php echo $data['kd_admin']; ?></font></td>
						<td><font size="2"><?php echo $data['NIP']; ?></font></td>
						<td><font size="2"><?php echo $data['Nama']; ?></font></td>
						<td><font size="2"><?php echo $data['Email']; ?></font></td>
						<td><font size="2"><?php echo $data['Status']; ?></font></td>
						<td><center>
							<a class="btn btn-primary btn-xs" onClick="return confirm('Anda yakin ingin me-reset password user <?php echo $data['Nama']; ?>?')" href="act_resetpass.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-retweet"></span> Reset Password</a>
							<a class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data user <?php echo $data['Nama']; ?>?')" href="act_hapus_user.php?id=<?php echo $data['kd_admin']; ?>"><span class ="glyphicon glyphicon-trash"></span> Hapus</a>					
						</center></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
				</div>
				</div>
				<?php
				} ?>
                
				
				<?php
				if(isset($_GET['pesan'])){
					$pesan = $_GET['pesan'];
					if($pesan == "input"){
						echo "<script language='javascript'>window.alert('Data user berhasil disimpan!');</script>";
					}
					else if($pesan == "password"){
						echo "<script language='javascript'>window.alert('Input Password Min. 6 Karakter!');</script>";
					}
					else if($pesan == "email"){
						echo "<script language='javascript'>window.alert('Email sudah ada/terdaftar! Silahkan input email lain.');</script>";
					}
					else if($pesan == "hapus"){
						echo "<script language='javascript'>window.alert('Data user berhasil dihapus!');</script>";
					}
					else if($pesan == "resetpass"){
						echo "<script language='javascript'>window.alert('Password user berhasil di-reset! Password defaultnya adalah `administrator`.');</script>";
					}
					else if($pesan == "input_kosong"){
						echo "<script language='javascript'>window.alert('Data user tidak lengkap. Mohon dilengkapi!');</script>";
					}
				}
				else if(isset($_GET['pesan_error'])){
					$pesan_error = $_GET['pesan_error'];
					if($pesan_error == "input"){
						echo "<script language='javascript'>window.alert('Data user gagal disimpan!');</script>";
					}
					else if($pesan_error == "resetpass"){
						echo "<script language='javascript'>window.alert('Data user gagal di-reset!');</script>";
					}
					else if($pesan_error == "hapus"){
						echo "<script language='javascript'>window.alert('Data user gagal dihapus!');</script>";;
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
