<?php 
	include "config/koneksi.php";
	//$namafolder="../file_upload/";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtnm = $_POST['txtnm'];
	$txtdasar = $_POST['txtdasar'];
	$txttujuan = $_POST['txttujuan'];
	$txtkeg = $_POST['txtkeg'];
	$txthasil = $_POST['txthasil'];

	mysqli_query($koneksi,"UPDATE tbpengelolaan_sampah SET 
						nama='$txtnm', dasar='$txtdasar', tujuan='$txttujuan', kegiatan='$txtkeg', hasil='$txthasil' 
						WHERE id='$id'");
								
	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('sampah_pengelolaan.php');</script>";	
?>