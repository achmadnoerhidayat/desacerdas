<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$cbokel = $_POST['txtkdkel'];
	$cbojns = $_POST['cbojns'];
	$txtjml = $_POST['txtjml'];

	mysqli_query($koneksi,"INSERT tbpeternakan (kode, kd_ternak, jumlah) VALUES ('$cbokel','$cbojns','$txtjml')");
	//$next = 'location:peternakan_rst.php?cbokel=';
	//$awal = $next.$kd;
	//header($awal);
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('peternakan.php');</script>";			
?>