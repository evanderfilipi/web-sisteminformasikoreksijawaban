<?php

include '../koneksi.php';
session_start();
if ($_SESSION['Status'] == 'Admin Utama') {
	
	$kd_kunci = $_GET['id'];
	$no_1 = $_POST['n1'];
	$no_2 = $_POST['n2'];
	$no_3 = $_POST['n3'];
	$no_4 = $_POST['n4'];
	$no_5 = $_POST['n5'];
	$no_6 = $_POST['n6'];
	$no_7 = $_POST['n7'];
	$no_8 = $_POST['n8'];
	$no_9 = $_POST['n9'];
	$no_10 = $_POST['n10'];
	$no_11 = $_POST['n11'];
	$no_12 = $_POST['n12'];
	$no_13 = $_POST['n13'];
	$no_14 = $_POST['n14'];
	$no_15 = $_POST['n15'];
	$no_16 = $_POST['n16'];
	$no_17 = $_POST['n17'];
	$no_18 = $_POST['n18'];
	$no_19 = $_POST['n19'];
	$no_20 = $_POST['n20'];
	$no_21 = $_POST['n21'];
	$no_22 = $_POST['n22'];
	$no_23 = $_POST['n23'];
	$no_24 = $_POST['n24'];
	$no_25 = $_POST['n25'];
	$no_26 = $_POST['n26'];
	$no_27 = $_POST['n27'];
	$no_28 = $_POST['n28'];
	$no_29 = $_POST['n29'];
	$no_30 = $_POST['n30'];
	$no_31 = $_POST['n31'];
	$no_32 = $_POST['n32'];
	$no_33 = $_POST['n33'];
	$no_34 = $_POST['n34'];
	$no_35 = $_POST['n35'];
	$no_36 = $_POST['n36'];
	$no_37 = $_POST['n37'];
	$no_38 = $_POST['n38'];
	$no_39 = $_POST['n39'];
	$no_40 = $_POST['n40'];
	$no_41 = $_POST['n41'];
	$no_42 = $_POST['n42'];
	$no_43 = $_POST['n43'];
	$no_44 = $_POST['n44'];
	$no_45 = $_POST['n45'];
	$no_46 = $_POST['n46'];
	$no_47 = $_POST['n47'];
	$no_48 = $_POST['n48'];
	$no_49 = $_POST['n49'];
	$no_50 = $_POST['n50'];

		$queryupdate = mysql_query("UPDATE tb_kunci_jawaban SET no_1='$no_1', no_2='$no_2', no_3='$no_3', no_4='$no_4', no_5='$no_5', no_6='$no_6', no_7='$no_7', no_8='$no_8', no_9='$no_9', no_10='$no_10', no_11='$no_11', no_12='$no_12', no_13='$no_13', no_14='$no_14', no_15='$no_15', no_16='$no_16', no_17='$no_17', no_18='$no_18', no_19='$no_19', no_20='$no_20', no_21='$no_21', no_22='$no_22', no_23='$no_23', no_24='$no_24', no_25='$no_25', no_26='$no_26', no_27='$no_27', no_28='$no_28', no_29='$no_29', no_30='$no_30', no_31='$no_31', no_32='$no_32', no_33='$no_33', no_34='$no_34', no_35='$no_35', no_36='$no_36', no_37='$no_37', no_38='$no_38', no_39='$no_39', no_40='$no_40', no_41='$no_41', no_42='$no_42', no_43='$no_43', no_44='$no_44', no_45='$no_45', no_46='$no_46', no_47='$no_47', no_48='$no_48', no_49='$no_49', no_50='$no_50' WHERE kd_jawaban='$kd_kunci'");
		if($queryupdate){
			header("location:datakuncijawaban.php?pesan=update");}
		else{
			header("location:datakuncijawaban.php?pesan_error=update");}
		
} else {
	echo "<script>
	location.href='../index.php';
	</script>";
	exit();
}
?>