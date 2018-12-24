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
                     <h3>Lihat/Edit Kunci Jawaban Pilihan Ganda</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				<?php
				$back = "javascript:history.go(-1)";
				$kd_kunci = $_GET['id'];
				$kd_mapel = "";
				$query_mysql = mysql_query("SELECT * FROM tb_kunci_jawaban WHERE kd_jawaban='$kd_kunci'")or die(mysql_error());
					while($data = mysql_fetch_array($query_mysql)){
					$jml_soal = $data['jml_soal'];
					$kd_mapel = $data['kd_mapel'];
					$jns_soal = $data['jns_soal'];
					$kelas = $data['kelas'];
					$jurusan = $data['jurusan'];
					$semester = $data['semester'];
					$thn_ajaran = $data['tahun_ajaran'];
					$n1 = $data['no_1'];
					$n2 = $data['no_2'];
					$n3 = $data['no_3'];
					$n4 = $data['no_4'];
					$n5 = $data['no_5'];
					$n6 = $data['no_6'];
					$n7 = $data['no_7'];
					$n8 = $data['no_8'];
					$n9 = $data['no_9'];
					$n10 = $data['no_10'];
					$n11 = $data['no_11'];
					$n12 = $data['no_12'];
					$n13 = $data['no_13'];
					$n14 = $data['no_14'];
					$n15 = $data['no_15'];
					$n16 = $data['no_16'];
					$n17 = $data['no_17'];
					$n18 = $data['no_18'];
					$n19 = $data['no_19'];
					$n20 = $data['no_20'];
					$n21 = $data['no_21'];
					$n22 = $data['no_22'];
					$n23 = $data['no_23'];
					$n24 = $data['no_24'];
					$n25 = $data['no_25'];
					$n26 = $data['no_26'];
					$n27 = $data['no_27'];
					$n28 = $data['no_28'];
					$n29 = $data['no_29'];
					$n30 = $data['no_30'];
					$n31 = $data['no_31'];
					$n32 = $data['no_32'];
					$n33 = $data['no_33'];
					$n34 = $data['no_34'];
					$n35 = $data['no_35'];
					$n36 = $data['no_36'];
					$n37 = $data['no_37'];
					$n38 = $data['no_38'];
					$n39 = $data['no_39'];
					$n40 = $data['no_40'];
					$n41 = $data['no_41'];
					$n42 = $data['no_42'];
					$n43 = $data['no_43'];
					$n44 = $data['no_44'];
					$n45 = $data['no_45'];
					$n46 = $data['no_46'];
					$n47 = $data['no_47'];
					$n48 = $data['no_48'];
					$n49 = $data['no_49'];
					$n50 = $data['no_50'];
					}
				$query_mysqlz = mysql_query("SELECT * FROM tb_mapel WHERE kd_mapel='$kd_mapel'")or die(mysql_error());
					while($row = mysql_fetch_array($query_mysqlz)){
					$namamapel = $row['nama_mapel'];
					} 
				?>
				
				<hr/>
				<div class="well" style="background:#FFFFFF;">
				<p><b>Nama Mata Pelajaran : </b><?php echo $namamapel; ?></p>
				<p><b>Jenis Soal Ujian : </b><?php echo $jns_soal; ?></p>
				<p><b>Jumlah Soal Pilihan Ganda (PG) : </b><?php echo $jml_soal; ?> Soal</p>
				<p><b>Kunci Jawaban PG Untuk : </b></p>
				<p><b>>>> Jurusan : </b><?php echo $jurusan; ?></p>
				<p><b>>>> Kelas : </b><?php echo $kelas; ?></p>
				<p><b>>>> Semester : </b><?php echo $semester; ?></p>
				<p><b>>>> Tahun Ajaran : </b><?php echo $thn_ajaran; ?></p>
				</div>
				<hr/>
				<?php 
					if ($jml_soal == 5) { ?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 10) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 15) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 20) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 25) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 30) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n26;?>" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n27;?>" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n28;?>" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n29;?>" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n30;?>" class="form-control" name="n30" placeholder="30"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 35) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n26;?>" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n27;?>" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n28;?>" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n29;?>" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n30;?>" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n31;?>" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n32;?>" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n33;?>" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n34;?>" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n35;?>" class="form-control" name="n35" placeholder="35"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 40) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n26;?>" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n27;?>" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n28;?>" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n29;?>" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n30;?>" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n31;?>" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n32;?>" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n33;?>" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n34;?>" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n35;?>" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n36;?>" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n37;?>" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n38;?>" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n39;?>" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n40;?>" class="form-control" name="n40" placeholder="40"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 45) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n26;?>" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n27;?>" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n28;?>" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n29;?>" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n30;?>" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n31;?>" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n32;?>" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n33;?>" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n34;?>" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n35;?>" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n36;?>" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n37;?>" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n38;?>" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n39;?>" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n40;?>" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n41;?>" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n42;?>" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n43;?>" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n44;?>" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n45;?>" class="form-control" name="n45" placeholder="45"></td>
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
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					
					<?php } else if ($jml_soal == 50) {?>
					<form method="POST" action="act_update_kunci_jawaban.php?id=<?php echo $kd_kunci; ?>">
					<div class="form-group has-success">
					<div class="well">
					<table class="table">
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n1;?>" class="form-control" name="n1" placeholder="1"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n2;?>" class="form-control" name="n2" placeholder="2"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n3;?>" class="form-control" name="n3" placeholder="3"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n4;?>" class="form-control" name="n4" placeholder="4"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n5;?>" class="form-control" name="n5" placeholder="5"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n6;?>" class="form-control" name="n6" placeholder="6"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n7;?>" class="form-control" name="n7" placeholder="7"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n8;?>" class="form-control" name="n8" placeholder="8"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n9;?>" class="form-control" name="n9" placeholder="9"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n10;?>" class="form-control" name="n10" placeholder="10"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n11;?>" class="form-control" name="n11" placeholder="11"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n12;?>" class="form-control" name="n12" placeholder="12"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n13;?>" class="form-control" name="n13" placeholder="13"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n14;?>" class="form-control" name="n14" placeholder="14"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n15;?>" class="form-control" name="n15" placeholder="15"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n16;?>" class="form-control" name="n16" placeholder="16"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n17;?>" class="form-control" name="n17" placeholder="17"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n18;?>" class="form-control" name="n18" placeholder="18"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n19;?>" class="form-control" name="n19" placeholder="19"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n20;?>" class="form-control" name="n20" placeholder="20"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n21;?>" class="form-control" name="n21" placeholder="21"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n22;?>" class="form-control" name="n22" placeholder="22"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n23;?>" class="form-control" name="n23" placeholder="23"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n24;?>" class="form-control" name="n24" placeholder="24"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n25;?>" class="form-control" name="n25" placeholder="25"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n26;?>" class="form-control" name="n26" placeholder="26"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n27;?>" class="form-control" name="n27" placeholder="27"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n28;?>" class="form-control" name="n28" placeholder="28"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n29;?>" class="form-control" name="n29" placeholder="29"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n30;?>" class="form-control" name="n30" placeholder="30"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n31;?>" class="form-control" name="n31" placeholder="31"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n32;?>" class="form-control" name="n32" placeholder="32"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n33;?>" class="form-control" name="n33" placeholder="33"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n34;?>" class="form-control" name="n34" placeholder="34"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n35;?>" class="form-control" name="n35" placeholder="35"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n36;?>" class="form-control" name="n36" placeholder="36"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n37;?>" class="form-control" name="n37" placeholder="37"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n38;?>" class="form-control" name="n38" placeholder="38"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n39;?>" class="form-control" name="n39" placeholder="39"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n40;?>" class="form-control" name="n40" placeholder="40"></td>
				</tr>
				<tr>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n41;?>" class="form-control" name="n41" placeholder="41"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n42;?>" class="form-control" name="n42" placeholder="42"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n43;?>" class="form-control" name="n43" placeholder="43"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n44;?>" class="form-control" name="n44" placeholder="44"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n45;?>" class="form-control" name="n45" placeholder="45"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n46;?>" class="form-control" name="n46" placeholder="46"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n47;?>" class="form-control" name="n47" placeholder="47"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n48;?>" class="form-control" name="n48" placeholder="48"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n49;?>" class="form-control" name="n49" placeholder="49"></td>
				<td style="padding-right: 10px"><input type="text" maxlength="1" value="<?php echo $n50;?>" class="form-control" name="n50" placeholder="50"></td>
				</tr>
				</table>
				</div>
					<table class="table">
					<tr>
					<td>
					<p></p>
					<a class="btn btn-danger" href="<?= $back ?>"><span class ="glyphicon glyphicon-hand-left"></span> Kembali</a>
					<button type="submit" class="btn btn-success"><span class ="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</td>
					</tr>
					</table>
					</div>
					</form>
					<?php } ?>
              
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