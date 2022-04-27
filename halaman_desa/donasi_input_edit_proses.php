<?php 
	include "config/koneksi.php";
 	
	$id = $_POST['txtid'];
	//$kode = $_POST['txtkdkel'];
	
	$txtnm = $_POST['txtnm'];
	$txtpenggalang = $_POST['txtpenggalang'];
	$txtnorek = $_POST['txtnorek'];
	$txtnmrek = $_POST['txtnmrek'];
	$txtbank = $_POST['txtbank'];
	//$txtket = $_POST['txtket'];
					
	mysqli_query($koneksi,"UPDATE tbdonasi 
				SET nm_donasi='$txtnm', penggalang='$txtpenggalang', 
				norek='$txtnorek', nm_rek='$txtnmrek', bank='$txtbank' WHERE kd_donasi='$id'");
				
			echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('donasi_daftar.php');</script>";
?>