<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$txtdeskripsi = $_POST['txtdeskripsi'];
	$cbort = $_POST['txtid'];
	$txtkk = $_POST['txtkk'];
	$txtjiwa = $_POST['txtjiwa'];
	$txtluas = $_POST['txtluas'];
	$txtpersen = $_POST['txtpersen'];

	mysqli_query($koneksi,"UPDATE tbrt 
							SET deskripsi='$txtdeskripsi', kk='$txtkk', jiwa='$txtjiwa', luas='$txtluas', persentase='$txtpersen' 
							WHERE id_rt='$cbort'");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('rt.php');</script>";
?>