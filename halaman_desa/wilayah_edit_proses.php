<?php 
	include "config/koneksi.php";
	
	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
 	$txtid = $_POST['txtid'];
	$txtdeskripsi = $_POST['txtdeskripsi'];
	$txtrt = $_POST['txtrt'];
	$txtluas = $_POST['txtluas'];
	$txtpersen = $_POST['txtpersen'];

	mysqli_query($koneksi,"UPDATE tbdukuh 
							SET deskripsi_wilayah='$txtdeskripsi', jumlah_rt='$txtrt', luas='$txtluas', persentase='$txtpersen' 
							WHERE id_dukuh='$txtid'");
  	echo"<script>window.alert('Data Berhasil Disimpan!');window.location=('wilayah.php');</script>";
?>