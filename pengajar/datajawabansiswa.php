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
                     <h3>Data Jawaban Pilihan Ganda (PG) Siswa</h3>   
                    </div>
                </div>
				
                 <!-- /. ROW  -->
                <p></p>
				<div class="well" style="background:#F0FFF0;">
				<div class="table-responsive">
				<table id="datatable" class="display stripe">
				<thead>
					<tr>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Kode Jawaban</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">NIS</div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama Siswa</div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Nama Mata Pelajaran</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Jenis Soal</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Kelas</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Jurusan</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Semester</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Tahun Ajaran</font></div></th>
						<th bgcolor="#9acd32"><div align="center"><font size="2">Pilihan</font></div></th>
					</tr>
				</thead>
				<tbody>
					<?php
				if(isset($_GET['pesan'])){
					$pesan = $_GET['pesan'];
					if($pesan == "hapus"){
						echo "<script language='javascript'>window.alert('Data jawaban siswa berhasil dihapus!');</script>";
					}
				}
				else if(isset($_GET['pesan_error'])){
					$pesan_error = $_GET['pesan_error'];
					if($pesan_error == "hapus"){
						echo "<script language='javascript'>window.alert('Data jawaban siswa gagal dihapus!');</script>";
					}
				}
					$id = "";
					$nama = "";
					$namamapel = "";
					$query_mysql = mysql_query("SELECT * FROM tb_jawaban_siswa")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					$nis = $data['NIS'];
					$kd_mapel = $data['kd_mapel'];
					$jns_soal = $data['jns_soal'];
					$kelas = $data['kelas'];
					$jurusan = $data['jurusan'];
					$semester = $data['semester'];
					$tahun_ajaran = $data['tahun_ajaran'];
					$kd_jawaban_siswa = $data['kd_jawaban_siswa'];
					?>
					
					<tr>
						<td><font size="2"><?php echo $kd_jawaban_siswa ?></font></td>
						<td><font size="2"><?php echo $nis; ?></font></td>
						<?php 
							$query_mysql2 = mysql_query("SELECT * FROM tb_siswa WHERE NIS='$nis'")or die(mysql_error());
							while($data2 = mysql_fetch_array($query_mysql2)){
							$nama = $data2['Nama'];
						} ?>
						<td><font size="2"><?php echo $nama; ?></font></td>
						<?php 
							$query_mysql3 = mysql_query("SELECT * FROM tb_mapel WHERE kd_mapel='$kd_mapel'")or die(mysql_error());
							while($data3 = mysql_fetch_array($query_mysql3)){
							$namamapel = $data3['nama_mapel'];
						} ?>
						<td><font size="2"><?php echo $namamapel; ?></font></td>
						<td><font size="2"><?php echo $jns_soal; ?></font></td>
						<td><font size="2"><?php echo $kelas; ?></font></td>
						<td><font size="2"><?php echo $jurusan; ?></font></td>
						<td><font size="2"><?php echo $semester; ?></font></td>
						<td><font size="2"><?php echo $tahun_ajaran; ?></font></td>
						<?php 
							$query_mysql4 = mysql_query("SELECT * FROM tb_hasilkoreksi WHERE NIS='$nis' AND kd_mapel='$kd_mapel' AND jns_soal='$jns_soal' AND kelas='$kelas' AND semester='$semester' AND tahun_ajaran='$tahun_ajaran'")or die(mysql_error());
							while($data4 = mysql_fetch_array($query_mysql4)){
							$id = $data4['kd_koreksi'];
						} ?>
						<td><center>
							<a class="btn btn-info btn-xs" href="hasilkoreksi.php?id=<?php echo $id; ?>"><span class ="glyphicon glyphicon-file"></span> Hasil Koreksi</a>
							<a class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data jawaban siswa <?php echo $nama; ?>?')" href="act_hapus_jawabansiswa.php?id1=<?php echo $data['kd_jawaban_siswa']; ?>&id2=<?php echo $id; ?>"><span class ="glyphicon glyphicon-trash"></span> Hapus</a>					
						</center></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
				</div>
				</div>
				<hr/>
				<a class="btn btn-danger" href="koreksijawaban.php"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
              
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
