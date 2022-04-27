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

	mysqli_query($koneksi,"INSERT INTO tbtpa 
				(kode, kd_tpa, nm_tpa, lokasi_tpa, luas_tpa, kapasitas_tpa, 
				sampah_masuk, sampah_diproses, keterangan) 
				VALUES ('$kdkel','','$txtnm','$txtlok','$txtluas','$txtkapasitas',
				'$txtmasuk','$txtangkut','$txtket')");

	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('tpa.php');</script>";
	
?>