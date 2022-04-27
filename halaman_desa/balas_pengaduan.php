<?php 		
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtbalas = $_POST['txtbalas'];

	mysqli_query($koneksi,"UPDATE tbpengaduan SET balasan='$txtbalas' WHERE id='$id'");
  	echo"<script>window.alert('Data Pengaduan telah berhasil dibalas!');window.location=('pengaduan.php');</script>";
?>