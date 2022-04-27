<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$kdkel = $_POST['txtkdkel'];
	$txtjns = $_POST['txtjns'];
	$txtlok = $_POST['txtlok'];
	$txtpotensi = $_POST['txtpotensi'];
	$txtkapasitas = $_POST['txtkapasitas'];
	$txtpengelola = $_POST['txtpengelola'];
	$txtpemanfaatan = $_POST['txtpemanfaatan'];

	mysqli_query($koneksi,"INSERT INTO tbenergi 
				(kode, jenis_energi, lokasi, potensi, kapasitas, pengelola, pemanfaatan) 
				VALUES ('$kdkel','$txtjns','$txtlok','$txtpotensi','$txtkapasitas',
				'$txtpengelola','$txtpemanfaatan')");
	
	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('energi.php');</script>";
?>