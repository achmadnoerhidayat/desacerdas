<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$kdkel = $_POST['txtkdkel'];
	$txtnm = $_POST['txtnm'];
	$txtlok = $_POST['txtlok'];
	$txtluas = $_POST['txtluas'];
	$txtkapasitas = $_POST['txtkapasitas'];
	$txtmasuk = $_POST['txtmasuk'];
	$txtangkut = $_POST['txtangkut'];
	$txtket = $_POST['txtket'];

	mysqli_query($koneksi,"INSERT INTO tbtps 
				(kode, kd_tps, nm_tps, lokasi_tps, luas_tps, kapasitas_tps, 
				sampah_masuk, sampah_diangkat, keterangan) 
				VALUES ('$kdkel','','$txtnm','$txtlok','$txtluas','$txtkapasitas',
				'$txtmasuk','$txtangkut','$txtket')");
	
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('tps.php');</script>";
	
	
?>