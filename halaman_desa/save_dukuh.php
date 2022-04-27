<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];

	mysqli_query($koneksi,"INSERT INTO tbdukuh (kode,nm_dukuh) VALUES ('$cbokel','$txtnm')");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('wilayah_add.php');</script>";
?>