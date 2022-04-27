<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$id = $_POST['txtid'];
	$txtjenis = $_POST['txtjenis'];

	mysqli_query($koneksi,"UPDATE tbjenis_ikan SET nama='$txtjenis' WHERE kode='$id'");
  	echo"<script>window.alert('Data Berhasil Diupdate!');window.location=('jenis_ikan.php');</script>";
?>