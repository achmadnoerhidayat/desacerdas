<?php 
	include "config/koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d');
	$waktuaja_skr=date('h:i');
 
	$nip = $_POST['txtnip'];
	$txtpassbaru = $_POST['txtpassbaru'];

	mysqli_query($koneksi,"UPDATE tbuser SET password='$txtpassbaru' WHERE nip='$nip'");

session_start();
session_destroy();
  	echo"<script>window.alert('Password Berhasil Diubah. Silahkan Login Kembali!');window.location=('../index.php');</script>";
?>